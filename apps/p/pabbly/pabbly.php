<?php

add_filter( 'awp_action_providers', 'awp_pabbly_actions', 10, 1 );

function awp_pabbly_actions( $actions ) {
    $actions['pabbly'] = array(
        'title' => esc_html__( 'Pabbly', 'automate_hub'),
        'tasks' => array( 'subscribe' => esc_html__( 'Add Contact To List', 'automate_hub')));
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_pabbly_settings_tab', 10, 1 );

function awp_pabbly_settings_tab( $providers ) {
    $providers['pabbly'] = array('name'=>esc_html__( 'Pabbly', 'automate_hub'), 'cat'=>array('crm'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_pabbly_settings_view', 10, 1 );

function awp_pabbly_settings_view( $current_tab ) {
    if( $current_tab != 'pabbly' ) { return; }
    $nonce     = wp_create_nonce( "awp_pabbly_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/pabbly" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/pabbly.png'); ?>" width="170" height="50" alt="Pabbly Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="pabbly_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
        <input type="hidden" name="action" value="awp_save_pabbly_api_key">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_pabbly_settings" ); ?>"/>
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_pabbly_display_name" id="awp_pabbly_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_pabbly_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Pabbly Bearer Token', 'automate_hub' ); ?></th>
                <td><input type="text" name="awp_pabbly_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Please enter Bearer Token', 'automate_hub' ); ?>" class="basic-text"/>
                </td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>
    <?php
}

add_action( 'awp_action_fields', 'awp_pabbly_action_fields' );

function awp_pabbly_action_fields() {
?>
    <script type="text/template" id="pabbly-action-template">
    </script>

<?php
}


