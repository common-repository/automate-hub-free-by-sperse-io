<?php

class AWP_Postmark extends Appfactory
{
    public static $postmark_url = "https://api.postmarkapp.com/email";

    public function init_actions()
    {

    }

    public function init_filters()
    {
    }

    public function settings_tab($tabs)
    {
        $tabs['postmark'] = array('name' => esc_html__('Postmark', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function load_custom_script()
    {
    }

    public function action_provider($providers)
    {
        $providers['postmark'] = [
            'title' => esc_html__('Postmark', 'automate_hub'),
            'tasks' => array(
                'send_email'   => esc_html__('Send an email', 'automate_hub')
            )
        ];

        return  $providers;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'postmark') {
            return;
        }

        $nonce = wp_create_nonce("awp_postmark_api_key");
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $awp_postmark_api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $awp_postmark_sender_signature = isset($_GET['email']) ? sanitize_email($_GET['email']) : "";

?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/postmark" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/postmark.png'); ?>" width="219" height="50" alt="Postmark Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
            ?>
            <br />
            <form action='admin-post.php' method="post" class="container">
                <input type="hidden" name="action" value="awp_postmark_save_api_key">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_postmark_api_key"); ?>">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Approved Sender Email Address', 'automate_hub'); ?> <br /> <br /> <span><a href="https://account.postmarkapp.com/signature_domains" target="_blank">Click From Here</a> </span></th>
                        <td><input type="text" required name="awp_postmark_sender_signature" id="awp_postmark_sender_signature" value="<?php echo esc_attr($awp_postmark_sender_signature); ?>" placeholder="<?php esc_html_e('Provide Approved Sender Email', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_postmark_sender_signature"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Postmark Server API Token', 'automate_hub'); ?></th>
                        <td><input type="text" required name="awp_postmark_api_key" id="awp_postmark_api_key" value="<?php echo esc_attr($awp_postmark_api_key); ?>" placeholder="<?php esc_html_e('Provide your server API token', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_postmark_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
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
        <script type="text/template" id="postmark-action-template">

        </script>
    <?php
        }
}

$Awp_Postmark = AWP_Postmark::get_instance();
