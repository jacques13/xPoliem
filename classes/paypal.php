<?php

require_once ('connect.php');
require_once ('functions.php');
require_once ('functions.paypal.php');
class PayPal {
//APP-80W284485P519543T
	var $apiUrl = 'https://svcs.sandbox.paypal.com/AdaptivePayments/';
	var $paypalUrl = 'www.paypal.com/webscr?cmd=_ap-payment&paykey=';
	var $envelope =  array(
				"errorLanguage" => "en_US",
				"detailLevel" => "ReturnAll"
			);
	
	function __construct(){
		
		
			
	}
	
	function getPaymentOptions($paykey){
		$packet = array(
			"requestEnvelope" => array(
				"errorLanguage" => "en_US",
				"detailLevel" => "ReturnAll"
			),
			"payKey" => $paykey 
				
		);
		return PayPal::_paypalSend($packet,"GetPaymentOptions");
	}
	function _paypalSend($data,$call){
	$apiUrl = 'https://svcs.sandbox.paypal.com/AdaptivePayments/';
	$headers =array(
			"X-PAYPAL-SECURITY-USERID: Business_xPoliem_api1.gmail.com",//.API_USER,
			"X-PAYPAL-SECURITY-PASSWORD: 1404152995",//.API_PASS,
			"X-PAYPAL-SECURITY-SIGNATURE: ABmIVbunwqgakAHacySwBETOfpdVA9tzyZHBEWf56KOo-LEarFm1LR1A",//.API_SIG,
			"X-PAYPAL-REQUEST-DATA-FORMAT: JSON",
			"X-PAYPAL-RESPONSE-DATA-FORMAT: JSON",
			"X-PAYPAL-APPLICATION-ID: APP-80W284485P519543T"//.APP_ID
			
			
		);
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$apiUrl.$call );
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE );
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE );
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data) );
		curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
		
		return json_decode(curl_exec($ch),TRUE);
		
	}
	
	function splitPay($post_id){
		$details = PayPal::vidSellDets($post_id);
		 $createpacket = array(
			"actionType" => "PAY",
			"currencyCode" => "USD",
			"receiverList" => $details,
			"returnUrl" => "http://localhost:83/php/!xPoliem/xPoliem/jacques-payment-vir-videos-en-drinks/",
			"cancelUrl" => "http://localhost:83/php/!xPoliem/xPoliem/jacques-payment-vir-videos-en-drinks/",
			"requestEnvelope" => array(
				"errorLanguage" => "en_US",
				"detailLevel" => "ReturnAll"
			)
		);
		
		  $response = PayPal::_paypalSend($createpacket,"Pay");

		  $paykey = $response['payKey'];
		
		//SET PAYMENT DETAILS
		$detailsPacket = array(
			"requestEnvelope" => array(
				"errorLanguage" => "en_US",
				"detailLevel" => "ReturnAll"
			),
			"payKey" => $paykey,
			"receiverOptions" => PayPal::setDetailsPacket($post_id)
			
		
		);
		 $response = PayPal::_paypalSend($detailsPacket,"SetPaymentOptions");
		
		$dets = PayPal::getPaymentOptions($paykey);
			 
			 $location = "https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=".$paykey;
			 header('Location:'.$location);
		
	}
	function splitPayForDrinks($u_id,$price,$drinkName){
		$details = PayPal::drinkSellDets($u_id,$price);
		 $createpacket = array(
			"actionType" => "PAY",
			"currencyCode" => "USD",
			"receiverList" => $details,
			"returnUrl" => "http://localhost:83/php/!xPoliem/xPoliem/jacques-payment-vir-videos-en-drinks/",
			"cancelUrl" => "http://localhost:83/php/!xPoliem/xPoliem/jacques-payment-vir-videos-en-drinks/",
			"requestEnvelope" => array(
				"errorLanguage" => "en_US",
				"detailLevel" => "ReturnAll"
			)
		);
		  $response = PayPal::_paypalSend($createpacket,"Pay");

		 $paykey = $response['payKey'];
		
		//SET PAYMENT DETAILS
		$detailsPacket = array(
			"requestEnvelope" => array(
				"errorLanguage" => "en_US",
				"detailLevel" => "ReturnAll"
			),
			"payKey" => $paykey,
			"receiverOptions" => PayPal::setDetailsPacketForDrinks($u_id,$price,$drinkName)
			
		
		);
		 $response = PayPal::_paypalSend($detailsPacket,"SetPaymentOptions");
		
		$dets = PayPal::getPaymentOptions($paykey);
			 
			 $location = "https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=".$paykey;
			 header('Location:'.$location);
		
	}
	function vidSellDets($post_id){
	
	/*FORMAT
	"receiver" => array(
					array(
						"amount"=>"2.00",
						"email" => "Business_xPoliem@gmail.com"
					),
					array(
						"amount"=>"5.0",
						"email" => "xpoliemget@gmail.com"
					),
				)
	
	*/
		$VidPrice = VidPrice($post_id);
		$packet  =array(
			"receiver" => array(
					array(
						"amount"=>$VidPrice[1],
						"email" => "Business_xPoliem@gmail.com"
					),
					array(
						"amount"=>$VidPrice[0],
						"email" => $VidPrice[2]
					),
				)
		);
		return $packet;
		
	}
	function setDetailsPacket($post_id){
	/*FORMAT
	"receiverOptions" => array(
				array(
					"receiver" => array("email" => "Business_xPoliem@gmail.com"),//mut die selle wees *price*
					"invoiceData" => array(
						"item" => array(
							array(
								"name" => "product 1",
								"price" => "1.00",
								"identifier" => "p1",
							),
							array(
								"name" => "product 1",
								"price" => "1.00",
								"identifier" => "p1",
							)
							
						)
					)
				),
				array(
						"receiver" => array("email" => "xpoliemget@gmail.com"),
						"invoiceData" => array(
							"item" => array(
									array(
									"name" => "product 1",
									"price" => "2.00",
									"identifier" => "p1",
									),
									array(
										"name" => "product 1",
										"price" => "3.00",
										"identifier" => "p1",
									)
							)
						)
				),
			)
	
	*/
	
	$VidPrice = VidPrice($post_id);
		
	
		$detailsPacket =array(
				array(
					"receiver" => array("email" => "Business_xPoliem@gmail.com"),//mut die selle wees *price*
					"invoiceData" => array(
						"item" => array(
							array(
								"name" => $VidPrice[3],
								"price" => $VidPrice[1],
								
							)
							
						)
					)
				),
				array(
						"receiver" => array("email" =>$VidPrice[2]),
						"invoiceData" => array(
							"item" => array(
									array(
									"name" => $VidPrice[3],
									"price" => $VidPrice[0],
									
									)
							)
						)
				)
			);
			return $detailsPacket;
	
	}
	function drinkSellDets ($u_id,$price){
		$DrinkPrice = DrinkPrice($u_id,$price);
		$packet  =array(
			"receiver" => array(
					array(
						"amount"=>$DrinkPrice[1],
						"email" => "Business_xPoliem@gmail.com"
					),
					array(
						"amount"=>$DrinkPrice[0],
						"email" => $DrinkPrice[2]
					),
				)
		);
		return $packet;
	}
	function setDetailsPacketForDrinks($u_id,$drink,$drinkName){
			
	$DrinkPrice = DrinkPrice($u_id,$price);
		
	
		$detailsPacket =array(
				array(
					"receiver" => array("email" => "Business_xPoliem@gmail.com"),//mut die selle wees *price*
					"invoiceData" => array(
						"item" => array(
							array(
								"name" => $drinkName,
								"price" => $DrinkPrice[1],
								
							)
							
						)
					)
				),
				array(
						"receiver" => array("email" =>$DrinkPrice[2]),
						"invoiceData" => array(
							"item" => array(
									array(
									"name" => $drinkName,
									"price" => $DrinkPrice[0],
									
									)
							)
						)
				)
			);
			return $detailsPacket;
	}
}