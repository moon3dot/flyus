<?php

if (!class_exists('ham3daWooPaymentUtility'))
{

    /**
     * Woocommerce Payment Utility by ham3da.ir
     */
    class ham3daWooPaymentUtility
    {

        private $check_card;
        private $gateway_id;

        /**
         * 
         * @param string $pyg_id gateway id
         * @param string $check_card check card yes or no
         */
        function __construct($pyg_id = '', $check_card = 'no')
        {
            $this->gateway_id = $pyg_id;
            $this->check_card = $check_card;
        }

        public function init()
        {
            // Hook in
            add_filter('woocommerce_checkout_fields', array($this, 'wc_checkout_fields_sadad_def'));
            add_filter('woocommerce_customer_meta_fields', array($this, 'wc_customer_meta_fields_sadad_def'));
            add_action('woocommerce_checkout_process', array($this, 'wc_checkout_process_sadad_woo_def'));
        }

// Our hooked in function - $fields is passed via the filter!
        function wc_checkout_fields_sadad_def($fields)
        {
            if ($this->check_card == 'yes' && !isset($fields['billing']['billing_card_number']))
            {
                $user_id = get_current_user_id();
                $user_cards_number = array();

                $send_cardnum1 = get_post_meta($user_id, '_send_cardnum', true);
                $send_cardnumo = get_post_meta($user_id, '_send_cardnumo', true);
                $send_cardnumt = get_post_meta($user_id, '_send_cardnumt', true);

                $send_cardnum = array();
                if (!empty($send_cardnum1))
                {
                    $send_cardnum[] = $send_cardnum1;
                }

                if (!empty($send_cardnumo))
                {
                    $send_cardnum[] = $send_cardnumo;
                }

                if (!empty($send_cardnumt))
                {
                    $send_cardnum[] = $send_cardnumt;
                }

                if (!empty($send_cardnum))
                {
                    $user_cards_number1 = $send_cardnum;
                    foreach ($user_cards_number1 as $card)
                    {
                        $number = preg_replace('/\D/', '', $card);
                        $user_cards_number[$number] = ham3da_Card_Utility::formatCreditCard2($number);
                    }
                }
                if (count($user_cards_number) <= 0)
                {

                    $user_cards = get_user_meta($user_id, 'billing_cards_number', true);
                    if (!empty($user_cards))
                    {
                        $user_cards_number1 = json_decode($user_cards);
                        foreach ($user_cards_number1 as $card)
                        {
                            $number = preg_replace('/\D/', '', $card->value);
                            $user_cards_number[$number] = ham3da_Card_Utility::formatCreditCard2($number);
                        }
                    }
                }


                $fields['billing']['billing_card_number']['placeholder'] = false;
                $fields['billing']['billing_card_number']['label'] = __('Bank card', 'wc_smn');
                $fields['billing']['billing_card_number']['input_class'] = array('billing_card_number', 'card_select');
                $fields['billing']['billing_card_number']['type'] = "select";
                $fields['billing']['billing_card_number']['required'] = false;
                $fields['billing']['billing_card_number']['options'] = $user_cards_number;
            }

            return $fields;
        }

        function wc_customer_meta_fields_sadad_def($show_fields)
        {
            if (current_user_can('administrator') && !isset($show_fields['billing']['fields']['billing_cards_number']))
            {
                $show_fields['billing']['fields']['billing_cards_number'] = array(
                    'placeholder' => __('Enter card number', 'wc_smn'),
                    'label' => __('Card number', 'wc_smn'),
                    'description' =>
                    __('Enter the number of cards allowed for payment numerically without a dash. Like: 6037798090911012. <b>Separator:</b>Enter And comma(,)', 'wc_smn'),
                    'class' => 'sadad_cards_number',
                );
            }
            return $show_fields;
        }

        function wc_checkout_process_sadad_woo_def()
        {
            $payment_method = filter_input(INPUT_POST, 'payment_method');
            if ($this->check_card == 'yes' && $payment_method == $this->gateway_id)
            {
                $billing_card_number = filter_input(INPUT_POST, 'billing_card_number');
                if (empty($billing_card_number))
                {
                    wc_add_notice(__('Card number not entered!', 'wc_smn'), 'error');
                }
            }
        }

    }

}