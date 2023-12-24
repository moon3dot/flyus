<?php
if (!defined('ABSPATH'))
{
    die("access denied!");
}



function smn_show_active_note()
{
    $user = wp_get_current_user();
    $plName = __("WC Saman kish", 'wc_smn');
    $msg = sprintf(__('Hi %s, to Register %s Plugin click %s.', 'wc_smn'), $user->display_name, "<b>" . $plName . "</b>", '<a href="' . admin_url('admin.php?page=smn_active') . '">' . __('Here', 'wc_smn') . '</a>');
    if (isset($_GET['page']) && $_GET['page'] == 'smn_active')
    {
        //
    } else
    {
        echo smn_admin_notice($msg, 'warning');
    }
}

add_action('admin_init', 'smn_do_check_validate');

/**
 *  Check licence from db
 */
function smn_do_check_validate()
{
    $active_state = HMA_Licence::check_activation();
    if (!$active_state)
    {
        add_action('admin_notices', 'smn_show_active_note');
    }
}

/**
 * Register a custom menu page.
 */
function smn_admin_menu_func()
{
    add_menu_page(
            __('Saman kish', 'wc_smn'),
            __('Saman kish', 'wc_smn'),
            'manage_options',
            'smn_active',
            'smn_activation_page',
            'dashicons-unlock'
    );
}

add_action('admin_menu', 'smn_admin_menu_func');
add_action('admin_enqueue_scripts', 'smn_admin_style');

function smn_admin_style()
{
    wp_enqueue_style('smn_style', SAMAN_WOO_URL . "assets/admin.css", array());
}

function smn_activation_page()
{
    $plugin_data = get_plugin_data(SAMAN_PLUGIN_FILE);

    $active_state = HMA_Licence::check_activation();
    $license_token = HMA_Licence::getUserLicence();
    if (!empty($license_token))
    {
        $license_token = $license_token;
    }

    $curr_tab = $_GET['tab'] ?? 'main';

    $main_params = array('page' => 'smn_active', 'tab' => 'main');
    $products_params = array('page' => 'smn_active', 'tab' => 'products');
    $tabs = array(
        'main' => ['url' => add_query_arg($main_params, admin_url('admin.php')), 'title' => __('Activation', 'wc_smn')],
        'products' => ['url' => add_query_arg($products_params, admin_url('admin.php')), 'title' => __('More products', 'wc_smn')],
    );
    ?>
<div class="wrap">
    <h1><?= $plugin_data['Name'] ?></h1>
    <nav class="nav-tab-wrapper">
        <?php
        foreach ($tabs as $key => $tab_item)
        {
            ?>
            <a href="<?= esc_url($tab_item['url']) ?>" class="nav-tab <?= ($curr_tab == $key) ? 'nav-tab-active' : '' ?>"><?= $tab_item['title'] ?></a>
            <?php
        }
        ?>
    </nav>
    <?php
    if (file_exists(SAMAN_WOO_DIR . "inc/tabs/$curr_tab.php"))
    {
        include SAMAN_WOO_DIR . "inc/tabs/$curr_tab.php";
    }
    ?>
</div>
    <?php
    
}
