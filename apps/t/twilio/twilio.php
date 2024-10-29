<?php

add_filter( 'awp_action_providers', 'awp_twilio_actions', 10, 1 );

function awp_twilio_actions( $actions ) {
    $actions['twilio'] = array(
        'title' => esc_html__( 'Twilio', 'automate_hub' ),
        'tasks' => array('subscribe'   => esc_html__( 'Send SMS', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_twilio_settings_tab', 10, 1 );

function awp_twilio_settings_tab( $providers ) {
    $providers['twilio'] = array('name'=>esc_html__( 'Twilio', 'automate_hub'), 'cat'=>array('sms'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_twilio_settings_view', 10, 1 );

function awp_twilio_settings_view( $current_tab ) {
    if( $current_tab != 'twilio' ) { return; }
    $nonce       = wp_create_nonce( "awp_twilio_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'])) : "";
    $client_id = isset($_GET['client_id']) ? sanitize_text_field( $_GET['client_id']) : "";
    $client_secret = isset($_GET['client_secret']) ? sanitize_text_field($_GET['client_secret']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/twilio" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/twilio.png'); ?>" width="165" height="50" alt="Twilio Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
    <br/>
    <form name="twilio_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_save_twilio_api_key">
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)) ?>">
        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_twilio_display_name" id="awp_twilio_display_name" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_twilio_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Twilio Account SID', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_twilio_account_sid" id="awp_twilio_account_sid"  placeholder="<?php esc_html_e( 'Enter Twilio Account SID', 'automate_hub' ); ?>" class="basic-text"/>
				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_twilio_account_sid"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>              	</div>																																																								
				</td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Twilio Auth Token', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_twilio_auth_token" id="awp_twilio_auth_token"  placeholder="<?php esc_html_e( 'Enter Twilio Auth Token', 'automate_hub' ); ?>" class="basic-text"/>
				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_twilio_auth_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>              	</div>																																																								
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>

    <?php
}

add_action( 'awp_action_fields', 'awp_twilio_action_fields' );

function awp_twilio_action_fields() {
    ?>
    <script type="text/template" id="twilio-action-template">
    </script>
    <?php
}
