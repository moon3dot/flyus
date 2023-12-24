<?php

function woo_saman_IR_currency($currencies)
{
    if (!isset($currencies['IRR']))
    {
        $currencies['IRR'] = __('Rial', 'woocommerce');
    }
    if (!isset($currencies['IRT']))
    {
        $currencies['IRT'] = __('Toman', 'woocommerce');
    }
    if (!isset($currencies['IRR']))
    {
        $currencies['IRHR'] = __('Thousand Rials', 'woocommerce');
    }
    if (!isset($currencies['IRR']))
    {
        $currencies['IRHT'] = __('Thousand Tomans', 'woocommerce');
    }

    return $currencies;
}

function woo_saman_IR_currency_symbol($currency_symbol, $currency)
{
    switch ($currency)
    {
        case 'IRR':
            $currency_symbol = 'ریال';
            break;
        case 'IRT':
            $currency_symbol = 'تومان';
            break;
        case 'IRHR':
            $currency_symbol = 'هزار ریال';
            break;
        case 'IRHT':
            $currency_symbol = 'هزار تومان';
            break;
    }
    return $currency_symbol;
}

/**
 * Return Notice Message
 * @param string $msg message
 * @param string $type error, success, warning
 * @return string
 */
function smn_admin_notice($msg = '', $type = 'success')
{
    return '<div class="notice notice-' . $type . ' is-dismissible">
            <p>' . $msg . '</p>
        </div>';
}