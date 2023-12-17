<?php /* Template Name: Visa-form */ ?>

<?php get_header(); ?>
<head>

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

/*  */

.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
</style>

<script type="text/javascript">
/* <![CDATA[ */
 var gform;gform||(document.addEventListener("gform_main_scripts_loaded",function(){gform.scriptsLoaded=!0}),window.addEventListener("DOMContentLoaded",function(){gform.domLoaded=!0}),gform={domLoaded:!1,scriptsLoaded:!1,initializeOnLoaded:function(o){gform.domLoaded&&gform.scriptsLoaded?o():!gform.domLoaded&&gform.scriptsLoaded?window.addEventListener("DOMContentLoaded",o):document.addEventListener("gform_main_scripts_loaded",o)},hooks:{action:{},filter:{}},addAction:function(o,n,r,t){gform.addHook("action",o,n,r,t)},addFilter:function(o,n,r,t){gform.addHook("filter",o,n,r,t)},doAction:function(o){gform.doHook("action",o,arguments)},applyFilters:function(o){return gform.doHook("filter",o,arguments)},removeAction:function(o,n){gform.removeHook("action",o,n)},removeFilter:function(o,n,r){gform.removeHook("filter",o,n,r)},addHook:function(o,n,r,t,i){null==gform.hooks[o][n]&&(gform.hooks[o][n]=[]);var e=gform.hooks[o][n];null==i&&(i=n+"_"+e.length),gform.hooks[o][n].push({tag:i,callable:r,priority:t=null==t?10:t})},doHook:function(n,o,r){var t;if(r=Array.prototype.slice.call(r,1),null!=gform.hooks[n][o]&&((o=gform.hooks[n][o]).sort(function(o,n){return o.priority-n.priority}),o.forEach(function(o){"function"!=typeof(t=o.callable)&&(t=window[t]),"action"==n?t.apply(null,r):r[0]=t.apply(null,r)})),"filter"==n)return r[0]},removeHook:function(o,n,t,i){var r;null!=gform.hooks[o][n]&&(r=(r=gform.hooks[o][n]).filter(function(o,n,r){return!!(null!=i&&i!=o.tag||null!=t&&t!=o.priority)}),gform.hooks[o][n]=r)}}); 
/* ]]> */
</script>


	<script type="text/javascript" src="http://flyus.ir/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1" id="jquery-migrate-js"></script>
