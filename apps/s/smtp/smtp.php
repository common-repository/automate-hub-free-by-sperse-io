<?php

use PHPMailer\PHPMailer\PHPMailer;

class AWP_SMTP extends Appfactory
{
    public function init_actions()
    {
    }

    public function init_filters()
    {
    }

    public function settings_tab($tabs)
    {
        $tabs['smtp'] = array('name' => esc_html__('SMTP', 'automate_hub'), 'cat' => array('crm'));
        return $tabs;
    }

    public function load_custom_script()
    {
    }

    public function save_account_details()
    {
        if (!current_user_can('administrator')) {
            die(esc_html__('You are not allowed to save changes!', 'automate_hub'));
        }

        // Security Check
        if (!wp_verify_nonce($_POST['_nonce'], 'awp_smtp_save_account_details')) {
            die(esc_html__('Security check Failed', 'automate_hub'));
        }

        $account_details = json_encode(
            [
                'awp_smtp_encryption' => isset($_POST["awp_smtp_encryption"]) ? sanitize_text_field($_POST["awp_smtp_encryption"]):'',
                "awp_smtp_host" => isset($_POST["awp_smtp_host"])? sanitize_text_field($_POST["awp_smtp_host"]):'',
                "awp_smtp_port" => isset($_POST["awp_smtp_port"])? (int) sanitize_text_field($_POST["awp_smtp_port"]):'',
                "awp_smtp_auth" => (isset($_POST["awp_smtp_auth"]) && sanitize_text_field($_POST["awp_smtp_auth"]) == "on" )? true : false,
                "awp_smtp_username" => isset($_POST["awp_smtp_username"]) ? sanitize_text_field($_POST["awp_smtp_username"]) :'',
                "awp_smtp_password" => isset($_POST["awp_smtp_password"]) ? sanitize_text_field($_POST["awp_smtp_password"]) :'',
                "awp_smtp_display_name" => isset($_POST["awp_smtp_display_name"]) ? sanitize_text_field($_POST["awp_smtp_display_name"]) :'',
                "awp_smtp_from_email" => isset($_POST["awp_smtp_from_email"]) ? sanitize_text_field($_POST["awp_smtp_from_email"]):'',
            ],
            true
        );

        $platform = new AWP_Platform_Shell_Table('smtp');
        $platform->save_platform(
            [
                'api_key' => $account_details, "account_name" => isset($_POST["awp_smtp_identifier"]) ? sanitize_text_field($_POST["awp_smtp_identifier"]):'',
            ]
        );
        AWP_redirect("admin.php?page=automate_hub&tab=smtp");
    }

    public function action_provider($providers)
    {
        $providers['smtp'] = [
            'title' => esc_html__('SMTP', 'automate_hub'),
            'tasks' => array(
                'send_email' => esc_html__('Send Email', 'automate_hub'),
            ),
        ];

        return $providers;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'smtp') {
            return;
        }
        $nonce = wp_create_nonce("awp_smtp_save_account_details");
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $account_name = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/smtp" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/smtp.png'); ?>" width="258" height="50" alt="smtp"></a><br /><br />
            <div id="introbox">
                See the instructions below to setup SMTP:
                <br />
            </div>
            <br />
            <form action='admin-post.php' method="post">
                <input type="hidden" name="action" value="awp_smtp_save_account_details">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)) ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('Account Identifier', 'automate_hub'); ?></th>
                        <td>
                            <input type="text" name="awp_smtp_identifier" id="awp_smtp_identifier"  required placeholder="<?php esc_html_e('Enter Account Identifier', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_smtp_identifier"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                    <h3><?php esc_html_e('SMTP Account Details', 'automate_hub'); ?></h3>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('Encryption', 'automate_hub'); ?></th>
                        <td>
                            <div class="awp_smtp_radios">
                                <label for="awp_smtp_none">
                                    <input name="awp_smtp_encryption" type="radio" id="awp_smtp_none" value="" checked="checked">
                                    None
                                </label>

                                <label for="awp_smtp_ssl">
                                    <input type="radio" id="awp_smtp_ssl" name="awp_smtp_encryption" value="ssl">
                                    SSL
                                </label>

                                <label for="awp_smtp_ttl">
                                    <input type="radio" id="awp_smtp_ttl" name="awp_smtp_encryption" value="tls">
                                    TLS
                                </label>

                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('SMTP Host', 'automate_hub'); ?></th>
                        <td>
                            <input type="text" name="awp_smtp_host" id="awp_smtp_host" value="" required placeholder="<?php esc_html_e('Enter SMTP Host', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_smtp_host"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('SMTP Port', 'automate_hub'); ?></th>
                        <td>
                            <input type="text" name="awp_smtp_port" id="awp_smtp_port" value="" required placeholder="<?php esc_html_e('Enter SMTP Port', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_smtp_port"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('SMTP Auth', 'automate_hub'); ?></th>
                        <td>
                            <input onclick="checkAuth()" type="checkbox" name="awp_smtp_auth" id="awp_smtp_auth" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('SMTP Email/Username', 'automate_hub'); ?></th>
                        <td>
                            <input type="text" name="awp_smtp_username" id="awp_smtp_username" value="" placeholder="<?php esc_html_e('Enter SMTP Username', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_smtp_username"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('SMTP Password', 'automate_hub'); ?></th>
                        <td>
                            <input type="text" name="awp_smtp_password" id="awp_smtp_password" value="" placeholder="<?php esc_html_e('Enter SMTP Password', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_smtp_password"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button(); ?></div>
            </form>
        </div>

        <?php
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="smtp-action-template">
           
        </script>
        <?php
    }
}

$Awp_SMTP = AWP_SMTP::get_instance();
