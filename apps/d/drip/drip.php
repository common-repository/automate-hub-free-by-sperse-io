<?php

add_filter( 'awp_action_providers', 'awp_drip_actions', 10, 1 );

function awp_drip_actions( $actions ) {
    $actions['drip'] = array(
        'title' => esc_html__( 'Drip', 'automate_hub'),
        'tasks' => array('create_subscriber' => esc_html__( 'Create Subscriber', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_drip_settings_tab', 10, 1 );

function awp_drip_settings_tab( $providers ) {
    $providers['drip'] = array('name'=>esc_html__( 'Drip', 'automate_hub'), 'cat'=>array('esp'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_drip_settings_view', 10, 1 );

function awp_drip_settings_view( $current_tab ) {
    if( $current_tab != 'drip' ) { return; }
    $nonce     = wp_create_nonce( "awp_drip_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
    <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
	<a href="https://sperse.io/go/drip" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/drip.png'); ?>" width="110" height="50" alt="Drip Logo"></a><br/><br/>
	<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="drip_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_save_drip_api_token">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_drip_settings" ); ?>"/>
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_drip_display_name" id="awp_drip_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_drip_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'API Token', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_drip_api_token" id="awp_drip_api_token" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Please enter API Token', 'automate_hub' ); ?>" class="basic-text"/>
				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_drip_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>					</div>																
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>

    <?php
}


add_action( 'awp_action_fields', 'awp_drip_action_fields' );

function awp_drip_action_fields() {
    ?>

    <script type="text/template" id="drip-action-template">
	
    </script>

    <?php
}