<script type="text/javascript" defer='defer' src="http://flyus.ir/wp-content/plugins/gravityforms/js/jquery.json.min.js?ver=2.8.0" id="gform_json-js"></script>
<script type="text/javascript" id="gform_gravityforms-js-extra">
/* <![CDATA[ */
var gform_i18n = {"datepicker":{"days":{"monday":"Mo","tuesday":"Tu","wednesday":"We","thursday":"Th","friday":"Fr","saturday":"Sa","sunday":"Su"},"months":{"january":"January","february":"February","march":"March","april":"April","may":"May","june":"June","july":"July","august":"August","september":"September","october":"October","november":"November","december":"December"},"firstDay":6,"iconText":"Select date"}};
var gf_legacy_multi = [];
var gform_gravityforms = {"strings":{"invalid_file_extension":"This type of file is not allowed. Must be one of the following:","delete_file":"Delete this file","in_progress":"in progress","file_exceeds_limit":"File exceeds size limit","illegal_extension":"This type of file is not allowed.","max_reached":"Maximum number of files reached","unknown_error":"There was a problem while saving the file on the server","currently_uploading":"Please wait for the uploading to complete","cancel":"Cancel","cancel_upload":"Cancel this upload","cancelled":"Cancelled"},"vars":{"images_url":"http:\/\/flyus.ir\/wp-content\/plugins\/gravityforms\/images"}};
var gf_legacy = {"is_legacy":""};
var gf_global = {"gf_currency_config":{"name":"U.S. Dollar","symbol_left":"$","symbol_right":"","symbol_padding":"","thousand_separator":",","decimal_separator":".","decimals":2,"code":"USD"},"base_url":"http:\/\/flyus.ir\/wp-content\/plugins\/gravityforms","number_formats":[],"spinnerUrl":"http:\/\/flyus.ir\/wp-content\/plugins\/gravityforms\/images\/spinner.svg","version_hash":"8b9de865f1ea13bcf7fcdacd68018c0a","strings":{"newRowAdded":"New row added.","rowRemoved":"Row removed","formSaved":"The form has been saved.  The content contains the link to return and complete the form."}};
/* ]]> */
</script>
<script type="text/javascript" defer='defer' src="http://flyus.ir/wp-content/plugins/gravityforms/js/gravityforms.min.js?ver=2.8.0" id="gform_gravityforms-js"></script>
<script type="text/javascript" defer='defer' src="http://flyus.ir/wp-content/plugins/gravityforms/assets/js/dist/utils.min.js?ver=59d951b75d934ae23e0ea7f9776264aa" id="gform_gravityforms_utils-js"></script>
<script type="text/javascript" defer='defer' src="http://flyus.ir/wp-content/plugins/gravityforms/js/preview.min.js?ver=2.8.0" id="gform_preview-js"></script>
</head>
<body>
    <!-- body  -->
    <main class="main">
      

        <!-- visa infos -->
        <section class="visa-payment__info">
            <div class="container">
                <div class="visa-payment__info-wrapper">
                    <div class="row mb-0">
                        <div class="col-12 col-md-9">
                          
                            <div class="visa-payment__info-title">
                          
                <img src="<?php echo $_POST[''] ?>" width="48" height="48" />
              
                                <h1> <?php echo $_POST['visaName'] ?> </h1>
                            </div>
                            <div class="visa-payment__info-desc">
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="visa-payment__info-left">
                                <p class="visa-payment__info-number">
                                    1 مسافر
                                </p>
                                <div class="visa-payment__info-link">
                                    <a onClick="history.go(-1)">
                                        تغییر ویزا
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- visa info form  -->
        <section class="visa-payment__info-form">
            <div class="container">
                <div class="visa-payment__info-wrapper form">
                    
                <form method='post' enctype='multipart/form-data'  id='gform_1'  action='/flyus/?gf_page=preview&#038;id=1' data-formid='1' novalidate>
          <input type="hidden" value="420440" name="totalPrice">
          <input type="hidden" value="بیمه مسافرت داخلی طرح 2" name="sendTitle">
          <input type="hidden" value="210220" name="sendPrice">
          <input type="hidden" value="1500000000 ریال ایران" name="sendCoverLimit">
          <div class="insurance-header__form">

            <div class="visa-payment__info-form--title">
              <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M16 0H4C1.79 0 0 1.78 0 3.97V14.03C0 16.22 1.79 18 4 18H16C18.21 18 20 16.22 20 14.03V3.97C20 1.78 18.21 0 16 0ZM6.5 4.17C7.77 4.17 8.81 5.21 8.81 6.48C8.81 7.75 7.77 8.79 6.5 8.79C5.23 8.79 4.19 7.75 4.19 6.48C4.19 5.21 5.23 4.17 6.5 4.17ZM10.37 13.66C10.28 13.76 10.14 13.82 10 13.82H3C2.86 13.82 2.72 13.76 2.63 13.66C2.54 13.56 2.49 13.42 2.5 13.28C2.67 11.6 4.01 10.27 5.69 10.11C6.22 10.06 6.77 10.06 7.3 10.11C8.98 10.27 10.33 11.6 10.49 13.28C10.51 13.42 10.46 13.56 10.37 13.66ZM17 13.75H15C14.59 13.75 14.25 13.41 14.25 13C14.25 12.59 14.59 12.25 15 12.25H17C17.41 12.25 17.75 12.59 17.75 13C17.75 13.41 17.41 13.75 17 13.75ZM17 9.75H13C12.59 9.75 12.25 9.41 12.25 9C12.25 8.59 12.59 8.25 13 8.25H17C17.41 8.25 17.75 8.59 17.75 9C17.75 9.41 17.41 9.75 17 9.75ZM17 5.75H12C11.59 5.75 11.25 5.41 11.25 5C11.25 4.59 11.59 4.25 12 4.25H17C17.41 4.25 17.75 4.59 17.75 5C17.75 5.41 17.41 5.75 17 5.75Z"
                  fill="#094899"></path>
              </svg>
              <h3>
                اطالاعات اولیه
              </h3>
            </div>
            <div class="insurance-form__clean">
              <button type="reset">پاک کردن</button>
            </div>
          </div>

          <div class="insurance-form-body">
            <div class="row">
              <div class="col-10">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="visa-payment__info-form--input">
                      <label for='input_1_1'>نام  (لاتین)</label>
                      <input name='input_1' id='input_1_1' type='text' value='' class='large'      aria-invalid="false"   />
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="visa-payment__info-form--input">
                      <label for='input_1_8'>نام خانوادگی (لاتین)</label>
                      <input name='input_10' id='input_1_10' type='email' value='' class='large'     aria-invalid="false"  />
                    </div>
                  </div>
                  
                  <div class="col-12 col-md-6">
                    <div class="visa-payment__info-form--input">
                      <label for='input_1_4'>شماره موبایل</label>
                      <input name='input_4' id='input_1_4' type='number' step='any'   value='' class='large'      aria-invalid="false"  />
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="visa-payment__info-form--input">
                      <label for='input_1_10'>ایمیل</label>
                      <input name='input_10' id='input_1_10' type='email' value='' class='large'     aria-invalid="false"  />
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="visa-payment__info-form--input" style="display : flex">
                      <label for='input_1_11'>انقضای پاسپورت</label>
                      <input type='number' maxlength='2' name='input_12[]' id='input_1_12_1' value=''   aria-required='false'   placeholder='ماه' min='1' max='12' step='1'/>
                      <input type='number' maxlength='2' name='input_12[]' id='input_1_12_2' value=''   aria-required='false'   placeholder='روز' min='1' max='31' step='1'/>
                      <input type='number' maxlength='4' name='input_12[]' id='input_1_12_3' value=''   aria-required='false'   placeholder='سال' min='1920' max='2024' step='1'/>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="visa-payment__info-form--input">
                      <label for='input_1_13'>شماره پاسپورت</label>
                      <input name='input_13' id='input_1_13' type='number' step='any'   value='' class='large'      aria-invalid="false"  />
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-2">

              </div>
            </div>
          </div>

          <div>
            <div style="width: 90px; height: 90px; flex-shrink: 0; border-radius: 16px; border: 1px solid #094899;">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="32" viewBox="0 0 32 32" fill="none" style="margin-top: 1rem;">
            <path d="M20.4651 32H11.5349C3.45302 32 0 28.547 0 20.4651V11.5349C0 3.45302 3.45302 0 11.5349 0H18.9767C19.587 0 20.093 0.506047 20.093 1.11628C20.093 1.72651 19.587 2.23256 18.9767 2.23256H11.5349C4.67349 2.23256 2.23256 4.67349 2.23256 11.5349V20.4651C2.23256 27.3265 4.67349 29.7674 11.5349 29.7674H20.4651C27.3265 29.7674 29.7674 27.3265 29.7674 20.4651V13.0233C29.7674 12.413 30.2735 11.907 30.8837 11.907C31.494 11.907 32 12.413 32 13.0233V20.4651C32 28.547 28.547 32 20.4651 32Z" fill="#094899"/>
            <path d="M30.8967 14H25.0011C19.9603 14 18 12.0397 18 6.99893V1.10326C18 0.661087 18.2653 0.24839 18.678 0.0862592C19.0907 -0.0906107 19.5623 0.0125636 19.8866 0.322086L31.6779 12.1134C31.9874 12.4229 32.0906 12.9093 31.9137 13.322C31.7369 13.7347 31.3389 14 30.8967 14ZM20.2109 3.77105V6.99893C20.2109 10.8016 21.1984 11.7892 25.0011 11.7892H28.229L20.2109 3.77105Z" fill="#094899"/>
            <path d="M17.8 19H8.2C7.544 19 7 18.32 7 17.5C7 16.68 7.544 16 8.2 16H17.8C18.456 16 19 16.68 19 17.5C19 18.32 18.456 19 17.8 19Z" fill="#094899"/>
            <path d="M14.7727 25H8.22727C7.55636 25 7 24.32 7 23.5C7 22.68 7.55636 22 8.22727 22H14.7727C15.4436 22 16 22.68 16 23.5C16 24.32 15.4436 25 14.7727 25Z" fill="#094899"/>
            </svg>
            <input type='hidden' name='MAX_FILE_SIZE' value='2097152' />
            <label for='input_1_17' style=" display: flex; justify-content: center;">افزودن فایل</label>
            <input name='input_17' id='input_1_17' type='file' class='large inputfile' aria-describedby="gfield_upload_rules_1_17" onchange='javascript:gformValidateFileSize( this, 2097152 );'  />
                          
            </div>
            <div class="insurance-form__btns-detail" style="justify-content: flex-end;">
            <input type='submit' class="insurance-form__submit" id='gform_submit_button_1' class='gform_button button' value='ثبت درخواست'  onclick='if(window["gf_submitting_1"]){return false;}  if( !jQuery("#gform_1")[0].checkValidity || jQuery("#gform_1")[0].checkValidity()){window["gf_submitting_1"]=true;}  ' onkeypress='if( event.keyCode == 13 ){ if(window["gf_submitting_1"]){return false;} if( !jQuery("#gform_1")[0].checkValidity || jQuery("#gform_1")[0].checkValidity()){window["gf_submitting_1"]=true;}  jQuery("#gform_1").trigger("submit",[true]); }' /> 
            
             <input type='hidden'  name='is_submit_1' value='1' />
            <input type='hidden'  name='gform_submit' value='1' />
            
            <input type='hidden'  name='gform_unique_id' value='' />
            <input type='hidden'  name='state_1' value='WyJbXSIsImM4NDE2OTcwMWJiZTFlMzU5NGJlMjA2MThiODllY2QxIl0=' />
            <input type='hidden'  name='gform_target_page_number_1' id='gform_target_page_number_1' value='0' />
            <input type='hidden'  name='gform_source_page_number_1' id='gform_source_page_number_1' value='1' />
            <input type='hidden'  name='gform_field_values' value='' />
            
              
            </div>
          </div>
        </form>
                    <ul class="visa-payment__info-form--document-desc">
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>ثبت درخواست به منزله صدور ويزا نمی‌باشد.</span>
                                </li>
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>پردازش ویزا ۳ تا ۷ روز کاری طول می‌کشد.</span>
                                </li>
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>بعد از صدور ویزا،‌ باید یک چک ضمانت در وجه علی‌بابا که مسئول انجام امور دریافت
                                        ویزا می‌باشد، بپردازید.</span>
                                </li>
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>کشور امارات به افرادی زیر ۱۸ سالی که قصد دارند به تنهایی مسافرت کنند، ویزا
                                        نمی‌دهد.</span>
                                </li>
                            </ul>

                </div>
            </div>
            <div class="visa-payment__info-form right shadow shadow-right"></div>
            <div class="visa-payment__info-form left shadow shadow-left"></div>
        </section>


    </main>
