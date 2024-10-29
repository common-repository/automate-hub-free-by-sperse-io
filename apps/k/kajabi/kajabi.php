<?php

class AWP_Kajabi extends appfactory
{

    public function init_actions()
    {

    }

    public function init_filters()
    {
    }


    public function action_provider($actions)
    {
        $actions['kajabi'] = [
            'title' => esc_html__('Kajabi', 'automate_hub'),
            'tasks' => array('create_record' => esc_html__('Purchase Offer', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['kajabi'] = array('name' => esc_html__('Kajabi', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'kajabi') {
            return;
        }
        $nonce = wp_create_nonce("awp_kajabi_settings");
        $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";


        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/kajabi" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/kajabi.png'); ?>" width="276" height="50" alt="Kajabi Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br />
            <form name="kajabi_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_kajabi_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_kajabi_settings"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                            <input type="text" name="awp_kajabi_display_name" id="awp_kajabi_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                            <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_kajabi_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Kajabi Activation URL', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" name="awp_kajabi_act_url" id="awp_kajabi_act_url" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e('Enter your kajabi API Key', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_kajabi_act_url"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button();?></div>
            </form>
        </div>
    <?php
}



    public function awp_kajabi_js_fields($field_data)
    {
    }

    public function load_custom_script()
    {
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="kajabi-action-template">
        </script>
    <?php
    }


}

$AWP_kajabi = new AWP_kajabi();
