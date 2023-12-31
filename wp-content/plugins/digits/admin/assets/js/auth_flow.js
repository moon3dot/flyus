jQuery(function () {
    var main_wrapper = jQuery('.digits_admin_login_auth_editor');
    var auth_template = jQuery('#digits_admin_auth-template').html();
    var auth_wrapper = jQuery('.digits_admin_user_auth_steps');
    var user_based_auth_wrapper = jQuery('.digits_admin_user_based_auth_steps');
    var auth_flow_value = jQuery('#digits_auth_flow');
    var user_based_auth_flow_value = jQuery('#digits_auth_user_based_flow');
    var user_based_flow_inp = jQuery('#digits_user_based_flow_enable');
    var update_auth_flow = true;

    jQuery(document).on('change', '.digits_admin_toggle_auth_step input', function (e) {
        var $this = jQuery(this);
        var col = $this.closest('td');
        var step_no = col.data('step');
        var isChecked = false;

        var container = $this.closest('.digits_admin_user_auth_steps_wrapper');

        if ($this.is(":checked")) {
            isChecked = true;
        }

        if (step_no === 2) {
            var step_3 = container.find('.dig_enable_3fa_auth');
            if (!isChecked) {
                step_3.prop("checked", false).trigger('change');
                step_3.closest('tr').hide();
                auth_disable_step(3, $this);
            } else {
                step_3.closest('tr').show();
            }
        }


        var step = container.find('.digits_admin_auth_step_' + step_no);
        var step_row = step.closest('tr');
        if (isChecked) {
            step_row.show();
        } else {
            step_row.hide();
            auth_disable_step(step_no, $this);
        }
        auth_update_settings_field($this);
    });

    jQuery(document).on('change update', '.digits_auth_available_steps input', function (e) {
        var update_type = e.type;

        var $this = jQuery(this);
        var td = $this.closest('td');
        var table = td.closest('table');
        var value = $this.val();

        var inputs = table.find('input[value="' + value + '"]:not(:checked)');
        var inputs_wrapper = inputs.closest('div');

        var isChecked = false;
        if ($this.is(":checked")) {
            isChecked = true;
        }

        if (update_type === 'change' && !isChecked) {
            var step = td.data('step');
            if (step === 1) {
                var checked = td.find('input:checked');
                if (checked.length === 0) {
                    $this.prop("checked", true).trigger('change');
                    showDigNoticeMessage(digsetobj.require_one_authorisation_method);
                    return false;
                }
            }
        }

        if (isChecked) {
            inputs_wrapper.hide();
        } else {
            inputs_wrapper.show();
        }
        auth_update_settings_field($this);
        return false;
    })

    user_based_flow_inp.on('change', function (e) {
        if (jQuery(this).is(':checked')) {
            auth_wrapper.hide();
            user_based_auth_wrapper.fadeIn();
        } else {
            user_based_auth_wrapper.hide();
            auth_wrapper.fadeIn();
        }
    });

    function is_user_based_flow() {
        return user_based_flow_inp.is(':checked');
    }

    function auth_update_settings_field(elem) {
        if (!update_auth_flow) {
            return;
        }

        var user_based_flow = is_user_based_flow();
        if (user_based_flow) {
            update_userbased_flow();
        } else {
            var container = elem.closest('.digits_admin_login_flow_bx');
            if (container.data('type') === 'universal') {
                var data = auth_get_settings(container);
                enableSave();
                auth_flow_value.val(JSON.stringify(data))
            }
        }
    }

    function auth_get_settings(container) {

        var basic = container.find('.digits_admin_auth_basic_info');
        var data = {};
        var one_fa_methods = auth_get_checked_inputs(container, 1);

        if (one_fa_methods.length === 0) {
            return false;
        }
        data['1fa'] = {
            'enable': true,
            'methods': one_fa_methods
        };
        var data_2fa = {
            'enable': basic.find('.dig_enable_2fa_auth').is(":checked"),
            'methods': auth_get_checked_inputs(container, 2),
        };

        var data_3fa = {
            'enable': basic.find('.dig_enable_3fa_auth').is(":checked"),
            'methods': auth_get_checked_inputs(container, 3),
        };

        data['2fa'] = data_2fa;
        data['3fa'] = data_3fa;

        return data;
    }

    function auth_get_checked_inputs(container, step_no) {
        var wrapper = container.find('.digits_admin_user_auth_steps_wrapper');
        var class_name = 'digits_admin_auth_step_' + step_no;
        var auth_elem = wrapper.find("." + class_name);
        if (!auth_elem) {
            return '';
        }
        return auth_elem.find("input:checked").map(function () {
            return jQuery(this).val();
        }).get();
    }

    function auth_disable_step(step_no, elem) {
        var container = elem.closest('.digits_admin_user_auth_steps_wrapper');
        var class_name = 'digits_admin_auth_step_' + step_no;
        update_auth_flow = false;
        container.find("." + class_name).find("input:checked").prop("checked", false).trigger('change');
        update_auth_flow = true;
        auth_update_settings_field(elem);
    }

    function initialise_auth(auth_wrapper, auth_data, show_user_selector) {

        if (!auth_data) {
            auth_data = JSON.parse(auth_flow_value.val().replace(/\\/g, ""));
        }
        var data_1fa = auth_data['1fa'];
        var data_2fa = auth_data['2fa'];
        var data_3fa = auth_data['3fa'];
        auth_enable_multi_steps(auth_wrapper, 1, data_1fa['methods']);
        auth_enable_multi_steps(auth_wrapper, 2, data_2fa['methods']);
        auth_enable_multi_steps(auth_wrapper, 3, data_3fa['methods']);
        auth_wrapper.find('.dig_enable_2fa_auth').prop('checked', data_2fa['enable']).trigger('change');
        auth_wrapper.find('.dig_enable_3fa_auth').prop('checked', data_3fa['enable']).trigger('change');

        if (show_user_selector) {

            var user_selector = auth_wrapper.find('.digits_admin_auth_user_selector').find('select');
            if (auth_data['users'] && auth_data['users'] !== 'all') {
                var selected_users = auth_data['users'];
                Object.keys(selected_users).forEach(function (key) {
                    var label = selected_users[key];
                    user_selector.append('<option value="' + key + '" selected>' + label + '</option>');
                });
            }


            digits_settings_select(user_selector);
            user_selector.trigger('update_label')
        } else {
            auth_wrapper.find('.digits_admin_auth_user_selector').closest('tr').remove();
        }
    }

    function auth_enable_multi_steps(container, step_no, values) {
        if (!values) {
            return false;
        }
        var class_name = 'digits_admin_auth_step_' + step_no;
        var step_container = container.find('.' + class_name);
        values.forEach(function (value) {
            step_container.find('input[value="' + value + '"]').prop("checked", true).trigger('change');
        });
    }


    function enableSave() {
        allowUpdateSettings();
    }

    function allowUpdateSettings() {
    /**/
        if(jQuery("#dig_purchasecode").length == 0) jQuery(window).trigger('digits_admin_save');
        jQuery(".dig_admin_submit").removeAttr("disabled");
    }


    var login_flows = document.getElementById('digits_admin_ub_login_flows');
    var sort = Sortable.create(login_flows, {
        handle: '.digits_rearrange',
        onChange: function (evt) {
            update_userbased_flow();
        }
    });

    jQuery(document).on('click', '.digits_flow_delete', function (e) {
        var box = jQuery(this).closest('.digits_admin_ub_login_flow_box');
        box.slideUp('fast', function () {
            jQuery(this).remove();
            update_userbased_flow();
        });
        return false;
    });
    jQuery(document).on('click', '.digits_flow_toggle_active', function (e) {
        var box = jQuery(this).closest('.digits_admin_ub_login_flow_box');
        make_flow_active(box, true);
        return false;
    });

    jQuery(document).on('change update_label', '.digits_flow_user_select', function (e) {
        var box = jQuery(this).closest('.digits_admin_ub_login_flow_box');
        var selected = jQuery(this).find("option:selected");
        var selected_text = selected.toArray().map(function (item) {
            return item.text;
        }).join(", ");

        box.find('.digits_admin_ub_login_flow_label').text(selected_text);
        if (e.type !== 'update_label') {
            update_userbased_flow();
        }
    })

    jQuery(document).on('click', '.digits_admin_add_login_flow', function (e) {
        create_flow(false, true, false);
        return false;
    });

    var user_flow_temp = jQuery('#digits_admin_ub_flow_all_users');

    function create_flow(all_users, make_active, auth_data) {

        var user_flow = user_flow_temp;
        if (!all_users) {
            user_flow = user_flow.clone();
            user_flow.removeAttr('id').removeClass('digits_admin_ub_login_flow_all_users');
            user_flow.find('.digits_admin_ub_login_flow_label').text('');
        }

        user_flow.find('.digits_admin_ub_login_flow_body').html(auth_template);
        user_flow.find(".dig_admin_switch").each(function (e) {
            var input_box = jQuery(this);
            var id = 'random_' + Math.random();
            input_box.find('label').attr('for', id);
            input_box.find('input').attr('id', id);
        })

        if (!all_users) {
            user_flow.appendTo(login_flows);
        }

        initialise_auth(user_flow, auth_data, !all_users);

        if (make_active) {
            make_flow_active(user_flow, false);
        }
    }

    function make_flow_active(flow, isToggle) {
        var isCurrentFlowActive = flow.hasClass('digits_active_flow');
        make_active_flow_inactive();
        if (!isCurrentFlowActive || !isToggle) {
            flow.addClass('digits_active_flow').find('.digits_admin_ub_login_flow_body').slideDown('fast', function () {
                scrollToFlow(flow);
            });

        }
    }

    function make_active_flow_inactive() {
        var curr_active_flow = main_wrapper.find('.digits_active_flow');
        curr_active_flow.find('.digits_admin_ub_login_flow_body').slideUp();
        curr_active_flow.removeClass('digits_active_flow');
    }

    var updateFlowTimer = null;

    function update_userbased_flow() {
        clearTimeout(updateFlowTimer);
        updateFlowTimer = setTimeout(_update_userbased_flow, 100);
    }

    function _update_userbased_flow() {
        var user_auth_flow = [];
        main_wrapper.find('.digits_admin_ub_login_flow_box').each(function () {
            var $this = jQuery(this);
            var users = false;
            if ($this.hasClass('digits_admin_ub_login_flow_all_users')) {
                users = 'all';
            } else if ($this.find('.digits_flow_user_select').first().length > 0) {
                var selected_users = $this.find('.digits_flow_user_select').find(":selected");
                if (selected_users && selected_users.length > 0) {
                    users = {};
                    selected_users.each(function () {
                        users[this.value] = this.text
                    })
                }
            }

            if (!users) {
                return;
            }

            var data = auth_get_settings($this);

            if (!data) {
                return;
            }

            data['users'] = users;
            user_auth_flow.push(data);
        });

        user_based_auth_flow_value.val(JSON.stringify(user_auth_flow));
        enableSave();
    }

    function initialise_user_flow() {
        var flows = JSON.parse(user_based_auth_flow_value.val().replace(/\\/g, ""));
        jQuery.each(flows, function (i, flow) {
            var all_users = flow['users'] === 'all';
            create_flow(all_users, false, flow);
        })
    }

    if (auth_wrapper.length) {
        update_auth_flow = false;
        auth_wrapper.html(auth_template);
        initialise_user_flow();
        initialise_auth(auth_wrapper, false, false);
        update_auth_flow = true;
    }

    function scrollToFlow(elem) {
        jQuery('html, body').stop().animate({
            scrollTop: elem.offset().top - 100
        }, 300);
    }
});