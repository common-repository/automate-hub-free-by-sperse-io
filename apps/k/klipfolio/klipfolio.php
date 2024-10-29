<?php

class AWP_Klipfolio extends appfactory
{

   
    public function init_actions(){
    }

    public function init_filters(){

    }

    public function action_provider( $providers ) {
        $providers['klipfolio'] = array(
            'title' => esc_html__( 'Klipfolio', 'automate_hub' ),
            'tasks' => array(
                'createclient'   => esc_html__( 'Create Client', 'automate_hub' ),
                'createklip'   => esc_html__( 'Create Klips', 'automate_hub' ),
                'createuser'   => esc_html__( 'Create User', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['klipfolio'] = array('name'=>esc_html__( 'Klipfolio', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'klipfolio') {
            return;
        }
        $nonce = wp_create_nonce("awp_klipfolio_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/klipfolio" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/klipfolio.png'); ?>" height="50" alt="Klipfolio Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />
            <form name="klipfolio_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_klipfolio_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_klipfolio_settings"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_klipfolio_display_name" id="awp_klipfolio_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_klipfolio_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Klipfolio API Key', 'automate_hub');?></th>
                        <td>
                            <div class="form-table__input-wrap">
                                <input type="text" name="awp_klipfolio_api_token" id="awp_klipfolio_api_token" value="<?php echo  esc_attr($api_token); ?>" placeholder="<?php esc_html_e('Enter your Klipfolio Live API Key', 'automate_hub');?>" class="basic-text" />
                                <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_klipfolio_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
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
            <script type="text/template" id="klipfolio-action-template">
              
            </script>
        <?php
    }
};


$Awp_Klipfolio = new AWP_Klipfolio();
