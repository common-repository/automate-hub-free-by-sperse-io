<?php

add_filter( 'awp_action_providers', 'awp_zapier_actions', 10, 1 );

function awp_zapier_actions( $actions ) {
    $actions['zapier'] = array(
        'title' => esc_html__( 'Zapier', 'automate_hub'),
        'tasks' => array('send_to_webhook' => esc_html__( 'Send Data to Webhook', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_zapier_settings_tab', 10, 1 );

function awp_zapier_settings_tab( $providers ) {
    $providers['zapier'] = esc_html__( 'Zapier', 'automate_hub');
    return $providers;
}

add_action( 'awp_settings_view', 'awp_zapier_settings_view', 10, 1 );

function awp_zapier_settings_view( $current_tab ) {
    if( $current_tab != 'zapier') { return;}
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

	<a href="https://sperse.io/go/zapier" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/zapier.png'); ?>" width="105" height="50" alt="Zapier Logo"></a><br/><br/>
	<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
	<br/><br/>        
    </div>
    <?php
}

add_action( 'awp_action_fields', 'awp_zapier_action_fields' );

function awp_zapier_action_fields() {
?>
    <script type="text/template" id="zapier-action-template">

    </script>
    <?php
}

