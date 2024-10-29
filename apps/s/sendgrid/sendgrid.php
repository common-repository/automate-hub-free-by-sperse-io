<?php
class AWP_Sendgrid extends appfactory
{

    public function init_actions()
    {
        add_action('admin_post_awp_sendgrid_save_api_token', [$this, 'awp_save_sendgrid_api_token'], 10, 0);
        add_action('wp_ajax_awp_get_sendgrid_list', [$this, 'awp_get_sendgrid_list'], 10, 0);
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_sendgrid_platform_connection'], 10, 1);
    }


    public function action_provider($actions)
    {
        $actions['sendgrid'] = [
            'title' => esc_html__('Sendgrid', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Subscribe To List', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['sendgrid'] = array('name' => esc_html__('Sendgrid', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'sendgrid') {
            return;
        }
        $nonce = wp_create_nonce("awp_sendgrid_settings");
        $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";


        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/sendgrid" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sendgrid.png'); ?>" width="275" height="50" alt="Sendgrid Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br />
            <form name="sendgrid_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_sendgrid_save_api_token">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                            <input type="text" name="awp_sendgrid_display_name" id="awp_sendgrid_display_name"  placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                            <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_sendgrid_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Sendgrid API Key', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" name="awp_sendgrid_api_token" id="awp_sendgrid_api_token"  placeholder="<?php esc_html_e('Enter your Sendgrid API Key', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_sendgrid_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button();?></div>
            </form>
        </div>
    <?php
}



    public function load_custom_script()
    {
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="sendgrid-action-template">
                    
        </script>
    <?php
    }

}

$AWP_Sendgrid = new AWP_Sendgrid();

