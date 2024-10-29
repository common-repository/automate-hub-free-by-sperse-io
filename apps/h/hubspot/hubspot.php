<?php
class AWP_Hubspot extends AWP_OAuth2 {
    const service_name            = 'hubspot';
    const authorization_endpoint  = 'https://app.hubspot.com/oauth/authorize';
    const token_endpoint          = 'https://api.hubapi.com/oauth/v1/token';
    const sperse_service_url      = 'https://sperse.io/scripts/authorization/auth.php';

    const client_id = '49dc50f4-1c1a-4a8e-9af6-6cfed7380ae5';
    const client_secret = null;
    private $account_name = null;


    private static $instance;


    public static function get_instance() {
        if ( empty( self::$instance ) ) { self::$instance = new self; }
        return self::$instance;
    }
    public function prepare_obj($objectid=false){
        $this->construct($objectid);
    }
    private function construct($objectid) {
        $this->token_endpoint         = self::token_endpoint;
        $this->authorization_endpoint = self::authorization_endpoint;
        $this->client_id=self::client_id;
        $this->client_secret=self::client_secret;

        if($objectid){
            $option=$this->get_obj_by_id($objectid);
        }

        if (isset( $option['client_id'      ])) {$this->client_id      = $option['client_id'    ];}
        if (isset( $option['client_secret'  ])) {$this->client_secret  = $option['client_secret'];}
        if (isset( $option['access_token'   ])) {$this->access_token   = $option['access_token' ];}
        if (isset( $option['refresh_token'  ])) {$this->refresh_token  = $option['refresh_token'];}
        if ( isset( $option['account_name'])) { $this->account_name = $option['account_name'];}

        //add_action( 'admin_init'                             , array( $this, 'auth_redirect'                 ));
        add_filter( 'awp_action_providers'                   , array( $this, 'awp_hubspot_actions'      ), 10, 1 );
        add_filter( 'awp_settings_tabs'                      , array( $this, 'awp_hubspot_settings_tab' ), 10, 1 );
        add_action( 'awp_settings_view'                      , array( $this, 'awp_hubspot_settings_view'), 10, 1 );
        add_action( 'admin_post_awp_save_hubspot_keys'  , array( $this, 'awp_save_hubspot_keys'    ), 10, 0 );
        add_action( 'awp_action_fields'                      , array( $this, 'action_fields'                 ), 10, 1 );
        add_action( "rest_api_init"                          , array( $this, "create_webhook_route"          ));
        add_action( 'wp_ajax_awp_get_hubspot_accounts'        , array( $this, 'awp_get_hubspot_accounts'       ), 10, 0 );
    }

    public function create_webhook_route() {
        $res=register_rest_route( 'automatehub', '/hubspot',
        array('methods' => 'GET', 'callback' => array( $this, 'get_webhook_data'),                 'permission_callback' => function() { return ''; }
        ));

    }

    public function get_webhook_data( $request ) {

        global $wpdb;
        $params = $request->get_params();

        if ( isset( $params['access_token'] ) ) {
            $this->access_token = $params['access_token'];
        } else {
            $this->access_token = null;
        }
        if ( isset( $params['refresh_token'] ) ) {
            $this->refresh_token = $params['refresh_token'];
        } else {
            $this->refresh_token = null;
        }


        $this->save_data();
        $tab=isset($params['tab'])?$params['tab']:'hubspot';
        $page=isset($params['page'])?$params['page']:'automate_hub-new';
        wp_safe_redirect( admin_url( 'admin.php?page='.$page.'&tab='.$tab ) );
        exit();
        
    }


    public function awp_hubspot_actions( $actions ) {
        $actions['hubspot'] = array(
            'title' => esc_html__( 'Hubspot', 'automate_hub'),
            'tasks' => array('add_contact'   => __( 'Create New Contact', 'automate_hub'))
        );
        return $actions;
    }

    public function awp_hubspot_settings_tab( $providers ) {
        $providers['hubspot'] = 
        array('name'=>esc_html__( 'Hubspot', 'automate_hub'), 'cat'=>array('crm')
    );
        return $providers;
    }

