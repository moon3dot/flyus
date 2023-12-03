<?php

add_action( 'wp_ajax_travel_insurance_destination', 'travel_insurance_destination' );
add_action( 'wp_ajax_nopriv_travel_insurance_destination', 'travel_insurance_destination' );

function travel_insurance_destination() {
	$soapClient = new SoapClient( INSURANCE_URL, array( 'trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE ) );
	$soapParams = array(
		'username' => INSURANCE_USER_NAME,
		'password' => INSURANCE_PASSWORD,
	);
	try {
		$response = $soapClient->__soapCall( 'getCountries', array( $soapParams ) );
//		$response_json = json_encode($response, JSON_PRETTY_PRINT);
//		var_dump($response->getCountriesResult->TISCountryInfo[0]->title);
//		var_dump($response->getCountriesResult->TISCountryInfo[0]->standardCode);
//		var_dump($response->getCountriesResult->TISCountryInfo[0]->code);

		$countries = [];
		foreach ( $response->getCountriesResult->TISCountryInfo as $item ) {
			$country      = [
				'title' => $item->title,
				'code'  => $item->code
			];
			$countries [] = $country;
		}

		$countries = json_encode( $countries, JSON_UNESCAPED_UNICODE );
		echo $countries;
		die();

	} catch ( SoapFault $e ) {

		echo json_encode( array( 'error' => $e->getMessage() ) );
		die();
	}
}




