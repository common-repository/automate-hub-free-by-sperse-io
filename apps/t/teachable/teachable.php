<?php

class AWP_Teachable extends appfactory
{

    public function init_actions()
    {
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_teachable_platform_connection'], 10, 1);
    }

    public function action_provider($actions)
    {
        $actions['teachable'] = [
            'title' => esc_html__('Teachable', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Add User to School', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['teachable'] = array('name' => esc_html__('Teachable', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'teachable') {
            return;
        }
        $nonce = wp_create_nonce("awp_teachable_settings");
        $school_domain = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $user_email = isset($_GET['email']) ? sanitize_email($_GET['email']) : "";
        $user_password = isset($_GET['client_secret']) ? sanitize_text_field($_GET['client_secret']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/teachable" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/teachable.png'); ?>" width="243" height="50" alt="Teachable Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
            ?><br />
            <form name="teachable_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_teachable_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_teachable_settings");?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)) ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Teachable School Domain', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" name="awp_teachable_school_domain" id="awp_teachable_school_domain"  placeholder="<?php esc_html_e('Enter your Teachable School Domain Name', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_teachable_school_domain"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Teachable Login Email', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" name="awp_teachable_login_email" id="awp_teachable_login_email" value="<?php echo esc_attr($user_email); ?>" placeholder="<?php esc_html_e('Enter your Teachable Email Address', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_teachable_login_email"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Teachable Login Password', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" name="awp_teachable_login_password" id="awp_teachable_login_password" value="<?php echo esc_attr($user_password);?>" placeholder="<?php esc_html_e('Enter correct Teachable Login Password', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_teachable_login_password"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button();?></div>
            </form>
        </div>
    <?php
}



    public function awp_teachable_js_fields($field_data)
    {
    }

    public function load_custom_script()
    {
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="teachable-action-template">    
        </script>
<?php
}

}

$AWP_Teachable = new AWP_Teachable();
