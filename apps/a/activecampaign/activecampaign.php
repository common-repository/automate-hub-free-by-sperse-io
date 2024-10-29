<?php
    $platform_obj= new AWP_Platform_Shell_Table('activecampaign');
    add_filter( 'awp_settings_tabs','awp_activecampaign_settings_tab' , 10, 1 );
    add_action( 'awp_action_providers','awp_activecampaign_actions' , 10, 1 );
    add_action( 'awp_settings_view','awp_activecampaign_settings_view' , 10, 1 );

    function awp_activecampaign_settings_tab( $providers ) {
        $providers['activecampaign'] = array('name'=>esc_html__( 'Active Campaign', 'automate_hub'), 'cat'=>array('crm'));
        return $providers;
    }
    function awp_activecampaign_actions( $actions ) {
        $actions['activecampaign'] = array('title'     => esc_html__( 'Active Campaign'    , 'automate_hub'), 
                          'tasks' => array('subscribe' => esc_html__( 'Add Contact To List', 'automate_hub')));
        return $actions;
    }


    function awp_activecampaign_settings_view( $current_tab ) {
        if( $current_tab != 'activecampaign' ) { return; }
        $nonce   = wp_create_nonce( "awp_activecampaign_settings" );
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $api_key = isset($_GET['api_key']) ?  sanitize_text_field($_GET['api_key']) : "";
        $url     = isset($_GET['url']) ? sanitize_text_field($_GET['url']) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>


        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

        <a href="https://sperse.io/go/activecampaign" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/activecampaign.png'); ?>" width="255" height="50" alt="ActiveCampaign Logo"></a><br/><br/>
        <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                    
        ?>
                <br/>

        <form name="activecampaign_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
            <input type="hidden" name="action" value="awp_save_activecampaign_api_key">
            <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                    <td>

                        <div class="form-table__input-wrap">
                        <input type="text" name="awp_activecampaign_display_name" id="awp_activecampaign_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                        <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_activecampaign_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <?php esc_html_e( 'ActiveCampaign URL', 'automate_hub' ); ?></th>
                    <td>
						<div class="form-table__input-wrap">
						<input type="text" name="awp_activecampaign_url"  id="awp_activecampaign_url" value="<?php echo esc_url($url); ?>" placeholder="<?php esc_html_e( 'Enter your ActiveCampaign URL', 'automate_hub' ); ?>" class="basic-text"/>
                        <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_activecampaign_url"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
						</div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <?php esc_html_e( 'ActiveCampaign Key', 'automate_hub' ); ?></th>
                    <td>
						<div class="form-table__input-wrap">
						<input type="text" name="awp_activecampaign_api_key" id="awp_activecampaign_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Enter your ActiveCampaign Key', 'automate_hub' ); ?>" class="basic-text"/>
                        <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_activecampaign_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
						</div>
                    </td>
                </tr>
            </table>
            <div class="submit-button-plugin"><?php submit_button(); ?></div>
        </form>
 
        </div>
        <?php
        
    }




