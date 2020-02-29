<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
class LoginController extends Controller
{
  

   public function reg(){
    return view('index.reg');
   }
 public function ajaxsend(){
 	// $moblie='15163225895';
 	$mobile =request()->mobile;
 	//echo $mobile;die;
 	$code=rand(1000,9999);

 	$res=$this->sendSms($mobile,$code);
	//dd($res);
 	if($res['Code']=='OK'){
 		session(['code'=>$code]);
 		request()->session()->save();
 		echo json_encode(['code'=>'00000','msg'=>'ok']);die;
 	}
  echo json_encode(['code'=>'00001','msg'=>'短信发送失败']);die;
 }
  public  function sendSms($moblie,$code){

       AlibabaCloud::accessKeyClient('LTAI4Fq7Cw6X5kvi3fSTTwSt', 'VuLPt4csODexmXQ0vSzwJq52xvy0Io')
                        ->regionId('cn-hangzhou')
                        ->asDefaultClient();

try {
    $result = AlibabaCloud::rpc()
                          ->product('Dysmsapi')
                          // ->scheme('https') // https | http
                          ->version('2017-05-25')
                          ->action('SendSms')
                          ->method('POST')
                          ->host('dysmsapi.aliyuncs.com')
                          ->options([
                                        'query' => [
                                          'RegionId' => "cn-hangzhou",
                                          'PhoneNumbers' => "15163225895",
                                          'SignName' => "热爱学习",
                                          'TemplateCode' => "SMS_184215160",
                                          'TemplateParam' => "{code:1423}",
                                        ],
                                    ])
                          ->request();
   return $result->toArray();
} catch (ClientException $e) {
    return $e->getErrorMessage();
} catch (ServerException $e) {
    return  $e->getErrorMessage();
}
}
public function regdo(){
  $post=request()->except('_token');
  dump ($post);
  $code =session('code');
  dd($code);
}
}