function digits_wizard() {
    var body = jQuery('body');
    var wiz = jQuery('#untdor_obw');
    var wiz_footer_action = wiz.find('#untdor_wizard_footer_action');
    var wiz_hint = wiz.find('#untdor_wizard_hint_box');
    var wiz_box = wiz.find('#untdor_wizard_box');
    var wiz_next_btn = wiz.find('#untdor_wizard_next_box');
    var active_step_index = 0;
    var save_state_timer = null;
    wiz.appendTo(body);

    var loader = jQuery(".dig_load_overlay").first();

    var wizard_history_inp = wiz.find('#digits_obw_step_history').val();
    var wizard_history = [];
    if (wizard_history_inp.length > 0) {
        wizard_history = wizard_history_inp.split(',');
    }
    var step_holder = wiz.find('#untdor_wizard_contents');
    jQuery('.untdor_wizard_next_btn,.untdor_wizard_back').on('click', function () {
        hideDigMessage();
        var current_step = step_holder.find('.active_step');
        var current_step_id = current_step.attr('id');
        var currentIndex = current_step.index();
        var showStepNo = 0;
        if (jQuery(this).data('back')) {
            if (wizard_history.length >= 2) {
                wizard_history.pop()
                showStepNo = wizard_history.pop();
            } else {
                showStepNo = currentIndex - 1;
            }
        } else {
            if (wiz_box.hasClass('wiz_feedback')) {
                finish_wizard();
                return false;
            }
            if (current_step.find('.wiz_process_purchase_code').length > 0) {
                var process_purchase = process_purchase_code(current_step);
                if (!process_purchase) {
                    return false;
                }
            }
            var nextStepCheck = current_step.find('.next_step_view');
            if (nextStepCheck.length) {
                var nextStepId = step_holder.find('#' + nextStepCheck.first().val());
                showStepNo = nextStepId.index();
            } else {
                showStepNo = currentIndex + 1;
            }
        }

        show_step(showStepNo, true);
        return false;
    })

    jQuery('.untdor_minimize_expand_wizard').on('click', function (e) {
        e.preventDefault();
        wiz.toggleClass('untdor_collapsed_wizard');
        positionWizard();
        return false;
    })

    jQuery('.untdor_wizard_step_btn,.untdor_wizard_step_btn_inline').on('click', function (e) {
        e.preventDefault();
        var $this = jQuery(this);
        if ($this.data('next-step')) {
            var next_id = $this.data('next-step');
            var showStepNo = wiz_box.find('#' + next_id).index();
            show_step(showStepNo, true)
        } else if ($this.data('href')) {
            window.open($this.data('href'), '_blank');
        }
        return false;
    })

    function load_step() {
        var step_no = step_holder.find('.active_step').index();
        show_step(step_no, false);
    }

    var tab_list = jQuery('#digits-admin_tabs');

    var skip_for_now = wiz.find('.untdor_wizard_skip_for_now');

    function show_step(step_no, save_state) {
        active_step_index = step_no;
        var currentActive = step_holder.find('.active_step');
        var nextStep = step_holder.find('.untdor_wizard_step').eq(step_no);

        if (save_state || wizard_history.length === 0) {
            wizard_history.push(step_no);
        }

        var switch_to_tab = nextStep.data("switch-to-tab");
        if (switch_to_tab) {
            if (nextStep.data('navigate')) {
                if (!is_current_url_same(switch_to_tab)) {
                    loader.show();
                    window.location.href = switch_to_tab + '&wizard_step=' + step_no;
                    var box_y = jQuery(window).height();
                    wiz_box.css({'transform': 'translateY(' + box_y + 'px)'});
                    return;
                }
            } else {
                tab_list.find('[tab="' + switch_to_tab + '"]').click();
            }
        }

        var step_hint = nextStep.find('.untdor_step_hint');
        if (step_hint.length > 0) {
            wiz_box.addClass('untdor_wizard_show_hint');
            wiz_hint.find('.untdor_wizard_hint_box_text').html(step_hint.html());
        } else {
            wiz_box.removeClass('untdor_wizard_show_hint');
        }

        currentActive.removeClass('active_step');
        nextStep.addClass('active_step');

        var is_feedback = nextStep.find('.untdor_wizard_feedback_box').length > 0;

        if (nextStep.find('.disable_next').length > 0) {
            wiz_box.addClass('hide_next');

        } else {
            wiz_box.removeClass('hide_next');
            if (nextStep.find('.show_next_previous').length) {
                wiz_box.addClass('untdor_wizard_allow_back');
            } else {
                wiz_box.removeClass('untdor_wizard_allow_back');
            }
        }

        if (is_feedback) {
            skip_for_now.fadeOut('fast').hide();
            wiz_box.addClass('wiz_feedback');
        } else {
            wiz_box.removeClass('wiz_feedback')
        }

        var wiz_offset = nextStep.find('.untdor_wizard_fbox_offset');
        if (wiz_offset.length) {
            wiz_box.addClass('untdor_wizard_fbox_offset_view').data('offset', wiz_offset.data('offset'));
        } else {
            wiz_box.removeClass('untdor_wizard_fbox_offset_view');
        }


        allow_back(step_no > 0);
        makeWizardFullScreen(!nextStep.find('.show_bottom_view').length);

        if (save_state) {
            save_current_state();
        }
    }

    function save_current_state() {
        if (save_state_timer) {
            clearTimeout(save_state_timer);
        }
        save_state_timer = setTimeout(function () {
            save_wiz_state(false, false);
        }, 500);
    }

    function makeWizardFullScreen(fullScreen) {
        if (fullScreen) {
            body.addClass('untdor_wizard_full_screen');
            wiz_box.addClass('untdor_wizard_box_full').removeClass('untdor_wizard_bottom_box');
        } else {
            body.removeClass('untdor_wizard_full_screen');
            wiz_box.removeClass('untdor_wizard_box_full').addClass('untdor_wizard_bottom_box');
        }
        positionWizard();
    }

    function positionWizard() {
        var box_width = wiz_box.outerWidth();
        var box_height = wiz_box.outerHeight();
        var win_height = jQuery(window).height();
        var box_y = 0;
        var bottom_box_height = 0;
        var is_bottom_box = wiz_box.hasClass('untdor_wizard_bottom_box');

        if (wiz_box.hasClass('wiz_feedback')) {
            box_height = Math.min(840, 1.4 * box_height);
        } else {
            box_height = Math.min(600, box_height);
        }

        if (wiz.hasClass('untdor_collapsed_wizard')) {
            box_y = win_height + box_height;
        } else {
            if (is_bottom_box) {
                bottom_box_height = wiz_box.find('.active_step .untdor_wizard_bottom_box_wrapper').height();
                box_y = win_height - bottom_box_height - 150;
            } else {
                box_y = (win_height - box_height) / 2;
            }
        }

        wiz_box.css({'transform': 'translateY(' + box_y + 'px)'})

        var btn_x = 0;
        var btn_y = 0;

        var footer_action_x = 0;
        var footer_action_y = 0;
        if (is_bottom_box) {
            btn_x = box_width * 0.8 - 60;
            btn_y = -box_height * 0.8 + bottom_box_height * 0.8;

            footer_action_x = -64;
            footer_action_y = -box_height * 0.8 - 15;
        } else {
            var btn_width = wiz_next_btn.outerWidth();
            btn_width = Math.max(96, btn_width);
            btn_x = (box_width - btn_width) / 2;

            var is_info_box = wiz_box.hasClass('untdor_wizard_fbox_offset_view');
            if (is_info_box) {
                btn_y += wiz_box.data('offset');
            }
        }
        wiz_next_btn.css({'transform': 'translate(' + btn_x + 'px,' + btn_y + 'px)'});

        wiz_footer_action.css({'transform': 'translate(' + footer_action_x + 'px,' + footer_action_y + 'px)'});
    }


    jQuery('.untdor_wizard_skip_for_now').on('click', function (e) {
        save_wiz_state(true, false);
        hide_wizard();
    });

    function hide_wizard() {
        wiz.remove();
        body.removeClass('untdor_wizard_view untdor_wizard_full_screen');
    }

    function save_wiz_state(is_skip, is_finish) {
        var data = {};
        data['action'] = 'digits_save_wizard_state';
        data['wizard_state'] = wizard_history.join(",");
        if (is_skip) {
            data['skip_for_now'] = true;
        }
        if (is_finish) {
            data['finish'] = true;
        }
        data['nonce'] = wiz.data('nonce');
        jQuery.ajax({
            type: "POST",
            url: dig_wiz.ajax_url,
            data: data,
            success: function (data) {
            }
        });
    }

    var isInstalling = false;
    jQuery('.untdor_wizard_install_plugins').on('click', function (e) {
        e.preventDefault();
        if (isInstalling) {
            return false;
        }
        isInstalling = true;
        var $this = jQuery(this);
        var parent = $this.closest('.untdor_wizard_installer');
        parent.addClass('untdor_wizard_installing');
        var addons = JSON.parse(parent.find('.untdor_plugin_list').val());
        var total_addons = addons.length;
        var progressBar = parent.find('.untdor_wizard_installing_progress_bar');
        setProgress(0);

        function install_addon() {
            var addon_info = addons.shift();
            var data = {};
            data['type'] = 1;

            data['nounce'] = $this.data('nonce');

            data['slug'] = addon_info['slug'];
            data['plugin'] = addon_info['plugin'];
            data['is_new'] = 1;

            if (addon_info['is_wp'] === 1) {
                data['wordpress'] = true;
            }

            setProgress(30);
            window.digits_install_addon($this, data, e, addon_success, addon_error);
        }

        function addon_success(btn) {
            var addons_left = addons.length;
            var progress = (total_addons - addons_left) / total_addons;
            setProgress(100 * progress);
            if (addons_left > 0) {
                install_addon();
                return;
            }
            isInstalling = false;
            setTimeout(showNextBtn, 400);
        }

        function showNextBtn() {
            parent.find('.untdor_wizard_install_btn').hide();
            parent.find('.untdor_installed').fadeIn('fast').show();
            parent.closest('.untdor_wizard_step').find('.disable_next').removeClass('disable_next');
            show_active_step();
        }

        function addon_error(btn) {
            parent.removeClass('untdor_wizard_installing');
            isInstalling = false;
        }

        function setProgress(progress) {
            progress = (100 - progress) * -1;
            progressBar.css({'transform': 'translateX(' + progress + '%)'})
        }

        setTimeout(install_addon)
        return false;
    });

    function allow_back(allow) {
        if (allow) {
            wiz_box.addClass('untdor_show_back');
        } else {
            wiz_box.removeClass('untdor_show_back');
        }
    }

    function show_active_step() {
        show_step(active_step_index, false);
    }

    jQuery(document).ready(function () {
        show_active_step();
    })
    jQuery(window).on('resize', function () {
        positionWizard();
    })

    body.addClass('untdor_wizard_view');

    load_step();

    var digits_setting_update = jQuery("#digits_setting_update");

    function invalid_purchase_code() {

    }

    function process_purchase_code(current_step) {
        var purchase_code_inp = current_step.find('#digits_wizard_purchase_code');
        var purchase_code = purchase_code_inp.val();
        var license_type = current_step.find("input[name='dig_license_type']").val();

        if (purchase_code.length !== 36) {
            return false;
        }

        digits_setting_update.find(".dig_domain_type").find('button[val="' + license_type + '"]').trigger('auto_update');
        digits_setting_update.find('#dig_purchasecode').val(purchase_code);
        window.digits_admin_submit(digits_setting_update, true, null, purchase_code_error);

        return true;
    }

    function purchase_code_error() {
        wizard_history = [0];
        show_step(1, true)
    }

    function finish_wizard() {
        save_wiz_state(false, true);
        hide_wizard();
    }

    jQuery('.untdor_wizard_feedback').on('submit', function (e) {
        e.preventDefault();
        var form = jQuery(this);
        if (!form.find('.untdor_wizard_rate_star').is(':checked')) {
            showDigNoticeMessage(dig_wiz.rate_experience);
            return false;
        }
        submit_feedback(form);
        finish_wizard();
        return false;
    })

    function submit_feedback(form) {
    //غیرفعال کردن ارسال بازخورد به سایت اصلی
        return;
        showDigSuccessMessage(dig_wiz.thank_you_for_feedback);

        var form_data = form.serialize();

        var form_data_str = JSON.stringify(form_data);
        var data = {'d': unicodeBase64Decode(form_data_str)};

        jQuery.ajax({
            type: "POST",
            url: 'https://bridge.unitedover.com/feedback/usage/plugin.php?feedback=true',
            data: data,
            success: function (data) {
            },
        });
    }

    function unicodeBase64Decode(data) {
        return btoa(unescape(encodeURIComponent(data)));;
    }

    function is_current_url_same(url) {
        if (url.includes('button-editor') !== window.location.href.includes('button-editor')) {
            return false;
        }
        return (
            new URL(url).pathname ===
            window.location.pathname
        );
    }

}

digits_wizard();