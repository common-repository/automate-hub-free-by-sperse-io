<?php
class AWP_zoho extends AWP_OAuth2 {
    const service_name           = 'zoho';
    const authorization_endpoint = 'https://accounts.zoho.com/oauth/v2/auth';
    const token_endpoint         = 'https://accounts.zoho.com/oauth/v2/token';
    const refresh_token_endpoint = 'https://accounts.zoho.com/oauth/v2/token';
    const sperse_service_url      = 'https://sperse.io/scripts/authorization/auth.php';
    const client_id = '1000.KMJ3V4C60JOE86PV3LI8ANRIRFJ18E';

    private static $instance;    
    //protected $contact_lists = array();
    private $refresh_token_endpoint=null;
    public static function get_instance() {
        if ( empty( self::$instance ) ) {self::$instance = new self;}
        return self::$instance;
    }
    public function prepare_obj($objectid=false){
        $this->construct($objectid);
    }
    private function construct($objectid) {
        $this->authorization_endpoint = self::authorization_endpoint;
        $this->token_endpoint         = self::token_endpoint;
        $this->refresh_token_endpoint = self::refresh_token_endpoint;
        $this->client_id=self::client_id;
        if($objectid){
            $option=$this->get_obj_by_id($objectid);
        }

        if ( isset( $option['platformid'    ])) { $this->platformid     = $option['platformid'    ];}
        if ( isset( $option['client_id'    ])) { $this->client_id     = $option['client_id'    ];}
        if ( isset( $option['access_token' ])) { $this->access_token  = $option['access_token' ];}
        if ( isset( $option['refresh_token'])) { $this->refresh_token = $option['refresh_token'];}
        if ( isset( $option['account_name'])) { $this->account_name = $option['account_name'];}

        add_filter( 'awp_action_providers'         , array( $this, 'awp_zoho_actions'       ), 10, 1 );
        add_filter( 'awp_settings_tabs'            , array( $this, 'awp_zoho_settings_tab'  ), 10, 1 );
        add_action( 'awp_settings_view'            , array( $this, 'awp_zoho_settings_view' ), 10, 1 );
        add_action( 'admin_post_awp_save_zoho_keys', array( $this, 'awp_save_zoho_keys'     ), 10, 0 );
        add_action( 'awp_action_fields'            , array( $this, 'action_fields'          ), 10, 1 );
        add_action( 'wp_ajax_awp_get_zoho_list'    , array( $this, 'get_zoho_list'          ), 10, 0 );
        add_action( "rest_api_init"                , array( $this, "create_webhook_route"   ));
     
    }


 
    public function create_webhook_route() {
        register_rest_route( 'automatehub', '/zoho',
            array('methods' => 'GET', 'callback' => array( $this, 'get_webhook_data' ), 'permission_callback' => '__return_true'));
    }

    public function get_webhook_data( $request ) {
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
        if ( isset( $params['api_domain'] ) ) {
            $this->api_domain = $params['api_domain'];
        } else {
            $this->api_domain = null;
        }
        $this->save_data();
        wp_safe_redirect( admin_url( 'admin.php?page=automate_hub&tab=zoho' ) );
        exit();
       
    }

    public function awp_zoho_actions( $actions ) {
        $actions['zoho'] = array(
            'title' => esc_html__( 'ZOHO Campaigns', 'automate_hub' ),  
            'tasks' => array('subscribe'  => esc_html__( 'Subscribe To List', 'automate_hub'))
        );
        return $actions;
    }

    public function awp_zoho_settings_tab( $providers ) {
        $providers['zoho'] = esc_html__( 'ZOHO Campaigns', 'automate_hub' );
        return $providers;
    }

