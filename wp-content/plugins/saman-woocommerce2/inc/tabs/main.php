<div class="wrap wcpl_export_users">
    <form id="reg_wcpl_form" method="post">
        <input type="hidden" name="action" id="action" value="smn_check_register" />
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label><?= __('Status', 'wc_smn') ?></label>
                    </th>
                    <td>
                        <p>
                            <?php
                            $input_status = "";
                            if ($active_state)
                            {
                                $input_status = 'readonly="readonly"';
                                echo '<span style="color:green;">';
                                _e('Congratulations! This plugin is active.', 'wc_smn');
                                echo '</span>';
                            } else
                            {
                                $input_status = "";
                                echo '<span style="color:red;">';
                                _e('This plugin requires a license to use it.', 'wc_smn');
                                echo '</span>';
                            }
                            ?>  
                        </p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="user_licence"><?= __('License Key', 'wc_smn') ?></label>
                    </th>
                    <td>
                        <input <?= $input_status ?> name="user_licence" id="user_licence" type="text" class="regular-text code" value="<?= $license_token ?>" />
                        <p class="description"><span class="dashicons dashicons-warning"></span> 
                            <?php
                            printf(__('When you purchase this product from %s, a license key is assigned to your order and you can see it in your User Panel.', 'wc_smn'), '<a href="https://www.zhaket.com/dashboard/">zhaket.com</a>');
                            ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
        if (!$active_state)
        {
            ?>   
            <div class="btn_div">
                <?php
                submit_button(__('Submit', 'wc_smn'), 'large', 'wcpl_submit', false);
                ?>
                &nbsp;<img id="loading_pb" style="width: 28px; display: none;" src="<?php echo admin_url('images/spinner-2x.gif') ?>" />
            </div>
            <?php
        } else
        {
            ?>   
            <div class="btn_div">
                <button type="button" class="button-primary"><a style="color: white; text-decoration: unset;" href="<?php echo admin_url( 'admin.php?page=wc-settings&tab=checkout&section=wc_samankish' ); ?>"><?= __('Gateway settings', 'wc_smn');?></a></button>
            </div>
            <?php
        }
        ?>

        <p style="display: none;" id="red_dialog"></p> 
        <p class="version">
            <?php printf(__('Version: %s', 'wc_smn'), $plugin_data['Version'])   ?>
        </p>

    </form>
</div>