    public function awp_hubspot_settings_view( $current_tab ) {
        if( $current_tab != 'hubspot' ) { return; }
        ?>
    <div class="no-platformheader">
    <a href="https://sperse.io/go/hubspot" target="_blank">
        <img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/hubspot.png'); ?>"  height="50" alt="Hubspot Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
     <form name="hubspot_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
        <input type="hidden" name="action" value="awp_save_hubspot_keys">
        <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_hubspot_settings" ); ?>"/>
        <table class="form-table">
            <!-- <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Status', 'automate_hub' ); ?></th>
                <td>
                    <?php 
                    if(!empty($option['access_token'])){
                    }
                    if(!empty($option['access_token'])){
                        echo '<p class="connected-account">Connected account_name account: <b>'.$account_name_account.'</b></p>';
                    } else{
                            esc_html_e( 'Not Connected', 'automate_hub' );
                    } ?>
                </td>
            </tr> -->
            
            <tr valign="top">
                <td>
                    <a id="hubspotbtn" target="popup" class="btn btn-primary">  <?php  esc_html_e( 'Sign in With Hubspot', 'automate_hub' ); ?>
                    </a>
                    <script type="text/javascript">
                        document.getElementById("hubspotbtn").addEventListener("click", function(){
                        var win=window.open('https://app.hubspot.com/oauth/authorize?client_id=49dc50f4-1c1a-4a8e-9af6-6cfed7380ae5&redirect_uri=<?php echo esc_url(self::sperse_service_url); ?>&scope=crm.objects.contacts.read%20crm.objects.contacts.write&state=<?php echo esc_url($this->get_redirect_uri()); ?>!!page=automate_hub&tab=hubspot','popup','width=600,height=600');
                        var id = setInterval(function() {
                        const queryString = win.location.search;
                        const urlParams = new URLSearchParams(queryString);
                        const page_type = urlParams.get('page');
                        if(page_type=='automate_hub'){
                           win.close(); clearInterval(id); location.reload();
                       }
                        }, 1000);
                    });
                    </script>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <div class="wrap">
        <form id="form-list" method="post">
            <input type="hidden" name="page" value="automate_hub"/>
            <?php
            $data=['table-cols'=>['account_name'=>'Account Name','spots'=>'Active Spots','active_status'=>'Active']];
            $platform_obj= new AWP_Platform_Shell_Table('hubspot');
            $platform_obj->initiate_table($data);
            $platform_obj->prepare_items();
            $platform_obj->display_table();                    
            ?>
        </form>
    </div>
    <?php
    }

    public function awp_save_hubspot_keys() {
        if ( ! current_user_can('administrator') ){
        die( esc_html__( 'You are not allowed to save changes!','automate_hub' ) );
    }
        // Security Check
        if (! wp_verify_nonce( $_POST['_nonce'], 'awp_hubspot_settings' ) ) {
            die( esc_html__( 'Security check Failed', 'automate_hub' ) );
        }
        if(!empty($_POST['reset']) && (sanitize_text_field($_POST['reset'])=='Deactivate')){
            delete_option('ags_token');
            delete_option('ags_access_code');
            AWP_redirect( "admin.php?page=automate_hub&tab=hubspot" );
        }
        if(!empty($_POST['submit']) && !empty($_POST['awp_hubspot_access_code'])){

            $google_access_code = sanitize_text_field($_POST['awp_hubspot_access_code']);
            update_option( 'ags_access_code', $google_access_code );
                if ( get_option( 'ags_access_code' ) != '' ) {
                     $resp=$this->send_request(self::sperse_service_url,['access_code'=>get_option( 'ags_access_code' ),'action'=>'preauth'],'');
                     $resp=json_decode($resp,true);
                     update_option( 'ags_token', $resp['tokenJson'] );
                     wp_safe_redirect('admin.php?page=automate_hub&tab=hubspot');
                }
        }
    }
    function get_account_details($accountid){
        global $wpdb;
        $accountcondition=(empty($accountid)?'':' AND id='.$accountid);
        $data = array();
        $add_user_table = $wpdb->prefix.'awp_platform_settings';

        if(!empty($accountid)){

            $query = $wpdb->prepare("SELECT * FROM {$add_user_table} where active_status='true' AND id=%s", $accountid);

        }else{
            $query = $wpdb->prepare("SELECT * FROM {$add_user_table} where active_status='true'");
        }

        $results = $wpdb->get_results( $query,ARRAY_A);
        
        return $results;

    }
    function send_request($endpoint,$data,$accountid){
        $license_key  = get_option('sperse_license_key');
        $data['licenseKey']=$license_key;
        $data['ags_token']=(empty($accountid)?'':$this->get_account_details($accountid)[0]['api_key']);
        $args = array(
            'method' => 'POST',
            'headers'  => array('Content-type: application/x-www-form-urlencoded'),
            'sslverify' => false,
            'body' => $data,
            'timeout'=>'45'
        );

        $response = wp_remote_post( $endpoint, $args );
        
        if (is_wp_error($response)){
           echo "Unexpected Error! The query returned with an error.";
        }                                                                       //var_dump($response);//uncomment it if you want to look at the full response
        $response = wp_remote_retrieve_body($response); 
        return $response;
    }
    protected function authorize( $scope = '' ) {
        $endpoint = add_query_arg(
            array(
                'response_type' => 'code',
                'access_type'   => 'offline',
                'client_id'     => $this->client_id,
                'redirect_uri'  => urlencode( $this->get_redirect_uri() ),
                'scope'         => urlencode( $scope ),
            ),
            $this->authorization_endpoint
        );
        if ( wp_redirect( esc_url_raw($endpoint ))) { exit(); }
    }

