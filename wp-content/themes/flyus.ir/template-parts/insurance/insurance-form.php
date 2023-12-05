<?php

$soapClient = new SoapClient( INSURANCE_URL, array( 'trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE ) );
$soapParams = array(
	'username' => INSURANCE_USER_NAME,
	'password' => INSURANCE_PASSWORD,
);
try {
	$response  = $soapClient->__soapCall( 'getCountries', array( $soapParams ) );
	$countries = [];
	foreach ( $response->getCountriesResult->TISCountryInfo as $item ) {
		$country      = [
			'title' => $item->title,
			'code'  => $item->code
		];
		$countries [] = $country;
	}

	$response         = $soapClient->__soapCall( 'getDurationsOfStay', array( $soapParams ) );
	$durationsOsfStay = [];
	foreach ( $response->getDurationsOfStayResult->TISDurationOfStay as $item ) {
		$stay                = [
			'title' => $item->title,
			'value' => $item->value
		];
		$durationsOsfStay [] = $stay;

	}


} catch ( SoapFault $e ) {

}

session_unset();

?>
<section class="insurance-form">
    <div class="container">
        <div class="insurance-wrapper">

            <div class="insurance-form__header">
                <h3>بیمه مسافرتی</h3>
            </div>

            <div class="insurance-form__body">
                <form id="insurance-form" action="/select-insurance"  method="post" >

                    <input id="single-insurance-destination-code" name="single-insurance-destination-code" type="hidden">
                    <input id="single-travel-time" name="single-travel-time" type="hidden">

                    <input id="server-12-result" name="server-12-result" type="hidden">
                    <input id="server-13-result" name="server-13-result" type="hidden">
                    <input id="server-66-result" name="server-66-result" type="hidden">
                    <input id="server-71-result" name="server-71-result" type="hidden">
                    <input id="server-76-result" name="server-76-result" type="hidden">
                    <input id="server-81-result" name="server-81-result" type="hidden">


                    <div class="insurance-form-destination">
                        <div class="insurance-form-destination__single">
                            <input autocomplete="off" checked="checked" type="radio" id="single-destination"
                                   name="destination" value="single-destination">
                              <label for="single-destination">تک مقصده</label>
                        </div>
                        <div class="insurance-form-destination__multi">
                            <input autocomplete="off" type="radio" id="multi-destination" name="destination"
                                   value="multi-destination">
                              <label for="multi-destination">چند مقصده</label>
                        </div>
                    </div>

                    <div>
                        <div class="domestic-infos row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="domestic-city_wrapper">

                                    <div class="domestic-city" id="insurance-form__start-cities">
                                        <input autocomplete="off" type="text" placeholder="کشور مقصد اول"
                                               id="domestic-cities-start-input" name="single_insurance_destination_name">


                                        <div class="domestic-cities-list domestic-cities-list-start"
                                             id="domestic-cities-start">
                                            <p>پرتردد</p>
                                            <ul>
												<?php

												foreach ( $countries as $c ) {
													?>
                                                    <li class="flight-city__start"
                                                        data-value="<?php echo $c['code']; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                                            </path>
                                                        </svg>
                                                        <span><?php echo $c['title']; ?></span>

                                                    </li>

													<?php
												}
                                                
												?>

                                            </ul>
                                        </div>


                                    </div>


                                </div>


                                <div class="add-insurace-form" id="add-insurance--destination">
                                    <button type="button">+ افزودن مقصد</button>
                                </div>

                            </div>
                            <!-- date  -->
                            <div class="col-12 col-md-6 col-lg-3">

                                <div class="insurance-form__date">
                                    <div class="travel-time">
                                        <input  autocomplete="off" type="text" id="travel-time-input" name="input-multi-destination"
                                               class="travel-time__input" placeholder="مدت سفر">
                                        <svg class="insurance-form__date-arrow w-6 h-6"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>


                                        <ul class="travel-time__list" id="travel-time-list">

											<?php
											foreach ( $durationsOsfStay as $stay ) {
												?>
                                                <li class="travel-time__item"
                                                    value="<?php echo $stay['title']; ?>"><?php echo $stay['value'] . ' '; ?>
                                                    روزه
                                                </li>
												<?php
											}
											?>
                                        </ul>

                                    </div>

                                </div>

                            </div>
                            <!-- passengers -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="passengers-wrapper">
                                    <!-- <fieldset class="passengers-title">مسافران</fieldset> -->
                                    <input autocomplete="off" type="text" id="insurance-passengers-input" name="insurance-passengers-input"
                                           class="passengers-input" autocomplete="off" value=""
                                           placeholder="تعداد مسافران">
                                    <svg class="insurance-form__passengers-arrow w-6 h-6"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                    </svg>
                                    <!-- passengers selection  -->
                                    <div class="passengers-selection" id="passengers-selection">

                                        <div class="passengers-selection-row__title">
                                            <span>بازه سنی</span>
                                            <span>
                                                        تعداد نفرات
                                                    </span>
                                        </div>

                                        <div class="passengers-selection-row">
                                            <div class="passengers-selection-row__detail">
                                                <p>0 تا 12 سال</p>
                                            </div>
                                            <div class="passengers-selection-row btns">
                                                <button type="button" class="passengers-selection-add"
                                                        id="12-add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                                    </svg>

                                                </button>
                                                <p class="passengers-selection-number" id="12-result">0</p>
                                                <button type="button"
                                                        class="passengers-selection-minus deactive" id="12-minus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M19.5 12h-15"/>
                                                    </svg>

                                                </button>
                                            </div>
                                        </div>

                                        <div class="passengers-selection-row">
                                            <div class="passengers-selection-row__detail">
                                                <p>13 تا 65 سال</p>
                                            </div>
                                            <div class="passengers-selection-row btns">
                                                <button type="button" class="passengers-selection-add"
                                                        id="13-add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                                    </svg>
                                                </button>
                                                <p class="passengers-selection-number" id="13-result">0</p>
                                                <button type="button"
                                                        class="passengers-selection-minus deactive" id="13-minus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M19.5 12h-15"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="passengers-selection-row">
                                            <div class="passengers-selection-row__detail">
                                                <p>66 تا 70 سال</p>
                                            </div>
                                            <div class="passengers-selection-row btns">
                                                <button type="button" class="passengers-selection-add"
                                                        id="66-add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                                    </svg>
                                                </button>
                                                <p class="passengers-selection-number" id="66-result">0</p>
                                                <button type="button"
                                                        class="passengers-selection-minus deactive" id="66-minus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M19.5 12h-15"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="passengers-selection-row">
                                            <div class="passengers-selection-row__detail">
                                                <p>71 تا 75 سال</p>
                                            </div>
                                            <div class="passengers-selection-row btns">
                                                <button type="button" class="passengers-selection-add"
                                                        id="71-add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                                    </svg>
                                                </button>
                                                <p class="passengers-selection-number" id="71-result">0</p>
                                                <button type="button"
                                                        class="passengers-selection-minus deactive" id="71-minus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M19.5 12h-15"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="passengers-selection-row">
                                            <div class="passengers-selection-row__detail">
                                                <p>76 تا 80 سال</p>
                                            </div>
                                            <div class="passengers-selection-row btns">
                                                <button type="button" class="passengers-selection-add"
                                                        id="76-add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                                    </svg>
                                                </button>
                                                <p class="passengers-selection-number" id="76-result">0</p>
                                                <button type="button"
                                                        class="passengers-selection-minus deactive" id="76-minus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M19.5 12h-15"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="passengers-selection-row">
                                            <div class="passengers-selection-row__detail">
                                                <p>81 سال به بالا</p>
                                            </div>
                                            <div class="passengers-selection-row btns">
                                                <button type="button" class="passengers-selection-add"
                                                        id="81-add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                                    </svg>
                                                </button>
                                                <p class="passengers-selection-number" id="81-result">0</p>
                                                <button type="button"
                                                        class="passengers-selection-minus deactive" id="81-minus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M19.5 12h-15"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- button search  -->
                            <div class="col-12 col-md-6 col-lg-2">
                                <div class="flights__body-button">
                                    <button id="btn_search_insurance" class="domestic-infos__search" type="submit" name="btn_search_insurance"  >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                                        </svg>

                                        جستجو
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</section>

<div class="form-overlay" id="form-overlay"></div>


<script>

    jQuery(document).ready(function ($) {

        const result_12 = document.getElementById('12-result');
        const result_13 = document.getElementById('13-result');
        const result_66 = document.getElementById('66-result');
        const result_71 = document.getElementById('71-result');
        const result_76 = document.getElementById('76-result');
        const result_81 = document.getElementById('81-result');

        const server_result_12 = document.getElementById('server-12-result');
        const server_result_13 = document.getElementById('server-13-result');
        const server_result_66 = document.getElementById('server-66-result');
        const server_result_71 = document.getElementById('server-71-result');
        const server_result_76 = document.getElementById('server-76-result');
        const server_result_81 = document.getElementById('server-81-result');

        document.getElementById('insurance-form').addEventListener('submit',(e)=>{

            e.preventDefault();

            server_result_12.value=result_12.textContent;
            server_result_13.value=result_13.textContent;
            server_result_66.value=result_66.textContent;
            server_result_71.value=result_71.textContent;
            server_result_76.value=result_76.textContent;
            server_result_81.value=result_81.textContent;

            document.getElementById('insurance-form').submit();
        })
    });



</script>