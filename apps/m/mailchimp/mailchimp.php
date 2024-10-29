<?php

class AWP_mailchimp extends Appfactory
{

    // replace with live key
    const client_id = "266074601543";

    protected function get_redirect_uri()
    {
        return 'https://sperse.io/scripts/authorization/auth.php';
    }

    public function init_actions()
    {
        add_action('admin_post_awp_mailchimp_save_api_token', [$this, 'awp_save_mailchimp_api_token'], 10, 0);
        add_action("rest_api_init", [$this, "create_webhook_route"]);
        add_action( 'wp_ajax_awp_get_mailchimp_list', [$this,'awp_get_mailchimp_list'], 10, 0 );

    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_mailchimp_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/mailchimp');
    }

    public function getLoginURL(): string
    {
        $query = [
            'client_id' => self::client_id,
            'response_type' => "code",
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://login.mailchimp.com/oauth2/authorize?";

        return add_query_arg($query, $authorization_endpoint);
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/mailchimp',
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_webhook_data'],
                'permission_callback' => function () {return '';},
            ]);
    }

    public function get_webhook_data($request)
    {
        global $wpdb;
        $params = $request->get_params();
            if ( isset( $params['access_token'] ) ) {
              $mailchimp_access_token = sanitize_text_field($params['access_token']);

              if(!empty($mailchimp_access_token)){
                $url = 'https://login.mailchimp.com/oauth2/metadata';
                $args = [
                    'headers' => array(
                        'Content-Type' => 'application/json',
                        'Authorization' =>"OAuth ".$mailchimp_access_token,
                        'Accept' => 'application/json'
                    ),

                ];
                $response  = wp_remote_request($url,  $args );
                if(!is_wp_error($response)){
                    $decoded_data = json_decode($response['body']);
                    print_r($decoded_data);
                    $accountName = $decoded_data->login->email;
                    $servername = $decoded_data->dc;
                    $platform_obj= new AWP_Platform_Shell_Table('mailchimp');
                    $platform_obj->save_platform(['account_name'=> $accountName,'client_secret'=>$servername,'api_key'=>$mailchimp_access_token]);
      
                }
              }
        
            }
        
       wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=mailchimp'));
        exit();
    }

    /*
    * Get Mailchimp subscriber lists
    */
    function awp_get_mailchimp_list() {
        
        if ( ! current_user_can('administrator') ){
            die( esc_html__( 'You are not allowed to save changes!','automate_hub' ) );
        }

        // Security Check
        if (! wp_verify_nonce( $_POST['_nonce'], 'automate_hub' ) ) {
            die( esc_html__( 'Security check Failed', 'automate_hub' ) );
        }

        if (!isset( $_POST['platformid'] ) ) {
            die( esc_html__( 'Invalid Request', 'automate_hub' ) );
        }
        $id = isset($_POST['platformid']) ?  sanitize_text_field($_POST['platformid']) :'';
        $platform_obj= new AWP_Platform_Shell_Table('mailchimp');
        $data=$platform_obj->awp_get_platform_detail_by_id($id);
        if(!$data){
            die( esc_html__( 'No Data Found', 'automate_hub' ) );
        }
        $api_key =$data->api_key;
        $prefix  = $data->client_secret;

        if( ! $api_key || ! $prefix ) {
            return array();
        }

        //$prefix = explode( "-", $api_key )[1];

        $url    = "https://{$prefix}.api.mailchimp.com/3.0/lists";

        $args = array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'OAuth ' . $api_key
            )
        );

        $data = wp_remote_request( $url, $args );
        
        if( !is_wp_error( $data ) ) {
            $body  = json_decode( $data["body"] );
            $lists = wp_list_pluck( $body->lists, 'name', 'id' );

            wp_send_json_success( $lists );
        } else {
            wp_send_json_error();
        }
    }

    public function action_provider($actions)
    {
        $actions['mailchimp'] = [
            'title' => esc_html__('Mailchimp', 'automate_hub'),
            'tasks' => array( 'subscribe'   => esc_html__( 'Subscribe To List', 'automate_hub' ),
            'unsubscribe' => esc_html__( 'Unsubscribe From List', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['mailchimp'] = array('name' => esc_html__('Mailchimp', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'mailchimp') {
            return;
        }
        $nonce = wp_create_nonce("awp_mailchimp_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        ?>
        <div class="platformheader">
            <a href="https://sperse.io/go/mailchimp" target="_blank"><img src="<?=AWP_ASSETS;?>/images/logos/mailchimp.png" width="292" height="50" alt="mailchimp Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="mailchimp_save_form" action="<?=esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_mailchimp_save_api_token">
                <input type="hidden" name="_nonce" value="<?=$nonce?>" />
                <input type="hidden" name="id" value="<?=$id?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a href="<?=$this->getLoginURL()?>" class="button button-primary"> Connect Your Mailchimp Account </a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="wrap">
            <form id="form-list" method="post">

                  <input type="hidden" name="page" value="automate_hub"/>

                  <?php
        $data = [
            'table-cols' => ['api_key' => 'API Key', 'account_name' => 'Display Name', 'active_status' => 'Active'],
        ];
        $platform_obj = new AWP_Platform_Shell_Table('mailchimp');
        $platform_obj->initiate_table($data);
        $platform_obj->prepare_items();
        $platform_obj->display_table();

        ?>
            </form>
        </div>
        <?php
    }

    public function load_custom_script()
    {
        //wp_enqueue_script('awp-mailchimp-script', AWP_URL . '/apps/c/mailchimp/mailchimp.js', array('awp-vuejs'), '', 1);
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="mailchimp-action-template">
            <?php

            $task_assignment_list=array(
                                                            'task_assignments'=>array(

                                                                                    array(
                                                                                        'label'=>'List',
                                                                                        'type'=>'select',
                                                                                        'name'=>"list_id",
                                                                                        'model'=>'fielddata.listId',
                                                                                        'required'=>'required',
                                                                                        'onchange'=>'',
                                                                                        'select_default'=>'Select Sequence...',
                                                                                        'option_for_loop'=>'(item, index) in fielddata.list',
                                                                                        'spinner'=>array(
                                                                                                        'bind-class'=>"{'is-active': listLoading}",
                                                                                                    )
                                                                                    ),
                                                                                    
                                                                                                                                                                        
                                                                                ),

                                                        );
                    $app_data=array(
                            'app_slug'=>'mailchimp',
                           'app_name'=>'Mailchimp',
                           'app_icon_url'=>AWP_ASSETS.'/images/icons/mailchimp.png',
                           'app_icon_alter_text'=>'mailchimpIcon',
                           'account_select_onchange'=>'getMailchimpList',
                           'tasks'=>array(
                                        'subscribe'=>$task_assignment_list,
                                        'unsubscribe'=>$task_assignment_list,

                                    ),
                        ); 

                    require (AWP_VIEWS.'/awp_app_integration_format.php');
                ?>

    </script>
    <?php
    }

}

$AWP_mailchimp = new AWP_mailchimp();

/*
 * Saves connection mapping
 */
function awp_mailchimp_save_integration()
{
    Appfactory::save_integration();
}


function awp_refresh_mailchimp_token($refresh_token, $old_accessToken)
{


    $license_key  = get_option('sperse_license_key');
    $data['licenseKey']=$license_key;
    $data['refresh_token']=$refresh_token;
    $data['action']='mailchimp_refresh';
    $args = array(
        'method' => 'POST',
        'headers'  => array('Content-type: application/x-www-form-urlencoded'),
        'sslverify' => false,
        'body' => $data,
        'timeout'=>'45'
    );

    $returned = wp_remote_post('https://sperse.io/scripts/authorization/auth.php', $args );
        
    if (is_wp_error($returned)){
        echo "Unexpected Error! The query returned with an error.";
    }
    $decoded_data = json_decode($returned['body']);
    $new_accessToken = $decoded_data->access_token;
    if (isset($new_accessToken)) {
        global $wpdb;
        $res = $wpdb->update($wpdb->prefix . 'awp_platform_settings', ['api_key' => $new_accessToken], ['api_key' => $old_accessToken]);
    }
    return $new_accessToken;       

}

/*
 * Handles sending data to Mailchimp API
 */
function awp_mailchimp_send_data( $record, $posted_data ) {

    $temp    = json_decode( $record["data"], true );
    $temp    = $temp["field_data"];
    
    $platform_obj= new AWP_Platform_Shell_Table('mailchimp');
    $temp=$platform_obj->awp_get_platform_detail_by_id($temp['activePlatformId']);
   
    if( ! $temp ) {
        return;
    }
    
    $api_key=$temp->api_key;
    $prefix  = $temp->client_secret;

    if( ! $api_key || ! $prefix ) {
        return;
    }

    $data    = json_decode( $record["data"], true );
    $data    = $data["field_data"];
    $list_id = $data["listId"];
    $task    = $record["task"];
    $email   = empty( $data["email"] ) ? "" : awp_get_parsed_values($data["email"], $posted_data);
    //$prefix  = explode( "-", $api_key )[1];

        $record_data = json_decode( $record["data"], true );
    if( array_key_exists( "cl", $record_data["action_data"]) ) {
        if( $record_data["action_data"]["cl"]["active"] == "yes" ) {
            $chk = awp_match_conditional_logic( $record_data["action_data"]["cl"], $posted_data );
            if( !awp_match_conditional_logic( $record_data["action_data"]["cl"], $posted_data ) ) {
                return;
            }
        }
    }

    if( $task == "subscribe" ) {

        $tags = array();

        if( isset( $data["tags"] ) ) {
            $tags = explode( ",", $data["tags"] );
        }

        unset( $data["email"] );
        unset( $data["list"] );
        unset( $data["listId"] );
        unset( $data["tags"] );

        $holder = array();

        foreach ( $data as $key => $value ) {
            if(!(is_array($value))){
                $holder[$key] = awp_get_parsed_values( $data[$key], $posted_data );
            }
        }

        $subscriber_data = array(
            "email_address"  => $email,
            "status" => "subscribed"
        );

        if( !empty( $holder ) ) {
            $subscriber_data["merge_fields"] = $holder;
        }

        if( !empty( $tags ) ) {
            $subscriber_data["tags"] = $tags;
        }

        $sub_url = "https://{$prefix}.api.mailchimp.com/3.0/lists/{$list_id}/members";

        $sub_args = array(

            'headers' => array(
                'Content-Type' => 'application/json',
                //'Authorization' => 'api_key ' . $api_key
                'Authorization' => 'OAuth ' . $api_key
            ),
            'body' => json_encode( $subscriber_data )
        );

        $return = wp_remote_post( $sub_url, $sub_args );
        $sub_args['headers']['Authorization'] = 'api_key XXXXXXXXXX';
        $sub_args['body']=$subscriber_data;
        awp_add_to_log( $return, $sub_url, $sub_args, $record );

        return;
    }

    if( $task == "unsubscribe" ) {

        $search_url  = "https://{$prefix}.api.mailchimp.com/3.0/search-members?query={$email}";
        $search_args = array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'api_key ' . $api_key
            )
        );

        $member = wp_remote_get( $search_url, $search_args );


        if( !is_wp_error( $member ) ) {
            $body      = json_decode( $member["body"], true );
            $id        = $body["exact_matches"]["members"][0]["id"];
            $unsub_url = "https://{$prefix}.api.mailchimp.com/3.0/lists/{$list_id}/members/{$id}";

            $unsub_args = array(
                'headers' => array(
                   // 'Authorization' => 'api_key ' . $api_key
                   'Authorization' => 'OAuth ' . $api_key
                ),
                'method' => 'DELETE'
            );

            $return = wp_remote_request( $unsub_url, $unsub_args );
            $unsub_args['headers']['Authorization'] = 'api_key XXXXXXXXXX';


            awp_add_to_log( $return, $unsub_url, $unsub_args, $record );

            if ( $return['response']['code'] == 204 ) {
                return $return;
            } else {
                return array( 0, $return )  ;
            }
            return $return;

        } else {
             return $return;
        }
    }
}


function awp_mailchimp_resend_data( $log_id,$data,$integration ) {

    $temp    = json_decode( $integration["data"], true );
    $temp    = $temp["field_data"];
    $platform_obj= new AWP_Platform_Shell_Table('mailchimp');
    $temp=$platform_obj->awp_get_platform_detail_by_id($temp['activePlatformId']);
    $api_key=$temp->api_key;
    

    if(!$api_key ) {
        return;
    }

    $temp    = json_decode( $integration["data"], true );
    $temp    = $temp["field_data"];
    $list_id = $temp["listId"];

    $task=$integration['task'];
    $data=stripslashes($data);
    $data=preg_replace('/\s+/', '',$data); 
    $data=json_decode($data,true);
    $url=$data['url'];
   // $prefix  = explode( "-", $api_key )[1];
    $prefix  = $temp->client_secret;
    if(!$url){
        $response['success']=false;
        $response['msg']="Syntax Error! Request is invalid";
        return $response;
    }


    if( $task == "subscribe" ) {

        $sub_args = array(

            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'OAuth ' . $api_key
            ),
            'body' => json_encode( $data['args']['body'] )
        );

        $return = wp_remote_post( $url, $sub_args );
        $sub_args['headers']['Authorization'] = 'api_key XXXXXXXXXX';
        $sub_args['body']=$data['args']['body'];

        awp_add_to_log( $return, $url, $sub_args, $integration );

    }

    if( $task == "unsubscribe" ) {
        $email=$data['args']['body']['email_address'];
        $search_url  = "https://{$prefix}.api.mailchimp.com/3.0/search-members?query={$email}";
        $search_args = array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'OAuth ' . $api_key
            )
        );

        $member = wp_remote_get( $search_url, $search_args );


        if( !is_wp_error( $member ) ) {
            $body      = json_decode( $member["body"], true );
            $id        = $body["exact_matches"]["members"][0]["id"];
            $unsub_url = "https://{$prefix}.api.mailchimp.com/3.0/lists/{$list_id}/members/{$id}";

            $unsub_args = array(
                'headers' => array(
                    'Authorization' => 'OAuth ' . $api_key
                ),
                'method' => 'DELETE'
            );

            $return = wp_remote_request( $unsub_url, $unsub_args );
            $unsub_args['headers']['Authorization'] = 'api_key XXXXXXXXXX';
            awp_add_to_log( $return, $unsub_url, $unsub_args, $integration );

            

        } else {
            $response['success']=false;
            $response['msg']="There was an error with the request please check it in activity log";
            return $response;
        }
    }

    $response['success']=true;
    return $response;
}
