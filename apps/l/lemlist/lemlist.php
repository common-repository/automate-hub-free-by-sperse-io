<?php

add_filter( 'awp_action_providers', 'awp_lemlist_actions', 10, 1 );
function awp_lemlist_actions( $actions ) {
    $actions['lemlist'] = array(
        'title' => esc_html__('Lemlist', 'automate_hub'),
        'tasks' => array('subscribe'   => esc_html__( 'Add Contact To Campaign', 'automate_hub')));
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_lemlist_settings_tab', 10, 1 );

function awp_lemlist_settings_tab( $providers ) {
    $providers['lemlist'] = esc_html__( 'lemlist', 'automate_hub' );
    return $providers;
}

add_action( 'awp_settings_view', 'awp_lemlist_settings_view', 10, 1 );

function awp_lemlist_settings_view( $current_tab ) {
    if( $current_tab != 'lemlist' ) { return; }
    $nonce     = wp_create_nonce( "awp_lemlist_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
    <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
    <a href="https://sperse.io/go/lemlist" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/lemlist.png'); ?>" width="236" height="50" alt="Lemlist Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?><br/>
    <form name="lemlist_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
        <input type="hidden" name="action" value="awp_save_lemlist_api_key">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_lemlist_settings" ); ?>"/>
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_lemlist_display_name" id="awp_lemlist_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_lemlist_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Lemlist API Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
                <input type="text" name="awp_lemlist_api_key" id="awp_lemlist_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Enter your Lemlist API Key', 'automate_hub' ); ?>" class="basic-text"/>
                 <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_lemlist_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>                   </div>        
                </td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>
    <?php
}

add_action( 'awp_action_fields', 'awp_lemlist_action_fields' );

function awp_lemlist_action_fields() { ?>
    <script type="text/template" id="lemlist-action-template">
		       
    </script>
<?php
}