    function awp_get_hubspot_accounts() {
        if ( ! current_user_can('administrator') ){
            die( esc_html__( 'You are not allowed to save changes!','automate_hub' ) );
        }
        // Security Check
        if (! wp_verify_nonce( $_POST['_nonce'], 'automate_hub' ) ) {
            die( esc_html__( 'Security check Failed', 'automate_hub' ) );
        }

        global $wpdb;
        $data = array();
        $add_user_table = $wpdb->prefix.'awp_platform_settings';

        $results = $wpdb->get_results($wpdb->prepare( "SELECT * FROM {$add_user_table} where platform_name=%s",'hubspot'), OBJECT );
        foreach ($results as $key => $value) {
                if( !empty($value->active_status) && ($value->active_status=='true')){
                    $data[$value->id] = $value->account_name;
                }   
        }
        wp_send_json_success( $data );
    }

   

    public function action_fields() { ?>
    <script type="text/template" id="hubspot-action-template">
    <?php
                    $app_data=array(
                            'app_slug'=>'hubspot',
                           'app_name'=>'Hubspot',
                           'app_icon_url'=>AWP_ASSETS.'/images/icons/hubspot.png',
                           'app_icon_alter_text'=>'Hubspot Icon',
                           'account_select_onchange'=>'',
                           'tasks'=>array(
                                        'add_contact'=>array(
                                                            
                                                        ),
                                                                                
                                    ),
                        ); 

                        require (AWP_VIEWS.'/awp_app_integration_format.php');
        ?>


    </script>    
        <?php
    }

    protected function get_obj_by_id($id) {
        $platform_obj= new AWP_Platform_Shell_Table('hubspot');
        $data=$platform_obj->awp_get_platform_detail_by_id($id);
        if(empty($data))
            return array();

        $data=[
            'client_id'=>$this->client_id,
            'access_token'=>$data->api_key,
            'refresh_token'=>$data->email,
            'account_name'=>$data->account_name,
            'platformid'=>$data->id,
        ];
        return $data;
     }

     protected function save_data_multiple($data) {
        $mapping=[
            'client_id'=>$data['client_id'],
            'account_name'=>$data['account_name'],
            'email'=>$data['refresh_token'],
            'api_key'=>$data['access_token'],
        ];
        $_POST['id']=(isset($data['platformid'])?$data['platformid']:'');
        if(empty($mapping['account_name'])){
            global $wpdb;
            $query="select * from ".$wpdb->prefix."awp_platform_settings where platform_name='hubspot'";

            $data=$wpdb->get_results($query);
            $len=count($data) + 1;
            $mapping['account_name']='Account Number '.$len;
        }
        $platform_obj= new AWP_Platform_Shell_Table('hubspot');
        $platform_obj->save_platform($mapping);
    }

    protected function save_data() {
        $option =  array(
                'client_id'     => $this->client_id,
                'client_secret' => $this->client_secret,
                'access_token'  => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'account_name' => $this->account_name,
                'platformid'=>(isset($this->platformid)?$this->platformid:''),
                
        );

        $this->save_data_multiple($option);

    }

    protected function reset_data() {
        $this->client_id          = '';
        $this->client_secret      = '';
        $this->access_token       = '';
        $this->refresh_token      = '';
        $this->save_data();
    }

    protected function get_redirect_uri() {
        return get_rest_url(null,'automatehub/hubspot');
    }


