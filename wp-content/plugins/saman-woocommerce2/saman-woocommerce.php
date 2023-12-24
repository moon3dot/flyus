<?php

/*
  Plugin Name: WC Saman kish
  Version: 2.9.0
  Description:  This plugin adds Saman Kish payment gateway to WooCommerce.
  Plugin URI: https://ham3da.ir/
  Author: Javad Ehteshami
  Author URI: https://ham3da.ir/
  Text Domain: wc_smn
  Domain Path: lang
  WC requires at least: 5.0.0
  WC tested up to: 7.9.0
 */

if (!defined('ABSPATH'))
{
    exit();
}

define('SAMAN_PLUGIN_FILE', __FILE__);
define("SAMAN_WOO_DIR", plugin_dir_path(__FILE__));
define("SAMAN_WOO_URL", plugin_dir_url(__FILE__));
define("SAMAN_WOO_ID", 'WC_SamanKish');
define("SMN_HAM3DA", 0);

require_once( SAMAN_WOO_DIR . 'inc/functions.php' );
require_once( SAMAN_WOO_DIR . 'inc/card_functions.php' );
require_once( SAMAN_WOO_DIR . 'inc/card_custom_feild.php' );

require_once SAMAN_WOO_DIR . 'inc/licence.php';
HMA_Licence::init();

require_once SAMAN_WOO_DIR . 'inc/admin.php';

add_action('plugins_loaded', function () {
    load_plugin_textdomain('wc_smn', false, basename(dirname(__FILE__)) . '/lang');
});

add_action('admin_enqueue_scripts', 'saman_woo_admin_init');

function saman_woo_admin_init() {
    wp_enqueue_script("sadad_woo_js", SAMAN_WOO_URL . "assets/tagify/tagify.js");
    wp_enqueue_script("sadad_woo_js2", SAMAN_WOO_URL . "assets/tagify/jQuery.tagify.min.js", array('jquery'));
    wp_enqueue_script("sadad_woo_admin_js", SAMAN_WOO_URL . "assets/admin_jscode.js", array('jquery'));
    wp_enqueue_style('sadad_woo', SAMAN_WOO_URL . "assets/tagify/tagify.css");
    wp_enqueue_style('sadad_woo_admin2', SAMAN_WOO_URL . "assets/admin_style.css");
}

function saman_woo_site_init() {

    if (wp_script_is('selectWoo', 'enqueued'))
    {
        wp_enqueue_script("sadad_woo_user_js", SAMAN_WOO_URL . "assets/user_jscode.js", array('jquery'));
    }
    wp_enqueue_style('sadad_woo_user', SAMAN_WOO_URL . "assets/user_style.css");
}

add_action('wp_enqueue_scripts', 'saman_woo_site_init');

