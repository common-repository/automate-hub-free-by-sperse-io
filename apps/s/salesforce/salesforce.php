<?php
class awp_Salesforce extends AWP_OAuth2 {
    
    const service_name           = 'Salesforce';
    const authorization_endpoint = 'https://login.salesforce.com/services/oauth2/authorize';
    const token_endpoint         = 'https://login.salesforce.com/services/oauth2/token';
    const refresh_token_endpoint = 'https://login.salesforce.com/services/oauth2/token';
    const salesforce_service_url = 'https://sperse.io/scripts/authorization/auth.php';


    private static $instance;
    protected      $contact_lists = array();
    protected      $refresh_token_endpoint = '';
    public static function get_instance() {
        if ( empty( self::$instance ) ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function authorize( $scope = '' ) {

        $endpoint = add_query_arg(
            array(
                'response_type' => 'code',
                'client_id'     => $this->client_id,
                'redirect_uri'  => urlencode( $this->get_redirect_uri() ),
                'scope'         => $scope,
            ),
            $this->authorization_endpoint
        );

        if ( wp_redirect( esc_url_raw( $endpoint ) ) ) {
            exit();
        }
    }

    private function __construct() {
        $this->authorization_endpoint = self::authorization_endpoint;
        $this->token_endpoint         = self::token_endpoint;
        $this->refresh_token_endpoint = self::refresh_token_endpoint;
        add_action( 'admin_init',              array( $this, 'auth_redirect' ) );
        add_filter( 'awp_action_providers', array( $this, 'awp_salesforce_actions' ), 10, 1 );
        add_filter( 'awp_settings_tabs',    array( $this, 'awp_salesforce_settings_tab' ), 10, 1 );
        add_action( 'awp_settings_view',    array( $this, 'awp_salesforce_settings_view' ), 10, 1 );
        add_action( 'awp_action_fields', array( $this, 'action_fields' ), 10, 1 );


    }

    public function auth_redirect(){
        
    }



    public function awp_salesforce_actions( $actions ) {
        $actions['salesforce'] = array(
            'title' => esc_html__( 'Salesforce', 'automate_hub'),
            'tasks' => array('create_contact'   => esc_html__( 'Create Contact', 'automate_hub'))
        );
        return $actions;
    }

public function awp_salesforce_settings_tab( $providers ) {
    $providers['salesforce'] =  array('name'=>esc_html__( 'Salesforce', 'automate_hub'), 'cat'=>array('crm')
    );
    return $providers;
}

public function awp_salesforce_settings_view( $current_tab ) {
    if( $current_tab != 'salesforce' ) {
        return;
    }

    $nonce        = wp_create_nonce( "awp_salesforce_settings" );
    $api_key      = !empty($_GET['client_id']) ? $_GET['client_id'] : '';
    $api_secret   = !empty($_GET['client_secret']) ? $_GET['client_secret'] : '' ;
    $email   = !empty($_GET['email']) ? $_GET['email'] : '' ;
    $password   = !empty($_GET['account_name']) ? $_GET['account_name'] : '' ;
    $redirect_uri = $this->get_redirect_uri();
    ?>
    <div class="platformheader">
    <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/salesforce" target="_blank"><img src="<?php echo AWP_ASSETS; ?>/images/logos/salesforce.png" width="71" height="50" alt="Salesforce Logo"></a><br/><br/>
    <div id="introbox">
        <div style="float:right;clear: both;">
            <img data-appname="Salesforce" id="videobtn" src="https://automatehubultimate.faizanjaved.com/wp-content/plugins/AutomateHub-Ultimate/assets/images/videobutton.png" style="height: 120px;width: 240px;">
        </div>
        <?php 
       // include_once (AWP_FREE_INCLUDES.'/awp_app_videos.php');
        ?>
        See the instructions below to setup your Mailjet integration: <br/> 
        1. If you don't have a Salesforce developer account, <a href="https://www.salesforce.com/apps" target="_blank">click here to create a new account</a>.<br/>
        2. Copy Redirect URI from below and paste in \'OAuth Redirect URL\' field. For further details <a href="https://help.sperse.io/?page=salesforce" target="_blank">click here</a>. <br/>
        3. Copy Client ID and Client Secret from newly created app and save here.<br/>
        4. Once you've configured your settings, <?php printf( '%s <a href="%s">%s</a>', esc_html__( 'click here to setup a ', 'automate_hub'), admin_url( 'admin.php?page=automate_hub-new'), esc_html__( 'New Form Integration', 'automate_hub')); ?> <br/>        
    </div><br/>        
    <form name="salesforce_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
    <input type="hidden" name="action" value="awp_save_salesforce_keys">
    <table class="form-table">
        <tr valign="top">
                <td>
                    <a style="cursor:pointer;" id="salesforceauthbtn" target="popup" class="button button-primary">Login with Salesforce</a>
                </td>
            </tr>
    </table>
    </form>
    </div>

    <?php
    }



    public function action_fields() {
       
    }
  



    protected function get_redirect_uri() {
        return get_rest_url(null,'automatehub/salesforce');
    }



}

$salesforce = awp_Salesforce::get_instance();
