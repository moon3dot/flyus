jQuery(function ($) {

    var loader = jQuery(".dig_load_overlay").first();
    var modal_box = jQuery(".digits_secure_modal_box");
    var is_reload_pending = false;

    jQuery(".digits_secure_account_modal").on('click', function (e) {
        e.preventDefault();
        showLoader();
        var form = jQuery(this).closest('form');
        var nonce = form.find('[name="_wpnonce"]').val();
        var action = jQuery(this).data('action');
        var form_data = form.serializeArray();
        form_data.push({name: 'action', value: action});
        form_data.push({name: '_ajax_nonce', value: nonce});


        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: form_data,
            success: function (res) {
                process_secure_account_modal(res);
            },
            error: function (res) {
                hideLoader();
            }
        });

        return false;
    });

    function process_secure_account_modal(res) {
        if (res.success) {
            var data = res.data;
            if (data.html) {
                var html = jQuery(data.html);
                modal_box.find('.digits_secure_modal_contents').empty().append(html);
                modal_box.fadeIn('fast', function () {
                    var auto_focus = modal_box.find('.digits_auto_focus');
                    if (auto_focus && auto_focus.length) {
                        auto_focus.first().focus();
                    }
                });
                hideLoader();
                setup_auto_check_handler(data);
            } else {
                showDigSuccessMessage(data.message);
                location.reload();
            }
        } else {
            if (res.data) {
                var data = res.data;
                if (data.message) {
                    showDigErrorMessage(data.message);
                }
            }
            hideLoader();
        }
    }

    if (dig_secure.dig_dsb == 1) return;
    jQuery(document).on('click', '.digits_secure_modal-close', function (e) {
        var container = jQuery(this).closest('.digits_secure_modal_box');

        if (container.hasClass('digits_secondary_modal_box')) {
            container.remove();
        } else {
            container.fadeOut();
        }
        if (is_reload_pending) {
            showLoader();
            location.reload();
        }
        return false;
    })

    jQuery(".digits_secure_account_delete").on('click', function (e) {
        e.preventDefault();
        var item = jQuery(this).closest('.digits_secure_account_item');
        showLoader();
        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: item.find('input').serialize(),
            success: function (res) {
                var data = res.data;
                if (res.success) {
                    item.slideUp();
                    showDigSuccessMessage(data.message);
                    hideLoader();
                } else {
                    showDigErrorMessage(data.message);
                    hideLoader();
                }
            },
            error: function (res) {
                hideLoader();
            }
        });

        return false;
    })

    function showLoader() {
        hideDigMessage();
        loader.fadeIn();
    }

    function hideLoader() {
        loader.fadeOut();
    }


    jQuery(document).on('submit', '.digits-setup_2fa_app', function (e) {
        e.preventDefault();
        var form = jQuery(this);
        showLoader();
        if (form.find('.digits_display_none').length) {
            form.find('.digits_display_none').slideDown(150, function () {
                hideLoader();
                var $this = jQuery(this);
                $this.removeClass('digits_display_none');
            });
            return false;
        }
        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: form.serialize(),
            success: function (res) {
                var data = res.data;
                if (res.success) {
                    showDigSuccessMessage(data.message);

                    window.digitsAccountSettingUpdated('2fa_app', true);
                } else {
                    showDigErrorMessage(data.message);
                    hideLoader();
                }
            },
            error: function (res) {
                hideLoader();
            }
        });

        return false;
    });

    jQuery(document).on('submit', '.digits-setup_additional_step', function (e) {
        e.preventDefault();
        var form = jQuery(this);
        showLoader();

        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: form.serialize(),
            success: function (res) {
                var data = res.data;
                if (res.success) {
                    if (data.html) {
                        var html = jQuery(data.html);
                        var box = modal_box.closest('.digits_secure_modal_box').clone()
                        jQuery('body').append(box);
                        box.addClass('digits_secondary_modal_box').find('.digits_secure_modal_contents').empty().append(html);
                        box.fadeIn('fast', function () {
                            var auto_focus = box.find('.digits_auto_focus');
                            if (auto_focus && auto_focus.length) {
                                auto_focus.first().focus();
                            }
                        });
                        hideLoader();
                    } else {
                        showDigSuccessMessage(data.message);
                        location.reload();
                    }
                } else {
                    showDigErrorMessage(data.message);
                    hideLoader();
                }
            },
            error: function (res) {
                hideLoader();
            }
        });

        return false;
    });

    function account_settings_updated(type, reload) {
        var seconday_modal_box = jQuery('.digits_secondary_modal_box');
        if (seconday_modal_box.length) {
            seconday_modal_box.remove();
            modal_box.find('form').submit();
            if (reload) {
                is_reload_pending = true;
            }
        }
        if (reload) {
            if (is_remote_setup) {
                redirectToHome();
            } else {
                location.reload();
            }
        }
    }

    window.digitsAccountSettingUpdated = account_settings_updated;
    jQuery(document).on('submit', '.digits-setup_email', function (e) {
        e.preventDefault();
        var form = jQuery(this);
        showLoader();
        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: form.serialize(),
            success: function (res) {
                var data = res.data;
                if (res.success) {
                    window.digitsAccountSettingUpdated('email', false);
                } else {
                    showDigErrorMessage(data.message);
                    hideLoader();
                }
            },
            error: function (res) {
                hideLoader();
            }
        });

        return false;
    });
    jQuery(document).on('submit', '.digits-turn_off_submit_form', function (e) {
        e.preventDefault();
        var form = jQuery(this);
        showLoader();
        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: form.serialize(),
            success: function (res) {
                var data = res.data;
                if (res.success) {
                    showDigSuccessMessage(data.message);
                    location.reload();
                } else {
                    showDigErrorMessage(data.message);
                    hideLoader();
                }
            },
            error: function (res) {
                hideLoader();
            }
        });

        return false;
    });

    jQuery(document).on('click', '.dig_copy_inp', function (e) {
        copyShortcode(jQuery(this));
    });

    function copyShortcode(i) {
        if (i.attr("nocop")) return;
        i.select();
        document.execCommand("copy");
        var v = i.val();
        i.val(dig_secure.copiedtoclipboard);
        setTimeout(
            function () {
                i.val(v);
            }, 800);
    }

    jQuery(document).on('click', '.digits_secure_setup_phone,.digits_secure_remove_phone_setup', function (e) {
        var $this = jQuery(this);
        var form = $this.closest('.digits_secure_wrapper');
        var fingerprint_wrapper = form.find('.digits_secure_setup_box');

        showLoader();
        var phone_setup = 1;
        if ($this.data('remove')) {
            phone_setup = -1;
        }

        form.find('input[name="digits_setup_phone"]').val(phone_setup);

        submit_security_key_form(form.serialize(), false);

    });

    jQuery(document).on('submit', '.digits-setup_security_key', function (e) {
        e.preventDefault();
        var form = jQuery(this);
        var device_name_inp = form.find('[name="device_name"]');
        var device_name = device_name_inp.val();

        if (device_name.length === 0) {
            device_name_inp.focus();
            return false;
        }
        showLoader();
        submit_security_key_form(form.serialize(), false);
        return false;
    });

    function submit_security_key_form(form, is_remote_setup) {

        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: form,
            success: function (res) {
                var data = res.data;
                if (res.success) {
                    if (data.process_modal) {
                        process_secure_account_modal(res);
                    }
                    if (data.public_key) {
                        digits_device_auth(data, form, authenticate_key, 'create');
                    }
                    if (data.reload) {
                        showDigSuccessMessage(data.message);
                        window.digitsAccountSettingUpdated('auth_key', true);
                    } else {
                        setup_auto_check_handler(data);
                    }
                } else {
                    showDigErrorMessage(data.message);
                    if (is_remote_setup) {
                        redirectToHome();
                    } else {
                        hideLoader();
                    }
                }
            },
            error: function (res) {
                hideLoader();
            }
        });
    }

    function authenticate_key(cred, form, options) {
        showLoader();
        var data = {};
        data['_wpnonce'] = options.nonce;
        data['action'] = options.action;
        data['cred'] = cred;
        if (is_remote_setup) {
            data['remote_setup_token'] = true;
            data['device_token'] = remote_setup_token;
        }

        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: data,
            success: function (res) {
                var data = res.data;
                if (res.success) {
                    showDigSuccessMessage(data.message);
                    window.digitsAccountSettingUpdated('auth_key', true);
                } else {
                    showDigErrorMessage(data.message);
                    if (is_remote_setup) {
                        redirectToHome();
                    } else {
                        hideLoader();
                    }
                }
            },
            error: function (res) {
                hideLoader();
            }
        });
    }

    var is_remote_setup = false;
    var remote_setup_token = false;

    function check_device_setup_auth() {
        var params = new URLSearchParams(window.location.search);
        var device_token = params.get('device_token');
        var action_type = params.get('action_type');
        var callback = params.get('callback');

        if (callback && action_type && device_token) {
            if (device_token.length > 0 &&
                action_type === 'device_auth' && callback === 'setup_device') {
                is_remote_setup = true;
                remote_setup_token = device_token;
                showLoader();
                submit_security_key_form(
                    {
                        action: 'dig_auth_setup_device',
                        remote_device: 1,
                        device_token: device_token,
                        action_type: action_type,
                        callback: callback
                    },
                    true
                );
            }
        }
    }

    check_device_setup_auth();

    function redirectToHome() {
        setTimeout(function () {
            window.location.href = window.location.protocol + '//' + window.location.host;
        }, 3000);
    }

    var isBlur = false;

    function windowBlur() {
        isBlur = true;
    }

    function windowFocus() {
        isBlur = false;
    }


    var check_interval = false;
    var check_data = false;
    var check_duration = 1750;

    function setup_auto_check_handler(data) {
        cancel_auto_check_handler();
        if (data.is_remote) {
            check_data = data;
            start_auto_check_handler();
        }
    }

    function start_auto_check_handler() {
        check_interval = setTimeout(send_device_check_request, check_duration);
    }

    function cancel_auto_check_handler() {
        clearTimeout(check_interval);
    }

    function send_device_check_request() {
        if (!jQuery('.digits_secure_setup_box').is(':visible')) {
            return;
        }
        var action = 'digits_check_remote_setup_status';
        var nonce = check_data.remote_nonce;
        var form_data = {
            action: action,
            _wpnonce: nonce
        }
        jQuery.ajax({
            type: 'post',
            url: dig_secure.ajax_url,
            data: form_data,
            success: function (res) {

                if (res.success) {
                    var status = res.data.status;
                    if (status === 'pending') {
                        start_auto_check_handler();
                    } else {
                        var digits_secure_setup_box = jQuery('.digits_secure_setup_box');
                        digits_secure_setup_box.addClass('device_registered');
                    }
                } else {
                    showDigErrorMessage(res.data.message);
                }
            },
            error: function (res) {
                hideLoader();
            }
        });
    }

    window.addEventListener('blur', windowBlur);
    window.addEventListener('focus', windowFocus);

})
