<?php
if(class_exists('AWP_Free_Admin_Menu')){return;}
/* Class Admin_Menu */
class AWP_Free_Admin_Menu {
    
/* Class constructor. */
public function __construct() {                             
    add_action( 'admin_menu', array( $this, 'sah_admin_menu' ) );
    add_action( 'wp_ajax_awp_log_resend_request',  array( $this, 'awp_log_resend_request' ) );
    add_action( 'wp_ajax_awp_get_actionProviders',  array( $this, 'awp_get_actionProviders'), 10, 0 );
    add_action( 'wp_ajax_awp_get_allFormProviders',  array( $this, 'awp_get_allFormProviders'), 10, 0 );
    add_filter( 'admin_body_class',array($this,'sah_admin_classes' ));
    add_action( 'admin_head', [ $this, 'awp_style_upgrade_pro_link' ] );
    add_filter( 'plugin_action_links_' . plugin_basename( AWP_FREE_PATH.'/automate_hub.php' ), [ $this, 'awp_settings_link' ], 10, 4 );
}

public function awp_settings_link( $links, $plugin_file, $plugin_data, $context ) {

    $custom['pro'] = sprintf(
        '<a href="%1$s" aria-label="%2$s" target="_blank" rel="noopener noreferrer" 
            style="color: #00a32a; font-weight: 700;" 
            onmouseover="this.style.color=\'#008a20\';" 
            onmouseout="this.style.color=\'#00a32a\';"
            >%3$s</a>',
        esc_url('https://sperse.io/upgrade/'),
        esc_attr__( 'Upgrade to Automate Hub Pro', 'automate_hub' ),
        esc_html__( 'Get Automate Hub Pro', 'automate_hub' )
    );

    $custom['settings'] = sprintf(
        '<a href="%s" aria-label="%s">%s</a>',
        esc_url(
            add_query_arg(
                [ 'page' => 'automate_hub_dashboard' ],
                admin_url( 'admin.php' )
            )
        ),
        esc_attr__( 'Go to Automate Hub Dashboard', 'automate_hub' ),
        esc_html__( 'Dashboard', 'automate_hub' )
    );

    return array_merge( $custom, (array) $links );
}

