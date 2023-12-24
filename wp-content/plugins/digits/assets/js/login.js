jQuery(function ($) {

    try {
        jQuery('.dig-custom-field-type-date,.digits-field-type_date').find('input[type="text"]').attr({
            'dtype': 'date',
            'date': 1
        }).datepicker({
            language: 'en',
            timepicker: false,
            onSelect: function (formattedDate, date, inst) {
                jQuery(inst.el).trigger('change');
            }
        });
        //کدهای زیر در فایل نسخه قبل تغییر داده شده بود.
        /*jQuery('.dig-custom-field-type-date').each(function(){
            jQuery(this).find('input[type="text"]').attr({'dtype': 'date', 'date': 1}).datepicker({
                language: 'en',
                timepicker: false,
                onSelect: function (formattedDate, date, inst) {
                    jQuery(inst.el).trigger('change');
                }
            });
        });*/
    } catch (e) {
    }


    function isEmpty(el) {
        return !jQuery.trim(el);
    }

    var tokenCon;

    var akCallback = -1;
    var useWhatsApp = 0;

    var body = jQuery('body');


    if (dig_log_obj.dig_hide_ccode == 1) body.addClass('dig_hideccode');


    jQuery(".digits-login-modal").each(function () {
        var attrs = ['href', 'type', 'data-show'];
        var $this = jQuery(this);
        var a = $this.closest("a");
        jQuery.each(attrs, function (index, value) {
            a.attr(value, $this.attr(value));
        });
        a.addClass($this.attr('class'));
    });


    function update_digits_form_logo() {
        jQuery('.digits_ui').each(function () {
            var ui_box = jQuery(this);
            var box = ui_box.find('.digits2_box');
            var box_height = box.outerHeight(true);
            var footer = ui_box.find('.digits_site_footer_box');
            if ((box_height + footer.outerHeight() + 70) > jQuery(window).height()) {
                footer.addClass('digits_site_footer_box_relative');
            } else {
                footer.removeClass('digits_site_footer_box_relative');
            }
        })
    }

    update_digits_form_logo();
    jQuery(window).on('resize digits_reposition', function () {
        update_digits_form_logo();
    });

    var loader = jQuery(".dig_load_overlay").first();
    var modcontainer = jQuery('.dig-box');

    body.append(loader);
    body.append(jQuery(".digits_login_form"));
    body.append(jQuery(".digits-overlay"));


    jQuery(document).on('click', '.dig-cont-close, .dig_login_cancel', function () {
        var $this = jQuery(this);
        if ($this.attr('data-back')) {
            window.location = $this.attr('data-back');
        }
        if (modcontainer) {
            modcontainer.css({'display': 'none'});
            unlockScroll();
            if (jQuery("#digits_redirect_page").length)
                jQuery("#digits_redirect_page").remove();
        }
    });


    var isPlaceholder = 0;
    var leftPadding = '-';


    jQuery(document).on('change', '.dig_lrf_box select', function () {
        var value = jQuery(this).val();
        var minput = jQuery(this).closest('.minput');
        if (isEmpty(value)) {
            minput.addClass('dig-label empty').removeClass('selected');
        } else {
            minput.addClass('dig-label selected').removeClass('empty');
        }
    });

    function update_req_fields() {
        jQuery(".dig_lrf_box").each(function () {
            var show_asterisk = jQuery(this).data('asterisk');
            if (!show_asterisk || show_asterisk == 0) return;
            jQuery(this).find('.register').find('.minput').each(function () {
                var par = jQuery(this);
                if (par.hasClass("dig-custom-field")) return;
                var inpu = par.find("input").not(".countrycode");

                if (inpu.attr('required') && !inpu.attr('aster')) {
                    var label = par.find("label");
                    par.find("label").html(label.html() + " *");
                    inpu.attr('aster', 1);

                }
            });
        });
    }


    function digits_select_format(val) {
        var element = jQuery(val.element);
        var display = element.attr('data-display');

        if (val.id == -1) {
            if (display == '-1') {
                element.closest('.minput_inner').find('.digits-select').removeClass('not-empty');
                display = '<div class="dig-visibility_hidden">-</div>';
            }
            return display;
        }

        element.closest('.minput_inner').find('.digits-select').addClass('not-empty');

        return val.text;
    }

    function digits_select($elem) {
        $elem.each(function () {
            var $this = jQuery(this);
            var parent = $this.closest('form');
            jQuery(this).untselect({
                dir: dig_log_obj.direction,
                width: '100%',
                templateSelection: digits_select_format,
                escapeMarkup: function (m) {
                    return m;
                },
                minimumResultsForSearch: 8,
                dropdownParent: parent,
                dropdownCssClass: "digits-select-dropdown digits-form-dropdown",
                theme: "default digits-select digits-form-select"
            });
        });
    }

    function update_fields() {
        update_req_fields();

        if (typeof untselect == 'function') {
            digits_select(jQuery(".dig-custom-field").find('select'));
        }

        jQuery(".dig_show_label").find('select').each(function () {
            jQuery(this).find('option').first().attr('data-display', dig_log_obj.select).closest('.minput_inner').find('.digits-select').addClass('not-empty');
        });
        jQuery(".dig_pgmdl_1,.dig_floating_label").find('select').each(function () {
            jQuery(this).find('option[value="-1"]').attr('data-display', '-1').closest('.minput_inner').find('.untselect-selection__rendered').html('<div class="dig-visibility_hidden">-</div>');
        });
        jQuery(".dig_pgmdl_2").each(function () {
            var show_placeholder = jQuery(this).data('placeholder');
            if (!show_placeholder || show_placeholder == 0) return;
            jQuery(this).find('.minput').each(function () {
                var inp = jQuery(this).find('input,textarea,select');
                if (inp.length) {
                    if (inp.attr('type') != "checkbox" && inp.attr('type') != "radio") {
                        var lb = jQuery(this).find('label').text().replace(/\s\s+/g, ' ');
                        inp.attr('placeholder', lb);
                        isPlaceholder = 1;
                    }
                }
                update_req_fields();/**/
            })
        });

    }

    jQuery(window).on('update_digits', function () {
        update_fields();
    }).trigger('update_digits');


    var customLeftPadding = jQuery(".dig_leftpadding");
    if (customLeftPadding.length) {
        leftPadding = customLeftPadding.val();
    }
    jQuery("#dig-ucr-container").on('click', function (event) {
        if (jQuery(this).attr('force')) return;
        if (jQuery(event.target).has('.dig-modal-con').length) {
            modcontainer.css({'display': 'none'});
            unlockScroll();
            if (jQuery("#digits_redirect_page").length)
                jQuery("#digits_redirect_page").remove();
        }
    });


    var login = jQuery(".digits_modal_box .digloginpage");
    var register = jQuery(".digits_modal_box .register");
    var forgot = jQuery(".digits_modal_box .forgot");

    var login_modal = jQuery(".dig_ma-box .digloginpage");
    var register_modal = jQuery(".dig_ma-box .register");
    var forgot_modal = jQuery(".dig_ma-box .forgot");
    var forgotpass_modal = jQuery(".dig_ma-box .forgotpass");

    var forgotpass = jQuery(".dig_lrf_box .forgotpass");

    var registration_form = jQuery('.digits_native_registration_form');
    registration_form.find('.dig_wp_bp_fields').remove();

    var dig_sortorder = dig_log_obj.dig_sortorder;

    if (dig_sortorder != null) {
        if (dig_sortorder.length) {
            var sortorder = dig_sortorder.split(',');
            registration_form.each(function () {
                var form = jQuery(this);
                var digits_register_inputs = form.find(".dig_reg_inputs");
                var reg_fields_wrapper = form.find('.digits_fields_wrapper');
                digits_register_inputs.each(function () {
                    jQuery(this).find('.minput').sort(function (a, b) {
                        var ap = jQuery.inArray(a.id, sortorder);
                        var bp = jQuery.inArray(b.id, sortorder);
                        return (ap < bp) ? -1 : (ap > bp) ? 1 : 0;
                    }).appendTo(reg_fields_wrapper);
                    reg_fields_wrapper.append(digits_register_inputs.find('.dig_register_otp'));
                });
            })
        }

    }


    var mailSecondLabel = jQuery(".dig_secHolder");
    var secondmailormobile = jQuery(".dig-secondmailormobile");


    var loginBoxTitle = jQuery(".dig-box-login-title");
    var isSecondMailVisible = false;
    var inftype = 0;

    var leftDis = dig_log_obj.left;


    var noanim = false;


    var triggered = 0;

    var dig_modal_conn = jQuery(".dig-modal-con");

    $.fn.digits_login_modal = function ($this) {
        show_digits_login_modal($this);
        return false;
    };

    jQuery(document).on("click", ".digits-login-modal", function () {
        if (!jQuery(this).attr('attr-disclick')) {
            show_digits_login_modal(jQuery(this));
        }
        return false;

    });

    function show_digits_login_modal($this) {

        var windowWidth = jQuery(window).width();
        var type = $this.attr('type');


        jQuery(".minput").trigger('blur');

        if ($this.data('show')) {
            digits_show($this.data('show'));
            return false;
        }
        if (typeof type === typeof undefined || type === false || type == "button") {
            type = 1;
        }

        if (type == 'register') {
            type = 2;
        } else if (type == 'forgot-password') {
            type = 3;
        } else if (type == 'login') {
            type = 4;
        }

        if (type == 10 || $this.attr('data-fal') == 1 || $this.attr('data-link') == 1) {
            if ($this.attr('href')) window.location.href = $this.attr('href');

            return true;
        } else {

            noanim = true;

            var default_box;
            if (type == 4) {
                default_box = 'digits_modal_default_login';
            } else if (type == 3) {
                default_box = 'digits_modal_default_forgot';
            } else if (type == 2) {
                default_box = 'digits_modal_default_register';
            } else {
                default_box = 'digits_modal_default_login_register';
            }
            default_box = jQuery('.' + default_box);
            if (default_box.length) {
                modcontainer = default_box;
            } else {
                modcontainer = jQuery('.dig-box');
            }

            modcontainer.css({'display': 'block'});


            var otp_box = modcontainer.find('.dig_verify_mobile_otp_container');
            if (otp_box != null && otp_box.length && otp_box.is(":visible")) {

            } else if (type == 1 || type == 4) {

                modcontainer.find(".backtoLogin,.show_login").trigger('click');
                register.find(".backtoLoginContainer").show();
                forgot.find(".backtoLoginContainer").show();

                updateModalHeight(login_modal);

                if (type == 4) {
                    modcontainer.find(".signupbutton").hide();
                    modcontainer.find(".signdesc").hide();
                } else {
                    modcontainer.find(".signupbutton").show();
                    modcontainer.find(".signdesc").show();
                }
            } else if (type == 2) {
                if (register.length) {
                    modcontainer.find(".backtoLogin,.show_login").trigger('click');
                    register.find(".backtoLoginContainer").hide();
                    modcontainer.find(".signupbutton,.show_register").trigger('click');

                } else {
                    showDigErrorMessage(dig_log_obj.Registrationisdisabled);
                    modcontainer.hide();
                    noanim = false;
                    return false;
                }
            } else if (type == 3) {
                if (forgot.length) {
                    modcontainer.find(".backtoLogin,.show_login").trigger('click');
                    forgot.find(".backtoLoginContainer").hide();
                    modcontainer.find(".forgotpassworda,.digits_reset_pass").trigger('click');
                } else {
                    showDigErrorMessage(dig_log_obj.forgotPasswordisdisabled);
                    modcontainer.hide();
                    noanim = false;
                    return false;
                }
            }

            noanim = false;

            jQuery("[tabindex='-1']").removeAttr('tabindex');

            if (modcontainer.length)
                lockScroll();

        }
        modcontainer.find('input:visible:not(.countrycode)').first().focusEnd();
        modcontainer.find('.mobile_field').trigger('keyup');
        return false;
    }


    $.fn.focusEnd = function () {
        this.focus();
        var val = this.val();
        this.val('').val(val);
        return this;
    }

    if (dig_log_obj.dig_dsb == 1) return;

    var precode;

    function loginuser(response) {
        if (precode == response.code) {
            return false;
        }

        precode = response.code;

        var rememberMe = 0;
        if (submit_form != null) {
            if (submit_form.find(".digits_login_remember_me").length) {
                rememberMe = submit_form.find(".digits_login_remember_me:checked").length > 0;
            }
        }

        jQuery.ajax({
            type: 'post',
            url: dig_log_obj.ajax_url,
            data: {
                action: 'digits_login_user',
                code: response.code,
                csrf: response.state,
                digits: 1,
                rememberMe: rememberMe,
            },
            success: function (res) {

                res = res.trim();

                loader.hide();
                if (res == "1") {
                    loader.show();
                    showDigLoginSuccessMessage();

                    if (jQuery("#digits_redirect_page").length) {
                        digits_redirect(jQuery("#digits_redirect_page").val());
                    } else digits_redirect(dig_log_obj.uri);

                } else if (res == -1) {
                    showDigNoticeMessage(dig_log_obj.pleasesignupbeforelogginin);
                } else if (res == -9) {
                    showDigErrorMessage(dig_log_obj.invalidapicredentials)
                } else {
                    showDigErrorMessage(dig_log_obj.invalidlogindetails);
                }

            }
        });

        return false;
    }

// login callback
    function loginCallback(response) {
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            var code = response.code;
            var csrf = response.state;
            showDigitsModal(false);
            loginuser(response);

        } else {
            showDigitsModal(true);
        }

    }

    jQuery(document).on("click", "#dig_lo_resend_otp_btn,.dig_lo_resend_otp_btn", function () {
        var dbbtn = jQuery(this);
        if (!jQuery(this).hasClass("dig_resendotp_disabled")) {
            loader.show();

            if (isFirebase == 1) {
                dismissLoader = true;
                loader.show();

                var countrycode = dbbtn.attr("countrycode");
                var phone;

                if (countrycode == '+242' || countrycode == '+225') {
                    phone = countrycode + '0' + dbbtn.attr("mob");
                } else {
                    phone = countrycode + dbbtn.attr("mob");
                }

                grecaptcha.reset(window.recaptchaWidgetId);

                var appVerifier = window.recaptchaVerifier;
                firebase.auth().signInWithPhoneNumber(phone, appVerifier)
                    .then(function (confirmationResult) {
                        isDigFbAdd = 1;
                        loader.hide();
                        window.confirmationResult = confirmationResult;
                        updateTime(dbbtn);
                    }).catch(function (error) {
                    if (error.message === 'TOO_LONG' || error.message === 'TOO_SHORT') {
                        showDigErrorMessage(dig_mdet.InvalidMobileNumber);
                    } else {
                        showDigErrorMessage(dig_mdet.Invaliddetails);
                    }
                    loader.hide();
                });


            } else {
                jQuery.ajax({
                    type: 'post',
                    url: dig_log_obj.ajax_url,
                    data: {
                        action: 'digits_resendotp',
                        countrycode: dbbtn.attr("countrycode"),
                        mobileNo: dbbtn.attr("mob"),
                        csrf: dbbtn.attr("csrf"),
                        login: dbbtn.attr("dtype"),
                        whatsapp: useWhatsApp
                    },
                    success: function (res) {
                        res = res.trim();
                        loader.hide();
                        if (res == 0) {
                            showDigErrorMessage(dig_log_obj.pleasetryagain);
                        } else if (res == -99) {
                            showDigErrorMessage(dig_log_obj.invalidcountrycode);
                        } else {
                            updateTime(dbbtn);
                        }
                    }
                });
            }
        }
    });


    jQuery(document).on("click", ".dig_captcha", function () {
        var $this = jQuery(this);
        var cap = $this.parent().find(".dig_captcha_ses");
        var r = Math.random();
        $this.attr('src', $this.attr('cap_src') + '?r=' + r + '&pr=' + cap.val());
        cap.val(r);

    });

    jQuery('.dig_captcha').on('dragstart', function (event) {
        event.preventDefault();
    });


    var update_time_button;

    var resendTime = dig_log_obj.resendOtpTime;

    function updateTime(time) {


        tokenCon = time.closest('form');
        if (update_time_button) {

            var submit_text = dig_log_obj.SubmitOTP;
            if (submit_form != null) {
                var submit_text_field = submit_form.find('.dig_submit_otp_text');
                if (submit_text_field.length) submit_text = submit_text_field.val();
            }
            update_time_button.attr('value', submit_text).text(submit_text);
            if (otp_container.length) {
                otp_container.find('.dig_verify_otp_submit_button').text(submit_text);
            }
        }


        time.attr("dis", 1).addClass("dig_resendotp_disabled").show().find("span").show();

        var time_spam = time.find("span");

        time_spam.text(convToMMSS(resendTime));
        var counter = 0;

        var interval = setInterval(function () {
            var rem = resendTime - counter;


            time_spam.text(convToMMSS(rem));
            counter++;

            if (counter >= resendTime) {
                clearInterval(interval);
                time.removeAttr("dis").removeClass("dig_resendotp_disabled").find("span").hide();
                counter = 0;
            }
        }, 1000, true);
    }


    function convToMMSS(timeInSeconds) {
        var sec_num = parseInt(timeInSeconds, 10);
        var hours = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        var seconds = sec_num - (hours * 3600) - (minutes * 60);

        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        return "(" + minutes + ':' + seconds + ")";
    }


    var dismissLoader = false;
    var lastcountrycode, lastmobileNo, lastDtype;
    var username_reg_field = '';
    var email_reg_field = '';
    var captcha_reg_field = '';
    var captcha_ses_reg_field = '';
    var isFirebase = 0;
    var ldtype = 0;

    function verifyMobileNoLogin(countrycode, mobileNo, csrf, dtype) {
        if (lastcountrycode == countrycode && lastmobileNo == mobileNo && lastDtype == dtype) {
            loader.hide();
            return;
        }
        if (ldtype != dtype) {
            useWhatsApp = 0;
        }

        if (update_time_button.hasClass('dig_use_whatsapp')) {
            useWhatsApp = 1;
        }

        ldtype = dtype;
        dismissLoader = false;
        hideDigMessage();
        loader.show();
        lastcountrycode = countrycode;
        lastmobileNo = mobileNo;
        lastDtype = dtype;


        var data = {
            action: 'digits_check_mob',
            countrycode: countrycode,
            mobileNo: mobileNo,
            csrf: csrf,
            login: dtype,
            username: username_reg_field,
            email: email_reg_field,
            captcha: captcha_reg_field,
            captcha_ses: captcha_ses_reg_field,
            digits: 1,
            json: 1,
            whatsapp: useWhatsApp
        };

        jQuery.each(submit_form.serializeArray(), function (i, field) {
            if (!data[field.name]) data[field.name] = field.value;
        });


        jQuery.ajax({
            type: 'post',
            url: dig_log_obj.ajax_url,
            data: data,
            success: function (result) {
                username_reg_field = '';
                email_reg_field = '';
                captcha_reg_field = '';
                captcha_ses_reg_field = '';

                lastDtype = 0;
                lastmobileNo = 0;

                loader.hide();

                var res = result;
                var ak = -1;
                if (isJSON(res)) {
                    if (res.success === false) {
                        if (res.data.notice) {
                            showDigNoticeMessage(res.data.message);
                        } else {
                            showDigErrorMessage(res.data.message);
                        }
                        return;
                    }


                    ak = res.accountkit;
                    isFirebase = res.firebase;
                    res = res.code;
                } else {
                    res = res.trim();
                }


                if (res == -1 && dtype == 11) {
                    showDigErrorMessage(dig_log_obj.MobileNumberalreadyinuse);
                    return;
                }


                if (res == -99) {
                    showDigErrorMessage(dig_log_obj.invalidcountrycode);
                    return;
                }
                if (res == -11) {
                    if (dtype == 1) {
                        showDigNoticeMessage(dig_log_obj.pleasesignupbeforelogginin);
                        return;
                    } else if (dtype == 3) {
                        showDigErrorMessage(dig_log_obj.Mobilenumbernotfound);
                        return;
                    }
                } else if (res == 0) {

                    if (result.message) {
                        if (result.notice) {
                            showDigNoticeMessage(result.message);
                        } else {
                            showDigErrorMessage(result.message);
                        }
                    } else {
                        showDigErrorMessage(dig_log_obj.Error);
                    }
                    return;
                }

                if (res == -1 && dtype == 2) {
                    showDigErrorMessage(dig_log_obj.MobileNumberalreadyinuse);
                    return;
                }

                if (mobileNo == null || countrycode == null) {
                    registerStatus = 1;
                    regForm.find(".registerbutton").trigger('click');
                    return;
                }


                mobileNo = filter_mobile(mobileNo);
                countrycode = countrycode.replace(/^0+/, '');


                if (ak == 1) {
                    processAccountkitLogin(countrycode, mobileNo);

                } else if (isFirebase == 1) {

                    var dig_verify_otp_input = jQuery(".dig_verify_otp_input");
                    if (dig_verify_otp_input.length) {
                        dig_verify_otp_input.attr({'placeholder': '------', 'maxlength': 6})
                    }
                    dismissLoader = true;
                    loader.show();

                    var phone;

                    if (countrycode == '+242' || countrycode == '+225') {
                        phone = countrycode + '0' + mobileNo;
                    } else {
                        phone = countrycode + mobileNo;
                    }

                    var appVerifier = window.recaptchaVerifier;
                    firebase.auth().signInWithPhoneNumber(phone, appVerifier)
                        .then(function (confirmationResult) {
                            loader.hide();
                            window.confirmationResult = confirmationResult;
                            verifyMobNo_success(res, countrycode, mobileNo, csrf, dtype);

                        }).catch(function (error) {
                        loader.hide();
                        if (error.message === 'TOO_LONG' || error.message === 'TOO_SHORT') {
                            showDigErrorMessage(dig_mdet.InvalidMobileNumber);
                        } else {
                            showDigErrorMessage(dig_mdet.Invaliddetails);
                        }

                    });
                } else {
                    verifyMobNo_success(res, countrycode, mobileNo, csrf, dtype);
                }
            }
        });
    }

    loader.on('click', function () {
        if (dismissLoader) loader.hide();
    });


    function processAccountkit(countrycode, mobileNo) {
        hideDigitsModal();

    }


    if (dig_log_obj.firebase == 1) {

        try {
            digits_init_firebase();
            if (firebase != null) {
                jQuery('body').append('<input type="hidden" value="1" id="dig_login_va_fr_otp" />');

                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('dig_login_va_fr_otp', {
                    'size': 'invisible',
                    'callback': function (response) {

                    },
                    'expired-callback': function () {
                        loader.hide();
                    },
                    'error-callback': function () {
                        loader.hide();
                    }

                });
                firebase.auth().signOut();
            }
        } catch (err) {

        }
    }

    var dig_otp_fields = jQuery("input[name='dig_otp']");
    dig_otp_fields.on('change', function (e) {
        var $this = jQuery(this);
        $this.val($this.val().replace(/\D/g, ''));
    });
    dig_otp_fields.on('keydown', function (e) {

        if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            (e.keyCode === 86 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            e.shiftKey === true ||
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            return;
        }

        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    var otp_box = 0;
    var otp_container = '';
    var otp_submit_button = 0;

    function verifyMobNo_success(res, countrycode, mobileNo, csrf, dtype) {

        if (submit_form == null) {
            otp_container = '';
        } else {
            otp_container = submit_form.closest('.dig_lrf_box').find(".dig_verify_mobile_otp_container");
        }
        dismissLoader = false;
        if (dtype == 101) {
            if (submit_form.hasClass('wpnotif_subscribe')) {

                submit_form.find('.wpnotif_otp_field').slideDown('fast').find('input').attr('required', true).trigger('focus');
                submit_form.find('[type="submit"]').text(wpn_sub.SubmitOTP);
                submit_form.data('send_otp', 1);
            }
        } else if (dtype == 1 || dtype == 11) {
            if (res == 1) {
                updateTime(submit_form.find(".dig_logof_log_resend").attr({
                    "countrycode": countrycode,
                    "mob": mobileNo, "csrf": csrf, "dtype": dtype
                }));
                submit_form.find("input[type='password']").each(function () {
                    jQuery(this).closest(".minput").slideUp();
                });

                var otpin = submit_form.find(".dig_login_otp");
                submit_form.find(".logforb").hide();
                otpin.slideDown().find("input").attr("required", "required").trigger('focus');

                otp_submit_button.attr("verify", 1);

                submit_form.find(".loginviasms").not('.dig_otp_submit_button').hide();


                if (otp_container.length) {
                    submit_form.closest('.digloginpage').hide();
                    otp_box = otpin.find("input");
                    show_mobile_in_element(otp_container.show().find(".dig_verify_code_msg span"), countrycode, mobileNo);
                    otp_container.find('input').trigger('focus');
                    otp_container.find(".dig_verify_otp").after(submit_form.find(".dig_logof_log_resend"));
                }
            }
        } else if (dtype == 2) {

            updateTime(regForm.find(".dig_logof_reg_resend").attr({
                "countrycode": countrycode,
                "mob": mobileNo, "csrf": csrf, "dtype": dtype
            }));

            registerStatus = 1;
            regForm.find(".minput").find("input[type='password']").each(function () {
                jQuery(this).closest(".minput").slideUp('fast');
            });
            var otpin = regForm.find(".dig_register_otp");
            otpin.slideDown().find("input").attr("required", "required").trigger('focus');

            regForm.find(".dig_reg_btn_password").hide();
            regForm.find(".dig-signup-otp").first().addClass('dig_otp_submit_button').show();

            regForm.find(".registerbutton").attr("verify", 1);
            update_time_button.closest('form').find(".registerbutton").not('.dig_otp_submit_button').hide();

            otpin.closest(".dig-container").addClass("dig-min-het");

            if (otp_container.length) {
                otp_submit_button = regForm.find(".dig-signup-otp");
                regForm.closest('.register').hide();
                otp_box = otpin.find("input");
                show_mobile_in_element(otp_container.show().find(".dig_verify_code_msg span"), countrycode, mobileNo);
                otp_container.find('input').trigger('focus');
                otp_container.find(".dig_verify_otp").after(submit_form.find(".dig_logof_reg_resend"));
            }

        } else if (dtype == 3) {

            updateTime(forgotForm.find(".dig_logof_forg_resend").attr({
                "countrycode": countrycode,
                "mob": mobileNo, "csrf": csrf, "dtype": dtype
            }));

            var otpin = forgotForm.find(".dig_forgot_otp");
            otpin.slideDown().find("input").attr("required", "required").trigger('focus');

            otp_submit_button = forgotForm.find(".forgotpassword");
            otp_submit_button.attr("verify", 1);


            if (otp_container.length) {
                forgotForm.closest('.forgot').hide();
                otp_box = otpin.find("input");
                show_mobile_in_element(otp_container.show().find(".dig_verify_code_msg span"), countrycode, mobileNo);
                otp_container.find('input').trigger('focus');
                otp_container.find(".dig_verify_otp").after(submit_form.find(".dig_logof_reg_resend"));
            }
        }
        setTimeout(function () {
            jQuery(window).trigger('resize');
        }, 350);
        update_req_fields();
        jQuery(window).trigger('resize');
        digits_WaitForSms();
    }

    function show_mobile_in_element(element, countrycode, phone) {
        //TODO: if libphonenumber make site slow ignore it. /**/
        var phone_obj = libphonenumber.parsePhoneNumberFromString(countrycode + phone);
        countrycode = countrycode.replace("+", "");
        phone = '+' + countrycode + ' ' + phone;
        if (typeof phone_obj != "undefined") {
            if (dig_log_obj.dig_mobile_no_formatting == 1) {
                phone = jQuery.trim((phone_obj.formatInternational()));
            } else if (dig_log_obj.dig_mobile_no_formatting == 2) {
                phone = (phone_obj.formatNational());
                phone = '+' + countrycode + ' ' + phone;
            }
        }


        element.text(phone);
    }

    jQuery(".dig_verify_otp_input").on('keyup', function (event) {
        var keyCode = (event.keyCode ? event.keyCode : event.which);
        if (keyCode == 13) {
            jQuery(this).closest('.dig_verify_mobile_otp_container').find(".dig_verify_otp").trigger('click');
        }

    });
    jQuery(".dig_verify_otp").on('click', function () {
        var dig_verify_otp = jQuery(this).closest('.dig_verify_mobile_otp_container').find(".dig_verify_otp_input");
        var dig_verify_otp_input = dig_verify_otp.val();
        if (dig_verify_otp_input.length == 0) {
            dig_verify_otp.addClass("dig_input_error").closest('.digits-input-wrapper').append(requiredTextElement);
            return false;
        }
        otp_box.val(dig_verify_otp_input);
        otp_submit_button.trigger('click');
    });


    jQuery(document).on('click', '.dig_lrf_box .loginviasms', function () {

        otp_submit_button = jQuery(this);


        submit_form = jQuery(this).closest('form');
        update_time_button = jQuery(this);

        var csrf = jQuery(".dig_nounce").val();


        var countryCode = submit_form.find(".logincountrycode").val();
        var phoneNumber = submit_form.find('.dig-mobmail').val();

        if (phoneNumber == "" || countryCode == "") {
            showDigErrorMessage(dig_log_obj.InvalidMobileNumber);
            return;
        }


        if (!is_mobile(phoneNumber) || !isNumeric(countryCode)) {
            showDigErrorMessage(dig_log_obj.InvalidMobileNumber);
            return;
        }

        jQuery(".dig_otp_submit_button").removeClass('dig_otp_submit_button');
        jQuery(this).addClass('dig_otp_submit_button');


        var captcha_accept = submit_form.find('.dig_login_captcha').val();

        if (captcha_accept == 1) {
            captcha_reg_field = submit_form.find("input[name='digits_reg_logincaptcha']").val();
            captcha_ses_reg_field = submit_form.find(".dig-custom-field-type-captcha").find(".dig_captcha_ses").val();
            if (captcha_reg_field.length == 0) {
                showDigErrorMessage("Please enter a valid captcha!");
                return;
            }
        }

        if (jQuery(this).attr('verify') == 1) {
            var otpin = submit_form.find(".dig_login_otp");
            verifyOtp(countryCode, phoneNumber, csrf, otpin.find("input").val(), 1);
            return;
        }


        if (is_mobile(phoneNumber)) {
            akCallback = 'loginCallback';
            verifyMobileNoLogin(countryCode, formatMobileNumber(phoneNumber), csrf, 1);

        } else if (phoneNumber.length > 0) {
            showDigNoticeMessage(dig_log_obj.Thisfeaturesonlyworkswithmobilenumber);
        } else {
            akCallback = 'loginCallback';
            verifyMobileNoLogin(countryCode, formatMobileNumber(phoneNumber), csrf);
        }
    });


    var submit_form;

    jQuery(document).on('click', '.dig_verify_mobile_no', function () {

        update_time_button = jQuery(this);
        otp_submit_button = jQuery(this);
        submit_form = jQuery(this).closest('form');
        var countryCode = submit_form.find(".logincountrycode").val();
        var csrf = jQuery(".dig_nounce").val();
        var phoneNumber = submit_form.find('.dig-mobmail').val();


        if (phoneNumber == "" || countryCode == "") {
            showDigErrorMessage(dig_log_obj.InvalidMobileNumber);
            return;
        }


        if (!is_mobile(phoneNumber) || !isNumeric(countryCode)) {
            showDigErrorMessage(dig_log_obj.InvalidMobileNumber);
            return;
        }


        var dig_otp = submit_form.find(".dig_login_otp");

        if (jQuery(this).attr('verify') == 1) {
            verifyOtp(countryCode, phoneNumber, csrf, dig_otp.find("input").val(), 11);
            return;
        }


        if (is_mobile(phoneNumber)) {

            akCallback = 'updateFormVerfication';
            verifyMobileNoLogin(countryCode, phoneNumber, csrf, 11);


        }
    });

    jQuery(".wpnotif_subscribe").on('submit', function (e) {
        submit_form = jQuery(this);
        update_time_button = submit_form.find('[type="submit"]');
        otp_submit_button = update_time_button;
        tokenCon = submit_form;
        if (!submit_form.find(".wpnotif_otp_field").length) {
            return true;
        }

        if (submit_form.data('verify') !== 1) {


            username_reg_field = '';
            email_reg_field = '';

            var countryCode = submit_form.find(".wpnotif_countrycode").val();
            var csrf = dig_log_obj.nonce;
            var phoneNumber = submit_form.find('.wpnotif_phone').val();
            var otp = submit_form.find('.wpnotif_otp').val();

            if (submit_form.data('send_otp') !== 1) {
                verifyMobileNoLogin(countryCode, phoneNumber, csrf, 101);
            } else {
                verifyOtp(countryCode, phoneNumber, csrf, otp, 101);
            }

            return false;
        } else {
            return true;
        }
    });

    function updateFormVerfication(response) {
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            var code = response.code;
            var csrf = response.state;
            showDigitsModal(false);


            submit_form.find(".digits_code").val(code);
            submit_form.find(".digits_csrf").val(csrf);

            submit_form.submit();

        } else {
            showDigitsModal(true);
        }

    }


    var lastotpmobileNo, lastotpcountrycode, lastotpDtype;

    function verifyOtp(countryCode, phoneNumber, csrf, otp, dtype) {
        otp = convert_number.toNormal(otp);/**/
        dismissLoader = false;
        hideDigMessage();
        loader.show();

        if (isFirebase == 1) verify_firebase_otp(countryCode, phoneNumber, csrf, otp, dtype);
        else verify_cust_otp(countryCode, phoneNumber, csrf, otp, dtype, -1);

    }

    function verify_firebase_otp(countryCode, phoneNumber, csrf, otp, dtype) {
        phoneNumber = filter_mobile(phoneNumber);
        countryCode = countryCode.replace(/^0+/, '');

        if (otp == null || otp.length == 0) {
            loader.hide();
            showDigErrorMessage(dig_log_obj.InvalidOTP);
            return;
        }

        window.confirmationResult.confirm(otp)
            .then(function (result) {

                firebase.auth().currentUser.getIdToken(true).then(function (idToken) {

                    window.verifyingCode = false;
                    window.confirmationResult = null;
                    jQuery("#dig_ftok_fbase").remove();
                    tokenCon.append("<input type='hidden' name='dig_ftoken' value='" + idToken + "' id='dig_ftok_fbase' />");
                    verify_cust_otp(countryCode, phoneNumber, csrf, otp, dtype, idToken);
                }).catch(function (error) {
                    loader.hide();
                    showDigErrorMessage(error);
                });


            }).catch(function (error) {
            loader.hide();
            showDigErrorMessage(dig_log_obj.InvalidOTP);
        });

    }

    function verify_cust_otp(countryCode, phoneNumber, csrf, otp, dtype, idToken) {
        if (lastotpcountrycode == countryCode && lastotpmobileNo == phoneNumber && lastotpDtype == otp) {
            loader.hide();
            return;
        }

        lastotpcountrycode = countryCode;
        lastotpmobileNo = phoneNumber;
        lastotpDtype = otp;

        var rememberMe = 0;
        if (submit_form != null) {
            if (submit_form.find(".digits_login_remember_me").length) {
                rememberMe = submit_form.find(".digits_login_remember_me:checked").length > 0;
            }
        }

        jQuery.ajax({
            type: 'post',
            url: dig_log_obj.ajax_url,
            data: {
                action: 'digits_verifyotp_login',
                countrycode: countryCode,
                mobileNo: phoneNumber,
                otp: otp,
                dig_ftoken: idToken,
                csrf: csrf,
                dtype: dtype,
                digits: 1,
                rememberMe: rememberMe,
            },
            success: function (res) {

                if (isJSON(res)) {


                    if (res.data === undefined || res.data.code === undefined) {
                        res = res;
                    } else {


                        if (res.success === false && res.data.msg) {
                            loader.hide();
                            showDigErrorMessage(res.data.msg);
                            return;
                        }

                        if (res.data.error_msg) {
                            loader.hide();
                            if (res.data.error_type) {
                                showDigMessage(res.data.error_msg, res.data.error_type);
                            } else {
                                showDigErrorMessage(res.data.error_msg);
                            }
                            return;
                        }

                        if (res.data.redirect) {
                            showDigLoginSuccessMessage();
                            digits_redirect(res.data.redirect);
                            return;
                        }


                        res = res.data.code;
                    }
                } else {
                    res = res.trim();
                }


                if (res != 11) loader.hide();

                if (res == 1011) {
                    showDigErrorMessage(dig_log_obj.error);
                    return;
                }

                if (res == 1013) {
                    showDigErrorMessage(dig_log_obj.error);
                    return;
                }

                if (res == -99) {
                    showDigErrorMessage(dig_log_obj.invalidcountrycode);
                    return;
                }

                if (dtype == 11 && res != 0) {
                    submit_form.submit();
                    return;
                }


                if (res == 0) {
                    showDigErrorMessage(dig_log_obj.InvalidOTP);
                    return;
                } else if (res == 11) {
                    showDigLoginSuccessMessage();
                    if (submit_form != null) {
                        var redirect = submit_form.find('input[name="digits_redirect_page"]');
                        if (redirect.length) {
                            var redirect_url = redirect.val();
                            if (redirect_url.length && redirect_url.length > 0) {
                                digits_redirect(redirect_url);
                                return;
                            }
                        }
                    }
                    if (jQuery("#digits_redirect_page").length) {
                        digits_redirect(jQuery("#digits_redirect_page").val());
                    } else digits_redirect(dig_log_obj.uri);

                    return;
                } else if (res == -1 && dtype != 2 && dtype != 101) {
                    showDigErrorMessage(dig_log_obj.ErrorPleasetryagainlater);
                    return;
                } else if (res == 1 && dtype == 2) {
                    showDigErrorMessage(dig_log_obj.MobileNumberalreadyinuse);
                    return;
                }


                if (dtype == 101) {
                    if (submit_form.hasClass('wpnotif_subscribe')) {
                        submit_form.data('verify', 1).trigger('submit');
                    }
                } else if (dtype == 2) {
                    registerStatus = 1;
                    regForm.find(".registerbutton").attr("verify", 3).trigger('click');

                } else if (dtype == 3) {
                    forgotForm.find(".changepassword .minput").each(function () {
                        jQuery(this).show();
                    });
                    forgotForm.find(".dig_forgot_otp").slideUp();
                    forgotForm.find(".forgotpasscontainer").slideUp();
                    forgotForm.find(".changepassword").slideDown();
                    forgotForm.find(".digits_csrf").val(csrf);
                    forgotForm.find(".dig_logof_forg_resend").hide();
                    update_time_button.val(prv).text(prv);
                    passchange = 1;
                    if (otp_container.length) {
                        otp_container.hide();
                        forgot.show();
                    }
                }
            }
        });
    }


    var prv = -1;
    var forgotpass = jQuery(".dig_lrf_box .forgotpass");
    var passchange = 0;


    if (jQuery("#digits_forgotPassChange").length) {
        passchange = 1;
    }

    var forgotForm;
    jQuery(document).on('click', '.dig_lrf_box .forgotpassword', function () {
        update_time_button = jQuery(this);
        forgotForm = jQuery(this).closest('form');
        submit_form = forgotForm;
        if (prv == -1) prv = jQuery(this).val();


        var forgot_field = forgotForm.find('.forgotpass');
        var forgot = jQuery.trim(forgot_field.val());
        var countryCode = forgotForm.find(".forgotcountrycode").val();
        var csrf = jQuery(".dig_nounce").val();


        var passBox = forgotForm.find(".digits_password");
        var cpassBox = forgotForm.find(".digits_cpassword");
        if (passBox.is(":visible")) {
            forgot_field.removeAttr('required');
            return true;
        }


        if (jQuery(this).attr("verify") == 1 && passchange != 1) {
            var otpin = forgotForm.find(".dig_forgot_otp");
            verifyOtp(countryCode, forgot, csrf, otpin.find("input").val(), 3);
            return false;

        }
        if (passchange == 1) {
            var pass = passBox.val();
            var cpass = cpassBox.val();
            if (pass != cpass) {
                showDigErrorMessage(dig_log_obj.Passworddoesnotmatchtheconfirmpassword);
                return false;
            }

            if (dig_log_obj.strong_pass == 1) {
                if (pass.length > 0) {
                    try {
                        var strength = wp.passwordStrength.meter(pass, ['black', 'listed', 'word'], pass);
                        if (strength != null && strength < 3) {
                            showDigNoticeMessage(dig_log_obj.useStrongPasswordString);
                            return false;
                        }
                    } catch (e) {

                    }
                }
            }

            return true;
        }

        if (validateEmail(forgot) && forgot != "") {
            passBox.removeAttr('required');
            cpassBox.removeAttr('required');
            return true;
        } else {


            var countryCode = forgotForm.find(".forgotcountrycode").val();

            if (forgot == "" || countryCode == "") {
                return;
            }
            if (is_mobile(forgot)) {

                akCallback = 'forgotCallBack';
                verifyMobileNoLogin(countryCode, forgot, csrf, 3);


            } else {
                showDigErrorMessage(dig_log_obj.Invaliddetails);
            }


        }

        return false;
    });


    var dig_log_reg_button = 0;


    jQuery(document).on('click', '.dig_lrf_box .dig_reg_btn_password', function () {
        hideDigMessage();

        if (jQuery(this).attr("verify") == 3) {
            return;
        }
        var dis = jQuery(this).attr('attr-dis');
        var form = jQuery(this).closest('form');
        var digPassReg = form.find(".digits_reg_password");
        var dig_otp_signup = form.find(".dig-signup-otp");

        if (dis == 0) {
            return false;
        }

        digPassReg.attr("required", "");
        dig_otp_signup.hide();


        digPassReg.closest('.minput').fadeIn('fast');


        jQuery(this).addClass('registerbutton');
        jQuery(this).attr('attr-dis', 0);
        dig_log_reg_button = 0;

        return false;
    });


    var requiredTextElement = "<span class='dig_field_required_text'>" + dig_log_obj.required + "</span>";
    var registerStatus = 0;


    jQuery(document).on('click', '.dig_login_rembe input[type="checkbox"], .dig_opt_mult input[type="checkbox"], .dig_opt_mult input[type="radio"]', function () {
        var $this = jQuery(this);


        if ($this.is(':radio')) {
            $this.closest(".dig_opt_mult_con").find(".selected").removeClass('selected');
        }

        if (!$this.is(':checked')) {
            $this.closest('label').removeClass('selected');
        } else {
            $this.closest('label').addClass('selected');
        }
        if (jQuery(this).attr('data-all')) {
            jQuery("." + jQuery(this).attr('data-all')).each(function () {
                if (jQuery(this).is(':checked') !== $this.is(':checked')) {
                    jQuery(this).attr('checked', $this.is(':checked')).trigger('change');
                }
            });
        }
    });

    jQuery(document).on('keyup change focusin', '.dig_input_error', function () {
        var minput = jQuery(this).closest('.minput');
        minput.removeClass('input-error').find(".dig_input_error").removeClass('dig_input_error');
        minput.find(".dig_field_required_text").remove();
    });
    var regForm;

    jQuery(".dig_lrf_box .registerbutton").on('click', function () {
        hideDigMessage();
        if (jQuery(this).attr('attr-dis') && jQuery(this).attr('attr-dis') == 1) {
            return;
        }


        regForm = jQuery(this).closest('form');
        submit_form = regForm;

        regForm.find(".dig_otp_submit_button").removeClass('dig_otp_submit_button');
        jQuery(this).addClass('dig_otp_submit_button');
        var dig_otp_signup = regForm.find(".dig-signup-otp");


        update_time_button = regForm.find('.dig-signup-otp');
        if (!update_time_button.length) {
            update_time_button = jQuery(this);
        }

        if (!jQuery(this).hasClass('dig_use_whatsapp') && update_time_button.hasClass('dig_use_whatsapp')) {
            update_time_button = jQuery(this);
        }

        var digPassReg = regForm.find(".digits_reg_password");


        var name, mail, pass, secmail;

        var mail_field = regForm.find('.digits_reg_email');
        var secmail_field = regForm.find('.dig-secondmailormobile');
        name = jQuery.trim(regForm.find(".digits_reg_name").val());
        secmail = jQuery.trim(secmail_field.val());
        mail = jQuery.trim(mail_field.val());
        pass = jQuery.trim(digPassReg.val());


        var digit_fields = JSON.parse(regForm.find('.digits_form_reg_fields').val());

        var pass_accept = digit_fields['dig_reg_password'];
        var mobile_accept = digit_fields['dig_reg_mobilenumber'];
        var mail_accept = digit_fields['dig_reg_email'];

        if (dig_log_obj.strong_pass == 1) {
            if (pass_accept == 2 || pass.length > 0) {
                try {
                    var strength = wp.passwordStrength.meter(pass, ['black', 'listed', 'word'], pass);
                    if (strength != null && strength < 3) {
                        showDigNoticeMessage(dig_log_obj.useStrongPasswordString);
                        return false;
                    }
                } catch (e) {

                }
            }
        }
        var dis = jQuery(this).attr('attr-dis');
        var csrf = jQuery(".dig_nounce").val();

        var error = false;


        regForm.find('input,textarea,select').each(function () {
            if (jQuery(this).attr('required') || jQuery(this).attr('data-req')) {


                var $this = jQuery(this);

                var dtype = $this.attr('dtype');

                if (dtype && dtype == 'range') {
                    var range = $this.val().split('-');
                    if (!range[1]) {
                        error = true;
                        $this.addClass('dig_input_error').closest('.digits-input-wrapper').append(requiredTextElement).closest('.minput').addClass('input-error');
                        $this.val('');
                    }
                }
                if ($this.attr('date')) {
                    var is_error = false;
                    if (dtype == 'time') {
                        var validTime = $this.val().match(/^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/);
                        if (!validTime) {
                            is_error = true;
                        }
                    } else if (dtype != 'range') {
                        var date = new Date($this.val());

                        if (!isDateValid(date)) {
                            is_error = true;
                        }
                    } else {
                        var date1 = new Date(range[0]);
                        var date2 = new Date(range[1]);
                        if (!isDateValid(date1) || !isDateValid(date2)) {
                            is_error = true;
                        }
                    }
                    if (is_error) {
                        error = true;
                        $this.addClass('dig_input_error').closest('.digits-input-wrapper').append(requiredTextElement).closest('.minput').addClass('input-error');
                        $this.val('');
                    }
                } else if ($this.is(':checkbox') || $this.is(':radio')) {

                    if (!$this.is(':checked') && !regForm.find('input[name="' + $this.attr('name') + '"]:checked').val()) {
                        error = true;
                        $this.addClass('dig_input_error').closest('.minput').addClass('input-error').append(requiredTextElement);
                    }

                } else {
                    var value = $this.val();
                    if (value == null || value.length == 0 || (value == -1 && $this.is("select"))) {
                        error = true;
                        if ($this.is("select")) {
                            $this.addClass('dig_input_error').next().addClass('dig_input_error').append(requiredTextElement).closest('.minput').addClass('input-error');
                        } else {
                            $this.addClass('dig_input_error').closest('.digits-input-wrapper').append(requiredTextElement).closest('.minput').addClass('input-error');
                            $this.trigger('focus');
                        }
                    }
                }

            }
        });

        if (regForm.find('.dig_input_error').length == 1) {
            if (regForm.find(".dig_opt_mult_con_tac").find('.dig_input_error').length > 0) {
                showDigErrorMessage(dig_log_obj.accepttac);
                return false;
            }
        }

        if (error) {
            showDigNoticeMessage(dig_log_obj.fillAllDetails);
            return false;
        }

        if (regForm.attr('wait')) {
            showDigNoticeMessage(regForm.attr('wait'));
            return false;
        }
        if (regForm.attr('error')) {
            showDigErrorMessage(regForm.attr('error'));
            return false;
        }


        if (mobile_accept == 0 && mail_accept == 0) {
            return true;
        }


        if (dis == 1 && dig_otp_signup.length && registerStatus != 1) {
            digPassReg.attr("required", "");
            dig_otp_signup.hide();

            digPassReg.parent().show().parent().fadeIn();


            jQuery(this).attr('attr-dis', -1);
            dig_log_reg_button = 0;
            jQuery(window).trigger('resize');
            return false;
        } else if (!dis) {

            if (pass_accept == 2 && pass.length == 0) {
                showDigErrorMessage(dig_log_obj.Invaliddetails);
                return false;
            }
            if (pass_accept > 0 && pass.length == 0 && validateEmail(mail) && validateEmail(secmail) && !is_mobile(mail) && !is_mobile(secmail)) {
                showDigNoticeMessage(dig_log_obj.eitherenterpassormob);
                return false;
            }
        }


        if (jQuery(this).attr("verify") == 1) {
            var otp = regForm.find(".dig_register_otp").find("input").val();
            if (is_mobile(mail)) {
                verifyOtp(regForm.find(".registercountrycode").val(), mail, csrf, otp, 2);
                return false;
            } else if (is_mobile(secmail)) {
                verifyOtp(regForm.find(".registersecondcountrycode").val(), secmail, csrf, otp, 2);
                return false;
            }
            return false;
        }

        if (registerStatus == 1) {
            return true;
        }

        var dis = jQuery(this).attr('attr-dis');


        if (is_mobile(mail) && is_mobile(secmail) && secmail.length > 0) {
            showDigErrorMessage(dig_log_obj.InvalidEmail);
            return false;
        }

        if (regForm.find(".disable_email_digit").length) {

            if (!is_mobile(mail)) {
                showDigErrorMessage(dig_log_obj.Invaliddetails);
                return false;
            }

        } else {
            if (validateEmail(mail) && validateEmail(secmail) && secmail.length > 0) {
                showDigErrorMessage(dig_log_obj.Invaliddetails);
                return false;
            }

            var dig_reg_mail = regForm.find(".dig_reg_mail");
            if (validateEmail(mail)) {
                dig_reg_mail.val(mail);
            } else if (validateEmail(secmail)) {
                dig_reg_mail.val(secmail);
            }


            if (mail_accept == 2 && !validateEmail(secmail) && !validateEmail(mail)) {
                showDigErrorMessage(dig_log_obj.InvalidEmail);

                return false;
            }

        }

        if (!regForm.find(".disable_password_digit").length) {
            if (!is_mobile(regForm.find('.digits_reg_email').val()) && !is_mobile(regForm.find('.dig-secondmailormobile').val())) {
                if (pass_accept > 0 && pass.length == 0) {
                    showDigNoticeMessage(dig_log_obj.eitherenterpassormob);
                    return false;
                }
            }
        }

        if (!isEmpty(mail)) {
            if (!is_mobile(mail) && !validateEmail(mail) ||
                (mail_field.data('type') == 2 && !is_mobile(mail))) {
                showDigErrorMessage(dig_log_obj.Invaliddetails);
                return false;
            }
        }
        if (!isEmpty(secmail)) {
            if (!is_mobile(secmail) && !validateEmail(secmail) ||
                (secmail_field.data('type') == 3 && !validateEmail(secmail))) {
                showDigErrorMessage(dig_log_obj.Invaliddetails);
                return false;
            }
        }

        if (mobile_accept == 2 && !is_mobile(mail) && !is_mobile(secmail)) {
            showDigErrorMessage(dig_log_obj.InvalidMobileNumber);
            return false;
        }

        if (regForm.find("#digits_reg_username").length) {
            username_reg_field = regForm.find("#digits_reg_username").val();
        }
        if (regForm.find(".dig-custom-field-type-captcha").length) {
            captcha_reg_field = regForm.find(".dig-custom-field-type-captcha").find("input[type='text']").val();
            captcha_ses_reg_field = regForm.find(".dig-custom-field-type-captcha").find(".dig_captcha_ses").val();
        }

        if (is_mobile(mail)) {

            akCallback = 'registerCallBack';
            email_reg_field = secmail;
            verifyMobileNoLogin(regForm.find(".registercountrycode").val(), mail, csrf, 2);

            return false;


        } else if (is_mobile(secmail)) {

            akCallback = 'registerCallBack';
            email_reg_field = mail;
            verifyMobileNoLogin(regForm.find(".registersecondcountrycode").val(), secmail, csrf, 2);

            return false;

        }


        if (validateEmail(mail)) {
            email_reg_field = mail;
        } else {
            email_reg_field = secmail;
        }
        verifyMobileNoLogin(null, null, csrf, 2);

        return false;

    });

    function registerCallBack(response) {

        if (response.status === "PARTIALLY_AUTHENTICATED") {
            showDigitsModal(false);

            var code = response.code;
            var csrf = response.state;
            regForm.find(".register_code").val(code);
            regForm.find(".register_csrf").val(csrf);

            registerStatus = 1;
            loader.show();
            regForm.find(".registerbutton").trigger('click');
        } else {
            showDigitsModal(true);

        }
    }

    function forgotCallBack(response) {
        showDigitsModal(true);
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            passchange = 1;
            var code = response.code;
            var csrf = response.state;
            forgotForm.find(".forgotpasscontainer").slideUp();
            forgotForm.find(".changepassword").slideDown();
            forgotForm.find(".digits_code").val(code);
            forgotForm.find(".digits_csrf").val(csrf);
        }
    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }


    var lef = leftDis * 3;
    leftDis = lef * 2 - 9;
    jQuery(document).on('click', '.dig_lrf_box .backtoLogin', function () {
        if (loginBoxTitle) {
            loginBoxTitle.text(dig_log_obj.login);
        }

        var box = jQuery(this).closest('.dig_lrf_box');
        var login = box.find('.digloginpage');


        if (!noanim) {
            //login.fadeIn('fast').find('.mobile_field').trigger('keyup');
        } else {
        }
        login.show().find('.mobile_field').trigger('keyup');

        box.find('.forgot').hide();
        box.find('.register').hide();
        updateModalHeight(login_modal);


    });

    jQuery(document).on('click', '.dig_lrf_box .signupbutton', function () {
        var box = jQuery(this).closest('.dig_lrf_box');

        if (loginBoxTitle) {
            loginBoxTitle.text(dig_log_obj.signup);
        }

        box.find('.digloginpage').hide();


        if (!noanim) {
            //box.find('.register').fadeIn('fast').find('.mobile_field').trigger('keyup');
        } else {
        }
        box.find('.register').show().find('.mobile_field').trigger('keyup');

        updateModalHeight(register_modal);


    });
    jQuery(window).on('resize', function () {

        if (register.is(":visible")) {

            updateModalHeight(register_modal);
        } else if (dig_modal_conn.is(":visible")) {
            updateModalHeight(login_modal);
            if (otp_container.length > 0) otp_container.css({"height": login.outerHeight(true)});
        }

    });

    if (otp_container.length > 0) {
        otp_container.css({"height": login.outerHeight(true)});
    }

    jQuery(document).on('click', '.dig_lrf_box .forgotpassworda', function () {
        if (loginBoxTitle) {
            loginBoxTitle.text(dig_log_obj.ForgotPassword);
        }
        var box = jQuery(this).closest('.dig_lrf_box');
        box.find('.digloginpage').hide();
        if (!noanim) {
            //box.find('.forgot').fadeIn('fast').find('.mobile_field').trigger('keyup')
        } else {
        }
        box.find('.forgot').show().find('.mobile_field').trigger('keyup');
        updateModalHeight(forgot_modal);
    });

    function hideLogin() {
        login.hide();

    }

    function updateModalHeight(box) {

        dig_modal_conn.css({"height": 'auto'});

        /*if (noanim) {
        } else {
            setTimeout(function () {
                dig_modal_conn.css({"height": box.outerHeight(true) + 90});
            })
        }*/
    }


    var ew = 8;

    jQuery(document).on('keyup change focusin', '.dig_lrf_box .dig-mobmail', function (e) {
        var data_type = jQuery(this).data('type');
        if (data_type == 3) return;
        var par = jQuery(this).closest('.minput');


        if (!jQuery(this).data('padding-left'))
            jQuery(this).data('padding-left', jQuery(this).css('padding-left'));


        if (show_countrycode_field(jQuery(this))) {
            par.find(".logincountrycodecontainer").css({"display": "inline-block"}).find('.logincountrycode').trigger('keyup');
        } else {
            var leftPadding = jQuery(this).data('padding-left');
            par.find(".logincountrycodecontainer").hide();
            jQuery(this).css({"padding-left": leftPadding});
        }
    });

    jQuery(document).on('keyup change focusin', '.dig_lrf_box .logincountrycode', function (e) {


        var size = jQuery(this).val().length + 1;
        if (size < 2) size = 2;
        jQuery(this).attr('size', size);
        var code = jQuery(this).val();
        if (code.trim().length == 0) {
            jQuery(this).val("+");
        }
        var par = jQuery(this).closest('form');

        var pl = ew;

        par.find('.dig-mobmail').stop().animate({"padding-left": jQuery(this).outerWidth(false) + pl + "px"}, 'fast', function () {
        });

    });


    jQuery(document).on('keyup change focusin', '.dig_lrf_box .digits_reg_email', function (e) {
        var data_type = jQuery(this).data('type');
        if (data_type == 3) return;

        var par = jQuery(this).closest('form');
        if (!jQuery(this).data('padding-left'))
            jQuery(this).data('padding-left', jQuery(this).css('padding-left'));

        if (show_countrycode_field(jQuery(this))) {
            par.find(".registercountrycodecontainer").css({"display": "inline-block"}).find('.registercountrycode').trigger('keyup');
        } else {
            par.find(".registercountrycodecontainer").hide();
            var leftPadding = jQuery(this).data('padding-left');
            jQuery(this).css({"padding-left": leftPadding});
        }
        updateMailSecondLabel(par);
    });


    setTimeout(function () {
        jQuery(".mobile_field").trigger("keyup");
    }, 10);


    jQuery(document).on('keyup change focusin', '.registercountrycode', function (e) {

        var size = jQuery(this).val().length + 1;
        if (size < 2) size = 2;
        jQuery(this).attr('size', size);
        var code = jQuery(this).val();
        if (code.trim().length == 0) {
            jQuery(this).val("+");
        }
        var par = jQuery(this).closest('form');

        var pl = ew;

        par.find('.digits_reg_email').stop().animate({"padding-left": jQuery(this).outerWidth(false) + pl + "px"}, 'fast', function () {
        });

        updateMailSecondLabel(par);
    });

    secondmailormobile.on("keyup change focusin", function (e) {
        var mobile_accept = jQuery(this).data('mobile');
        var mail_accept = jQuery(this).data('mail');

        if (mail_accept == 2 || mobile_accept == 2) return;

        var par = jQuery(this).closest('form');

        if (!jQuery(this).data('padding-left'))
            jQuery(this).data('padding-left', jQuery(this).css('padding-left'));


        if (show_countrycode_field(jQuery(this)) && !is_mobile(par.find('.digits_reg_email').val())) {
            par.find(".secondregistercountrycodecontainer").css({"display": "inline-block"}).find(".registersecondcountrycode").trigger('keyup');

        } else {
            par.find(".secondregistercountrycodecontainer").hide();
            var leftPadding = jQuery(this).data('padding-left');
            jQuery(this).css({"padding-left": leftPadding});
        }
        updateMailSecondLabel(par);
    });


    jQuery(document).on('keyup change focusin', '.registersecondcountrycode', function (e) {
        var size = jQuery(this).val().length + 1;
        if (size < 2) size = 2;
        jQuery(this).attr('size', size);
        var code = jQuery(this).val();
        if (code.trim().length == 0) {
            jQuery(this).val("+");
        }
        var par = jQuery(this).closest('form');

        var pl = ew;


        par.find('.dig-secondmailormobile').stop().animate({"padding-left": jQuery(this).outerWidth(false) + pl + "px"}, 'fast', function () {
        });

        updateMailSecondLabel(par);
    });


    forgotpass.on("keyup change focusin", function (e) {

        var data_type = jQuery(this).data('type');

        if (data_type == 3) return;


        var par = jQuery(this).closest('form');

        if (!jQuery(this).data('padding-left'))
            jQuery(this).data('padding-left', jQuery(this).css('padding-left'));


        if (show_countrycode_field(jQuery(this))) {
            par.find(".forgotcountrycodecontainer").css({"display": "inline-block"}).find('.forgotcountrycode').trigger('keyup');

        } else {
            par.find(".forgotcountrycodecontainer").hide();
            var leftPadding = jQuery(this).data('padding-left');
            jQuery(this).css({"padding-left": leftPadding});
        }

    });


    jQuery(document).on('keyup change focusin', '.forgotcountrycode', function (e) {
        var size = jQuery(this).val().length + 1;
        if (size < 2) size = 2;
        jQuery(this).attr('size', size);
        var code = jQuery(this).val();
        if (code.trim().length == 0) {
            jQuery(this).val("+");
        }
        var pl = ew;

        jQuery(this).closest('form').find('.forgotpass').stop().animate({"padding-left": jQuery(this).outerWidth(false) + pl + "px"}, 'fast', function () {
        });
    });


    var prevInftype = 0;

    function updateMailSecondLabel(par) {
        var secondmailormobile = par.find('.dig-secondmailormobile');

        if (secondmailormobile == null) return;


        var mailsecond = secondmailormobile.closest('.dig-mailsecond');
        if (mailsecond.data('always-show')) return;

        var con_field = par.find('.digits_reg_email');
        var con = con_field.val();
        //if(!con)return;
        var cc = secondmailormobile.val();
        if (con == undefined) return;

        var mobile_accept = secondmailormobile.data('mobile');
        var mail_accept = secondmailormobile.data('mail');

        if ((is_mobile(con) && inftype != 1) || mail_accept == 2 | con_field.data('type') == 2) {
            inftype = 1;

            par.find('.dig_secHolder').html(dig_log_obj.Email);
        } else if (!is_mobile(con) && inftype != 2 && mobile_accept != 2) {
            inftype = 2;
            par.find('.dig_secHolder').html(dig_log_obj.Mobileno);
        }

        if (secondmailormobile.attr('placeholder') && prevInftype != inftype) {
            prevInftype = inftype;
            var input_label = par.find('.dig_secHolder').closest('label').text().replace(/\s\s+/g, ' ');
            secondmailormobile.attr('placeholder', input_label);
        }

        if (mail_accept != 2 && mobile_accept != 2) {

            if (con == "" || con.length == 0) {
                mailsecond.hide();
                if (isSecondMailVisible) jQuery(window).trigger('resize');
                isSecondMailVisible = false;
                return;
            }

            if (!isSecondMailVisible) {
                mailsecond.fadeIn();
                jQuery(window).trigger('resize');
                isSecondMailVisible = true;
            } else return;
        }
    }

    jQuery(document).on('click', '.minput label', function (e) {
        jQuery(this).closest('.minput').find('input').first().trigger('focus');
    });

    jQuery(document).on('animationstart', '.minput input,.minput textarea', function (e) {
        jQuery(this).trigger('focusin');
    });

    jQuery(document).on('change blur focusin', '.minput input,.minput textarea', function (e) {

        if (jQuery(this).hasClass('countrycode')) return;
        var action_type = e.type;
        tmpval = jQuery(this).val();
        var parent = jQuery(this).parent();

        if (tmpval == '' && !show_countrycode_field(jQuery(this)) && action_type != 'focusin') {
            parent.addClass('empty').removeClass('not-empty');
            jQuery(this).addClass('empty').removeClass('not-empty');
        } else {
            parent.addClass('not-empty').removeClass('empty');
            jQuery(this).addClass('not-empty').removeClass('empty');
        }
        if (action_type == 'focusin') {
            jQuery(this).closest('.minput').addClass('digits-active');
        } else {
            jQuery(this).closest('.minput').removeClass('digits-active');
        }
    });

    jQuery('.minput input,.minput textarea').trigger('blur');


    function processAccountkitLogin(countrycode, phoneNumber) {
        hideDigitsModal();

    }


    setTimeout(function () {
        jQuery('.minput').find("input,textarea").each(function () {
            jQuery(this).triggerHandler('blur');
        });
    }, 500);

    function formatMobileNumber(number) {
        return filter_mobile(number);
    }

    var elem = jQuery(".digit_cs-list");
    var selected_input;

    var isShown = 0;
    jQuery(window).on("popstate", function (e) {
        if (elem.is(':visible')) {
            isShown = 0;
            hide_country_list();
        }
    });

    var country_count = elem.find('li').length;
    var disable_country_dropdown = country_count <= 2;
    jQuery(document).on("focusin", ".countrycode", function (e) {

        e.preventDefault();

        if (disable_country_dropdown) {
            jQuery(this).attr('no-change', true);
            return;
        }


        var elem_type = elem.data('type');
        selected_input = jQuery(this);
        if (elem_type == 'mobile') {

            window.history.pushState({state: "open_countrycode"}, null, "");
            elem.show().parent().fadeIn('fast', function () {
                jQuery(this).find('.countrycode_search').trigger('focus');
            });
            isShown = 1;
            return;
        }

        var $this = jQuery(this).parent().parent();
        var parentForm = $this;

        parentForm.append(elem);

        var nextNode = elem.find('li.selected');
        highlight(nextNode);

        elem.css({'top': $this.outerHeight(false) - 1}).show();

        elem.find('.countrycode_search').trigger('focus');

        isShown = 1;
    });
    jQuery(document).on("click", ".digits-hide-countrycode", function () {
        if (elem.is(':visible') && isShown == 1) {
            history.back();
        }
    });

    jQuery(document).on("focusout", ".countrycode, .countrycode_search", function (e) {
        if (e.relatedTarget) {
            var relatedTarget = jQuery(e.relatedTarget);
            if (relatedTarget && relatedTarget.hasClass('countrycode_search') ||
                relatedTarget.hasClass('countrycode')) {
                return;
            }
        }
        var elem_type = elem.data('type');

        if (elem_type == 'mobile') return;

        hide_country_list();

        isShown = 0;
    });

    function hide_country_list() {
        var elem_type = elem.data('type');
        var list = elem;
        if (elem_type == 'mobile') {
            list = elem.parent();
        }
        list.fadeOut('fast', function () {
            elem.find('.countrycode_search').val('').trigger('keydown');
        });
        isShown = 0;
    }

    jQuery(document).on("keydown", ".countrycode, .countrycode_search", function (e) {
        var keycode = e.which;

        if (keycode === 9) {
            var mobile_field = jQuery(this).closest('ul').closest('div').parent().find('.mobile_field');
            if (mobile_field && mobile_field.length) {
                mobile_field.focus();
                return false;
            }
        }

        if (disable_country_dropdown) {
            if (keycode === 9) {
                return true;
            }
            if (mobile_field && mobile_field.length) {
                e.preventDefault();
                return false;
            }
            return true;
        }

        if (isShown == 0 && !jQuery(this).hasClass('countrycode_search'))
            jQuery(this).trigger('focus');
        switch (keycode) {
            case 38: // Up
                var visibles = elem.find('li.dig-cc-visible:not([disabled])').not('.search_field');
                var nextNode = elem.find('li.selected').prev();
                var nextIndex = visibles.index(nextNode.length > 0 ? nextNode : visibles.last()) + 1;
                highlight(nextIndex);
                e.preventDefault();
                return false;
                break;
            case 40:

                var visibles = elem.find('li.dig-cc-visible:not([disabled])').not('.search_field');
                var nextNode = elem.find('li.selected').next();

                var nextIndex = visibles.index(nextNode.length > 0 ? nextNode : visibles.first()) + 1;
                highlight(nextIndex);
                e.preventDefault();
                return false;
                break;
            case 13:
                selectCode(false);
                return false;
                break;
            case 9:  // Tab
            case 27: //ESC
                var elem_type = elem.data('type');
                if (elem_type != 'mobile')
                    hide_country_list();
                break;
            default:
                var hiddens = 0;
                var curInput = jQuery(document.activeElement);
                var input = curInput.val().toLowerCase().trim();
                elem.find('li').each(function (index) {
                    var attr = jQuery(this).data('country');
                    if (attr && attr.startsWith(input)) {
                        highlight(index);
                        return false;
                    }
                });


                break;
        }


    });


    jQuery(document).on('update_flag', '.country_code_flag', function (e) {
        selected_input = jQuery(this);
        country_code_field = selected_input;
        var country = selected_input.attr('country');
        if (country) {
            elem.find('.selected').removeClass('selected');
            elem.find('[data-country="' + country + '"]').addClass('selected');
            selectCode(true);
        }
    })
    jQuery('.country_code_flag').trigger('update_flag');

    function selectCode(force) {

        if (elem.is(':visible') || force) {
            var selEle;

            selEle = elem.find('li.selected');
            if (!selEle.length) {
                selEle = elem.find('li:not(.search_field)').first();
            }

            selected_input.val("+" + selEle.attr('value')).trigger('keyup');
            var inp_row = selected_input.parent();
            var flag_elem = inp_row.find('span');
            if (flag_elem.length) {
                var flag_position = selEle.data('position');
                var country = selEle.data('country-code');
                flag_elem.addClass('flag_selected').attr('country', country)
                    .css({'background-position': flag_position});
            }
            inp_row.parent().find('.mobile_field').focus().trigger('update_placeholder');
            if (elem.data('type') == 'mobile') {
                elem.parent().find('.digits-hide-countrycode').trigger('click');
            } else {
                hide_country_list();
            }
            isShown = 0;
        }
    }

    function highlight(index) {
        setTimeout(function () {

            var visibles = elem.find('li');
            var oldSelected = elem.find('li.selected').removeClass('selected');
            var oldSelectedIndex = visibles.index(oldSelected);
            if (visibles.length > 0) {
                var selectedIndex = (visibles.length + index) % visibles.length;
                var selected = visibles.eq(selectedIndex);
                var top = 0;
                if (selected.length > 0) {
                    top = selected.position().top;
                    selected.addClass('selected');
                }

                if (elem.hasClass('digits-mobile-list')) {
                    elem.scrollTo(elem.scrollTop() + top - jQuery(window).height() / 2);
                } else {
                    if (selectedIndex > oldSelectedIndex && top + selected.outerHeight() > elem.outerHeight()) {
                        elem.scrollTo(".selected");
                    } else {
                        elem.scrollTo(elem.scrollTop() + top - 55);
                    }
                }

            }
        });
    }

    elem.on('mousemove', 'li:not([disabled])', function () {

        elem.find('.selected').removeClass('selected');
        jQuery(this).addClass('selected');

    }).on('mousedown click', 'li', function (e) {
        if (jQuery(this).hasClass('search_field')) {
            return;
        }
        if (elem.is('[disabled]')) e.preventDefault();
        else {
            elem.find('.selected').removeClass('selected');
            jQuery(this).addClass('selected');
        }
        selectCode(false);
    }).on('mouseup', function () {
        elem.find('li.selected').removeClass('selected');
    });


    function hideDigitsModal() {
        body.addClass('dig_low_overlay');
        loader.show();
        hideDigMessage();
        if (modcontainer.length) {
            modcontainer.hide();
        }
    }

    function showDigitsModal(hideLoader) {
        body.removeClass('dig_low_overlay');

        if (hideLoader) loader.hide();
        if (modcontainer.length) {
            modcontainer.show();
        }
    }


    function lockScroll() {
        $html = jQuery('html');
        $body = jQuery('body');
        var initWidth = $body.outerWidth(false);
        var initHeight = $body.outerHeight();

        var scrollPosition = [
            self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
            self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
        ];
        $html.data('scroll-position', scrollPosition);
        $html.data('previous-overflow', $html.css('overflow'));
        $html.css('overflow', 'hidden');
        window.scrollTo(scrollPosition[0], scrollPosition[1]);

        var marginR = $body.outerWidth(false) - initWidth;
        var marginB = $body.outerHeight() - initHeight;
        $body.css({'margin-right': marginR, 'margin-bottom': marginB});
    }

    function unlockScroll() {
        $html = jQuery('html');
        $body = jQuery('body');
        $html.css('overflow', $html.data('previous-overflow'));
        var scrollPosition = $html.data('scroll-position');
        if (!scrollPosition) return;
        window.scrollTo(scrollPosition[0], scrollPosition[1]);

        $body.css({'margin-right': 0, 'margin-bottom': 0});
    }

    jQuery(document).on("click touchstart", ".dig_popmessage", function () {
        hideDigMessage();
    });

    if (jQuery(".dig_bdy_container").length) {

        var reg;
        var ecd = jQuery(".dig_powrd");
        var b = jQuery(".dig_clg_bx");
        var c = jQuery(".logocontainer");
        var logp = jQuery(".digloginpage");
        var regp = jQuery(".register");
        var digc = jQuery(".dig-container");
        var digimgCon = jQuery(".dig_ul_left_side");
        var header = jQuery(".header");
        var dig_ma_box = jQuery(".dig_lrf_box");
        var otp_container = jQuery(".dig_verify_mobile_otp_container");

        jQuery(window).on('resize', function () {
            updatePos();
        });

        var updateLeftBx = function () {
            digimgCon.height(jQuery(document).height());
        };


        function updatePos() {

            if (regp.is(":visible")) {
                reg = 1;
            } else if (otp_container.length > 0 && otp_container.is(":visible")) {
                reg = 2;
            } else reg = 0;
            updatebox(reg);

        }


        function updatebox(upRegHe) {


            var f, at;
            var minTo = 90;
            if (c.length > 0) {
                f = c.height();
                at = 25;
            } else {
                f = 0;
                at = 0;
            }


            var h = jQuery(window).height();

            var boxh = logp.outerHeight(true) + 44;

            if (upRegHe == 1) {

                var regh = regp.outerHeight(true) + 44;
                if (regh > boxh) {
                    boxh = regh;
                }
            } else if (upRegHe == 2) {
                var regh = otp_container.outerHeight(true) + 44;
                if (regh > boxh) {
                    boxh = regh;
                }
            }

            var ecdH = 0;
            if (ecd.length) {
                ecdH = ecd.outerHeight(true);
            }
            var t = (h - f - boxh + at + ecdH + 28) / 2;


            var min_top = 70;

            if (!header.is(":visible")) {
                min_top = 60;
                minTo = min_top + 20;

            }


            if (c.length > 0) c.stop().animate({"top": Math.max(min_top, t - at), "opacity": 1}, 200);


            b.stop().animate({"top": Math.max(minTo, t), "opacity": 1}, 200);

            digc.height(boxh);

            if (ecd.length) {
                ecd.animate({"opacity": "1"});
            }
        }

        jQuery(document).on('click', '.signupbutton', function () {
            updatebox(true);
        });
        jQuery(document).on('click', '.backtoLogin', function () {
            updatebox(false);
        })

        setTimeout(function () {
            updatePos();
        });
        jQuery(window).resize();/*تغییر سایز صفحه برای ظاهر شدن فرم ثبت نام*/
    }

    function isJSON(data) {
        if (typeof data != 'string')
            data = JSON.stringify(data);

        try {
            JSON.parse(data);
            return true;
        } catch (e) {
            return false;
        }
    }


    function isDateValid(date) {
        return date.getTime() === date.getTime();
    }

    var country_code_field;

    jQuery(document).on("focus", ".mobile_field", function () {
        getCountryCodeField(jQuery(this));
    });

    function getCountryCodeField($this) {
        var parent = $this.parent().parent();
        country_code_field = parent.find('.countrycode,.wpnotif_countrycode');
        return country_code_field;
    }

    jQuery(document).on("keypress", ".minput .countrycode, input[name='digt_countrycode']", function (e) {
        var charCode = (e.which) ? e.which : e.keyCode;
        if (charCode === 9) {
            return true;
        }
        return charCode === 43 || !(charCode > 31 && (charCode < 48 || charCode > 57));
    });

    var bypassKey = false;
    jQuery(document).on("change", ".minput .countrycode, input[name='digt_countrycode']", function () {
        bypassKey = true;
        jQuery(this).closest('.minput').find('.mobile_field').trigger('keyup');
    });

    jQuery(document).on("change", ".wpnotif_countrycode", function () {
        bypassKey = true;
        jQuery(this).closest('.wpnotif_phonefield').find('.mobile_field').trigger('keyup');
    });


    var country_placeholders;

    jQuery(document).on('update_placeholder', '.mobile_placeholder', function (e) {
        if (dig_log_obj.dig_mobile_no_placeholder == 0) {
            return;
        }
        var $this = jQuery(this);

        var country_code_field = $this.closest('.digits-form_input_row').find('.digits_countrycode');

        var country = false;
        var placeholder = false;

        if (country_code_field.length) {
            var country_code_wrapper = country_code_field.closest('.countrycodecontainer');
            var flag_selected = country_code_wrapper.find('.flag_selected');
            if (flag_selected.length) {
                country = flag_selected.attr('country');
            }

            if (country && country_placeholders) {
//TODO: libphonenumber if slow the site, comment below line
                placeholder = libphonenumber.getExampleNumber(country, country_placeholders);
                if (placeholder) {
                    placeholder = placeholder.formatNational().replace(/^0+/, '');
                }
            }
        }
        if (!placeholder) {
            placeholder = $this.attr('data-placeholder');
        }
        $this.attr('placeholder', placeholder);
    })


    jQuery(document).on("keyup", ".mobile_field", function (e) {
        var $this = jQuery(this);
        var input = $this.val();

        if (!bypassKey && !$this.hasClass('mobile_placeholder')) {
            if (!isNumeric(input)) return;
        }
        bypassKey = false;
        if (!country_code_field) getCountryCodeField(jQuery(this));

        if ($this.hasClass('mobile_format')) {
            if (!dig_begins_with(input)) {
                if (country_code_field.length) {
                    input = country_code_field.val() + '' + input;
                }
            }
        }
/* //TODO: libphonenumber if slow the site, comment below line */
        var phone_obj = libphonenumber.parsePhoneNumberFromString(input);

        var countrycode = false;
        var country = false;

        var flag_elem = country_code_field.parent().find('span');
        if (typeof phone_obj != "undefined") {
            countrycode = phone_obj.countryCallingCode;
            var phone_number = phone_obj.nationalNumber;
            if ($this.hasClass('mobile_format')) {
                if (dig_log_obj.dig_mobile_no_formatting == 1) {
                    phone_number = jQuery.trim((phone_obj.formatInternational()).replace("+" + countrycode, ""));
                    phone_number = phone_number.replace(/^0+/, '');
                } else if (dig_log_obj.dig_mobile_no_formatting == 2) {
                    phone_number = (phone_obj.formatNational()).replace(/^0+/, '');
                }
                if (countrycode == '242' || countrycode == '225') {
                    phone_number = '0' + phone_number;
                }
            }
            country = phone_obj.country;
            $this.val(phone_number);

            if (country_code_field.length && dig_log_obj.dig_hide_ccode == 0) {

                country_code_field.val('+' + countrycode);
                if (!country_code_field.is(":visible") && !$this.hasClass('dig-attr-cc-key')) {
                    $this.addClass('dig-attr-cc-key');
                    $this.trigger('keyup');
                }
                if (flag_elem.length) {
                    if (country) {
                        var flag_position = elem.find('[data-country-code="' + country + '"]').data('position');
                        flag_elem.addClass('flag_selected')
                            .attr('country', country).css({'background-position': flag_position});
                    } else {
                        flag_elem.removeClass('flag_selected');
                    }
                }
            }
        } else {/*تا اینجا غیرفعال بشه*/
            $this.removeClass('dig-attr-cc-key')
        }/*این خط هم حذف بشه*/
        $this.trigger('update_placeholder');

    });

    function get_country_placeholders() {
        /*Custom*/
        var examples_json = '{"AC":"40123","AD":"312345","AE":"501234567","AF":"701234567","AG":"2684641234","AI":"2642351234","AL":"672123456","AM":"77123456","AO":"923123456","AR":"91123456789","AS":"6847331234","AT":"664123456","AU":"412345678","AW":"5601234","AX":"412345678","AZ":"401234567","BA":"61123456","BB":"2462501234","BD":"1812345678","BE":"470123456","BF":"70123456","BG":"43012345","BH":"36001234","BI":"79561234","BJ":"90011234","BL":"690001234","BM":"4413701234","BN":"7123456","BO":"71234567","BQ":"3181234","BR":"11961234567","BS":"2423591234","BT":"17123456","BW":"71123456","BY":"294911911","BZ":"6221234","CA":"5062345678","CC":"412345678","CD":"991234567","CF":"70012345","CG":"061234567","CH":"781234567","CI":"0123456789","CK":"71234","CL":"221234567","CM":"671234567","CN":"13123456789","CO":"3211234567","CR":"83123456","CU":"51234567","CV":"9911234","CW":"95181234","CX":"412345678","CY":"96123456","CZ":"601123456","DE":"15123456789","DJ":"77831001","DK":"32123456","DM":"7672251234","DO":"8092345678","DZ":"551234567","EC":"991234567","EE":"51234567","EG":"1001234567","EH":"650123456","ER":"7123456","ES":"612345678","ET":"911234567","FI":"412345678","FJ":"7012345","FK":"51234","FM":"3501234","FO":"211234","FR":"612345678","GA":"06031234","GB":"7400123456","GD":"4734031234","GE":"555123456","GF":"694201234","GG":"7781123456","GH":"231234567","GI":"57123456","GL":"221234","GM":"3012345","GN":"601123456","GP":"690001234","GQ":"222123456","GR":"6912345678","GT":"51234567","GU":"6713001234","GW":"955012345","GY":"6091234","HK":"51234567","HN":"91234567","HR":"921234567","HT":"34101234","HU":"201234567","ID":"812345678","IE":"850123456","IL":"502345678","IM":"7924123456","IN":"8123456789","IO":"3801234","IQ":"7912345678","IR":"9123456789","IS":"6111234","IT":"3123456789","JE":"7797712345","JM":"8762101234","JO":"790123456","JP":"9012345678","KE":"712123456","KG":"700123456","KH":"91234567","KI":"72001234","KM":"3212345","KN":"8697652917","KP":"1921234567","KR":"1020000000","KW":"50012345","KY":"3453231234","KZ":"7710009998","LA":"2023123456","LB":"71123456","LC":"7582845678","LI":"660234567","LK":"712345678","LR":"770123456","LS":"50123456","LT":"61234567","LU":"628123456","LV":"21234567","LY":"912345678","MA":"650123456","MC":"612345678","MD":"62112345","ME":"67622901","MF":"690001234","MG":"321234567","MH":"2351234","MK":"72345678","ML":"65012345","MM":"92123456","MN":"88123456","MO":"66123456","MP":"6702345678","MQ":"696201234","MR":"22123456","MS":"6644923456","MT":"96961234","MU":"52512345","MV":"7712345","MW":"991234567","MX":"12221234567","MY":"123456789","MZ":"821234567","NA":"811234567","NC":"751234","NE":"93123456","NF":"381234","NG":"8021234567","NI":"81234567","NL":"612345678","NO":"40612345","NP":"9841234567","NR":"5551234","NU":"8884012","NZ":"211234567","OM":"92123456","PA":"61234567","PE":"912345678","PF":"87123456","PG":"70123456","PH":"9051234567","PK":"3012345678","PL":"512345678","PM":"551234","PR":"7872345678","PS":"599123456","PT":"912345678","PW":"6201234","PY":"961456789","QA":"33123456","RE":"692123456","RO":"712034567","RS":"601234567","RU":"9123456789","RW":"720123456","SA":"512345678","SB":"7421234","SC":"2510123","SD":"911231234","SE":"701234567","SG":"81234567","SH":"51234","SI":"31234567","SJ":"41234567","SK":"912123456","SL":"25123456","SM":"66661212","SN":"701234567","SO":"71123456","SR":"7412345","SS":"977123456","ST":"9812345","SV":"70123456","SX":"7215205678","SY":"944567890","SZ":"76123456","TA":"8999","TC":"6492311234","TD":"63012345","TG":"90112345","TH":"812345678","TJ":"917123456","TK":"7290","TL":"77212345","TM":"66123456","TN":"20123456","TO":"7715123","TR":"5012345678","TT":"8682911234","TV":"901234","TW":"912345678","TZ":"621234567","UA":"501234567","UG":"712345678","US":"2015550123","UY":"94231234","UZ":"912345678","VA":"3123456789","VC":"7844301234","VE":"4121234567","VG":"2843001234","VI":"3406421234","VN":"912345678","VU":"5912345","WF":"821234","WS":"7212345","XK":"43201234","YE":"712345678","YT":"639012345","ZA":"711234567","ZM":"955123456","ZW":"712345678"}';
        var examples = JSON.parse(examples_json);
        country_placeholders = examples;
        jQuery('.mobile_placeholder').trigger('keyup');
        /*
        fetch('https://unpkg.com/libphonenumber-js@1.10.18/examples.mobile.json',
            {cache: "force-cache"})
            .then(function (response) {
                return response.json();
            })
            .then(function (examples) {
                country_placeholders = examples;
                jQuery('.mobile_placeholder').trigger('keyup');
            });
        */
    }

    get_country_placeholders();

    jQuery(".digits_login, .digits_register, .digits_forgot_pass").on('submit', function (e) {
        e.preventDefault();
        if (jQuery(this).attr('data-processing') == 1) return;
        jQuery(this).attr('data-processing', 1);
        process_form(jQuery(this));
        return false;
    });

    function process_form(form) {
        hideDigMessage();
        loader.show();
        jQuery.ajax({
            type: 'post',
            url: dig_log_obj.ajax_url,
            data: form.serialize() + "&action=digits_submit_form",
            success: function (res) {
                form.attr('data-processing', 0);
                if (isJSON(res)) {

                    if (res.success === true) {
                        if (res.data.show_password) {
                            form.find('.digits_login_field_row').slideUp('fast');
                            form.find('.password_row').slideDown('fast').find('input').removeAttr('disabled').focus();
                        } else if (dig_log_obj.login_reg_success_msg == 1 || !res.data.redirect) {
                            if (res.data.notice) {
                                showDigNoticeMessage(res.data.msg);
                            } else {
                                showDigSuccessMessage(res.data.msg);
                            }
                        }
                        if (res.data.redirect) {
                            digits_redirect(res.data.redirect);

                        } else {
                            loader.hide();
                        }
                    } else {
                        loader.hide();
                        if (res.data.level == 1) {
                            showDigNoticeMessage(res.data.msg);
                        } else {
                            showDigErrorMessage(res.data.msg);
                        }
                    }
                }
            }, error: function () {
                loader.hide();
                showDigErrorMessage(dig_log_obj.Error);
                form.attr('data-processing', 0);
            }
        });
    }


    function digits_show(elem_show) {
        var elem = jQuery(elem_show);
        if (elem.length) {
            var overlay = elem;
            if (!elem.hasClass('digits-overlay')) {
                overlay = elem.closest('.digits-overlay');
            }
            if (elem.hasClass('digits_no_dismiss') || overlay.hasClass('digits_no_dismiss'))
                return;


            var effects = elem.find('.digits-effects-element');
            if (effects.length) {
                elem.addClass(effects.data('animation'));
            }
            elem.find('.mobile_field').trigger('keyup');
            elem.fadeIn('fast');
        }
    }

    jQuery(document).on('click', '.digits-overlay-close', function () {
        var overlay = jQuery(this).closest('.digits-overlay');
        if (overlay.hasClass('digits_no_dismiss')) return;
        unlockScroll();
        overlay.fadeOut('fast');
        jQuery('body').removeClass('digits-no-overflow');
    });


    jQuery(document).on('change', '.digits-input_radio input', function () {
        var $this = jQuery(this);
        if ($this.is(':checked')) {
            var container = $this.closest('.digits-form_input');
            var checked_class = 'digits-form_checked';
            container.find('.' + checked_class).removeClass(checked_class);
            $this.closest('.digits-input_radio').addClass(checked_class);
        }
    });
    jQuery(document).on('change', '.digits-input_checkbox input', function () {
        var $this = jQuery(this);
        var checked_class = 'digits-form_checked';
        var container = $this.closest('.digits-form_input');
        if ($this.is(':checked')) {
            container.addClass(checked_class);
        } else {
            container.removeClass(checked_class);
        }
    });
    $('document').ready(function(){ /*persian datepicker*/
        function digCustomfieldDate(elm) {
            var jdf = new jDateFunctions();
            var isPageRTL=(jQuery('html').attr('dir')=='rtl')?1:0;
            function commitDate(old_textbox, new_textbox){

                var jdate=new_textbox.val();

                var arrdate=jdate.split('-');
                var pd = new persianDate();
                pd.year = parseInt(arrdate[0]);
                pd.month = parseInt(arrdate[1]);
                pd.date = parseInt(arrdate[2]);
                old_textbox.val(jdf.getGDate(pd)._toString("YYYY-0M-0D"));
            }
            var txtnew_digdate_id = 'jalali_'+elm.attr('id');

            jQuery( "<input name='"+txtnew_digdate_id+"' id='"+txtnew_digdate_id+"' class='dig-jdate-picker' type='text'>" ).insertAfter( elm );

            var txtold_digdate=jQuery(elm);
            var txtnew_digdate = jQuery( '#'+txtnew_digdate_id );

            txtnew_digdate.attr('placeholder',txtold_digdate.attr('placeholder'));
            //txtold_orderdate.removeAttr('pattern');
            txtold_digdate.removeAttr('class');
            //txtold_orderdate.css('display','none');
            txtold_digdate.hide();

            if(txtold_digdate.val()) txtnew_digdate.val(jdf.getPCalendarDate(jdf.getJulianDay(new Date(txtold_digdate.val()))).toString("YYYY-0M-0D"));

            txtnew_digdate.persianDatepicker({
                formatDate: "YYYY-0M-0D",
                isRTL: isPageRTL,
                nextArrow: '«',
                prevArrow: '»',
                fontSize: 12,
                calendarPosition: {
                    x: 0,
                    y: 0,
                },
                onSelect: function(){
                    commitDate(txtold_digdate, txtnew_digdate) },
            });

            txtnew_digdate.change(function () {
                commitDate(txtold_digdate, txtnew_digdate);

            });
        }
        jQuery( '.digits-field-type_date input, .dig-custom-field-type-date input' ).each(function(){
            digCustomfieldDate(jQuery(this));
        });
    });
});

