<?php

class AWP_Calendly extends Appfactory
{

    public function init_actions()
    {
        add_action('admin_post_awp_calendly_save_api_token', [$this, 'awp_save_calendly_api_token'], 10, 0);
        add_action('wp_ajax_awp_get_calendly_list', [$this, 'awp_get_calendly_list'], 10, 0);
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_calendly_platform_connection'], 10, 1);
    }

    public function load_custom_script()
    {}


    public function action_provider($actions)
    {
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['calendly'] = array('name' => esc_html__('Calendly', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'calendly') {
            return;
        }
        $nonce = wp_create_nonce("awp_calendly_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/calendly" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/calendly.png'); ?>" width="202" height="50" alt="Calendly Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />
            <form name="calendly_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_calendly_save_api_token">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Calendly API Key', 'automate_hub');?></th>
                        <td>
                            <input type="text" name="awp_calendly_api_token" id="awp_calendly_api_token"  placeholder="<?php esc_html_e('Enter your Calendly API Key', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_calendly_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button();?></div>
            </form>
        </div>
    <?php
}

    public function awp_save_calendly_api_token()
    {
        if (!current_user_can('administrator')) {
            die(esc_html__('You are not allowed to save changes!', 'automate_hub'));
        }
        // Security Check
        if (!wp_verify_nonce($_POST['_nonce'], 'awp_calendly_settings')) {
            die(esc_html__('Security check Failed', 'automate_hub'));
        }

        $api_token = isset($_POST["awp_calendly_api_token"]) ?   sanitize_text_field($_POST["awp_calendly_api_token"]) :'';

        // Save tokens
        $platform_obj = new AWP_Platform_Shell_Table('calendly');
        $platform_obj->save_platform(['api_key' => $api_token]);

        AWP_redirect("admin.php?page=automate_hub&tab=calendly");
    }

    public function action_fields(){}

}

$AWP_Calendly = new AWP_Calendly();

