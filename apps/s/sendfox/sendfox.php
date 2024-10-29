<?php

add_filter( 'awp_action_providers', 'awp_sendfox_actions', 10, 1 );

function awp_sendfox_actions( $actions ) {
    $actions['sendfox'] = array(
        'title' => esc_html__( 'SendFox', 'automate_hub'),
        'tasks' => array('subscribe'   => esc_html__( 'Subscribe To List', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_sendfox_settings_tab', 10, 1 );

function awp_sendfox_settings_tab( $providers ) {
    $providers['sendfox'] = array('name'=>esc_html__( 'SendFox', 'automate_hub'), 'cat'=>array('crm'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_sendfox_settings_view', 10, 1 );

function awp_sendfox_settings_view( $current_tab ) {
    if( $current_tab != 'sendfox' ) {return;}
    $nonce   = wp_create_nonce( "awp_sendfox_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
 
	<a href="https://sperse.io/go/sendfox" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sendfox.png'); ?>" width="250" height="50" alt="Sendfox Logo"></a><br/><br/>
	<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="sendfox_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_save_sendfox_api_key">
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_sendfox_display_name" id="awp_sendfox_display_name"  placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_sendfox_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Personal Access token', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_sendfox_api_key" id="awp_sendfox_api_key"  placeholder="<?php esc_html_e( 'Enter Access Token', 'automate_hub' ); ?>" class="basic-text"/>
				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_sendfox_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>              		</div>																																																			
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>
    <?php
}


add_action( 'awp_action_fields', 'awp_sendfox_action_fields' );

function awp_sendfox_action_fields() {
?>
    <script type="text/template" id="sendfox-action-template">
    </script>
<?php
}
