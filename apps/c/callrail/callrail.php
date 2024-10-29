<?php

class AWP_Callrail extends appfactory
{

   
    public function init_actions(){

    }

    public function init_filters(){

    }

    public function action_provider( $providers ) {
        $providers['callrail'] = array(
            'title' => esc_html__( 'Callrail', 'automate_hub' ),
            'tasks' => array(
                'createuser'   => esc_html__( 'Create User', 'automate_hub' ),
                'createtag'   => esc_html__( 'Create Tag', 'automate_hub' ),
                'createcompany'   => esc_html__( 'Create Company', 'automate_hub' ),
                'createoutboundcallerid'   => esc_html__( 'Create Outbound Caller ID', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['callrail'] = array('name'=>esc_html__( 'Callrail', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'callrail') {
            return;
        }
        $nonce = wp_create_nonce("awp_callrail_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field( $_GET['api_key'] ): "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
		<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/callrail" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/callrail.png'); ?>" height="50" alt="Callrail Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />
            <form name="callrail_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_callrail_save_api_token">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_callrail_display_name" id="awp_callrail_display_name"  placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_callrail_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Callrail API Key', 'automate_hub');?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_callrail_api_token" id="awp_callrail_api_token"  placeholder="<?php esc_html_e('Enter your Callrail API Key', 'automate_hub');?>" class="basic-text" />
                                <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_callrail_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
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
       
    }





};


$Awp_Callrail = new AWP_Callrail();