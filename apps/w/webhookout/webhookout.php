<?php

add_filter( 'awp_action_providers', 'awp_webhookout_actions', 10, 1 );
function awp_webhookout_actions( $actions ) {
    $actions['webhookout'] = array(
        'title' => esc_html__( 'Webhooks: Outbound', 'automate_hub'),
        'tasks' => array('send_to_webhookout'   => esc_html__( 'Send Data To Outbound Webhooks', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_webhookout_settings_tab', 10, 1 );

function awp_webhookout_settings_tab( $providers ) {
    $providers['webhookout'] = 
    array('name'=>esc_html__( 'Webhook Outbound', 'automate_hub'), 'cat'=>array('connector'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_webhookout_settings_view', 10, 1 );

function awp_webhookout_settings_view( $current_tab ) {
    if( $current_tab != 'webhookout' ) {return; } ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/webhookout" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/webhookout.png'); ?>" width="170" height="50" alt="Outbound Webhook Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?><br/>    
    
<?php
}

