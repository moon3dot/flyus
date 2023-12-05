<?php /* Template Name: insurance Payment */ ?>
<?php get_header(); ?>

<?php

$_SESSION['plan'] = stripslashes( $_GET['plan'] );


$soapClient = new SoapClient( INSURANCE_URL, array( 'trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE ) );
$soapParams = array(
	'username'          => INSURANCE_USER_NAME,
	'password'          => INSURANCE_PASSWORD,
	'countryCode'       => $_SESSION['single_insurance_destination_code'],
	'birthDate'         => '1982-08-23',
	'durationOfStay'    => $_SESSION['single_travel_time'],
	'sourceCountryCode' => 1
);
$plans = [];
try {
	$response = $soapClient->__soapCall( 'getPlansWithDetail', array( $soapParams ) );
	foreach ( $response->getPlansWithDetailResult->TISPlanInfo as $item ) {

		$plan = [
			'code'               => $item->code,
			'title'              => $item->title,
			'titleEnglish'       => $item->titleEnglish,
			'coverLimit'         => $item->coverLimit,
			'price'              => $item->price,
			'discount'           => $item->discount,
			'discountPercentage' => $item->discountPercentage,
			'priceGross'         => $item->priceGross,
			'priceAvarez'        => $item->priceAvarez,
			'priceTax'           => $item->priceTax,
			'priceDiscount'      => $item->priceDiscount,
			'priceTotal'         => $item->priceTotal,
			'currencyCode'       => $item->currencyCode,
			'covers'             => $item->covers
		];

		if ( $item->code == intval( str_replace( '"', '', $_SESSION['plan'] ) ) ) {
			$plans [] = $plan;
		}

	}

} catch ( SoapFault $e ) {

}

$tempPrice=$plans[0]['price'];

$totalPrice =  0;
if($_SESSION['age_12'] > 0)
    $totalPrice += ($_SESSION['age_12'] * $tempPrice);

if($_SESSION['age_13'] > 0)
    $totalPrice += ($_SESSION['age_13'] * $tempPrice);

if($_SESSION['age_66'] > 0)
    $totalPrice += ($_SESSION['age_66'] * $tempPrice);

if($_SESSION['age_71'] > 0)
    $totalPrice += ($_SESSION['age_71'] * $tempPrice);

if($_SESSION['age_76'] > 0)
    $totalPrice += ($_SESSION['age_76'] * $tempPrice);

?>

    <!-- main  -->
    <main class="main">
        <!-- navigation  -->
        <section class="insurance-navigation">
            <div class="container">

                <ul class="insurance-navigation__list">
                    <li class="insurance-navigation__item passed">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title active">انتخاب بیمه نامه</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item active">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title active">مشخصات مسافر</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title">تایید اطلاعات</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title">بررسی و پرداخت</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title">صدور بیمه نامه </p>
                    </li>
                </ul>

            </div>
            <div class="navigation__left-shadow shadow-left left shadow"></div>
            <div class="navigation__right-shadow shadow-right right shadow"></div>
        </section>

        <!-- detail  -->
        <section class="insurance-details">
            <div class="container">
                <div class="insurance-details__wrapper">
                    <div class="insurance__head-wrapper">
                        <div class="insurance__head-plan">
                            <div class="insurance__head-plan_model">
                                <img src="<?php echo THEME_IMAGE . '/insurance/saman-943be5e2 1.png' ?>" alt="saman">
                                <h3><?php echo $plans[0]['title'] ?></h3>
                            </div>
                            <div class="insurance__head-plan_body">
                                <p>تعهد مالی</p>
                                <span> <?php echo $plans[0]['coverLimit'] ?> </span>
                            </div>
                        </div>
                        <div class="insurance__head-detail">
                            <p class="insurance__head-detail_title">شرکت کمک رسان</p>
                            <p class="insurance__head-detail_text">
                                کمک‌رسان خاورمیانه (MidEast)
                            </p>
                        </div>
                        <div class="insurance__head-price">
                            <bdi class="insurance__head-price-item"> <?php echo $plans[0]['price'] ?>  ریال</bdi>
                            <button class="insurance__details-price-button">تغییر بیمه نامه</button>
							<?php if ( $_SESSION['age_12'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                1 تا 12 سال (<?php echo $_SESSION['age_12'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_13'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                13 تا 66 سال (<?php echo $_SESSION['age_13'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_66'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                66 تا 71 سال (<?php echo $_SESSION['age_66'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_71'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                71 تا 76 سال (<?php echo $_SESSION['age_71'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_76'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                76 تا 81 سال (<?php echo $_SESSION['age_76'] ?>نفر)
              </span>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="insurance-form">
            <div class="container">
                <div class="insurance-form__wrapper">
                    <form action="/insurance-verifyinfo" method="post">
                        <input type="hidden" value="<?php  echo $totalPrice?>">
                        <div class="insurance-header__form">

                            <div class="visa-payment__info-form--title">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M16 0H4C1.79 0 0 1.78 0 3.97V14.03C0 16.22 1.79 18 4 18H16C18.21 18 20 16.22 20 14.03V3.97C20 1.78 18.21 0 16 0ZM6.5 4.17C7.77 4.17 8.81 5.21 8.81 6.48C8.81 7.75 7.77 8.79 6.5 8.79C5.23 8.79 4.19 7.75 4.19 6.48C4.19 5.21 5.23 4.17 6.5 4.17ZM10.37 13.66C10.28 13.76 10.14 13.82 10 13.82H3C2.86 13.82 2.72 13.76 2.63 13.66C2.54 13.56 2.49 13.42 2.5 13.28C2.67 11.6 4.01 10.27 5.69 10.11C6.22 10.06 6.77 10.06 7.3 10.11C8.98 10.27 10.33 11.6 10.49 13.28C10.51 13.42 10.46 13.56 10.37 13.66ZM17 13.75H15C14.59 13.75 14.25 13.41 14.25 13C14.25 12.59 14.59 12.25 15 12.25H17C17.41 12.25 17.75 12.59 17.75 13C17.75 13.41 17.41 13.75 17 13.75ZM17 9.75H13C12.59 9.75 12.25 9.41 12.25 9C12.25 8.59 12.59 8.25 13 8.25H17C17.41 8.25 17.75 8.59 17.75 9C17.75 9.41 17.41 9.75 17 9.75ZM17 5.75H12C11.59 5.75 11.25 5.41 11.25 5C11.25 4.59 11.59 4.25 12 4.25H17C17.41 4.25 17.75 4.59 17.75 5C17.75 5.41 17.41 5.75 17 5.75Z"
                                            fill="#094899"></path>
                                </svg>
                                <h3>
                                    اطالاعات مسافر
                                </h3>
                            </div>
                            <div class="insurance-form__clean">
                                <button type="button">پاک کردن</button>
                            </div>
                        </div>

                        <div class="insurance-form-body">
                            <div class="row">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">نام</label>
                                                <input type="text" name="fname" id="name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">نام خانوادگی</label>
                                                <input type="text" name="lastname" id="lastname">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">نام (لاتین)</label>
                                                <input type="text" name="latin-name" id="latin-name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">نام خانوادگی(لاتین)</label>
                                                <input type="text" name="latin-lastname" id="latin-lastname">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">تاریخ تولد میلادی</label>
                                                <input type="text" name="birthday" id="birthday">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">تاریخ تولد شمسی</label>
                                                <input type="text" name="persian-birthday" id="persian-birthday">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">شماره پاسپورت </label>
                                                <input type="text" name="passportNumber" id="passport-number">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">کد ملی</label>
                                                <input type="text" name="national-Code" id="national-code">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="visa-payment__info-form--input">
                                                <label for="name">نوع ویزا</label>
                                                <input type="text" name="visa-type" id="visa-type">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-2">

                                </div>
                            </div>
                        </div>

                        <div class="insurance-form__btns">
                            <div>
                                <button type="button" class="insurance-form__add">اضافه کردن مسافر جدید</button>
                            </div>
                            <div class="insurance-form__btns-detail">
                                <span class="insurance-form__price"><?php 
                                echo $totalPrice;
                                ?> ریال</span>
                                <button type="submit" class="insurance-form__submit">ادامه خرید</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>


<?php get_footer(); ?>