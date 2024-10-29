<?php

$platform_obj= new AWP_Platform_Shell_Table('agilecrm');

add_filter( 'awp_action_providers', 'awp_agilecrm_actions', 10, 1 );

function awp_agilecrm_actions( $actions ) {
    $actions['agilecrm'] = array('title'        => esc_html__( 'Agile CRM'         , 'automate_hub'),
                'tasks' => array('add_contact'  => esc_html__( 'Create New Contact', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_agilecrm_settings_tab', 10, 1 );

function awp_agilecrm_settings_tab( $providers ) {
    $providers['agilecrm'] = array( 'name'=>esc_html__( 'Agile CRM', 'automate_hub'), 'cat'=>array('crm'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_agilecrm_settings_view', 10, 1 );

function awp_agilecrm_settings_view( $current_tab ) {
    if( $current_tab != 'agilecrm' ) {
        return;
    }
    $nonce     = wp_create_nonce( "awp_agilecrm_settings" );

    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field( $_GET['api_key']) : "";
    $url     = isset($_GET['url']) ? sanitize_text_field( $_GET['url']) : "";
    $email     = isset($_GET['email']) ? sanitize_text_field($_GET['email']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field( $_GET['account_name']) : "";


    ?>


    <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/agilecrm" target="_blank">
        <img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/agilecrm.png'); ?>" width="225" height="50" alt="AgileCRM Logo"></a>
        <br/><br/>
    <?php 
        require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();
    ?>

    <br/>

    <form name="agilecrm_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_save_agilecrm_api_key">
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_agilecrm_display_name" id="awp_agilecrm_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_agilecrm_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'AgileCRM Subdomain', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
					<input type="text" name="awp_agilecrm_subdomain" id="awp_agilecrm_subdomain" value="<?php echo esc_url($url); ?>" placeholder="<?php esc_html_e( 'Enter the subdomain for your AgileCRM app', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_agilecrm_subdomain"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
						</div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'REST API Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
					<input type="text" name="awp_agilecrm_api_key" id="awp_agilecrm_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Enter your AgileCRM API Key', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_agilecrm_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
						</div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'User Email', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
					<input type="text" name="awp_agilecrm_email" id="awp_agilecrm_email" value="<?php echo esc_attr($email); ?>" placeholder="<?php esc_html_e( 'Enter the user login email', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_agilecrm_email"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
						</div>
                </td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>   

    <?php
}

