<?php
class AWP_keap extends AWP_OAuth2 {
    const service_name           = 'keap';
    const authorization_endpoint = 'https://accounts.infusionsoft.com/app/oauth/authorize';
    const token_endpoint         = 'https://api.infusionsoft.com/token';
    const refresh_token_endpoint = 'https://api.infusionsoft.com/token';
    const sperse_service_url      = 'https://sperse.io/scripts/authorization/auth.php';
    const client_id = '';
    private static $instance;    
    //protected $contact_lists = array();
    private $refresh_token_endpoint = null; 

    public static function get_instance() {
        if ( empty( self::$instance ) ) {self::$instance = new self;}
        return self::$instance;
    }

    public function prepare_obj($objectid=false){
        $this->construct($objectid);
    }
    private function construct($objectid) {
        $option=array();
        $this->authorization_endpoint = self::authorization_endpoint;
        $this->token_endpoint         = self::token_endpoint;
        $this->refresh_token_endpoint = self::refresh_token_endpoint;
        $this->client_id=self::client_id;
        
        add_filter( 'awp_action_providers'         , array( $this, 'awp_keap_actions'       ), 10, 1 );
        add_filter( 'awp_settings_tabs'            , array( $this, 'awp_keap_settings_tab'  ), 10, 1 );
        add_action( 'awp_settings_view'            , array( $this, 'awp_keap_settings_view' ), 10, 1 );
        add_action( 'awp_action_fields'            , array( $this, 'action_fields'          ), 10, 1 );


    }






    public function awp_keap_actions( $actions ) {
        $actions['keap'] = array('title' => esc_html__( 'Keap', 'automate_hub' ),  'tasks' => array('add_contact'  => esc_html__( 'Add Contact', 'automate_hub')));
        return $actions;
    }

    public function awp_keap_settings_tab( $providers ) {
        $providers['keap'] = esc_html__( 'Keap', 'automate_hub' );
        return $providers;
    }

    public function awp_keap_settings_view( $current_tab ) {
    if( $current_tab != 'keap' ) { return; }
    $option        = (array) maybe_unserialize( get_option( 'awp_keap_keys' ) );
    $nonce         = wp_create_nonce( 'awp_keap_settings' );
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
    $redirect_uri  = $this->get_redirect_uri();
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
    <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
    <a href="https://sperse.io/go/keap" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/keap.png'); ?>" width="111" height="50" alt="Keap Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?><br/>       
    <form name="keap_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
    <input type="hidden" name="action" value="awp_save_keap_keys">
    <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( 'awp_keap_settings' ); ?>"/>
    <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">


    <table class="form-table">      
        <?php
         if(!empty($display_name)){
                    ?>
                        <tr valign="top">
                            <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                            <td>
                                <div class="form-table__input-wrap">
                                <input type="text" name="awp_keap_display_name" id="awp_keap_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_keap_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
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
                                <a id="keapauthbtn" target="_blank" class="button button-primary"> Link Keap Account</a>
                            </td>
                        </tr>

                    <?php
                        }
                    ?>
    </table>
    </form>
    </div>

    <?php
    }


    function getLoginURL(){
        return $this->authorize( 'full' );
    }


    public function action_fields() {?>
        <script type="text/template" id="keap-action-template">
        </script>
        <?php
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


        
    }

    protected function reset_data() {
        $this->client_id     = '';
        $this->access_token  = '';
        $this->refresh_token = '';
        $this->account_name = '';
      
        $this->save_data();
    }

    protected function get_redirect_uri() {
        return get_rest_url(null,'automatehub/keap');

    }


}

$keap = AWP_keap::get_instance();
$keap->prepare_obj();

