<?php

add_filter( 'awp_action_providers', 'awp_woodpecker_actions', 10, 1 );

function awp_woodpecker_actions( $actions ) {
    $actions['woodpecker'] = array(
        'title' => esc_html__( 'Woodpecker.co', 'automate_hub'),
        'tasks' => array('subscribe'   => esc_html__( 'Add Subscriber', 'automate_hub'))
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_woodpecker_settings_tab', 10, 1 );

function awp_woodpecker_settings_tab( $providers ) {
    $providers['woodpecker'] = array('name'=>esc_html__( 'Woodpecker.co', 'automate_hub'), 'cat'=>array('esp'));
    return $providers;
}

add_action( 'awp_settings_view', 'awp_woodpecker_settings_view', 10, 1 );

function awp_woodpecker_settings_view( $current_tab ) {
    if( $current_tab != 'woodpecker' ) { return; }
    $nonce   = wp_create_nonce( "awp_woodpecker_settings" );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'])) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

	<a href="https://sperse.io/go/woodpecker" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/woodpecker.png'); ?>" width="202px" height="50" alt="Woodpecker Logo"></a><br/><br/>
	<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
    <form name="woodpecker_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          method="post" class="container">
        <input type="hidden" name="action" value="awp_save_woodpecker_api_key">
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_woodpecker_display_name" id="awp_woodpecker_display_name"  placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_woodpecker_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Woodpecker API Key', 'automate_hub' ); ?></th>
                <td>
					<div class="form-table__input-wrap">
				<input type="text" name="awp_woodpecker_api_key" id="awp_woodpecker_api_key"  placeholder="<?php esc_html_e( 'Please enter Woodpecker API Key', 'automate_hub' ); ?>" class="basic-text"/>
				<span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_woodpecker_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>              		</div>																																																		
				</td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    <div class="wrap">
        <form id="form-list" method="post">
                    
            
            <input type="hidden" name="page" value="automate_hub"/>

            <?php
            $data=[
                        'table-cols'=>['account_name'=>'Display name','api_key'=>'API Key','spots'=>'Active Spots','active_status'=>'Active']
                ];
            $platform_obj= new AWP_Platform_Shell_Table('woodpecker');
            $platform_obj->initiate_table($data);
            $platform_obj->prepare_items();
            $platform_obj->display_table();
                    
            ?>
        </form>
    </div>
    <?php
}




