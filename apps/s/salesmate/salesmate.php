<?php

class AWP_Salesmate extends appfactory
{


   
    public function init_actions(){
               
        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_salesmate_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['salesmate'] = array(
            'title' => esc_html__( 'Salesmate', 'automate_hub' ),
            'tasks' => array(
                'createactivity'   => esc_html__( 'Add Activity', 'automate_hub' ),
                'createcompany'   => esc_html__( 'Create Company', 'automate_hub' ),
                'createcontact'   => esc_html__( 'Create Contact', 'automate_hub' )
                
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['salesmate'] = array('name'=>esc_html__( 'Salesmate', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'salesmate') {
            return;
        }
        $nonce = wp_create_nonce("awp_salesmate_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/salesmate" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/salesmate.png'); ?>" width="396" height="50" alt="Salesmate Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />
            <form name="salesmate_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_salesmate_save_api_token">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Company Link Name', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_salesmate_display_name" id="awp_salesmate_display_name"  placeholder="<?php esc_html_e( 'examplecompany.salesmate.io', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_salesmate_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Salesmate Session Key', 'automate_hub');?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_salesmate_api_token" id="awp_salesmate_api_token" value="<?php sanitize_text_field($api_token); ?>" placeholder="<?php esc_html_e('Enter your Salesmate Session Key', 'automate_hub');?>" class="basic-text" />
                                <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_salesmate_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
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
            <script type="text/template" id="salesmate-action-template">
         
            </script>
        <?php
    }

};


$Awp_Salesmate = new AWP_Salesmate();
