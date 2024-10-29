<?php

add_filter( 'awp_action_providers', 'awp_mailjet_actions', 10, 1 );

function awp_mailjet_actions( $actions ) {
    $actions['mailjet'] = array(
        'title' => esc_html__( 'Mailjet', 'automate_hub'),
        'tasks' => array('subscribe'   => esc_html__( 'Subscribe To List', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_mailjet_settings_tab', 10, 1 );

function awp_mailjet_settings_tab( $providers ) {
    $providers['mailjet'] =  array('name'=>esc_html__( 'Mailjet', 'automate_hub'), 'cat'=>array('esp'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_mailjet_settings_view', 10, 1 );

function awp_mailjet_settings_view( $current_tab ) {
    if( $current_tab != 'mailjet' ) { return; }
    $nonce      = wp_create_nonce( "awp_mailjet_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $client_secret = isset($_GET['client_secret']) ? sanitize_text_field($_GET['client_secret']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";

    ?>
    <div class="platformheader">
    <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
	<a href="https://sperse.io/go/mailjet" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/mailjet.png'); ?>" width="128" height="50" alt="Mailjet Logo"></a><br/><br/>
	<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?><br/>
    <form name="mailjet_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
        <input type="hidden" name="action" value="awp_save_mailjet_api_key">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_mailjet_settings" ); ?>"/>
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">


        <table class="form-table">

            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_mailjet_display_name" id="awp_mailjet_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_mailjet_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">

                <th scope="row"> <?php esc_html_e( 'Mailjet API Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_mailjet_api_key" id="awp_mailjet_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Please enter your Mailjet API Key', 'automate_hub' ); ?>" class="basic-text"/>
                 <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_mailjet_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span> 					</div>		
				</td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Mailjet Secret Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_mailjet_secret_key" id="awp_mailjet_secret_key" value="<?php echo esc_attr($client_secret); ?>" placeholder="<?php esc_html_e( 'Please enter Secret Key', 'automate_hub' ); ?>" class="basic-text"/>
                 <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_mailjet_secret_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div> 					
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>
    <div class="wrap">
        <form id="form-list" method="post">
                    
            
            <input type="hidden" name="page" value="automate_hub"/>

            <?php
            $data=[
                        'table-cols'=>['account_name'=>'Display name','api_key'=>'API Key','client_secret'=>'Secret Key','spots'=>'Active Spots','active_status'=>'Active']
                ];
            $platform_obj= new AWP_Platform_Shell_Table('mailjet');
            $platform_obj->initiate_table($data);
            $platform_obj->prepare_items();
            $platform_obj->display_table();
                    
            ?>
        </form>
    </div>
    <?php
}


