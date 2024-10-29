<?php

add_filter( 'awp_action_providers', 'awp_everwebinar_actions', 10, 1 );
function awp_everwebinar_actions( $actions ) {
    $actions['everwebinar'] = array(
        'title' => esc_html__( 'EverWebinar', 'automate_hub' ),
        'tasks' => array('register_webinar' => esc_html__( 'Register to webinar', 'automate_hub'))
    );
    return $actions;
}
add_filter( 'awp_settings_tabs', 'awp_everwebinar_settings_tab', 10, 1 );
function awp_everwebinar_settings_tab( $providers ) {
    $providers['everwebinar'] = 
    array('name'=>esc_html__( 'EverWebinar', 'automate_hub'), 'cat'=>array('webinar'));
    return $providers;
}
add_action( 'awp_settings_view', 'awp_everwebinar_settings_view', 10, 1 );
function awp_everwebinar_settings_view( $current_tab ) {
    if( $current_tab != 'everwebinar' ) { return; }
    $nonce     = wp_create_nonce( "awp_everwebinar_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

	<a href="https://sperse.io/go/everwebinar" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/everwebinar.png'); ?>" width="250" height="50" alt="Everwebinar Logo"></a><br/><br/>
	<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="everwebinar_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_save_everwebinar_api_token">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_everwebinar_settings" ); ?>"/>
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_everwebinar_display_name" id="awp_everwebinar_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_everwebinar_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'API Token', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_everwebinar_api_token" id="awp_everwebinar_api_token" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Please enter API Token', 'automate_hub' ); ?>" class="basic-text"/> 
				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_everwebinar_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>	</div>																				
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>
    <?php
}



add_action( 'awp_action_fields', 'awp_everwebinar_action_fields' );

function awp_everwebinar_action_fields() {
    ?>

    <script type="text/template" id="everwebinar-action-template">
    </script>
    <?php
}
