<?php

class AWP_Ontraport extends Appfactory
{

    public function init_actions()
    {
    }

    public function init_filters()
    {
       
    }


    public function action_provider($actions)
    {
        $actions['ontraport'] = [
            'title' => esc_html__('Ontraport', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Subscribe To List', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['ontraport'] = array('name' => esc_html__('Ontraport', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'ontraport') {
            return;
        }
        $nonce = wp_create_nonce("awp_ontraport_settings");
       
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $app_id     = isset($_GET['client_id']) ? sanitize_text_field( $_GET['client_id']) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/ontraport" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/ontraport.png'); ?>" width="292" height="50" alt="Ontraport Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br />
            <form name="ontraport_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_ontraport_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_ontraport_settings");  ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                            <input type="text" required name="awp_ontraport_display_name" id="awp_ontraport_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                            <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_ontraport_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Ontraport API Key', 'automate_hub');?></th>
                        <td>
                            <div class="form-table__input-wrap">
                            <input type="text" required name="awp_ontraport_api_token" id="awp_ontraport_api_token" value="<?php echo esc_attr($api_token); ?>" placeholder="<?php esc_html_e('Enter your API Key', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_ontraport_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Ontraport App ID', 'automate_hub');?></th>
                        <td>
                            <div class="form-table__input-wrap">
                            <input type="text" required name="awp_ontraport_app_id" id="awp_ontraport_app_id" value="<?php echo esc_attr($app_id);?>" placeholder="<?php esc_html_e('Enter your API App ID', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_ontraport_app_id"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
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
    <script type="text/template" id="ontraport-action-template">
               
    </script>
<?php
}

 
}

$AWP_Ontraport = new AWP_Ontraport();
