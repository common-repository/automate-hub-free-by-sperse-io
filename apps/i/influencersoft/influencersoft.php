<?php

add_filter( 'awp_action_providers', 'aws_influencersoft_actions', 10, 1 );
// ****************************************** 
// *** ACTIONS AVAILABLE IN InfluenserSoft        *** 
// ****************************************** 
function aws_influencersoft_actions( $actions ) {
    $actions['influencersoft'] = array(
        'title' => esc_html__( 'InfluencerSoft', 'automate_hub'),
        'tasks' => array(
            'createLead'  => esc_html__( 'Add a Contact to a Group'  , 'automate_hub' ),
            'UpdateSubscriberData'  => esc_html__('Edit the Existing Contact'        , 'automate_hub' ),
            'unsubscribe' => esc_html__( 'Unsubscribe Contact from Group', 'automate_hub' ),            
        )
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'aws_influencersoft_settings_tab', 10, 1 );

function aws_influencersoft_settings_tab( $providers ) {
    $providers['influencersoft'] = 
    array(
        'name'=>esc_html__( 'InfluencerSoft', 'automate_hub'),
        'cat'=>array('crm,esp')
    );
    return $providers;
}

add_action( 'awp_settings_view', 'aws_influencersoft_settings_view', 10, 1 );

// ************************************************** 
// ***  INFLUENCERSOFT SETTINGS AND INSTRUCTIONS  *** 
// ************************************************** 
function aws_influencersoft_settings_view( $current_tab ) {
    if( $current_tab != 'influencersoft' ) { return; }
    $nonce      = wp_create_nonce( "awp_sperse_settings" );
    $api_key    = get_option( 'awp_sperse_api_key' ) ? get_option( 'awp_sperse_api_key' ) : "";
    $url        = get_option( 'awp_sperse_url') ? get_option( 'awp_sperse_url' ) : "";
    $Environment_url = array( 'https://testadmin.sperse.com','https://testadmin.sperse.com','https:/beta.sperse.com');
    $action = isset( $_GET['action'] ) ? sanitize_text_field($_GET['action']) : 'list';
    $id     = isset( $_GET['account_id'] ) ? intval( sanitize_text_field($_GET['account_id']) ) : 0;
    $sync_contact_id = isset( $_GET['sync_contacts'] ) ? intval(sanitize_text_field( $_GET['sync_contacts']) ) : 0;
    switch ( $action ) {
        case 'edit'         : aws_sperse_settings( $id )                     ; aws_list_page() ; break;
        case 'status'       : aws_change_status($id)                         ; aws_list_page() ; break;
        case 'active_status': aws_change_active_status($id)                  ; aws_list_page() ; break;    
        case 'sync_contacts': aws_change_sync_contacts($id, $sync_contact_id); aws_list_page() ; break;      
        default             : aws_sperse_settings()                          ; aws_list_page() ; break;
    }
}


    
    function aws_change_active_status( $id = '' ) {
        global $wpdb;
        $relation_table = $wpdb->prefix . "influencersoft_accounts";
        $action_status = $wpdb->update( $relation_table,
                array( 'active_status' => "yes", ),
                array( 'account_id'=> $id )
            );
       AWP_redirect( admin_url( 'admin.php?page=automate_hub' ) );
    }
    
   function aws_change_status( $id = '' ) {
        global $wpdb;
        $relation_table = $wpdb->prefix . "awp_integration";

        $status_data    = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$relation_table} WHERE account_id = %d", $id), ARRAY_A );
        $status         = $status_data["status"];
        if ( $status ) {
            $action_status = $wpdb->update( $relation_table,
                array( 'status' => false, ),
                array( 'id'=> $id )
            );
        }else{
            $action_status = $wpdb->update( $relation_table,
                array('status' => true,),
                array( 'id'=> $id )
            );
        }
        AWP_redirect( admin_url( 'admin.php?page=automate_hub' ) );
    }
    
    function aws_list_page() {
        if ( isset( $_GET['status'] ) ) {
            $status = sanitize_text_field($_GET['status']);
        }
        ?>
        <?php
    }

function aws_sperse_settings($id=''){
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $url     = isset($_GET['url']) ? esc_url($_GET['url']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
   	$data=array();
   	if(!empty($id)){
   	    global $wpdb;
        $relation_table = $wpdb->prefix . "influencersoft_accounts";
        $data    = $wpdb->get_row(  $wpdb->prepare("SELECT * FROM {$relation_table} WHERE account_id = %d",$id), ARRAY_A );
  	}

?>
<div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

<a href="https://sperse.io/go/influencersoft" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/influencersoft.png'); ?>" width="367" height="50" alt="Influencersoft Logo"></a><br/><br/>
<?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
<form name="sperse_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
<input type="hidden" name="account_id" value="<?php echo esc_attr($id); ?>">
<input type="hidden" name="action" value="aws_save_sperse_api_key">
<input type="hidden" name="_nonce" value="<?php echo wp_create_nonce('aws_sperse_settings'); ?>"/>
<input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">



<table class="form-table">
    <tr valign="top">
        <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
        <td>
            <div class="form-table__input-wrap">
            <input type="text" name="awp_influencersoft_display_name" id="awp_influencersoft_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
            <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_influencersoft_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
            </div>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"> <?php esc_html_e( 'InfluencerSoft API Key', 'automate_hub' ); ?></th>
        <td>
			<div class="form-table__input-wrap">
			<input type="text" name="aws_sperse_api_key" id="aws_sperse_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Paste your InfluencerSoft API Key here', 'automate_hub' ); ?>" class="basic-text"/>
            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#aws_sperse_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
        </div></td>
    </tr>
    <tr valign="top">
        <th scope="row"> <?php esc_html_e( 'Environment URL', 'automate_hub' ); ?></th><?php $aws_sperse_url =  !empty($data['base_url']) ? $data['base_url'] : ''; ?>
        <td>
			<div class="form-table__input-wrap">
			<input type="text" name="aws_sperse_url" id="aws_sperse_url" value="<?php echo esc_url($url); ?>" placeholder="<?php esc_html_e( 'Enter your InfluencerSoft Environment URL', 'automate_hub' ); ?>" class="basic-text"/>
            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#aws_sperse_url"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
        </div></td>
    </tr>
</table>
<div class="submit-button-plugin">
<div class="submit-button-plugin"><?php submit_button(); ?></div>
</div>
</form>
</div>
<?php 
}

add_action( 'awp_action_fields', 'aws_influencersoft_action_fields' );

// ****************************************** 
// *** Map Fields for Login Action        *** 
// ****************************************** 
function aws_influencersoft_action_fields() {
    ?>
    <script type="text/template" id="influencersoft-action-template">
               
    </script>
    <?php
}

