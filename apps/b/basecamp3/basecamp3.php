<?php

class AWP_Basecamp3 {
    const appID = "";

    const redirect_uri = "https://sperse.io/scripts/authorization/auth.php";
    // secret should live in sperse.io server
    const token_endpoint = 'https://launchpad.37signals.com/authorization/token?';

    private static $instance = null;
    private $bscp3_access_token=null;

    public static function get_instance() {
        if ( empty( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {   
        $this->bscp3_access_token = get_option( 'bscp3_access_token' );
        $this->init_filters();                  // Initialize the filter hooks
        $this->init_actions();                  // Initialize the action hooks 
    }

    public function init_actions(){
      
        
        add_action( 'awp_custom_script', [$this, 'load_custom_script']);
        add_action( 'awp_settings_view', [$this, 'add_settings_view'], 10, 1 );
        add_action( "rest_api_init", [$this, "create_webhook_route"]);
        add_action( 'awp_action_fields', [$this, 'add_action_fields']);
    }

    public function init_filters(){
        add_filter( 'awp_action_providers', [$this, 'add_action_provider'], 10, 1 );

        add_filter( 'awp_settings_tabs', [$this, 'add_settings_tab'], 10, 1 );
    }

    protected function get_callback() {
        return get_rest_url(null,'automatehub/basecamp3');
    }

    public function getLoginURL():string {
        $query = [
            'type' => "web_server",
            'client_id'=> self::appID,
            'redirect_uri' => self::redirect_uri,
            'state'=> $this->get_callback(), 
        ];
    
        $authorization_endpoint = "https://launchpad.37signals.com/authorization/new?";
    
        return add_query_arg( $query , $authorization_endpoint);
    }

    public function create_webhook_route() {
        register_rest_route( 'automatehub', '/basecamp3',
        [
            'methods' => 'GET', 
            'callback' => [$this, 'get_webhook_data'], 
            'permission_callback' => function() { return ''; }
        ]);
    }

    public function get_webhook_data( $request ) {
        global $wpdb;
        $params = $request->get_params();
        if ( isset( $params['access_token'] ) ) {
            $query= $wpdb->prepare("select * from {$wpdb->prefix}awp_platform_settings where platform_name=%s",'basecamp3');
            $data=$wpdb->get_results($query);
            $len=count($data) + 1;
            $basecamp3_access_code = sanitize_text_field($params['access_token']);
            $platform_obj= new AWP_Platform_Shell_Table('basecamp3');

            $platform_obj->save_platform(['account_name'=>'Account Number '.$len,'api_key'=>$basecamp3_access_code]);
      
        }

        wp_safe_redirect( admin_url( 'admin.php?page=automate_hub&tab=basecamp3' ) );
        exit();

       
    }



    public function add_action_provider( $providers ) {
        $providers['basecamp3'] = array(
            'title' => __( 'Basecamp 3', 'automate_hub' ),
            'tasks' => array(
                'sendmsg'   => __( 'Send Campfire Line', 'automate_hub' ),
                'addtodo'   => __( 'Add todo list', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function load_custom_script() {
    }

    public function add_settings_tab( $tabs ) {
        $tabs['basecamp3'] = array('name'=>esc_html__( 'Basecamp 3', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function add_settings_view( $current_tab ) {
        if( $current_tab != 'basecamp3' ) { return; }
        $nonce     = wp_create_nonce( "awp_basecamp3_settings" );
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $api_key     = isset($_GET['api_key']) ? sanitize_text_field( $_GET['api_key']) : "";

        ?>
            <div class="platformheader" id="setting_testtt">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/basecamp3" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/basecamp3.png'); ?>" width="228" height="50" alt="Basecamp Logo"></a><br/><br/>
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
                
                <form action='admin-post.php' method="post"  class="container" >
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <input type="hidden" name="action" value="awp_edit_basecamp">
                <input type="hidden" name="awp_basecamp_api_key" >
                
                <table class="form-table">
                    <?php 
                        if(!empty($display_name)){
                    ?>
                        <tr valign="top">
                            <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                            <td>
                                <div class="form-table__input-wrap">
                                <input type="text" name="awp_basecamp_display_name" id="awp_basecamp_display_name"  placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_basecamp_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
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
                                <a id="basecamp3authbtn" target="_blank" class="button button-primary"> Link Basecamp 3 Account </a>
                            </td>
                        </tr>

                        <script type="text/javascript">
                            document.getElementById("basecamp3authbtn").addEventListener("click", function(){
                                var win=window.open('<?php echo esc_url($this->getLoginURL()); ?>','popup','width=600,height=600');
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

    public function add_action_fields() {
       
    }







};


$Awp_Basecamp3 = AWP_Basecamp3::get_instance();
