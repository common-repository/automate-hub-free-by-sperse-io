<?php

add_filter( 'awp_action_providers', 'awp_pushover_actions', 10, 1 );
function awp_pushover_actions( $actions ) {
    $actions['pushover'] = array(
        'title' => esc_html__( 'Pushover', 'automate_hub' ),
        'tasks' => array('push'   => esc_html__( 'Send Push Message', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_pushover_settings_tab', 10, 1 );
function awp_pushover_settings_tab( $providers ) {
    $providers['pushover'] =  array('name'=>esc_html__( 'Pushover', 'automate_hub'), 'cat'=>array('crm'));
    return $providers;
}
add_action( 'awp_settings_view', 'awp_pushover_settings_view', 10, 1 );

function awp_pushover_settings_view( $current_tab ) {
    if( $current_tab != 'pushover' ) { return; }
    $nonce   = wp_create_nonce( "awp_pushover_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $email     = isset($_GET['email']) ? $_GET['email'] : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/pushover" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/pushover.png'); ?>" width="220" height="50" alt="Pushover Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="pushover_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
        <input type="hidden" name="action" value="awp_save_pushover_api_key">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_pushover_settings" ); ?>"/>
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_pushover_display_name" id="awp_pushover_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_pushover_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'User Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_pushover_user_key" id="awp_pushover_user_key" value="<?php echo sanitize_email($email); ?>" placeholder="<?php esc_html_e( 'Enter your Pushover User Key', 'automate_hub' ); ?>" class="basic-text"/>
				 <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_pushover_user_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>              		</div>																																								
				</td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'API Token', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_pushover_api_token" id="awp_pushover_api_token" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Please enter API Token', 'automate_hub' ); ?>" class="basic-text"/>
				 <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_pushover_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span> </div>             																																						
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>   
    <?php
}


add_action( 'awp_action_fields', 'awp_pushover_action_fields' );

function awp_pushover_action_fields() {
    ?>
    <script type="text/template" id="pushover-action-template">
		        
    </script>
    <?php
}

