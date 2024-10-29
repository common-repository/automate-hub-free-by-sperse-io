<?php

class AWP_Zulip extends appfactory
{

   
    public function init_actions(){
       

        
    }

    public function init_filters(){

    }

    public function action_provider( $providers ) {
        $providers['zulip'] = array(
            'title' => esc_html__( 'Zulip', 'automate_hub' ),
            'tasks' => array(
                'createstream'   => esc_html__( 'Create Stream', 'automate_hub' ),
                'sendmessage'   => esc_html__( 'Send Message', 'automate_hub' ),
                'createuser'   => esc_html__( 'Create User', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['zulip'] = array('name'=>esc_html__( 'Zulip', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'zulip') {
            return;
        }
        $nonce = wp_create_nonce("awp_zulip_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'])) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/zulip" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/zulip.png'); ?>"  height="50" alt="Zulip Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />
            <form name="zulip_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_zulip_save_api_token">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)) ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Zulip Organization URL', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_zulip_display_name" id="awp_zulip_display_name"  placeholder="<?php esc_html_e( 'E.g: yourZulipDomain.zulipchat.com', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_zulip_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Zulip Email', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_zulip_email" id="awp_zulip_email"  placeholder="<?php esc_html_e( 'Enter Zulip Email', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_zulip_email"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Zulip API Key', 'automate_hub');?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_zulip_api_token" id="awp_zulip_api_token" placeholder="<?php esc_html_e('Enter your Zulip API Key', 'automate_hub');?>" class="basic-text" />
                                <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_zulip_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button();?></div>
            </form>
        </div>
        <?php
    }

    
    public function load_custom_script() {
    }

    public function action_fields() {
        ?>
            <script type="text/template" id="zulip-action-template">

            </script>
        <?php
    }

    

   
};


$Awp_Zulip = new AWP_Zulip();

