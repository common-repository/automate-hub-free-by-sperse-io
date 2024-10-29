<?php

class AWP_Mailgun extends appfactory  {
    public static $url = "https://api.mailgun.net/v3";

    public function init_actions(){
   
    }
    
    public function init_filters(){}
    public function load_custom_script(){
               
    }
    public function settings_tab( $tabs ) {
        $tabs['mailgun'] = array('name'=>esc_html__( 'Mailgun', 'automate_hub'), 'cat'=>array('crm'));
        return $tabs;
    }




    public function action_provider( $providers ) {
        $providers['mailgun'] = [
            'title' => __( 'Mailgun', 'automate_hub' ),
            'tasks' => array(
                'subscribe_to_list'   => __( 'Subscribe To List', 'automate_hub' )
                )
            ];

        return  $providers;
    }

    public function settings_view( $current_tab ) {
        
        if( $current_tab != 'mailgun' ) { return; }

        $nonce = wp_create_nonce( "awp_mailgun_api_key" );
        $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";

        ?>
            <div class="platformheader">
 			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

                <a href="https://sperse.io/go/mailgun" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/mailgun.png'); ?>" width="180" height="50" alt="Mailgun Logo"></a><br/><br/>
                <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
                <form action='admin-post.php' method="post"  class="container" >
                    <input type="hidden" name="action" value="awp_mailgun_save_api_key">
                    <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_mailgun_api_key" ); ?>"/>
                    <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                            <td>
                                <div class="form-table__input-wrap">
                                <input type="text" name="awp_mailgun_display_name" id="awp_mailgun_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_mailgun_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"> <?php esc_html_e( 'Mailgun API Key', 'automate_hub'); ?></th>
                            <td>
								<div class="form-table__input-wrap">
								<input type="text" name="awp_mailgun_api_key" id="awp_mailgun_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Enter your Mailgun API Key', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_mailgun_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>				
                            </td>
                        </tr>
                    </table>
                    <div class="submit-button-plugin"><?php submit_button(); ?></div>
                </form>
            </div>
        <?php
    }

    public function action_fields() {
        ?>
            <script type="text/template" id="mailgun-action-template">
               
            </script>
        <?php
    }
}

$Awp_Mailgun = AWP_Mailgun::get_instance();

