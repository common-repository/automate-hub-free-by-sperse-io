<?php
add_filter( 'awp_action_providers', 'awp_autopilot_actions', 10, 1 );

function awp_autopilot_actions( $actions ) {
    $actions['autopilot'] = array(
        'title' => esc_html__( 'Autopilot', 'automate_hub' ),
        'tasks' => array(
            'subscribe'   => esc_html__( 'Add/Update Contact', 'automate_hub' ),
        )
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_autopilot_settings_tab', 10, 1 );

function awp_autopilot_settings_tab( $providers ) {
    $providers['autopilot'] = esc_html__( 'Autopilot', 'automate_hub' );
    return $providers;
}

add_action( 'awp_settings_view', 'awp_autopilot_settings_view', 10, 1 );

function awp_autopilot_settings_view( $current_tab ) {
    if( $current_tab != 'autopilot' ) { return; }
    $nonce   = wp_create_nonce( "awp_autopilot_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";

    ?>
    <div class="platformheader">
		<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
    <a href="https://sperse.io/go/autopilot" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/autopilot.png'); ?>" width="380" height="50" alt="AutoPilot Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="autopilot_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_autopilot_save_api_key">
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_autopilot_display_name" id="awp_autopilot_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_autopilot_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Autopilot API Key', 'automate_hub'); ?></th>
                <td>
					<div class="form-table__input-wrap">
					<input type="text" name="awp_autopilot_api_key" id="awp_autopilot_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Enter your Autopilot API Key', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_autopilot_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>				</div>
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    <?php
}