    protected function refresh_token() {
        $args = array(
            'headers' => array(
                'content-type'=>'application/x-www-form-urlencoded',
            ),
            'body'    => array(
                'refresh_token' => $this->refresh_token,
                'client_id'     => $this->client_id,
                'client_secret' => $this->client_secret,
                'grant_type'    => 'refresh_token'
                )
            );
        $response      = wp_remote_post( esc_url_raw( $this->token_endpoint ), $args );
        $response_code = (int) wp_remote_retrieve_response_code( $response );
        $response_body = wp_remote_retrieve_body( $response );
        $response_body = json_decode( $response_body, true );

        if ( 401 == $response_code ) { // Unauthorized
            $this->access_token  = null;
            $this->refresh_token = null;
        } else {
            if ( isset( $response_body['access_token'] ) ) {
                $this->access_token = $response_body['access_token'];
            } else {
                $this->access_token = null;
            }
            if ( isset( $response_body['refresh_token'] ) ) {
                $this->refresh_token = $response_body['refresh_token'];
            }
        }
        $this->save_data();
        return $response;
    }

    function generate_refresh_token($refresh_token, $old_accessToken,$accountid ){
        $license_key  = get_option('sperse_license_key');
        $data['licenseKey']=$license_key;
        $data['refresh_token']=$refresh_token;
        $data['action']='hubspot_refresh';
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
        $accountid = (int) $accountid;
        if (isset($new_accessToken)) {
            global $wpdb;
            $res = $wpdb->update($wpdb->prefix . 'awp_platform_settings', ['api_key' => $new_accessToken], ['id' => $accountid]);
        }

         return $new_accessToken;       


    }

    public function add_contact($endpoint,$properties,$accountid ) {
        $headers = array(
            "Authorization" => "Bearer ".$this->access_token,
            "Content-Type"  => "application/json"
        );


        $body=json_encode($properties);

        $args = array(
                'method'  => 'POST',
                "headers" => $headers,
                "body" => $body
        );
        $response = wp_remote_request( $endpoint, $args );
        
       
        if ( (400 <= (int) wp_remote_retrieve_response_code( $response )) ) {
            $new_accessToken= $this->generate_refresh_token( $this->refresh_token, $this->access_token,$accountid);
            if (isset($new_accessToken)) {
                $args['headers']['Authorization'] = 'Bearer ' . $new_accessToken;
                $response = wp_remote_request($endpoint, $args);
            }else{
                wp_send_json_error();
            }
           
        }
        return $response;
    }


}

$hubspot = AWP_Hubspot::get_instance();
$hubspot->prepare_obj();

/* Saves connection mapping */
function awp_hubspot_save_integration() {
    $params = array();
    parse_str( awp_sanitize_text_or_array_field( $_POST['formData'] ), $params );
    $trigger_data      = isset( $_POST["triggerData"]) ? awp_sanitize_text_or_array_field( $_POST["triggerData"]) : array();
    $action_data       = isset( $_POST["actionData" ]) ? awp_sanitize_text_or_array_field( $_POST["actionData" ]) : array();
    $field_data        = isset( $_POST["fieldData"  ]) ? awp_sanitize_text_or_array_field( $_POST["fieldData"  ]) : array();

    $integration_title = isset( $trigger_data["integrationTitle"]) ? sanitize_text_field($trigger_data["integrationTitle"]) : "";
    $form_provider_id  = isset( $trigger_data["formProviderId"  ]) ? sanitize_text_field($trigger_data["formProviderId"  ]) : "";
    $form_id           = isset( $trigger_data["formId"          ]) ? sanitize_text_field($trigger_data["formId"          ]) : "";
    $form_name         = isset( $trigger_data["formName"        ]) ? sanitize_text_field($trigger_data["formName"        ]) : "";
    $action_provider   = isset( $action_data ["actionProviderId"]) ? sanitize_text_field($action_data ["actionProviderId"]) : "";
    $task              = isset( $action_data ["task"            ]) ? sanitize_text_field($action_data ["task"            ]) : "";
    $type              = isset( $params["type"] ) ? sanitize_text_field($params["type"]) : "";
    
    $all_data = array(
        'trigger_data' => $trigger_data,
        'action_data'  => $action_data,
        'field_data'   => $field_data
    );


    global $wpdb;

    $integration_table = $wpdb->prefix . 'awp_integration';

    if ( $type == 'new_integration' ) {

        $result = $wpdb->insert(
            $integration_table,
            array(
                'title'           => $integration_title,
                'form_provider'   => $form_provider_id,
                'form_id'         => $form_id,
                'form_name'       => $form_name,
                'action_provider' => $action_provider,
                'task'            => $task,
                'data'            => json_encode( $all_data, true ),
                'status'          => 1
            )
        );
        if($result){
            $platform_obj= new AWP_Platform_Shell_Table($action_provider);
            $activePlatformId = isset($field_data['activePlatformId']) ? sanitize_text_field($field_data['activePlatformId']) :'';
            $platform_obj->awp_add_new_spot($wpdb->insert_id,$activePlatformId);
        }
    }

    if ( $type == 'update_integration' ) {

        $id = !empty($params['edit_id']) ? trim( sanitize_text_field( $params['edit_id'] ) ) : '';

        if ( $type != 'update_integration' &&  !empty( $id ) ) {
            exit;
        }

        $result = $wpdb->update( $integration_table,
            array(
                'title'           => $integration_title,
                'form_provider'   => $form_provider_id,
                'form_id'         => $form_id,
                'form_name'       => $form_name,
                'data'            => json_encode( $all_data, true ),
            ),
            array(
                'id' => $id
            )
        );
    }

    $return=array();
    $return['type']=$type;
    $return['result']=$result;
    $return['insertid']=$wpdb->insert_id;
    return $return;
}

