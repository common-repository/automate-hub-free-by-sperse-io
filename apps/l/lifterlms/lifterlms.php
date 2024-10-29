<?php

add_filter( 'awp_action_providers', 'awp_lifterlms_actions', 10, 1 );

function awp_lifterlms_actions( $actions ) {
    $actions['lifterlms'] = array(
        'title' => esc_html__( 'Lifter LMS', 'automate_hub' ),
        'tasks' => array(
            'add_student'   => esc_html__( 'Add a Student', 'automate_hub')
        )
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_lifterlms_settings_tab', 10, 1 );

function awp_lifterlms_settings_tab( $providers ) {
    $providers['lifterlms'] =  array('name'=>esc_html__( 'Lifter LMS', 'automate_hub'), 'cat'=>array('crm'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_lifterlms_settings_view', 10, 1 );

function awp_lifterlms_settings_view( $current_tab ) {
    if( $current_tab != 'lifterlms' ) { return; }
    $nonce     = wp_create_nonce( "awp_lifterlms_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $client_id = isset($_GET['client_id']) ? sanitize_text_field( $_GET['client_id']) : "";
    $client_secret = isset($_GET['client_secret']) ? sanitize_text_field( $_GET['client_secret']) : "";
    $url     = isset($_GET['url']) ? esc_url($_GET['url']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
     ?>
     <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

 	<a href="https://sperse.io/go/lifterlms" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/lifterlms.png'); ?>" width="183" height="50" alt="lifterlms Logo"></a><br/><br/>
 	<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?><br/>
     <form name="lifterlms_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
           method="post" class="container">
         <input type="hidden" name="action" value="awp_save_lifterlms_api_key">
         <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_lifterlms_settings" ); ?>"/>
         <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">



         <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_lifterlms_display_name" id="awp_lifterlms_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_lifterlms_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
             <tr valign="top">
                 <th scope="row"> <?php esc_html_e( 'Domain Name', 'automate_hub' ); ?></th>
                 <td>
					 <div class="form-table__input-wrap">
 				<input type="text" name="awp_lifterlms_domain_name" id="awp_lifterlms_domain_name" value="<?php echo esc_url($url); ?>" placeholder="<?php esc_html_e( 'Please enter Domain Name', 'automate_hub' ); ?>" class="basic-text"/>
 				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_lifterlms_domain_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>																					
 				</td>
             </tr>
             <tr valign="top">
                 <th scope="row"> <?php esc_html_e( 'Consumer Key', 'automate_hub' ); ?></th>
                 <td>
					 <div class="form-table__input-wrap">
 				<input type="text" name="awp_lifterlms_consumer_key" id="awp_lifterlms_consumer_key" value="<?php echo esc_attr($client_id); ?>" placeholder="<?php esc_html_e( 'Please enter Consumer Key', 'automate_hub' ); ?>" class="basic-text"/>
 				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_lifterlms_consumer_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>																					
 				</td>
             </tr>
             <tr valign="top">
                 <th scope="row"> <?php esc_html_e( 'Consumer Secret', 'automate_hub' ); ?></th>
                 <td>
					 <div class="form-table__input-wrap">
 				<input type="text" name="awp_lifterlms_consumer_secret" id="awp_lifterlms_consumer_secret" value="<?php echo esc_attr($client_secret); ?>" placeholder="<?php esc_html_e( 'Please enter Consumer Secret', 'automate_hub' ); ?>" class="basic-text"/>
 				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_lifterlms_consumer_secret"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>																					
 				</td>
             </tr>
        </table>
         <div class="submit-button-plugin"><?php submit_button(); ?></div>
     </form>
     </div>
     <?php
}


add_action( 'awp_action_fields', 'awp_lifterlms_action_fields' );

function awp_lifterlms_action_fields() {
     ?>
    <script type="text/template" id="lifterlms-action-template">

    </script>
    <?php
   
 }