</body>

<script type="text/javascript">
/* <![CDATA[ */
 gform.initializeOnLoaded( function() {gformInitSpinner( 1, 'http://flyus.ir/wp-content/plugins/gravityforms/images/spinner.svg', true );jQuery('#gform_ajax_frame_1').on('load',function(){var contents = jQuery(this).contents().find('*').html();var is_postback = contents.indexOf('GF_AJAX_POSTBACK') >= 0;if(!is_postback){return;}var form_content = jQuery(this).contents().find('#gform_wrapper_1');var is_confirmation = jQuery(this).contents().find('#gform_confirmation_wrapper_1').length > 0;var is_redirect = contents.indexOf('gformRedirect(){') >= 0;var is_form = form_content.length > 0 && ! is_redirect && ! is_confirmation;var mt = parseInt(jQuery('html').css('margin-top'), 10) + parseInt(jQuery('body').css('margin-top'), 10) + 100;if(is_form){jQuery('#gform_wrapper_1').html(form_content.html());if(form_content.hasClass('gform_validation_error')){jQuery('#gform_wrapper_1').addClass('gform_validation_error');} else {jQuery('#gform_wrapper_1').removeClass('gform_validation_error');}setTimeout( function() { /* delay the scroll by 50 milliseconds to fix a bug in chrome */  }, 50 );if(window['gformInitDatepicker']) {gformInitDatepicker();}if(window['gformInitPriceFields']) {gformInitPriceFields();}var current_page = jQuery('#gform_source_page_number_1').val();gformInitSpinner( 1, 'http://flyus.ir/wp-content/plugins/gravityforms/images/spinner.svg', true );jQuery(document).trigger('gform_page_loaded', [1, current_page]);window['gf_submitting_1'] = false;}else if(!is_redirect){var confirmation_content = jQuery(this).contents().find('.GF_AJAX_POSTBACK').html();if(!confirmation_content){confirmation_content = contents;}setTimeout(function(){jQuery('#gform_wrapper_1').replaceWith(confirmation_content);jQuery(document).trigger('gform_confirmation_loaded', [1]);window['gf_submitting_1'] = false;wp.a11y.speak(jQuery('#gform_confirmation_message_1').text());}, 50);}else{jQuery('#gform_1').append(contents);if(window['gformRedirect']) {gformRedirect();}}jQuery(document).trigger('gform_post_render', [1, current_page]);gform.utils.trigger({ event: 'gform/postRender', native: false, data: { formId: 1, currentPage: current_page } });} );} ); 