	/**
	 * Define inline styles for "Upgrade to Pro" left sidebar menu item.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function awp_style_upgrade_pro_link() {

		global $submenu;


		// The "Upgrade to Pro" is 10th submenu item.
		if ( ! isset( $submenu['automate_hub_dashboard'][6] ) ) {
			return;
		}

		if ( isset( $submenu['automate_hub_dashboard'][6][4] ) ) {
			$submenu['automate_hub_dashboard'][6][4] .= ' automate-sidebar-upgrade-pro';
		} else {
			$submenu['automate_hub_dashboard'][6][] = 'automate-sidebar-upgrade-pro';
		}
        $allowed_html = array(
            'style' => array(),
        );

		echo wp_kses('<style>a.automate-sidebar-upgrade-pro { background-color: #00a32a !important; color: #fff !important; font-weight: 600 !important; }</style>',$allowed_html);
	}

function sah_admin_classes( $classes ) {
 
    if($this->sp_is_admin_or_embed_page()){
        $classes .= ' sperse-admin-page';
    }
    return $classes;
}

/** Register the admin menu. @return void **/

public function sah_admin_menu() {
    global $submenu;

	$sperse_hub =    add_menu_page(                 esc_html__( 'Automate Hub'      , 'automate_hub'), esc_html__('Automate Hub'         , 'automate_hub'), 'manage_options', 'automate_hub_dashboard', array( $this,'awp_intro'), AWP_ASSETS.'/images/sperseio.png');
    add_submenu_page( 'automate_hub_dashboard', esc_html__( 'Introduction'      , 'automate_hub'), esc_html__('Introduction'         , 'automate_hub'), 'manage_options', 'automate_hub_dashboard');
    add_submenu_page( 'automate_hub_dashboard', esc_html__( 'App Directory'     , 'automate_hub'), esc_html__('App Directory'        , 'automate_hub'), 'manage_options', 'awp_app_directory'     , array( $this,'awp_app_directory'  ));
    add_submenu_page( 'automate_hub_dashboard', esc_html__( 'Platform Settings' , 'automate_hub'), esc_html__('My Accounts'          , 'automate_hub'), 'manage_options', 'automate_hub'          , array( $this,'awp_settings'       ));
    add_submenu_page( 'automate_hub_dashboard', esc_html__( 'My Integrations'   , 'automate_hub'), esc_html__('My Integrations'      , 'automate_hub'), 'manage_options', 'my_integrations'       , array( $this,'awp_routing'        ));
    add_submenu_page( 'automate_hub_dashboard', esc_html__( 'New Integrations'  , 'automate_hub'), esc_html__('New Integrations'     , 'automate_hub'), 'manage_options', 'automate_hub-new'      , array( $this,'awp_new_integration'));
    add_submenu_page( null                    , esc_html__( 'Export Log'        , 'automate_hub'), esc_html__('Export Log'           , 'automate_hub'), 'manage_options', 'export_log'            , array( $this,'awp_export_log'     ));   
    add_submenu_page( 'automate_hub_dashboard', esc_html__( 'Activity Log'      , 'automate_hub'), esc_html__('Activity Audit Log'   , 'automate_hub'), 'manage_options', 'automate_hub_log'      , array( $this,'automate_log'       ));
    add_submenu_page('automate_hub_dashboard' , esc_html__( 'Upgrade To Pro'    , 'automate_hub'), esc_html__('Upgrade To Pro'     , 'automate_hub'), 'manage_options', 'automate_license'      , array( $this,'sp_license_management'));
    add_action( 'admin_print_scripts-'.$sperse_hub, array($this,'sah_sperse_required_scripts' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'sah_sperse_register_scripts' ) );
    add_action( 'admin_notices', array( __CLASS__, 'sp_inject_before_notices' ), -9999 );
    add_action( 'admin_notices', array( __CLASS__, 'sp_inject_after_notices' ), PHP_INT_MAX );
}

public static function sp_inject_before_notices(){
    if ( ! self::sp_is_admin_or_embed_page() ) {
            return;
        }
        $allowed_html = array(
            'div' => array(),
        );

		echo wp_kses('<div class="sperse-layout__notice-list-hide" id="wp__notice-list">',$allowed_html);
		echo wp_kses('<div class="wp-header-end" id="sperse-layout__notice-catcher"></div>',$allowed_html);
        
}

public static function sp_inject_after_notices(){
    if ( ! self::sp_is_admin_or_embed_page() ) {
            return;
        }
        $allowed_html = array(
            'div' => array(),
        );
        echo wp_kses('</div>',$allowed_html);
}

public static function sp_is_admin_or_embed_page() {
     global $current_screen;
     $sperse_pages_base = array(
        'toplevel_page_automate_hub_dashboard',
        'automate-hub_page_awp_app_directory',
        'automate-hub_page_automate_hub',
        'automate-hub_page_my_integrations',
        'automate-hub_page_automate_hub-new',
        'automate-hub_page_automate_hub_log',
        'automate-hub_page_automate_add_message_template',
        'automate-hub_page_automate_message_templates',
        'automate-hub_page_automate_license',
     );

     $is_sperse_page = (!empty($current_screen->base) && (in_array($current_screen->base, $sperse_pages_base))) ? true : false;
   
   
     return  $is_sperse_page;
}



function automate_message_templates(){
    ?>
    <?php include AWP_FREE_INCLUDES.'/header.php'; ?>
        <div class="wrap">
            <h3 class="sperse-app-page-title"><?php esc_html_e( 'Integrations', 'automate_hub' ); ?></h3>
            <a href="<?php echo esc_url(admin_url( 'admin.php?page=automate_hub-new' )); ?>" class="page-title-action"><?php esc_html_e( 'Add New', 'automate_hub' ); ?></a>
            <form id="form-list" method="post">
                <input type="hidden" name="page" value="automate_hub"/>
                <?php
                $list_table = new AWP_List_Table();
                $list_table->prepare_items();
                $list_table->display();
                ?>
            </form>
        </div>
    <?php
}

function sp_license_management() {
    require_once AWP_VIEWS . '/license.php';
}

function sah_sperse_register_scripts(){
    global $current_screen;
    if(!empty($current_screen->base) && ( $current_screen->base=='automate_hub_page_automate_license')  ){
        wp_enqueue_style( 'awp-bootstrap.min', AWP_CSS."/bootstrap.min.css" );
        wp_enqueue_script( 'sperse-editor', AWP_ASSETS.'/js/sperse_editor.js',array(),false,true);    
    }
    if(!empty($current_screen->base) && ($current_screen->base=='toplevel_page_automate_hub_dashboard')  ){
        wp_enqueue_style( 'awp-bootstrap.min', AWP_CSS."/bootstrap.min.css" );
    }
    if(!empty($current_screen->base) && ($current_screen->base=='automate-hub_page_automate_hub' || $current_screen->base=='automate-hub_page_automate_license')  ){
        wp_enqueue_script('clipboard');     
        wp_enqueue_script('awp-clipboard-custom-script', AWP_ASSETS . '/js/clipboad-custom.js', array('jquery','clipboard'), '', 1);  
    }
    
    if(!empty($current_screen->base) && ($current_screen->base=='automate-hub_page_awp_app_directory')  ){
        wp_enqueue_style( 'app-directory-style',  AWP_ASSETS."/css/app-directory-style.css",false);
        wp_enqueue_script( 'app-directory-main'   , AWP_ASSETS.'/js/app-directory-main.js',array(),true,true);  
    }

    if($this->sp_is_admin_or_embed_page()){
        $action=isset($_GET['action'])?sanitize_text_field($_GET['action']):false;
        if(!empty($current_screen->base) && ($current_screen->base!='automate-hub_page_my_integrations' || $action=='edit') ){
         wp_enqueue_style( 'awp-bootstrap.min', AWP_CSS."/bootstrap.min.css" );   
        }
        wp_enqueue_style( 'add-google-fonts',  'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap',false );
        wp_enqueue_script( 'bootstrap.min-js',  AWP_JS.'/bootstrap.min.js',array(),false,true);  

        wp_enqueue_script( 'sperse-editor'   , AWP_ASSETS . '/js/sperse_editor.js',array(),false,true);  
        $localize_scripts = array( 'nonce' => wp_create_nonce( 'automate_hub'));
        wp_localize_script('sperse-editor', 'awpObj', $localize_scripts );
    }

} 

function sah_sperse_required_scripts(){
    global $current_screen;
    wp_enqueue_script('awp-vuejs',                  AWP_ASSETS . '/js/vue.min.js', array('jquery'), '', 1);
    wp_enqueue_script('awp-main-script',            AWP_ASSETS . '/js/script.js?version='.rand(1,1000) , array('awp-vuejs'), rand(10,100), 1);
    wp_enqueue_script( 'sperse-editor',             AWP_ASSETS . '/js/sperse_editor.js',array(),false,true);  


}

/* Display the Tasks page. @return void */
public function awp_intro() {
    $action = isset( $_GET['action'] ) ? sanitize_text_field($_GET['action']) : 'list';
    if($action=='edit')
        return '';
    require_once AWP_VIEWS . '/dashboard.php';
}
        
public function awp_routing() {
    $action = isset( $_GET['action'] ) ? sanitize_text_field($_GET['action']) : 'list';
    $id     = isset( $_GET['id'] ) ? intval( sanitize_text_field($_GET['id'] )) : 0;
    $val     = isset( $_GET['val'] ) ? intval( sanitize_text_field($_GET['val'] )) : 0;
    $integration_name     = isset( $_GET['integration_name'] ) ? sanitize_text_field($_GET['integration_name'] ) : '';
    switch ( $action ) {
    case 'edit'     : $this->awp_edit($id)         ; break;
    case 'status'   : $this->awp_change_status($id,$val); break;
    case 'duplicate': $this->awp_duplicate($id)    ; break;
    case 'quickedit': $this->awp_quick_edit($id,$integration_name)    ; break;
    default         : $this->awp_list_page()       ; break;
    }
}

public function awp_quick_edit($id,$integration_name){
    global $wpdb;
    $relation_table = $wpdb->prefix . "awp_integration";
    $status_data    = $wpdb->get_row( $wpdb->prepare("SELECT * FROM {$relation_table} WHERE id = %d",$id), ARRAY_A );
   
    if(!empty($status_data) && count($status_data)>0 && !empty($integration_name)){
        $result = $wpdb->update( $relation_table,array('title' => $integration_name), array( 'id'=> $id ));
    }
    AWP_redirect( admin_url( 'admin.php?page=my_integrations' ));
    }


/* This function generates the list of connections */
public function awp_list_page() {

    if(!awp_get_active_integrations_count()){
        AWP_redirect( admin_url( 'admin.php?page=automate_hub-new' ));
    }
    if ( isset( $_GET['status'] ) ) {
        $status = sanitize_text_field($_GET['status']);
    }

    $list_table = new AWP_List_Table();
    $list_table->prepare_items();
            
?>
<?php include AWP_FREE_INCLUDES.'/header.php'; ?>
    <div class="wrap integrationstable">
        <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=my_integrations' ) ); ?>">
    		<div class="bottom-line main-log">
    		    <h3 class="sperse-app-page-title main-title"><?php esc_html_e( 'My Integration Spots', 'automate_hub' ); ?></h3>
                <?php $list_table->search_box( '.', 'search_id' ) ; ?>
                <a href="<?php echo esc_url(admin_url( 'admin.php?page=automate_hub-new' )); ?>" class="page-title-action"><?php esc_html_e( 'Add New', 'automate_hub' ); ?></a>	
    		</div>
        </form>
        <style type="text/css">
            .wp-list-table .column-id { width: 79px; }
            .wp-list-table .column-status { width: 93px; }
            .wp-list-table .column-title { width: 20%; }
        </style>
        <form id="form-list" method="post" class="form-list__wrap">
            <input type="hidden" name="page" value="automate_hub"/>
            <?php   
                $list_table->display();
            ?>
        </form>
    </div>
<?php
include AWP_VIEWS.'/context_menu.php';
}

/* Handles the app directory */
public function awp_app_directory () {
    require_once AWP_VIEWS . '/directory.php';
}
    
public function awp_export_log(){
  ?>
<?php include AWP_FREE_INCLUDES.'/header.php'; ?>
    <div class="wrap">
        <h3 class="sperse-app-page-title"><?php esc_html_e( 'Export Logs', 'automate_hub' ); ?></h3>
    </div>
    <?php
    require_once AWP_VIEWS . '/export_log.php';
}

    
/* Handles new connection */
public function awp_new_integration(){
    $form_providers   = awp_get_form_providers();
    $action_providers = awp_get_action_providers();
    ksort( $action_providers );
    require_once AWP_VIEWS . '/new_integration.php';
}

/* Handles connection view */
public function awp_view( $id='' ) {
}

/* Handles connection edit */
public function awp_edit( $id='' ) {
    if ( $id ) {
        require_once AWP_VIEWS . '/edit_integration.php';
    }
}

/* Settings Submenu View */
public function awp_settings( $value = '' ) {
    $tabs = awp_get_settings_tabs();

    if(!AWP_IS_PREMIUM){
        $free_apps = array("sperse","mailchimp","aweber","googlesheets","hubspot");
        $keep_free_apps = [];
        foreach ($tabs as $key => $tab) {
            if(in_array($key,$free_apps)){
                $keep_free_apps[$key] =  $tab;
                unset($tabs[$key]);
            }
        }
        $tabs= array_merge($keep_free_apps,$tabs);

    }

    include AWP_VIEWS . '/apps.php';
}


/* Log Submenu View */
public function automate_log( $value = '' ) {
    $action = isset( $_GET['action'] ) ? sanitize_text_field($_GET['action']) : 'list';
    $id     = isset( $_GET['id'] ) ? intval( sanitize_text_field($_GET['id'] )) : 0;
    switch ( $action ) {
        case 'view': $this->automate_log_view( $id ); break;
        default    : $this->automate_log_list_page(); break;
    }
}
public function awp_get_allFormProviders() {
    $form_providers = awp_get_form_providers();
    $allFormsArray = array(
       'buddyboss'=> "BuddyBoss", 
       'calderaforms'=>"Caldera Forms",
       'contactform7'=>"Contact Form 7",
       'elementorpro'=>"Elementor Pro Form",
       'everestforms'=>"Everest Forms",
       'fluentforms'=> "Fluent Forms",
       'formcraft'=> "Formcraft", 
       'formidable'=> "Formidable", 
       'forminator'=> "Forminator", 
       'gravityforms'=> "Gravity Forms", 
       'happyforms'=>"Happy Forms", 
       'jetengineforms'=> "JetEngine Forms",
       'ninjaforms'=> "Ninja Forms", 
       'plansoforms'=> "PlanSo Forms", 
       'smartforms'=>"Smart Forms",
       'weforms'=>  "weForms", 
       'wpforms'=> "WPForms", 
       'wsforms'=> "WSForms", 
       'woocommerce'=>  "WooCommerce", 
       //'webhooksinbound'=> "Receiver Webhook"
        );
    $formsArray = [];
    $formProviders = [];
    foreach ( $form_providers as $key => $value ) {
        $formProvider = [];
        $formProvider['id'] = $key;
        $formProvider['name'] = $value;

        switch ($key) {
            case 'webhooksinbound': $formProvider['favicon'] = AWP_ASSETS."/images/favicons/webhookin.png"     ; break;
            case 'webhookout'    : $formProvider['favicon'] = AWP_ASSETS."/images/favicons/webhookout.png"    ; break;
            default                : $formProvider['favicon'] = AWP_ASSETS."/images/favicons/".$key.".png";
                            
        }
        $formProvider['disable'] = false;
        array_push($formProviders, $formProvider);
        array_push($formsArray, $value);
     }
     $disableFroms = array_diff($allFormsArray, $formsArray);

     foreach($disableFroms as $key => $val) {
        $formProvider = [];
        $formProvider['id'] = $key;
        $formProvider['name'] = $val. "(not installed)";
        switch ($key) {
            case 'webhookout'    : $formProvider['favicon'] = AWP_ASSETS."/images/favicons/webhookout.png"    ; break;
            default                : $formProvider['favicon'] = AWP_ASSETS."/images/favicons/".$key.".png";
        }
        $formProvider['disable'] = true;
        array_push($formProviders, $formProvider);
     }
     wp_send_json_success( $formProviders);
}
public function awp_get_actionProviders() {
                $actions   = awp_get_actions();
                $providers = [];
                // $favicon = get_platform_fav('sperse');
                // $favicon = function_exists('get_platform_fav');
                foreach( $actions as $key => $value ) {
                    $provider = [];
                    $provider['id'] = $key;
                    $provider['title'] = $value['title'];
                    switch ($key) {
                        case 'webhookin'     : $provider['favicon'] = AWP_ASSETS."/images/favicons/webhookin.png"     ; break;
                        case 'webhookout'    : $provider['favicon'] = AWP_ASSETS."/images/favicons/webhookout.png"    ; break;
                      default                : $provider['favicon'] = AWP_ASSETS."/images/favicons/".$key.".png";
                                          //   $provider['favicon'] = "https://www.google.com/s2/favicons?sz=16&domain=$key.com";
                    }
                    // $providers['favicon'] = $favicon;
                    array_push($providers,$provider);
                }

                if(!AWP_IS_PREMIUM){

                    $free_apps = array("sperse","mailchimp","aweber","googlesheets","hubspot");
                    foreach($providers as $form_key => $app_value){
                        if(empty($app_value['disable']) && !(in_array($app_value['id'],$free_apps ))   ){
                           $title= isset($app_value['title']) ? sanitize_text_field($app_value['title']):'';
                            $app_value['title'] = $title."(Upgrade to pro)";
                            $app_value['disable'] = true;
                            $providers[$form_key] =  $app_value;
                        }else{
                            $app_value['disable'] = false;
                            $providers[$form_key] =  $app_value;
                        }
                    }
                }

                wp_send_json_success( $providers );
            }
            
public function awp_log_resend_request(){
    $data  = isset( $_POST['data'] ) ?  sanitize_text_field(urldecode(stripslashes($_POST['data'])) ) : '';
    $log_id  = isset( $_POST['log_id'] ) ?  sanitize_text_field($_POST['log_id'] ) : '';
    global $wpdb;
    $response=array();
    if($data != '' && $log_id != ''){
        $relation_table = $wpdb->prefix . "automate_log";
        $log    = $wpdb->get_row( $wpdb->prepare("SELECT * FROM {$relation_table} WHERE id =%d",$log_id), ARRAY_A );
        $integration_id = isset($log["integration_id"]) ? $log["integration_id"] :'';
        $relation_table = $wpdb->prefix . "awp_integration";
        $integration    = $wpdb->get_row( $wpdb->prepare("SELECT * FROM {$relation_table} WHERE id =%d",$integration_id), ARRAY_A );
        $action_provider=$integration['action_provider'];
   
        if(is_callable("awp_{$action_provider}_resend_data")){
            $response=call_user_func( "awp_{$action_provider}_resend_data", $log_id, $data,$integration );
        }
        else{
            $response['success']=false;
            $response['msg']="Log not editable";    
        }
        $relation_table = $wpdb->prefix . "automate_log";
        $log    = $wpdb->get_row( "SELECT * FROM {$relation_table} ORDER BY id DESC limit 1", ARRAY_A );
        $response['log_id']= !empty($log['id']) ? $log['id'] :'';
    }
    echo json_encode($response);
    wp_die();
}

/* Generates the list of connections */
public function automate_log_list_page() {
    if ( isset( $_GET['status'] ) ) {
        $status = sanitize_text_field($_GET['status']);
} ?>
<?php include AWP_FREE_INCLUDES.'/header.php'; ?>   
    <?php
            $list_table = new AWP_Log_Table();
            $list_table->prepare_items();
    ?>
   <div class="wrap">
        <?php $list_table->show_notification( $list_table->response ); ?>
        <fieldset>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=automate_hub_log' ) ); ?>">
            <div class="bottom-line main-log">
		    <h3 class="sperse-app-page-title main-title"><?php esc_html_e( 'My Activity Log', 'automate_hub' ); ?></h3>
            <?php
                $list_table->search_box( '.', 'search_id' );
            ?> 
                <input type="hidden" class="check" name="page" value="automate_hub_log"/>
                </div> 
                <div>
     				<?php $list_table->display(); ?>
				</div>
            </form>
        </fieldset>  
    </div>
    <?php 
}

/* Handles log view */
public function automate_log_view( $id='' ) {
    if ( $id ) {
        require_once AWP_VIEWS . '/view_log.php';
    }
}

/* Relation Status Change awp_status */
public function awp_change_status( $id = '' ,$val=0) {
    global $wpdb;

    $relation_table = $wpdb->prefix . "awp_integration";
    $status_data    = $wpdb->get_row( $wpdb->prepare("SELECT * FROM {$relation_table} WHERE id = %d",$id), ARRAY_A );
    $status         = $status_data["status"];
    //this helps to ignore double hits on url thus prevents integration status bug
    if($val){
        if($val == 1){
            //if val is 1 means that on dashboard the integration is turned on when the userclicks on it
            //so we are changing status value accordingly
            $status=1;
        }
        else{
            //
            $status=0;
        }
    }

    
    if ( $status ) {
        $action_status = $wpdb->update( $relation_table,
            array('status' => false), array( 'id'=> $id ));
        }else{
        $action_status = $wpdb->update( $relation_table,
            array('status' => true), array( 'id'=> $id ));
        }
        AWP_redirect( admin_url( 'admin.php?page=my_integrations' ) );
    }

/* Relation Status Change awp_status */
public function awp_duplicate( $id = '' ) {
     
    global $wpdb;
    $relation_table = $wpdb->prefix . "awp_integration";
    $status_data    = $wpdb->get_row($wpdb->prepare( "SELECT * FROM {$relation_table} WHERE id = %d",$id), ARRAY_A );
    if(!empty($status_data) && count($status_data)>0){
        $status_data['title'] = $status_data["title"].'_Copy';
        unset($status_data['id']);
        $result = $wpdb->insert( $relation_table, $status_data);
        $lastid = $wpdb->insert_id;
        //check if integration has childs if yes create those too
        $this->create_children($id,$lastid);
    }
    AWP_redirect( admin_url( 'admin.php?page=my_integrations' ));
    }

    public function create_children($original_integration_id,$new_parent_id){
        global $wpdb;
        $relation_table = $wpdb->prefix . "awp_integration";
        $query="SELECT * FROM {$relation_table} WHERE extra_data is not null";
        $status_data    = $wpdb->get_results( $query, ARRAY_A );
        $childrens=array();
        
        foreach ($status_data as $key => $integration) {
            if(!empty($integration['extra_data'])){
                $extra_data=json_decode($integration['extra_data'],true);
                if(isset($extra_data['parent'])){
                    $oldparent=$extra_data['parent']['integration_id'];
                    if($oldparent == $original_integration_id){
                        $extra_data['parent']['integration_id']=$new_parent_id;
                        $integration['extra_data']=json_encode($extra_data);
                        array_push($childrens, $integration);
                    }
                }
            }
        }
        //now create those childrens
        foreach ($childrens as $key => $child) {
            $child_title = isset($child["title"]) ? $child["title"]:'';
            $child['title'] = $child_title.'_Copy';
            unset($child['id']);
            $result = $wpdb->insert( $relation_table, $child);
        }
    }
}
