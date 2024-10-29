<?php


add_filter( 'awp_action_providers', 'awp_close_actions', 10, 1 );

function awp_close_actions( $actions ) {
    $actions['close'] = array(
    'title' => esc_html__( 'Close', 'automate_hub'),
    'tasks' => array('add_lead'   => esc_html__( 'Create New Lead', 'automate_hub')));
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_close_settings_tab', 10, 1 );

function awp_close_settings_tab( $providers ) {
    $providers['close'] = array('name'=>esc_html__( 'Close', 'automate_hub'), 'cat'=>array('crm'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_close_settings_view', 10, 1 );

function awp_close_settings_view( $current_tab ) {
    if( $current_tab != 'close' ) { return; }
    $nonce     = wp_create_nonce( "awp_close_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
		<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
    <a href="https://sperse.io/go/close" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/close.png'); ?>" width="155" height="50" alt="Close Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="close_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_save_close_api_token">
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>"> 
        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_close_display_name" id="awp_close_display_name" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_close_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Close CRM API Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_close_api_token" id="awp_close_api_token" placeholder="<?php esc_html_e( 'Enter your Close CRM API Key', 'automate_hub' ); ?>" class="basic-text" />
 				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_close_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>					</div>				
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>

    <?php
}


add_action( 'awp_action_fields', 'awp_close_action_fields' );

function awp_close_action_fields() { ?>
    <script type="text/template" id="close-action-template">
    </script>
    <?php
}

