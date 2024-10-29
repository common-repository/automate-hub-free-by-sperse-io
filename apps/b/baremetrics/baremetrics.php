<?php

class AWP_Baremetrics extends appfactory
{

   
    public function init_actions(){
                   
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_baremetrics_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['baremetrics'] = array(
            'title' => esc_html__( 'Baremetrics', 'automate_hub' ),
            'tasks' => array(
                'createcustomer'   => esc_html__( 'Create Customer', 'automate_hub' ),
                'createplan'   => esc_html__( 'Create Plan', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['baremetrics'] = array('name'=>esc_html__( 'Baremetrics', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'baremetrics') {
            return;
        }
        $nonce = wp_create_nonce("awp_baremetrics_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
		<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/baremetrics" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/baremetrics.png'); ?>" width="320" height="50" alt="Baremetrics Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />
            <form name="baremetrics_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_baremetrics_save_api_token">
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_baremetrics_display_name" id="awp_baremetrics_display_name" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_baremetrics_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Baremetrics API Key', 'automate_hub');?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_baremetrics_api_token" id="awp_baremetrics_api_token"  placeholder="<?php esc_html_e('Enter your Baremetrics Live API Key', 'automate_hub');?>" class="basic-text" />
                                <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_baremetrics_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
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


$Awp_Baremetrics = new AWP_Baremetrics();


