<?php

add_action('admin_init','awp_webhookin_permalinks_maintainer');

function awp_webhookin_permalinks_maintainer(){

    global $wpdb;
    $table_name=$wpdb->prefix.'awp_platform_settings';
    $query= "select * from $table_name where platform_name='webhookin'";
    $data=$wpdb->get_results($query);
    
    if ( get_option('permalink_structure') ) {         
        foreach ($data as $key => $value) {
            if(awp_get_url_type($value->url) ==  'plain'){
                $url=awp_get_inbound_url($value->api_key);
                $wpdb->update($table_name,['url'=>$url],['id'=>$value->id]);
            }
        }
    }
    else{
        foreach ($data as $key => $value) {
            if(awp_get_url_type($value->url) ==  'permalink'){
                $url=awp_get_inbound_url($value->api_key);
                $wpdb->update($table_name,['url'=>$url],['id'=>$value->id]);
            }
        }
    }
}

function awp_get_url_type($url){
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $query);
        if(isset($query['rest_route'])){
            return 'plain';
        }
    }
    return 'permalink';
}



add_filter( 'awp_settings_tabs', 'awp_webhookin_settings_tab', 10, 1 );

function awp_webhookin_settings_tab( $providers ) {
    $providers['webhookin'] = 
    array('name'=>esc_html__( 'Webhook Inbound', 'automate_hub'), 'cat'=>array('connector'));
    return $providers;
}


add_action( 'awp_settings_view', 'awp_webhookin_settings_view', 10, 1 );

function awp_webhookin_settings_view( $current_tab ) {
    if( $current_tab != 'webhookin' ) { return; }
        global $wpdb;
        
        $apikey=get_option('awp_webhook_api_key');
        $platform_obj= new AWP_Platform_Shell_Table('webhookin');


        awp_create_default_webhook();

        $result=$platform_obj->fetch_table_data();
        $key=count($result);
        $key=strlen($key)==2?'0':'00';
        $key=$key.(count($result)+1);
        $nonce        = wp_create_nonce( "awp_webhookin_settings" );
        $account_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $key     = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : $key;
        $url     = isset($_GET['url']) ? esc_url($_GET['url']) :awp_get_inbound_url($key);
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'])) : "";
        ?>
    <div class="platformheader">
      			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/webhookin" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/webhookin.png'); ?>" width="216" height="50" alt="Webhook Receiver Logo"></a><br/><br/>
    <form name="webhookin_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
    <input type="hidden" name="action" value="awp_save_webhookin_keys">
    <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_webhookin_settings" ); ?>"/>
    <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
    <input type="hidden" name="awp_webhookin_key" value="<?php echo esc_attr($key); ?>">
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?><br/>    
            <table class="form-table">
                
                <tr valign="top">
                    <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                    <td>
                        <div class="form-table__input-wrap">
                        <input type="text" name="awp_webhookin_account_name" id="awp_webhookin_account_name" value="<?php echo esc_attr($account_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                        <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_webhookin_account_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <?php esc_html_e( 'Webhook URL', 'automate_hub' ); ?></th>
                    <td>
                        <div class="form-table__input-wrap">
                        <input readonly="readonly" type="text" name="awp_webhookin_url" id="awp_webhookin_url" value="<?php echo esc_url($url); ?>"  class="basic-text"/>
                        <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_webhookin_url"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>                    
                    </td>
                </tr>
                
                
            </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>

    <div class="wrap">
        <form id="form-list" method="post">
                    
            
            <input type="hidden" name="page" value="automate_hub"/>

            <?php
            $data=[
                        'table-cols'=>['account_name'=>'Display Name','url'=>'API URL','spots'=>'Active Spots','active_status'=>'Active']
                ];
            $platform_obj= new AWP_Platform_Shell_Table('webhookin');
            $platform_obj->initiate_table($data);
            $platform_obj->prepare_items();
            $platform_obj->display_table();
                    
            ?>
        </form>
    </div>
    
<?php
}

add_action( 'admin_post_awp_save_webhookin_keys', 'awp_save_webhookin_keys', 10, 0 );
function awp_save_webhookin_keys(){

        if ( ! current_user_can('administrator') ){
            die( esc_html__( 'You are not allowed to save changes!','automate_hub' ) );
        }

        // Security Check
        if (! wp_verify_nonce( $_POST['_nonce'], 'awp_webhookin_settings' ) ) {
            die( esc_html__( 'Security check Failed', 'automate_hub' ) );
        }

        $account_name = isset( $_POST["awp_webhookin_account_name"] ) ? sanitize_text_field( $_POST["awp_webhookin_account_name"] ) : "";
        $url = isset( $_POST["awp_webhookin_url"] ) ? sanitize_text_field( $_POST["awp_webhookin_url"] ) : "";
        $key = isset( $_POST["awp_webhookin_key"] ) ? sanitize_text_field( $_POST["awp_webhookin_key"] ) : "";
        if($key!="001"){
            //does not save any api_key that is 001 (reserved) because it is created and handled programitically
            $platform_obj= new AWP_Platform_Shell_Table('webhookin');
            $platform_obj->save_platform(['url'=>$url,'account_name'=>$account_name,'api_key'=>$key]);    
        }
        
        AWP_redirect( "admin.php?page=automate_hub&tab=webhookin" );
}