    public function awp_zoho_settings_view( $current_tab ) {
    if( $current_tab != 'zoho' ) { return; }
    $option        = (array) maybe_unserialize( get_option( 'awp_zoho_keys' ) );
    $nonce         = wp_create_nonce( 'awp_zoho_settings' );
    $redirect_uri  = $this->get_redirect_uri();
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'])) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field( $_GET['account_name']) : "";

    ?>
    <div class="platformheader">
    <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
    <a href="https://sperse.io/go/zohocampaigns" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/zoho.png'); ?>" width="140" height="50" alt="Zoho Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>       
    <form name="zoho_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
    <input type="hidden" name="action" value="awp_save_zoho_keys">
    <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)) ?>">
    <table class="form-table">      
        <?php 
                        if(!empty($display_name)){
                    ?>
                        <tr valign="top">
                            <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                            <td>
                                <div class="form-table__input-wrap">
                                <input type="text" name="awp_zoho_display_name" id="awp_zoho_display_name"  placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_zoho_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                                </div>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"></th>
                            <td>
                      
                                    <div class="submit-button-plugin"><?php submit_button(); ?></div>
                              
                            </td>
                        </tr>
                        

                    <?php
                        }
                        else{
                    ?>


                        <tr valign="top">
                            <th scope="row"> </th>
                            <td>
                                <a href="" id="zohoauthbtn" target="_blank" class="button button-primary"> Link Zoho Account</a>
                            </td>
                        </tr>


                        <script type="text/javascript">
                            document.getElementById("zohoauthbtn").addEventListener("click", function(){
                                var win=window.open('','popup','width=600,height=600');
                                var id = setInterval(function() {
                                const queryString = win.location.search;
                                const urlParams = new URLSearchParams(queryString);
                                const page_type = urlParams.get('page');
                                if(page_type=='automate_hub'){win.close(); clearInterval(id); location.reload();}
                                }, 1000);
                            });
                        </script>


                    <?php
                        }
                    ?>
    </table>
    </form>
    </div>

    <?php
    }



    function getLoginURL(){
        return $this->authorize( 'ZohoCRM.users.ALL,aaaserver.profile.READ,ZohoCampaigns.contact.ALL' );
    }



    protected function authorize( $scope = '' ) {
        $data = array(
            'response_type' => 'code',
            'access_type'   => 'offline',
            'prompt'        => 'consent',
            'client_id'     => $this->client_id,
            'state'        => urlencode( $this->get_redirect_uri() ),
            'redirect_uri'  => self::sperse_service_url,
        );
        if( $scope ) {$data["scope"] = $scope;}
        $endpoint = add_query_arg( $data, $this->authorization_endpoint );
    
        return $endpoint;
    }

    public function action_fields() {?>
        <script type="text/template" id="zoho-action-template">
        </script>
        <?php
    }


    protected function get_obj_by_id($id) {
        $platform_obj= new AWP_Platform_Shell_Table('zoho');
        $data=$platform_obj->awp_get_platform_detail_by_id($id);
        $data=[
            'client_id'=>$data->client_id,
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
            'api_key'=>$data['access_token'],
            'email'=>$data['refresh_token'],
            'account_name'=>(isset($data['account_name'])?$data['account_name']:''),
            
        ];


        $_POST['id']=(isset($data['platformid'])? sanitize_text_field($data['platformid']):'');

        if(empty($mapping['account_name'])){
            global $wpdb;
            $query= "select * from {$wpdb->prefix}awp_platform_settings where platform_name='zoho'";

            $data=$wpdb->get_results($query);
            $len=count($data) + 1;
            $mapping['account_name']='Account Number '.$len;
        }
        $platform_obj= new AWP_Platform_Shell_Table('zoho');
        $platform_obj->save_platform($mapping);
     
  
    }
    protected function save_data() {
        $option = 
        array(
            'client_id'     => $this->client_id,
            'access_token'  => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'account_name' => (isset($this->account_name)?$this->account_name:''),
            'platformid'=>(isset($this->platformid)?$this->platformid:''),
            
        );

       $this->save_data_multiple($option);
    }

    protected function reset_data() {
        $this->client_id     = '';
        $this->access_token  = '';
        $this->refresh_token = '';
        $this->api_domain    = '';
        $this->save_data();
    }

    protected function get_redirect_uri() {
        return get_rest_url(null,'automatehub/zoho');
    }

    public function create_contact($endpoint ) {
        
        $request = ['method'  => 'POST', 'headers' => [
                'Accept'       => 'application/json',
                'Content-Type' => ' application/x-www-form-urlencoded',
            'Authorization' => 'Zoho-oauthtoken ' . $this->access_token ],
            'body'    => "",];

        $response = $this->remote_request( $endpoint, $request );
        return $response;
    }
    protected function refresh_token() {

        $endpoint = add_query_arg(
            array(
                'refresh_token' => $this->refresh_token,
                'grant_type'    => 'refresh_token',
            ),
            $this->refresh_token_endpoint
        );

        $request = [
            'headers' => array(
                'Authorization' => $this->get_http_authorization_header( 'basic' ),
            ),
        ];

        $response      = wp_remote_post( esc_url_raw( $endpoint ), $request );
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
    protected function remote_request( $url, $request = array() ) {
        static $refreshed = false;
        $request = wp_parse_args( $request, [ ] );
        $request['headers'] = array_merge(
            array( 'Authorization' => $this->get_http_authorization_header( 'bearer' ), ),
            $request['headers']
        );
        $response = wp_remote_request( esc_url_raw( $url ), $request );
        if ( 401 === wp_remote_retrieve_response_code( $response )
            and !$refreshed
        ) { 
    
            $this->refresh_token();
            $refreshed = true;
            $response = $this->remote_request( $url, $request );
        }
        $response_body = wp_remote_retrieve_body( $response );
        $response_body = json_decode( $response_body, true );
        
        if( isset( $response_body["message"] ) ) {
            if ( "Unauthorized request." == $response_body["message"] ) {
                
                $this->refresh_token();
                $refreshed = true;
                $response = $this->remote_request( $url, $request );
            }
        }
        return $response;
    }
}

$zoho = AWP_zoho::get_instance();
$zoho->prepare_obj();