/* Handles sending data to Hubspot API */
function awp_hubspot_send_data( $record, $posted_data ) {
    $record_data      = json_decode( $record["data"], true );
    if( array_key_exists( "cl", $record_data["action_data"] ) ) {
        if( $record_data["action_data"]["cl"]["active"] == "yes" ) {
            if( !awp_match_conditional_logic( $record_data["action_data"]["cl"], $posted_data ) ) {
                return;
            }
        }
    }
    $data      = $record_data["field_data"];
    $task      = $record["task"];
    $email      = empty( $data["email"] ) ? "" : awp_get_parsed_values( $data["email"], $posted_data );
    $first_name = empty( $data["firstName"] ) ? "" : awp_get_parsed_values( $data["firstName"], $posted_data );
    $last_name  = empty( $data["lastName"] ) ? "" : awp_get_parsed_values( $data["lastName"], $posted_data );
    $phone  = empty( $data["phone"] ) ? "" : awp_get_parsed_values( $data["phone"], $posted_data );
    $website  = empty( $data["website"] ) ? "example.com" : awp_get_parsed_values( $data["website"], $posted_data );
    $company  = empty( $data["company"] ) ? "" : awp_get_parsed_values( $data["company"], $posted_data );


    if( $task == "add_contact" ) {

        $properties = array('properties'=> array(
            'company'=>$company,
            'email'=>$email,
            'firstname'=>$first_name,
            'lastname'=>$last_name,
            'phone'=>$phone,
            'website'=>$website,
        ));
        


        $temp    = json_decode( $record["data"], true );
        $temp    = $temp["field_data"];
        $hubspot = AWP_Hubspot::get_instance();
       
        $hubspot->prepare_obj($temp['activePlatformId']);  

        $url = "https://api.hubapi.com/crm/v4/objects/contacts/";
        $request = ['method'  => 'POST', 'headers' => [
            'Content-Type' => 'application/json',
        'Authorization' => 'Bearer XXXXXXXXX' ],'body'=>$properties,
        ];

        $return = $hubspot->add_contact( $url,$properties,$temp['activePlatformId'] );

        awp_add_to_log( $return, $url, $request, $record );

    }
    return $return;
}

function awp_hubspot_resend_data($log_id,$data,$integration){
    $temp    = json_decode( $integration["data"], true );
    $temp    = $temp["field_data"];
    $platform_obj= new AWP_Platform_Shell_Table('hubspot');
    $temp=$platform_obj->awp_get_platform_detail_by_id($temp['activePlatformId']);
    $api_token=$temp->api_key;
    
    if( !$api_token ) {
        return;
    }

    $task=$integration['task'];
    $data=stripslashes($data);
    $data=preg_replace('/\s+/', '',$data); 
    $data=json_decode($data,true);
    $url=$data['url'];
    if(!$url){
        $response['success']=false;
        $response['msg']="Syntax Error! Request is invalid";
        return $response;
    }


    if( $task == "add_contact" ) {
        
        $url = "https://api.hubapi.com/crm/v3/objects/contacts?hapikey=".$api_token;
        $args = array("headers" => array('Content-Type' => 'application/json'), "body" =>json_encode($data['args']['body']));
        $response = wp_remote_post( $url, $args );

        $backurl = 'https://api.hubapi.com/crm/v3/objects/contacts?hapikey=XXXXXXXXXXXXXXXX';
        $args['body']=$data['args']['body'];
        awp_add_to_log( $response, $backurl, $args, $integration );
    }
    $response['success']=true;
    return $response;
}
