<?php
/**
* aradpayamak PHP API
*
* @package     aradpayamak
* @copyright   aradpayamak 2019
* @Author      hadimollaei<mr.hadimollaei@gmail.com>
* @link        http://aradpayamak.net
* @version     1.0.0
*/

/**
* Main aradpayamak API Class
* 
* @package  aradpayamak
*/
class digits_aradpayamak_net {
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
	$url="http://aradpayamak.net/APPs/SMS/WebService.php?wsdl";
	$client=new nusoap_client($url, 'wsdl');
	$err = $client->getError();
	if ($err) {
		digitsDebug("aradpayamak : SMS failed json query:".json_encode(array('message'=>$sms['message'],'to'=>$sms['to'],'error'=>$err)));
		return array('success'=>false);
	}

	// send sms function
	$id = $client->call('sendSMS', array(
	'domain' => 'aradpayamak.net',
	'username' => $this->username,
	'password' => $this->password,
	'from' => $this->sender,
	"to"=> $sms['to'],
	"text"=> $sms['message'],
	"isflash"=>"1"));

	if ($client->fault || $client->getError()) {
		digitsDebug("aradpayamak : SMS failed json query:".json_encode(array('message'=>$sms['message'],'to'=>$sms['to'],'error'=>$client->getError() ? json_encode($client->getError()) : 'Unknow Error.')));
		return array('success'=>false);
	}else{
		//digitsDebug("aradpayamak : SMS sent json query:".json_encode(array('message'=>$sms['message'],'to'=>$sms['to'],'result'=>$status)));
		return array('success'=>true);
	}
  }
}