var digits_isWaitingForSms = false;

function digits_WaitForSms() {
    if ('OTPCredential' in window) {
        if (digits_isWaitingForSms) {
            return;
        }
        digits_isWaitingForSms = true;
        navigator.credentials.get({otp: {transport: ['sms']}})
            .then(function (otp) {
                var code = otp.code;
                jQuery('input[name="dig_otp"]:visible').val(code);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

function show_countrycode_field(mobile_field) {
    var mobile_number = mobile_field.val();
    var data_type = mobile_field.data('type');
    if (dig_log_obj.dig_hide_ccode == 1) {
        return false;
    } else if (data_type == 2) {
        return true;
    } else if (is_mobile(mobile_number)) {
        return !dig_begins_with(mobile_number);
    }
    return false;
}

function dig_begins_with(mobile_number) {
    if (mobile_number.substring(0, 1) == "+") {
        return true;
    }
    return false;
}

function filter_mobile(mobile_number) {
    mobile_number = convert_number.toNormal(mobile_number);
    mobile_number = mobile_number.replace(/[-+ )(]/g, '');
    return mobile_number.replace(/^0+/, '');
}

function is_mobile(mobile_number) {
    mobile_number = convert_number.toNormal(mobile_number);
    mobile_number = mobile_number.replace(/[- )(]/g, '');
    return isNumeric(mobile_number);
}

function digits_redirect(redirect_location) {
    var delay = 500;
    if (dig_log_obj.login_reg_success_msg == 0) {
        delay = 0;
    }
    setTimeout(function () {

        var digits_redirect_page = jQuery("input[name='digits_redirect_page']");
        if (digits_redirect_page.length) {
            var requested_redirect = digits_redirect_page.val();
            if (requested_redirect.length > 0 &&
                requested_redirect != '-1' && requested_redirect != '-2') {
                window.location.href = jQuery.trim(requested_redirect);
                return;
            }
        }
        if (redirect_location == '-1' || redirect_location == '-2') {
            if (jQuery('.dig-box').is(':visible')) {
                redirect_location = '-1';
            }
            var referrer = document.referrer;
            if (referrer) {
                var is_account_page = jQuery('#customer_login').length;
                var is_same = document.referrer.indexOf(location.protocol + "//" + location.host) === 0;
                if (is_same && (is_account_page || redirect_location == '-2')) {
                    window.history.back();
                    return;
                }
                if (redirect_location == '-2') {
                    document.location.href = "/";
                    return;
                }
            }
            location.reload();

        } else {
            window.location.href = redirect_location;
        }

    }, delay);
}

function showDigLoginSuccessMessage() {
    if (dig_log_obj.login_reg_success_msg == 1)
        showDigSuccessMessage(dig_log_obj.login_success);
}

function showDigErrorMessage(message) {
    showDigMessage(message, 3);
}

function showDigNoticeMessage(message) {
    showDigMessage(message, 3);
}

function showDigSuccessMessage(message) {
    showDigMessage(message, 1);
}

function showDigMessage(message, alert_type) {

    if (!message) {
        return;
    }
    var extra_class = '';
    var dark_theme = jQuery('.digits-dark-theme');
    if (dark_theme.length) {
        if (dark_theme.is(":visible")) {
            extra_class = 'dark_theme';
        }
    }
    var digits_ui = jQuery('.digits2_box');
    if (digits_ui.length && digits_ui.is(":visible")) {
        extra_class = ' digits_page_visible';
    }
    jQuery(".dig_error_message").remove();

    jQuery("body").append("<div class='dig_popmessage dig_popmessage_right dig_error_message'><div class='dig_popmessage_contents'><div class='dig_firele'><div class='dig_pop_bg'></div><div class='dig_pop_bg_over'></div></div><div class='dig_lasele'><div class='dig_lase_snap'></div><div class='dig_lase_message'>" + message + "</div></div><div class='dig_popdismiss'></div></div></div>");

    var alert_class;
    var message_type;
    if (alert_type === 1) {
        alert_class = 'dig_success_msg';
        message_type = dig_log_obj.yay;
    } else if (alert_type === 2) {
        alert_class = 'dig_notice_msg';
        message_type = dig_log_obj.notice;
    } else {
        alert_class = 'dig_critical_msg';
        message_type = dig_log_obj.ohsnap;
    }

    jQuery(".dig_popmessage").show().removeClass('dig_success_msg dig_notice_msg dig_critical_msg').addClass(alert_class + ' dig_popBounceInRight ' + extra_class).find('.dig_lase_snap').text(message_type);

}

function hideDigMessage() {
    jQuery(".dig_popmessage").fadeOut('fast', function () {
        jQuery(this).remove();
    });
}

function isNumeric(str) {
    if (typeof str != "string") return false
    return !isNaN(str) && !isNaN(parseFloat(str))
}

var convert_number = (function () {
    var numerals = {
        persian: ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"],
        arabic: ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"]
    };

    return {
        toNormal: function (str) {
            if (!str) {
                return '';
            }
            var num, i, len = str.length, result = "";

            for (i = 0; i < len; i++) {
                num = numerals["persian"].indexOf(str[i]);
                num = num != -1 ? num : numerals["arabic"].indexOf(str[i]);
                if (num == -1) num = str[i];
                result += num;
            }
            return result;
        }
    }
})();