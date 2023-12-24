<?php

if (!defined('ABSPATH'))
{
    die('Access denied!');
}

class HMA_Licence
{

    static $check_url = 'https://guard.zhaket.com/api/';

    public static function on_activation()
    {
        if (!wp_next_scheduled('wcsmn_validate'))
        {
            wp_schedule_event(time(), 'daily', 'wcsmn_validate');
        }
    }

    public static function on_deactivation()
    {
        wp_clear_scheduled_hook('wcsmn_validate');
    }

    public static function init()
    {
        register_deactivation_hook(SAMAN_PLUGIN_FILE, array(__CLASS__, 'on_deactivation'));
        register_activation_hook(SAMAN_PLUGIN_FILE, array(__CLASS__, 'on_activation'));

        add_action('admin_init', function () {
            if (current_user_can('activate_plugins'))
            {
                self::register_plugin();
            }
        });

        add_action('wcsmn_validate', array(__CLASS__, 'do_validate_daily'));
    }

    public static function getUserLicence()
    {
        return get_option('ham3da_smn_license_token', '0');
    }

    /**
     * Check License is Valid or No
     * @return boolean|int if License is Valid return true else false and if error return 0
     */
    public static function CheckSavedLicenseisValid()
    {
        $license_token = get_option('ham3da_smn_license_token', '0'); // Your license token
        $result = self::isValid($license_token);
        if (isset($result->status))
        {
            if ($result->status == 'successful')
            {
                return true;
            } else
            {
                // License not valid / show message
                if (!is_object($result->message))
                {
                    // License is Invalid
                    return false;
                } else
                {
                    return -1;
                }
            }
        } else
        {
            return -2;
        }
    }

    /**
     *  Check licence from Zhaket.com every day
     */
    public static function do_validate_daily()
    {
        $active_state = self::check_activation();
        if ($active_state && SMN_HAM3DA != 1)
        {
            $plugin_data = get_plugin_data(SAMAN_PLUGIN_FILE);
            //check licence online
            $LicenseisValid = self::CheckSavedLicenseisValid();
            if ($LicenseisValid === false)
            {
                update_option('owwpp_ac_smn_xx', '0');
                $admin_email = get_option('admin_email');

                $subject = __("Saman Kish Gateway License Expiration", 'wc_smn');
                $plName = $plugin_data['Name'];

                $dir = is_rtl() ? 'rtl' : 'ltr';
                $message = '<p dir="' . $dir . '">' . sprintf(__('Hi, dear user, %s Plugin License has expired on your site. Please reactivate it.', 'wc_smn'), $plName) . '</p>';
                $message .= '<p dir="' . $dir . '">' . sprintf(__('If you think this is a mistake, please contact %s support.', 'wc_smn'), '<a href="https://www.zhaket.com/">zhaket.com/</a>') . '</p>';
                $site_url = get_site_url();
                $message .= '<p><a href="' . $site_url . '">' . $site_url . '</a></p>';
                $message = apply_filters('smn_alert_licence', $message);
                $headers = array('Content-Type: text/html; charset=UTF-8');
                wp_mail($admin_email, $subject, $message, $headers);
            }
        }
    }

    /**
     * Register license and return result as array
     * @param string $license_token User License
     * @return array 'res' => boolean, 'msg'=> string
     */
    public static function install_validate($license_token)
    {
        //57b53e4b-05b7-4f0f-8602-918f93f9a6ae
        $produc_token = '57b53e4b-05b7-4f0f-8602-918f93f9a6ae'; // Your product token
        /*
          @param1 : license_token
          @param2 : product_token
          replace it with your own license token and product token :)
         */
        $result = self::install($license_token, $produc_token);

        if (!isset($result->status))
        {
            return array('res' => false, 'msg' => __('Error checking license status!', 'wc_smn'));
        }

        if ($result->status == 'successful')
        {
            //echo $result->message; // License installed successful
            update_option('ham3da_smn_license_token', $license_token);
            update_option('owwpp_ac_smn_xx', '1');

            return array('res' => true, 'msg' => $result->message);
        } else
        {
            update_option('owwpp_ac_smn_xx', '0');

            // License not installed / show message
            if (!is_object($result->message))
            {
                // License is Invalid
                //echo $result->message;
                return array('res' => false, 'msg' => $result->message);
            } else
            {
                $message_res = "";
                foreach ($result->message as $message)
                {
                    foreach ($message as $msg)
                    {
                        $message_res .= $msg . '<br/>';
                    }
                }
                return array('res' => false, 'msg' => $message_res);
            }
        }
    }

    public static function register_plugin()
    {
        $ac = filter_input(INPUT_POST, 'action');

        $user_licence = filter_input(INPUT_POST, 'user_licence');
        if ($ac == 'smn_check_register' && $user_licence != null)
        {
            $res = self::install_validate($user_licence);
            $result = $res['res'] ?? false;
            if (!$result)
            {
                $result_msg = $res['msg'] ?? __('Error checking license status!', 'wc_smn');
                add_action('admin_notices', function () use($result_msg) {
                    echo smn_admin_notice($result_msg, 'warning');
                });
            }
        }
    }

    public static function check_activation()
    {
        $active_state = get_option('owwpp_ac_smn_xx', '0');
        if (intval($active_state) === 1 || SMN_HAM3DA === 1)
        {
            return true;
        } else
        {
            return false;
        }
    }

    //-------------------------------------------------
    // This method sends GET request to specific url and returns the result
    public static function sendRequest($method, $params = array())
    {
        $param_string = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_setopt($ch, CURLOPT_URL, self::$check_url . $method . '?' . $param_string);
        $content = curl_exec($ch);
        return json_decode($content);
    }

    //-------------------------------------------------
    public static function isValid($license_token)
    {
        $result = self::sendRequest('validation-license', array('token' => $license_token, 'domain' => self::getHost()));
        return $result;
    }

    //-------------------------------------------------
    public static function install($license_token, $product_token)
    {

        $result = self::sendRequest('install-license', array('product_token' => $product_token, 'token' => $license_token, 'domain' => self::getHost()));
        return $result;
    }

    //-------------------------------------------------
    public static function getHost()
    {
        $host = parse_url(get_site_url(), PHP_URL_HOST);
        $host = preg_replace('/:\d+$/', '', $host);
        $host = str_ireplace('www.', '', $host);
        return trim($host);
    }

}
