<?php
/**
* 1b1 PHP API
*
* @package     1b1
* @copyright   1b1 2019
* @Author      hadimollaei<mr.hadimollaei@gmail.com>
* @link        http://1b1.ir
* @version     1.0.0
*/

/**
* Main 1b1 API Class
* 
* @package  1b1
*/
class digits_1b1 {
  private $username;
  private $Password;
  private $sender;
  public function __construct($arg ,array $options = array()) {
	  
    if (empty($arg)) {
      digitsDebug("Username and Password and Sender can't be blank");
	  wp_die("Username and Password and Sender can't be blank"); 
    } else {
      $this->username = $arg['username'];
      $this->password = $arg['password'];
      $this->sender = $arg['sender'];
    }
  }

  /**
  * Send some text messages
  * @author  Hadi Mollaei
  */
  public function send(array $sms) {
	  
    if (!is_array($sms)) {
      digitsDebug("sms parameter must be an array");
	  return array('success'=>false);
    }
	require_once('nusoap.php');
	$url="http://1b1.ir/APPs/SMS/WebService.php?wsdl";
	$client=new nusoap_client($url, 'wsdl');
	$err = $client->getError();
	if ($err) {
		digitsDebug("1b1 : SMS failed json query:".json_encode(array('message'=>$sms['message'],'to'=>$sms['to'],'error'=>$err)));
		return array('success'=>false);
	}

	// send sms function
	$id = $client->call('sendSMS', array(
	'domain' => '1b1.ir',
	'username' => $this->username,
	'password' => $this->password,
	'from' => $this->sender,
	"to"=> $sms['to'],
	"text"=> $sms['message'],
	"isflash"=>"1"));
	
	return $id;
  }
	public function errors_describe($error){
	 $errorCodes = array(
		'-1' => 'خطا در ارسال',
		'-2' => 'نام کاربری یا کلمه عبور اشتباه میباشد',
		'-3' => 'شماره فرستنده معتبر نمی باشد',
		'-4' => 'اعتبار کافی نیست',
		'-5' => 'پیام پس از تائید ارسال می شود',
		'-6' => 'شماره گیرنده صحیح نمی باشد',
	 );
	 return (isset($errorCodes[$error])) ? $errorCodes[$error] : 'اشکال تعریف نشده با کد :' . $error;
	}
}