function Load_SamanKish_Gateway() {

    if (class_exists('WC_Payment_Gateway') && !class_exists('WC_SamanKish') &&
            !function_exists('Woocommerce_Add_SamanKish_Gateway'))
    {

        function Woocommerce_Add_SamanKish_Gateway($methods) {
            $methods[] = 'WC_SamanKish';
            return $methods;
        }

        add_filter('woocommerce_payment_gateways', 'Woocommerce_Add_SamanKish_Gateway');
        add_filter('woocommerce_currencies', 'woo_saman_IR_currency');
        add_filter('woocommerce_currency_symbol', 'woo_saman_IR_currency_symbol', 10, 2);

        class WC_SamanKish extends WC_Payment_Gateway
        {

            public static function loadLibrary() {
                $settings = get_option('woocommerce_' . SAMAN_WOO_ID . '_settings');

                $check_card = isset($settings['check_card']) ? $settings['check_card'] : 'no';
                $ham3daWooPaymentUtility = new ham3daWooPaymentUtility(SAMAN_WOO_ID, $check_card);
                $ham3daWooPaymentUtility->init();
            }

            private $terminal, $TranType;
            public $ssl_version, $check_card, $send_phone, $order_pay_show;

            public function __construct() {

                $this->author = 'ham3da.ir';
                $this->id = SAMAN_WOO_ID;
                $this->method_title = __('Saman Kish', 'wc_smn');
                $this->method_description = __('Saman Kish redirects customers to Shaparak for payment.', 'wc_smn');

                $this->has_fields = false;

                $this->init_form_fields();
                $this->init_settings();

                $this->icon = apply_filters('wc_sep_logo', $this->get_ico_url());

                $this->title = $this->get_option('title', '');
                $this->description = $this->get_option('description', '');

                $this->terminal = $this->get_option('terminal', '');
                $this->TranType = $this->get_option('TranType', 'Government');
                 
                $this->send_phone = $this->get_option('send_phone', 'no');

                $this->order_pay_show = $this->get_option('order_pay_show', 'yes');
                $this->check_card = $this->get_option('check_card', 'no');

                $this->ssl_version = $this->get_option('ssl_version', 'default');

                $this->success_massage = $this->get_option('success_massage', '');
                $this->failed_massage = $this->get_option('failed_massage', '');
                $this->cancelled_massage = $this->get_option('cancelled_massage', '');

                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

                add_action('woocommerce_receipt_' . $this->id . '', array($this, 'request_payment_step'));
                add_action('woocommerce_api_' . strtolower(get_class($this)) . '', array($this, 'verify_payment_step'));
                add_filter('woocommerce_hidden_order_itemmeta', array($this, 'custom_woocommerce_hidden_order_itemmeta'), 10, 1);
                //remove order item meta key
                add_filter('woocommerce_order_item_get_formatted_meta_data', array($this, 'order_item_get_formatted_meta_data'), 10, 1);
            }

            function get_ico_url() {

                $icon = $this->get_option('sep_logo', null);
                $url = SAMAN_WOO_URL . 'assets/images/logo.png';
                if (!empty($icon))
                {
                    $url = $icon;
                }
                return $url;
            }

            public function custom_woocommerce_hidden_order_itemmeta($arr) {
                $arr[] = 'WC_SamanKish_OID';
                $arr[] = 'WC_SamanKish_RefNum';
                $arr[] = 'WC_SamanKish_TRACENO';
                $arr[] = '_transaction_id';
                $arr[] = 'PrimaryAccNo';
                $arr[] = 'PrimaryAccNoStatus';
                return $arr;
            }

            function order_item_get_formatted_meta_data($formatted_meta) {
                $temp_metas = [];
                foreach ($formatted_meta as $key => $meta)
                {
                    if (isset($meta->key) && !in_array($meta->key, [
                                'WC_SamanKish_OID',
                                'WC_SamanKish_RefNum',
                                'WC_SamanKish_TRACENO',
                                '_transaction_id',
                                'PrimaryAccNo',
                                'PrimaryAccNoStatus'
                            ]))
                    {
                        $temp_metas[$key] = $meta;
                    }
                }
                return $temp_metas;
            }

            public function admin_options() {
                parent::admin_options();
            }

            public function init_form_fields() {

                $icon = $this->get_ico_url();
                $this->form_fields = apply_filters('WC_SamanKish_Config', array(
                    'base_confing' => array(
                        'title' => __('Saman Kish Settings', 'wc_smn'),
                        'type' => 'title',
                        'description' => '',
                    ),
                    'enabled' => array(
                        'title' => __('Enable/Disable', 'wc_smn'),
                        'type' => 'checkbox',
                        'label' => __('Enable Saman Kish payment method', 'wc_smn'),
                        'default' => 'yes',
                    ),
                    'title' => array(
                        'title' => __('Title', 'wc_smn'),
                        'type' => 'text',
                        'description' => __('This controls the title which the user sees during checkout.', 'wc_smn'),
                        'default' => __('Saman Kish', 'wc_smn'),
                        'desc_tip' => true,
                    ),
                    'description' => array(
                        'title' => __('Description', 'wc_smn'),
                        'type' => 'text',
                        'desc_tip' => true,
                        'description' => __('This controls the description which the user sees during checkout.', 'wc_smn'),
                        'default' => __('Secure payment with Saman Kish payment gateway', 'wc_smn'),
                    ),
                    'terminal' => array(
                        'title' => __('Merchant code', 'wc_smn'),
                        'type' => 'text',
                        'description' => __('Merchant code has been sent to you by Saman Kish.', 'wc_smn'),
                        'default' => '',
                        'desc_tip' => false
                    ),
                    'TranType' => array(
                        'type' => 'select',
                        'title' => __('Account type', 'wc_smn'),
                        'description' => __('Choose the Account type.', 'wc_smn'),
                        'options' => array(
                            'normal' => __('Normal', 'wc_smn'),
                            'Government' => __('Governmental', 'wc_smn'),
                        ),
                        'default' => 'normal',
                    ),
                    'PortionsInfo' => array(
                        'title' => __('Settlement account numbers:', 'wc_smn'),
                        'type' => 'textarea',
                        'class' => 'regular-text code',
                        'description' => '✔️ '. __('If your account is a government account or you have requested to settle the transaction to several accounts, you must complete this option. otherwise leave blank.', 'wc_smn')
                        .'<br>✔️ '.__('In each line, enter the information of an account number.', 'wc_smn')
                        .'<br>✔️ ' . __('Format: IBAN (1) - Percentage (2) - Payment ID (3)', 'wc_smn') 
                        .'<br>✔️ ' . __('Example:', 'wc_smn') . '<br>IR980150000000012345678901-70-0<br>IR990150000000012345678902-30-0'
                        .'<br>✔️ ' . __('The sum of the percentages must be equal to 100.', 'wc_smn')
                        
                    ),
                    'order_pay_show' => array(
                        'title' => __('Pre-invoice', 'wc_smn'),
                        'type' => 'checkbox',
                        'label' => __('Show pre-invoice', 'wc_smn'),
                        'default' => 'yes',
                    ),
                    'send_phone' => array(
                        'title' => __('Sync with mobile', 'wc_smn'),
                        'type' => 'checkbox',
                        'label' => __('Sync with mobile', 'wc_smn'),
                        'description' => __('Send mobile number to gateway to save card number', 'wc_smn'),
                        'default' => 'no',
                        'desc_tip' => false,
                    ),
                    'ssl_version' => array(
                        'type' => 'select',
                        'title' => __('Ciphers to use for SSL', 'wc_smn'),
                        'description' => __('Choose the encryption method compatible with your host.', 'wc_smn'),
                        'options' => array(
                            'default' => __('Default', 'wps'),
                            'TLSv1' => 'TLSv1',
                            'RC4-SHA' => 'RC4-SHA',
                            'SHA1+DES' => 'SHA1+DES'
                        ),
                        'default' => 'default',
                    ),
                    'check_card' => array(
                        'title' => __('Check card number', 'wc_smn'),
                        'type' => 'checkbox',
                        'label' => __('Enable', 'wc_smn'),
                        'description' => __('‌If this option is enabled, the user can only buy with the cards defined by the site administrator in user profile, and if user pays with other cards, user order will be checked.', 'wc_smn'),
                        'default' => 'no',
                        'desc_tip' => false,
                    ),
                    'sep_logo' => array(
                        'title' => __('Gateway logo', 'wc_smn'),
                        'type' => 'text',
                        'desc_tip' => false,
                        'description' => __('Logo URL', 'wc_smn'),
                        'class' => 'code',
                        'default' => $icon,
                    ),
                    'success_massage' => array(
                        'title' => __('Successful payment message', 'wc_smn'),
                        'type' => 'textarea',
                        'description' => __('Available variables:<br/>
                                            <strong>%Transaction_id%</strong> : Transaction id<br/>
                                            <strong>%Order_Number%</strong> : Order Number<br/>
                                            <strong>%RefNum%</strong> : Reference number', 'wc_smn'),
                        'default' => __('Your order has been paid successfully.', 'wc_smn'),
                    ),
                    'failed_massage' => array(
                        'title' => __('Unsuccessful payment message', 'wc_smn'),
                        'type' => 'textarea',
                        'description' => __('Available variables: %fault% : Error message', 'wc_smn'),
                        'default' => __('Payment failed. %fault%', 'wc_smn'),
                    ),
                    'cancelled_massage' => array(
                        'title' => __('Canceled payment message', 'wc_smn'),
                        'type' => 'textarea',
                        'default' => __('Payment canceled.', 'wc_smn'),
                    ),
                        )
                );
            }

            public function process_payment($order_id) {
                $order = new WC_Order($order_id);
                return array(
                    'result' => 'success',
                    'redirect' => $order->get_checkout_payment_url(true)
                );
            }

            /**
             * 
             * @param type $Amount
             * @return type
             */
            function get_SettlementPortions($Amount) {
                $portions = $this->get_option("PortionsInfo", null);
                $res = null;
                if (!empty($portions))
                {
                    $all_lines = explode(PHP_EOL, $portions);
                    if (!empty($all_lines))
                    {
                        foreach ($all_lines as $one_line)
                        {
                            $one_line_info = explode('-', $one_line);

                            $present = isset($one_line_info[1]) ? floatval($one_line_info[1]) : 0;
                            $amountB = $Amount / 100 * $present;

                            $sheba = !empty($one_line_info[0]) ? trim($one_line_info[0]) : null;

                            $paymentId = !empty($one_line_info[2]) ? trim($one_line_info[2]) : "";

                            $res[] = ['IBAN' => $sheba, 'Amount' => $amountB, 'PurchaseId' => $paymentId];
                        }
                    }
                }
                return $res;
            }

            /**
             * 
             * @param array $param
             * @return array
             */
            public function getToken($param = array()) {
                $TerminalID = $param['TerminalID'];
                $RedirectURL = $param['RedirectURL'];
                $Resnum = $param['Resnum'];
                $Amount = $param['Amount'];
                $CellNumber = "";
                if (isset($param['CellNumber']))
                {
                    $CellNumber = $param['CellNumber'];
                }

                $General_address = 'https://sep.shaparak.ir/OnlinePG/OnlinePG';

                $post = array(
                    'Action' => 'Token',
                    'TerminalId' => $TerminalID,
                    'Amount' => $Amount,
                    'ResNum' => $Resnum,
                    'RedirectUrl' => $RedirectURL,
                );
                if (isset($param['CellNumber']))
                {
                    $post["CellNumber"] = $CellNumber;
                }

                $SettlementIbanInfo = $this->get_SettlementPortions($Amount);

                if ($this->TranType == 'Government')
                {
                    $post["TranType"] = $this->TranType;
                }

                if ($SettlementIbanInfo)
                {
                    $post['SettlementIbanInfo'] = $SettlementIbanInfo;
                }


                $data_string = json_encode($post);

                $curl = curl_init();

                $options = array(
                    CURLOPT_URL => $General_address,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_ENCODING => "",
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $data_string,
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: application/json"
                    ),
                );

                if ($this->ssl_version != 'default')
                {
                    $options[CURLOPT_SSL_CIPHER_LIST] = $this->ssl_version;
                    $options[CURLOPT_SSLVERSION] = CURL_SSLVERSION_MAX_DEFAULT;
                }

                curl_setopt_array($curl, $options);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);
                $Token = json_decode($response);
                if ($err)
                {
                    $output = (object) array("errorDesc" => "cURL Error #:" . $err);
                    return array('res' => false, 'token' => $output);
                }
                else
                {

                    if (isset($Token->token))
                    {
                        return array('res' => true, 'token' => $Token->token);
                    }
                    else
                    {
                        return array('res' => false, 'token' => $Token);
                    }
                }
            }

            public function request_payment_step($order_id) {

                $active_state = HMA_Licence::check_activation();
                if (!$active_state)
                {
                    echo '<p>';
                    _e('Payment gateway license not registered!', 'wc_smn');
                    echo '</p>';
                    return;
                }

                $order = new WC_Order($order_id);

                $currency = $order->get_currency();

                $form = '<form action="" method="POST" class="SamanKish-checkout-form" id="SamanKish-checkout-form">
				<input type="submit" name="SamanKish_submit" class="button alt" id="SamanKish-payment-button" value="' . __('Pay', 'wc_smn') . '"/>
				<a class="button cancel" href="' . wc_get_checkout_url() . '">' . __('Back', 'wc_smn') . '</a>
			</form>
                     <br/>';
                $form = apply_filters('WC_SamanKish_Form', $form, $order_id);

                $show_faktor = false;
                if ($this->order_pay_show == 'yes')
                {
                    $show_faktor = true;
                }
                else
                {
                    $show_faktor = false;
                }

                if (isset($_POST["SamanKish_submit"]))
                {
                    $show_faktor = false;
                }


                if ($show_faktor == true)
                {
                    if (!isset($_POST["SamanKish_submit"]))
                    {

                        do_action('WC_SamanKish_Gateway_Before_Form', $order_id);
                        echo $form;
                        do_action('WC_SamanKish_Gateway_After_Form', $order_id);
                    }
                }
                else
                {
                    echo '<p>' . __('Connecting to the payment gateway', 'wc_smn') . ' ...</p>';
                }


                if ($show_faktor == false)
                {

                    $Amount = intval($order->get_total());
                    $Amount = $this->calc_amount($Amount, $currency);

                    do_action('WC_SamanKish_Gateway_Payment', $order_id);

                    $terminalId = $this->terminal;

                    $phone = $order->get_billing_phone();

                    $orderId = time();

                    update_post_meta($order_id, 'WC_SamanKish_OID', $orderId);

                    $callBackUrl = add_query_arg('wc_order', $order_id, WC()->api_request_url('WC_SamanKish'));

                    $params = array();

                    $params['TerminalID'] = $terminalId;
                    $params['RedirectURL'] = $callBackUrl;
                    $params['Resnum'] = $orderId;
                    $params['Amount'] = $Amount;

                    if ($this->send_phone == 'yes' && WC_Validation::is_phone($phone))
                    {
                        $params['CellNumber'] = $phone;
//                        if ($this->check_card == 'yes')
//                        {
//                            $params['CheckIfNationalCodeMatchesPan'] = true;
//                        }
                    }

                    $token = $this->getToken($params);

                    if ($token['res'] == true)
                    {
                        do_action('WC_SamanKish_Before_Send_to_Gateway', $order_id);

                        $General_address = 'https://sep.shaparak.ir/OnlinePG/OnlinePG';
                        echo "<form action='" . $General_address . "' method='post' id='SendParameter'>"
                        . "<input type='hidden' name='Token' value='" . $token['token'] . "'/></form>"
                        . "<script type=\"text/javascript\">"
                        . "document.getElementById('SendParameter').submit();"
                        . "</script>";
                    }
                    else
                    {

                        // stdClass Object ( [status] => -1 [errorCode] => 12 [errorDesc] => شماره ترمینال ارسالی معتبر نیست. ) 

                        $res = $token['token'];

                        $err = $res->errorDesc ?? "";

                        $Note = __('Error connecting to payment gateway ', 'wc_smn') . $err;
                        wc_add_notice($Note, 'error');

                        $order->add_order_note(print_r($res, true));

                        do_action('WC_SamanKish_Send_to_Gateway_Failed', $order_id, $token['token']);

                        $url = wc_get_checkout_url();
                        wp_safe_redirect($url);
                    }
                }
            }

            public function calc_amount($Amount, $currency) {

                if (strtolower($currency) == strtolower('IRT'))
                {
                    $Amount = $Amount * 10;
                }
                else if (strtolower($currency) == strtolower('IRHT'))
                {
                    $Amount = $Amount * 1000 * 10;
                }
                else if (strtolower($currency) == strtolower('IRHR'))
                {
                    $Amount = $Amount * 1000;
                }
                else if (strtolower($currency) == strtolower('IRR'))
                {
                    $Amount = $Amount * 1;
                }

                return $Amount;
            }

            public function verify_payment($terminalId, $RefNum) {
                $curl = curl_init();

                $options = array(
                    CURLOPT_URL => "https://sep.shaparak.ir/verifyTxnRandomSessionkey/ipg/VerifyTranscation",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_ENCODING => "",
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\n  \"TerminalNumber\": \"" . $terminalId . "\",\n  \"RefNum\": \"" . $RefNum . "\",\n  \"CellNumber\":\"\",\n  \"NationalCode\" : \"\",\n  \"IgnoreNationalcode\" : true\n}\n\n",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: application/json"
                    ),
                );

                if ($this->ssl_version != 'default')
                {
                    $options[CURLOPT_SSL_CIPHER_LIST] = $this->ssl_version;
                    $options[CURLOPT_SSLVERSION] = CURL_SSLVERSION_MAX_DEFAULT;
                }
                curl_setopt_array($curl, $options);
                $counter = 0;
                $err = null;
                do
                {
                    $response = curl_exec($curl);
                    $curl_errno = curl_errno($curl);
                    $counter++;
                }
                while ($curl_errno && $counter < 5);

                if ($curl_errno)
                {
                    $err = curl_error($curl);
                }
                curl_close($curl);

                $Result = json_decode($response);
                if ($curl_errno)
                {
                    return ['res' => false, 'ResultCode' => null, 'ResultDescription' => "cURL Error #:" . $err];
                }
                else
                {

                    if (isset($Result->ResultCode))
                    {
                        if ($Result->ResultCode == 0)
                        {

                            return ['res' => true,
                                'ResultCode' => $Result->ResultCode,
                                'MaskedPan' => $Result->TransactionDetail->MaskedPan,
                                'RefNum' => $Result->TransactionDetail->RefNum,
                                'RRN' => $Result->TransactionDetail->RRN,
                                'AffectiveAmount' => $Result->TransactionDetail->AffectiveAmount,
                                'Amount' => $Result->TransactionDetail->OrginalAmount,
                                'ResultDescription' => $Result->ResultDescription,
                                'StraceNo' => $Result->TransactionDetail->StraceNo,
                            ];
                        }
                        else
                        {
                            return ['res' => false, 'ResultCode' => $Result->ResultCode,
                                'ResultDescription' => $Result->ResultDescription];
                        }
                    }
                    else
                    {
                        return ['res' => false, 'ResultCode' => null,
                            'ResultDescription' => __('Unknown error', 'wc_smn')];
                    }
                }
            }

            public function verify_payment_step() {
                $order_id = filter_input(INPUT_GET, 'wc_order');
                $check_card_res = true;
                if ($order_id)
                {
                    $order = new WC_Order($order_id);
                    $currency = $order->get_currency();
                    $currency = apply_filters('WC_SamanKish_Currency', $currency, $order_id);

                    if ($order->get_status() != 'completed' && $order->get_status() != 'processing')
                    {
                        $Amount = intval($order->get_total());
                        $Amount = $this->calc_amount($Amount, $currency);
                        $terminalId = $this->terminal;
                        //need for settle
                        //$orderid = $order_id;.
                        $transaction_id = '';
                        $RefNum = filter_input(INPUT_POST, 'RefNum');

                        update_post_meta($order_id, 'WC_SamanKish_RefNum', $RefNum);

                        $OID = get_post_meta($order_id, 'WC_SamanKish_OID', true);
                        //------
                        $State = filter_input(INPUT_POST, 'State');

                        $description = "";

                        if (strtolower($State) == "ok")
                        {
                            $rev_to_u = 0;
                            $res = $this->verify_payment($terminalId, $RefNum);

                            $paid_amount = $res['Amount'] ?? '';
                            $description = $res['ResultDescription'] ?? '';
                            $fault = $res['ResultCode'] ?? null;

                            if ($res['res'] == true)
                            {

                                $paid_amount = $res['Amount'] ?? '';
                                $fault = $res['ResultCode'];
                                $CardHolderPan1 = $res['MaskedPan'];
                                $transaction_id = $res['StraceNo'];
                                $RRN = $res['RRN'];
                                update_post_meta($order_id, 'CardHolderPan', $CardHolderPan1);
                                update_post_meta($order_id, 'WC_SamanKish_TRACENO', $RRN);
                                update_post_meta($order_id, 'SMN_OrginalAmount', $paid_amount);
                                update_post_meta($order_id, 'SMN_StraceNo', $transaction_id);

                                if (intval($paid_amount) == $Amount)
                                {
                                    $status_b = 'completed';
                                }
                                else
                                {
                                    $status_b = 'notequal';
                                    //مبلغ اولیه و ثانویه برابر نیست
                                }
                            }
                            else
                            {
                                $status_b = 'failed';
                            }
                        }// $_POST['State'] != "OK"
                        else
                        {
                            $status_b = 'cancelled';
                            $fault = $State;
                        }

                        $SaleOrderId = isset($OID) ? $OID : 0;
                        if ($status_b == 'completed')
                        {

                            $PrimaryAccNo = filter_input(INPUT_POST, 'SecurePan');
                            update_post_meta($order_id, 'PrimaryAccNo', $PrimaryAccNo);
                            if ($this->check_card == 'yes')
                            {
                                $c_number = preg_replace('/\D/', '', $PrimaryAccNo);
                                $user_id = $order->get_user_id();
                                $check_card_res = ham3da_Card_Utility::check_user_card_number($user_id, $c_number);
                            }

                            if ($check_card_res)
                            {
                                ######payment complete####
                                $order->payment_complete($transaction_id);
                                ######payment complete####
                                update_post_meta($order_id, 'PrimaryAccNoStatus', '1');

                                $Note = sprintf(__('Payment was successful.<br>Transaction id : %s <br>Order id: %s<br>Amount paid: %s', 'wc_smn'), $transaction_id, $SaleOrderId, $paid_amount);
                            }
                            else
                            {
                                ######payment on hold####
                                $order->update_status('on-hold',
                                        __('Awaiting review due to payment with unregistered card.', 'wc_smn'));
                                ######payment on hold####
                                update_post_meta($order_id, 'PrimaryAccNoStatus', '0');
                                $Note = sprintf(__('Payment has been made successfully, but due to the discrepancy of the payment card number, it needs to be checked and confirmed. <br/>Transaction id: %s <br>Order id: %s<br>Amount paid: %s', 'wc_smn'), $transaction_id, $SaleOrderId, $paid_amount);
                            }
                            $order->add_order_note($Note);
                            $Notice = wpautop(wptexturize($this->success_massage));

                            $arr1 = array("%Transaction_id%", "%Order_Number%", "%RefNum%");
                            $arr2 = array($transaction_id, $SaleOrderId, $RefNum);
                            $Notice = str_replace($arr1, $arr2, $Notice);

                            if ($Notice)
                            {
                                if ($check_card_res)
                                {
                                    wc_add_notice($Notice, 'success');
                                }
                                else
                                {
                                    $Notice = sprintf(__('Payment has been made successfully, but due to the discrepancy of the payment card number, it needs to be checked and confirmed. <br/>Transaction id: %s <br>Order id: %s', 'wc_smn'), $transaction_id, $SaleOrderId);
                                    wc_add_notice($Notice, 'notice');
                                }
                            }

                            wc_empty_cart();
                            if ($check_card_res)
                            {
                                wp_redirect(add_query_arg('wc_status', 'success', $this->get_return_url($order)));
                            }
                            else
                            {
                                wp_redirect(add_query_arg('wc_status', 'on-hold', $this->get_return_url($order)));
                            }
                            exit();
                        }
                        elseif ($status_b == 'failed')
                        {
                            //failed
                            $Note = sprintf('Error returning from payment gateway: %s', $this->Fault_SamanKish($fault, $description));
                            if ($Note)
                            {
                                $order->add_order_note($Note);
                            }
                            $Notice = wpautop(wptexturize($this->failed_massage));
                            $Notice = str_replace("%fault%", $this->Fault_SamanKish($fault, $description), $Notice);
                            if ($Notice)
                            {
                                wc_add_notice($Notice, 'error');
                            }
                            wp_redirect(wc_get_checkout_url());
                            exit();
                        }
                        elseif ($status_b == 'cancelled')
                        {
                            $tr_id = ( $transaction_id && $transaction_id != 0 ) ? ('<br/>' . __('Transaction id: ', 'wc_smn') . $transaction_id) : '';
                            $sale_order_id = ( $SaleOrderId && $SaleOrderId != 0 ) ? ('<br/>' . __('Order id: ', 'wc_smn') . $SaleOrderId) : '';

                            $Note = sprintf('Payment canceled. %s %s', $tr_id, $sale_order_id);
                            if ($Note)
                            {
                                $order->add_order_note($Note);
                            }


                            $Notice = wpautop(wptexturize($this->cancelled_massage));

                            $arr1 = array("%Transaction_id%", "%Order_Number%");
                            $arr2 = array($transaction_id, $SaleOrderId);

                            $Notice = str_replace($arr1, $arr2, $Notice);
                            if ($Notice)
                            {
                                wc_add_notice($Notice, 'error');
                            }

                            wp_redirect(wc_get_checkout_url());
                            exit();
                        }
                        elseif ($status_b == 'notequal')
                        {
                            $tr_id = ( $transaction_id && $transaction_id != 0 ) ? ('<br/>' . __('Transaction id: ', 'wc_smn') . $transaction_id) : '';
                            $sale_order_id = ( $SaleOrderId && $SaleOrderId != 0 ) ? ('<br/>' . __('Order id: ', 'wc_smn') . $SaleOrderId) : '';
                            $Note = sprintf('Error returning from payment gateway: %s %s %s', $this->Fault_SamanKish($fault, $description), $tr_id, $sale_order_id) . '- مبلغ اولیه و ثانویه برابر نیستند.';
                            if ($Note)
                            {
                                $order->add_order_note($Note);
                            }

                            $Notice = wpautop(wptexturize($this->failed_massage));

                            $arr1 = array("%Transaction_id%", "%Order_Number%");
                            $arr2 = array($transaction_id, $SaleOrderId);

                            $Notice = str_replace($arr1, $arr2, $Notice);
                            $Notice = str_replace("%fault%", $this->Fault_SamanKish($fault, $description), $Notice);
                            if ($Notice)
                            {
                                wc_add_notice($Notice, 'error');
                            }
                            if ($rev_to_u == 0)
                            {
                                $Rev_Note = __('The amount paid by the user will be refunded through the payment gateway.', 'wc_smn');
                                $order->add_order_note($Rev_Note);
                            }
                            else if ($rev_to_u == 1)
                            {
                                $Rev_Note = __('A system error occurred while refuning the amount, the amount will be refunded to the user\'s account within 24 hours.', 'wc_smn');

                                $order->add_order_note($Rev_Note);
                            }
                            wp_redirect(wc_get_checkout_url());
                            exit();
                        }
                    }
                    else //قبلاً پرداخت شده
                    {

                        $transaction_id = get_post_meta($order_id, '_transaction_id', true); //get_post_meta($order_id, '_transaction_id', true);
                        $RefNum = get_post_meta($order_id, 'WC_SamanKish_RefNum', true); //get_post_meta($order_id, 'WC_SamanKish_RefNum', true);
                        $SaleOrderId = $order_id;
                        $Notice = wpautop(wptexturize($this->success_massage));

                        $arr1 = array("%Transaction_id%", "%Order_Number%", "%RefNum%");
                        $arr2 = array($transaction_id, $SaleOrderId, $RefNum);

                        $Notice = str_replace($arr1, $arr2, $Notice);

                        if ($Notice)
                        {
                            wc_add_notice($Notice, 'success');
                        }
                        wp_redirect(add_query_arg('wc_status', 'success', $this->get_return_url($order)));
                        exit();
                    }
                }
                else //شماره سفارش یافت نشد
                {
                    $fault = __('There is no order number.', 'wc_smn');
                    $Notice = wpautop(wptexturize($this->failed_massage));
                    $Notice = str_replace("%fault%", $fault, $Notice);

                    if ($Notice)
                    {
                        wc_add_notice($Notice, 'error');
                    }
                    wp_redirect(wc_get_checkout_url());
                    exit();
                }
            }

            private static function Fault_SamanKish($err_code, $description) {
                return __('Error Code: ', 'wc_smn') . $err_code . ' | ' . __('Description: ', 'wc_smn') . $description;
            }

        }

        WC_SamanKish::loadLibrary();
    }
}

add_action('plugins_loaded', 'Load_SamanKish_Gateway', 11);
