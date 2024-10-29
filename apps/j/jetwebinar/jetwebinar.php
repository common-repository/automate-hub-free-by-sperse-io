<?php

add_filter( 'awp_action_providers', 'aws_jetwebinar_actions', 10, 1 );

// *** ACTIONS AVAILABLE IN JetWebinar        *** 
function aws_jetwebinar_actions( $actions ) {
    $actions['jetwebinar'] = array(
        'title' => esc_html__( 'JetWebinar', 'automate_hub'),
        'tasks' => array(
            'createLead'  => esc_html__( 'Add a Contact to a List'  , 'automate_hub' ),          
        )
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'aws_jetwebinar_settings_tab', 10, 1 );

function aws_jetwebinar_settings_tab( $providers ) {
    $providers['jetwebinar'] = 
    array('name'=>esc_html__( 'JetWebinar', 'automate_hub'), 'cat'=>array('webinar'));
    return $providers;
}

add_action( 'awp_settings_view', 'aws_jetwebinar_settings_view', 10, 1 );

// ***  SPERSE SETTINGS AND INSTRUCTIONS  *** 
function aws_jetwebinar_settings_view( $current_tab ) {
     if( $current_tab != 'jetwebinar' ) {return;}
    $nonce     = wp_create_nonce( "awp_jetwebinar_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $url     = isset($_GET['url']) ? esc_url($_GET['url']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
    <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
    <a href="https://sperse.io/go/jetwebinar" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/jetwebinar.png'); ?>" width="175" height="50" alt="JetWebinar Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="mailchimp_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
        <input type="hidden" name="action" value="awp_save_jetwebinar_api_key">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_jetwebinar_settings" ); ?>"/>
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">


        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_jetwebinar_display_name" id="awp_jetwebinar_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_jetwebinar_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'JetWebinar API Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
					<input type="text" name="awp_Jetwebinar_api_key" id="awp_Jetwebinar_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Please enter API Key', 'automate_hub' ); ?>" class="basic-text"/>
                	<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_Jetwebinar_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'JetWebinar Domain Name', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
					<input type="text" name="awp_Jetwebinar_domain_name" id="awp_Jetwebinar_domain_name" value="<?php echo esc_url($url); ?>" placeholder="<?php esc_html_e( 'Please enter domain name', 'automate_hub' ); ?>" class="basic-text"/>
                	<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_Jetwebinar_domain_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>                
                </td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>

    <?php
}




add_action( 'awp_action_fields', 'aws_jetwebinar_action_fields');
// ****************************************** 
// *** Map Fields for Login Action        *** 
// ****************************************** 

function aws_jetwebinar_action_fields() {
    ?>
    <script type="text/template" id="jetwebinar-action-template">
               
    </script>
    <?php
}

