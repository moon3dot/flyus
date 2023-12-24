<?php

if (!class_exists('ham3da_Card_Utility'))
{

    /**
     * Utility class for payment card
     */
    class ham3da_Card_Utility
    {

        function __construct()
        {
            
        }

        /**
         * Get Card Number posted from bank
         * @param number $number
         * @param int $start substring from 0 to this number
         * @param int $end substring from end ex:-4
         * @return string
         */
        public static function get_bank_card_num($number, $start, $end)
        {
            $res = "";
            if (!empty($number))
            {
                $res = substr($number, 0, $start) . substr($number, $end);
            }
            return $res;
        }

        /**
         * Check User Payment Bank Card for Verify
         * @param int $user_id user id
         * @param string $card_num card number
         * @param int $start substring from 0 to this number
         * @param int $end substring from end ex:-4
         * @return boolean return true if Card is  Verified and else return false 
         */
        public static function check_user_card_number($user_id, $card_num, $start = 6, $end = -4)
        {
            $res = false;
            $cart_no = preg_replace('/\D/', '', $card_num);

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
                    $saved_card_num = self::get_bank_card_num($number, $start, $end);
                    if (intval($cart_no) == intval($saved_card_num))
                    {
                        $res = true;
                        break;
                    }
                }
            }
            if ($res != true)
            {
                $user_cards = get_user_meta($user_id, 'billing_cards_number', true);
                if (!empty($user_cards))
                {
                    $user_cards_number1 = json_decode($user_cards);
                    foreach ($user_cards_number1 as $card)
                    {
                        $number = preg_replace('/\D/', '', $card->value);
                        $saved_card_num = self::get_bank_card_num($number, $start, $end);
                        if (intval($cart_no) == intval($saved_card_num))
                        {
                            $res = true;
                            break;
                        }
                    }
                }
            }
            return $res;
        }

        public static function formatCreditCard($cc)
        {
            $cc_length = strlen($cc);
            $newCreditCard = substr($cc, -4);
            for ($i = $cc_length - 5; $i >= 0; $i--)
            {
                // ADDS HYPHEN HERE
                if ((($i + 1) - $cc_length) % 4 == 0)
                {
                    $newCreditCard = '-' . $newCreditCard;
                }
                $newCreditCard = $cc[$i] . $newCreditCard;
            }

            return $newCreditCard;
        }

        public static function formatCreditCard2($cc)
        {
            $cc = preg_replace('/\D/', '', $cc);
            $cc_length = strlen($cc);

            $newCreditCard = substr($cc, -4);

            for ($i = $cc_length - 5; $i >= 0; $i--)
            {
                if ((($i + 1) - $cc_length) % 4 == 0)
                {
                    $newCreditCard = '-' . $newCreditCard;
                }
                $newCreditCard = $cc[$i] . $newCreditCard;
            }
            for ($i = 10; $i < $cc_length - 2; $i++)
            {
                if ($newCreditCard[$i] == '-')
                {
                    continue;
                }
                $newCreditCard[$i] = 'X';
            }


            return $newCreditCard;
        }

        public static function wc_admin_od_detailes($order)
        {
            $order = new WC_Order($order->get_id());
            $billing_card_number = $order->get_meta('_billing_card_number');
            if (!empty($billing_card_number))
            {
                echo
                '<div class="card-detailes">'
                . '<p><strong>' . __('Selected card number', 'wc_smn') . ':</strong> ' . self::formatCreditCard($billing_card_number) . '</p>'
                . '</div>';
            }

            $PrimaryAccNo = get_post_meta($order->get_id(), 'PrimaryAccNo', true);
            if (!empty($PrimaryAccNo))
            {
                echo
                '<div class="card-detailes">'
                . '<p><strong>' . __('Payment card number', 'wc_smn') . ':</strong> <span dir="ltr">' . self::formatCreditCard($PrimaryAccNo) . '</span></p>'
                . '</div>';
            }

            $status_card = get_post_meta($order->get_id(), 'PrimaryAccNoStatus', true);
            if (!is_null($status_card) && $status_card != "")
            {
                $status_text = (intval($status_card) == 1 ) ? __('Payment with a confirmed card', 'wc_smn') : __('Payment with an unverified card', 'wc_smn');
                echo
                '<div class="card-detailes">'
                . '<p><strong>' . __('Payment status', 'wc_smn') . ':</strong>' . $status_text . '</p>'
                . '</div>';
            }
        }

        public static function card_number_user_table($column)
        {
            $column['card_status'] = __('Card number', 'wc_smn');
            return $column;
        }

        public static function card_number_user_table_row($val, $column_name, $user_id)
        {
            if ($column_name == 'card_status')
            {
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
                        $number = preg_replace('/\D/', '', $card->value);
                        $user_cards_number[$number] = self::formatCreditCard($number);
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
                            $user_cards_number[$number] = self::formatCreditCard($number);
                        }
                    }
                }
                $value = implode('<br>', $user_cards_number);
                return $value;
            }
            return $val;
        }

    }

}

if (has_action('woocommerce_admin_order_data_after_billing_address', 'ham3da_Card_Utility::wc_admin_od_detailes') === false)
{
    add_action('woocommerce_admin_order_data_after_billing_address', 'ham3da_Card_Utility::wc_admin_od_detailes', 10, 1);
}


if (has_filter('manage_users_columns', 'ham3da_Card_Utility::card_number_user_table') === false)
{
    add_filter('manage_users_columns', 'ham3da_Card_Utility::card_number_user_table');
}


if (has_filter('manage_users_custom_column', 'ham3da_Card_Utility::card_number_user_table_row') === false)
{
    add_filter('manage_users_custom_column', 'ham3da_Card_Utility::card_number_user_table_row', 10, 3);
}