/* ]]> */
</script>
</div>
<div id="browser_size_info"></div>

<link rel='stylesheet' id='gform_basic-css' href='http://flyus.ir/wp-content/plugins/gravityforms/assets/css/dist/basic.min.css?ver=2.8.0' type='text/css' media='all' />
<link rel='stylesheet' id='gform_theme_components-css' href='http://flyus.ir/wp-content/plugins/gravityforms/assets/css/dist/theme-components.min.css?ver=2.8.0' type='text/css' media='all' />
<link rel='stylesheet' id='gform_theme_ie11-css' href='http://flyus.ir/wp-content/plugins/gravityforms/assets/css/dist/theme-ie11.min.css?ver=2.8.0' type='text/css' media='all' />
<link rel='stylesheet' id='gform_theme-css' href='http://flyus.ir/wp-content/plugins/gravityforms/assets/css/dist/theme.min.css?ver=2.8.0' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css' href='http://flyus.ir/wp-includes/css/dashicons.min.css?ver=6.4.2' type='text/css' media='all' />
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/dist/vendor/wp-polyfill-inert.min.js?ver=3.1.2" id="wp-polyfill-inert-js"></script>
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.14.0" id="regenerator-runtime-js"></script>
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0" id="wp-polyfill-js"></script>
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/dist/dom-ready.min.js?ver=392bdd43726760d1f3ca" id="wp-dom-ready-js"></script>
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/dist/hooks.min.js?ver=c6aec9a8d4e5a5d543a1" id="wp-hooks-js"></script>
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/dist/i18n.min.js?ver=7701b0c3857f914212ef" id="wp-i18n-js"></script>
<script type="text/javascript" id="wp-i18n-js-after">
/* <![CDATA[ */
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'rtl' ] } );
/* ]]> */
</script>
<script type="text/javascript" id="wp-a11y-js-translations">
/* <![CDATA[ */
( function( domain, translations ) {
	var localeData = translations.locale_data[ domain ] || translations.locale_data.messages;
	localeData[""].domain = domain;
	wp.i18n.setLocaleData( localeData, domain );
} )( "default", {"translation-revision-date":"2023-11-20 15:18:28+0000","generator":"GlotPress\/4.0.0-alpha.11","domain":"messages","locale_data":{"messages":{"":{"domain":"messages","plural-forms":"nplurals=1; plural=0;","lang":"fa"},"Notifications":["\u0622\u06af\u0627\u0647\u200c\u0633\u0627\u0632\u06cc\u200c\u0647\u0627"]}},"comment":{"reference":"wp-includes\/js\/dist\/a11y.js"}} );
/* ]]> */
</script>
<script type="text/javascript" src="http://flyus.ir/wp-includes/js/dist/a11y.min.js?ver=7032343a947cfccf5608" id="wp-a11y-js"></script>
<script type="text/javascript" defer='defer' src="http://flyus.ir/wp-content/plugins/gravityforms/assets/js/dist/vendor-theme.min.js?ver=4ef53fe41c14a48b294541d9fc37387e" id="gform_gravityforms_theme_vendors-js"></script>
<script type="text/javascript" id="gform_gravityforms_theme-js-extra">
/* <![CDATA[ */
var gform_theme_config = {"common":{"form":{"honeypot":{"version_hash":"8b9de865f1ea13bcf7fcdacd68018c0a"}}},"hmr_dev":"","public_path":"http:\/\/flyus.ir\/wp-content\/plugins\/gravityforms\/assets\/js\/dist\/"};
/* ]]> */
</script>
<script type="text/javascript" defer='defer' src="http://flyus.ir/wp-content/plugins/gravityforms/assets/js/dist/scripts-theme.min.js?ver=f4d12a887a23a8c5755fd2b956bc8fcf" id="gform_gravityforms_theme-js"></script>
<script type="text/javascript">
/* <![CDATA[ */
 gform.initializeOnLoaded( function() { jQuery(document).on('gform_post_render', function(event, formId, currentPage){if(formId == 1) {} } );jQuery(document).on('gform_post_conditional_logic', function(event, formId, fields, isInit){} ) } ); 
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
 gform.initializeOnLoaded( function() {jQuery(document).trigger('gform_post_render', [1, 1]);gform.utils.trigger({ event: 'gform/postRender', native: false, data: { formId: 1, currentPage: 1 } });} ); 
/* ]]> */
</script>
<?php get_footer(); ?>
