<?php
/* Plugin Name: Automate Hub Free by Sperse.io
 * Description: Connect and automate your WordPress forms and workflows with Sperse CRM, and dozens of other major CRMs, Marketing and Webinar systems, SMS & unified messaging platforms and Email Service Providers (ESPs).
 * Author: Sperse.IO   
 * Author URI: https://sperse.io
 * Plugin URI: https://sperse.io/automate
 * Version: 1.7.0
 * License: GPLv2 or later
 * Text Domain: automate-hub
 * Domain Path: languages
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 * This is an add-on for WordPress http://wordpress.org
 *
 * Copyright 2018-2024 Sperse, Inc.
 * 
 * Sperse.io Automate Hub and App Marketplace is distributed under the 
 * terms of the GNU General Public License as published by the Free 
 * Software Foundation, either version 2 or later version of the License.
 * 
 * This program is distributed in the hope that it will be useful, but 
 * WITHOUT ANY WARRANTY; without even the implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 * See the GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses.
 * 
 * @package Sperse.IO Automate Hub
 * @author  Sperse.IO
 */

if ( !defined( 'ABSPATH' ) ) { exit; }  // don't call the file directly

/* SPERSE.IO AUTOMATE HUB MAIN CLASS */
class SPERSEFREE
{
    /* Plugin Version @var  string */
    public  $version = '1.7.0' ; 

    /* Plugin Prefic @var  string */
    public  $plugin_prefix = 'sah' ; 

     /* Plugin type @var  Boolean */
     public  $is_premium = false ; 

    /**  Free Plugin @var string */
     public $plugin_type="Free";

    /* Initializes the SPERSE class | Checks for an existing SPERSE instance and if it doesn't find one, creates it.
     * @since 1.0.0 @return mixed | bool 
     */
    public static function init()
    {   static  $instance = false ;
        if ( !$instance ) { $instance = new SPERSEFREE(); }
        return $instance;
    }
    
    /* Constructor for the SPERSE class | Sets up all the appropriate hooks and actions
     * @since 1.0 @return void 
     */

    public function __construct()
    {   
        register_activation_hook( __FILE__, [ $this, 'sah_activate' ] );
        register_deactivation_hook( __FILE__, [ $this, 'sah_deactivate' ] );
        if( is_multisite() ){
          add_action( 'wpmu_new_blog', array( $this, 'awp_new_blog_generate'), 10, 6 );
          add_filter( 'wpmu_drop_tables', array( $this, 'awp_blog_delete') );
        }
        $this->sah_init_plugin();        
    }
    
    /* Initialize plugin  
     * @since 1.0.0 @return void 
     */
    public function sah_init_plugin()
    {   
         $this->sah_define_constants();              // Define constats
         $this->sah_includes();                      // Include files
         $this->sah_init_classes();                  // Instantiate classes
         $this->sah_init_actions();                  // Initialize the action hooks 
         $this->sah_init_filters();                  // Initialize the filter hooks
    }

     function awp_new_blog_generate(  $blog_id, $user_id, $domain, $path, $site_id, $meta ){
            if ( is_plugin_active_for_network( plugin_basename(__FILE__) ) ) {
               switch_to_blog( $blog_id );
               $this->sah_create_table();
               $this->sah_create_webhook();
               $this->sah_activate_l_status();
               require_once(AWP_FREE_INCLUDES .'/class_awp_updates_manager.php');
               $obj=new AWP_Updates_Manager();
               $obj->trigger_action('plugin_activated');
               $ip = getUserIpAddrForSperse();
               $obj->trigger_action('ip_address',$ip );
               restore_current_blog();
             } 
     }

      function awp_blog_delete( $tables ){
        global $wpdb;
        $tables[] = str_replace( $wpdb->base_prefix, $wpdb->prefix, 'awp_integration' );
        $tables[] = str_replace( $wpdb->base_prefix, $wpdb->prefix, 'awp_message_template' );
        $tables[] = str_replace( $wpdb->base_prefix, $wpdb->prefix, 'automate_log' );
        $tables[] = str_replace( $wpdb->base_prefix, $wpdb->prefix, 'userCreatedOrUpdated' );
        return $tables; 
     }
     public function sah_create_webhook(){
        if(empty(get_option('awp_webhook_api_key')) || get_option('awp_webhook_api_key')== '' ){
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $hyphen = chr(45);// "-"
                $api_key = substr($charid, 0, 8).$hyphen
                        .substr($charid, 8, 4).$hyphen
                        .substr($charid,12, 4).$hyphen
                        .substr($charid,16, 4).$hyphen
                        .substr($charid,20,12);
                update_option("awp_webhook_api_key",$api_key);
                
        }
        awp_create_default_webhook();
     }
    
    /* Placeholder for activation function
     * @since 1.0 @return void
     */
    public function sah_activate($network_wide)
    {   
        if ( is_multisite() && $network_wide ) {
                global $wpdb;
                $currentblog = $wpdb->blogid;
                $activated = array();
                $blog_ids = get_sites();
                foreach ( $blog_ids as $blog_id ) {
                    
                    switch_to_blog( $blog_id->blog_id  );

                    $this->sah_create_table();
                    $this->sah_create_webhook();
                    $activated[] = $blog_id->blog_id;
                    $this->sah_activate_l_status();
                    
                }
                switch_to_blog( $currentblog );
                update_site_option( 'sp_activated', $activated );
        }else{
            $this->sah_create_table();  
            $this->sah_create_webhook();    
            require_once(AWP_FREE_INCLUDES .'/class_awp_updates_manager.php');
            $obj=new AWP_Updates_Manager();
            $obj->trigger_action('plugin_activated');  
            $ip = getUserIpAddrForSperse();
            $obj->trigger_action('ip_address',$ip);
            $this->sah_activate_l_status();
        }      // Create default tables when plugin activates
    }
    
    /* Placeholder for creating tables while activationg plugin
     * @since 1.0 @return void
     */
    private function sah_create_table()
    {  
        require_once dirname(__FILE__) . '/includes/awp-default-settings.php';
    }
    
    /* Placeholder for deactivation function
     * @since 1.0 @return void
     */
    public function sah_deactivate()
    {   
        update_option('sperse_license_key','');
        require_once(AWP_FREE_INCLUDES .'/class_awp_updates_manager.php');
        $obj=new AWP_Updates_Manager();
        $obj->trigger_action('plugin_deactivated');
    }
    
    /* Define Add-on Constants*/
    public function sah_define_constants()
    {   
        $this->sah_define( 'AWP_VERSION'  , $this->version            );           // Plugin Version
        $this->sah_define( 'AWP_PLUGIN'  , $this->plugin_type);                 // Plugin Type
        $this->sah_define( 'AWP_IS_PREMIUM'  , $this->is_premium);                 // Plugin Version
        $this->sah_define( 'AWP_FILE'     , __FILE__                  );           // Plugin Main Folder Path
        $this->sah_define( 'AWP_FREE_PATH'     , dirname(AWP_FILE)         );           // Parent Directory Path
        $this->sah_define( 'AWP_URL'      , plugins_url('', AWP_FILE ));           // URL Path
        $this->sah_define( 'AWP_ASSETS'   , AWP_URL     . '/assets'   );           // Folder path for assets, images, css and js
        $this->sah_define( 'AWP_IMAGES'   , AWP_ASSETS  . '/images'   );           // Folder path for assets, images, css and js
        $this->sah_define( 'AWP_CSS'   ,   AWP_ASSETS  . '/css'   );           // Folder path for assets, images, css and js
        $this->sah_define( 'AWP_JS'   ,    AWP_ASSETS  . '/js'   );           // Folder path for assets, images, css and js      
        $this->sah_define( 'AWP_FREE_APPS'     , AWP_FREE_PATH    . '/apps'     );           // Folder path for all destination apps
        $this->sah_define( 'AWP_FREE_INCLUDES' , AWP_FREE_PATH    . '/includes' );           // Folder path for include files
        $this->sah_define( 'AWP_VIEWS'    , AWP_FREE_PATH    . '/views'    );           // Folder path for section views
        $this->sah_define( 'AWP_TEMPLATES', AWP_FREE_PATH    . '/views'    );           // Folder Path for templates
        $this->sah_define( 'AWP_WEB_FORMS', AWP_FREE_PATH    . '/webforms' );           // Folder path for source input forms
        $this->sah_define( 'AWP_SCRIPTS'  , AWP_FREE_PATH    . '/scripts'  );           // Folder path for scripts
        $this->sah_define( 'AWP_DOMAIN'   , 'sperse.io'  );                        // Domain API
        $this->sah_define( 'AWP_COPY_ICON'   ,AWP_ASSETS.'/images/copy.png');                        // Domain API

    }

    /**
     * Define constant if not already set.
     * @param string      $name
     * @param string|bool $value
     */
    function sah_define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }
    /* Include the required files */
    public function sah_includes(){        
    //------ADD CLASS FILES ------------------------------------------//
        include AWP_FREE_INCLUDES   . '/appfactory.php';
        include AWP_FREE_INCLUDES   . '/class_awp_admin_menu.php';
        include AWP_FREE_INCLUDES   . '/class_awp_list_table.php';
        include AWP_FREE_INCLUDES   . '/class_awp_log_table.php';
        include AWP_FREE_INCLUDES   . '/class_platform_shell.php';
        include AWP_FREE_INCLUDES   . '/class_awp_submission.php';
        include AWP_FREE_INCLUDES   . '/class_oauth.php';
        include AWP_FREE_INCLUDES   . '/class_awp_ajax.php';
        include_once AWP_FREE_INCLUDES  . '/functions_awp.php';
        include_once AWP_FREE_INCLUDES  . '/awp-form-fields.php';

//------ADD LIST OF APPS------------------------------------------//
        include_once AWP_FREE_APPS  . '/s/sperse/sperse.php';
        include_once  AWP_FREE_APPS  . '/s/sperse/sperseRestApi.php';
        include_once  AWP_FREE_APPS  . '/a/activecampaign/activecampaign.php'; 
        include_once AWP_FREE_APPS . '/a/acumbamail/acumbamail.php';

        include_once  AWP_FREE_APPS  . '/a/agilecrm/agilecrm.php'; 
        include_once  AWP_FREE_APPS  . '/a/airtable/airtable.php';
        include_once AWP_FREE_APPS . '/a/airmeet/airmeet.php';
        include_once AWP_FREE_APPS . '/a/appcues/appcues.php';

        include_once  AWP_FREE_APPS  . '/a/asana/asana.php';
        include_once  AWP_FREE_APPS  . '/a/autopilot/autopilot.php';        
        include_once  AWP_FREE_APPS  . '/a/aweber/aweber.php';
        include_once  AWP_FREE_APPS  . '/b/baremetrics/baremetrics.php';
        include_once  AWP_FREE_APPS  . '/b/basecamp3/basecamp3.php';
        include_once  AWP_FREE_APPS  . '/b/benchmark/benchmark.php';
        include_once AWP_FREE_APPS . '/b/breeze/breeze.php';

        include_once  AWP_FREE_APPS  . '/c/calendly/calendly.php';
        include_once  AWP_FREE_APPS  . '/c/callrail/callrail.php';
        include_once AWP_FREE_APPS . '/c/calcom/calcom.php';
        include_once  AWP_FREE_APPS  . '/c/campaignmonitor/campaignmonitor.php';
        include_once  AWP_FREE_APPS  . '/c/capsulecrm/capsulecrm.php';        
        include_once  AWP_FREE_APPS  . '/c/chargebee/chargebee.php';        
        include_once  AWP_FREE_APPS  . '/c/cleverreach/cleverreach.php';  
        include_once AWP_FREE_APPS . '/c/clickup/clickup.php';        
       // include_once AWP_FREE_APPS . '/c/clientjoy/clientjoy.php';        
        include_once  AWP_FREE_APPS  . '/c/clinchpad/clinchpad.php';
        include_once  AWP_FREE_APPS  . '/c/close/close.php';
        include_once AWP_FREE_APPS . '/c/clockify/clockify.php';

        include_once  AWP_FREE_APPS  . '/c/companyhub/companyhub.php';
        include_once  AWP_FREE_APPS  . '/c/contactsplus/contactsplus.php';
        include_once  AWP_FREE_APPS  . '/c/convertkit/convertkit.php';
        include_once  AWP_FREE_APPS  . '/c/copper/copper.php';
        include_once  AWP_FREE_APPS  . '/c/curated/curated.php';
        include_once  AWP_FREE_APPS  . '/c/customer/customer.php';
        include_once  AWP_FREE_APPS  . '/d/directiq/directiq.php';
        include_once  AWP_FREE_APPS  . '/d/drift/drift.php';
        include_once  AWP_FREE_APPS  . '/d/drip/drip.php';
        include_once AWP_FREE_APPS . '/e/easysendy/easysendy.php';

        include_once  AWP_FREE_APPS  . '/e/elasticemail/elasticemail.php';
        include_once  AWP_FREE_APPS  . '/e/emailoctopus/emailoctopus.php';
        include_once AWP_FREE_APPS . '/e/encharge/encharge.php';

        include_once  AWP_FREE_APPS  . '/e/esputnik/esputnik.php';
        include_once  AWP_FREE_APPS  . '/e/eventbrite/eventbrite.php';
        include_once  AWP_FREE_APPS  . '/e/everwebinar/everwebinar.php';        
        include_once  AWP_FREE_APPS  . '/f/firstpromoter/firstpromoter.php';     
        //include_once AWP_FREE_APPS . '/f/firmao/firmao.php';        
   
        include_once  AWP_FREE_APPS  . '/f/fivetran/fivetran.php';        
        include_once  AWP_FREE_APPS  . '/f/followupboss/followupboss.php';
       // include_once AWP_FREE_APPS . '/f/forcemanager/forcemanager.php';

        include_once  AWP_FREE_APPS  . '/f/freshworks/freshworks.php';
        include_once AWP_FREE_APPS . '/f/freshdesk/freshdesk.php';
        include_once AWP_FREE_APPS . '/g/getgist/getgist.php';

        include_once  AWP_FREE_APPS  . '/g/getresponse/getresponse.php';
        include_once  AWP_FREE_APPS  . '/g/googlecalendar/googlecalendar.php';        
        include_once  AWP_FREE_APPS  . '/g/googledrive/googledrive.php';        
        include_once  AWP_FREE_APPS  . '/g/googlesheets/googlesheets.php';
        include_once AWP_FREE_APPS . '/g/growmatik/growmatik.php';

        include_once  AWP_FREE_APPS  . '/g/gotomeeting/gotomeeting.php';
        include_once  AWP_FREE_APPS  . '/g/gotowebinar/gotowebinar.php';
        include_once  AWP_FREE_APPS  . '/g/go4client/go4client.php';
        include_once AWP_FREE_APPS . '/g/groundhogg/groundhogg.php';
        include_once  AWP_FREE_APPS  . '/h/helpscout/helpscout.php';
        include_once AWP_FREE_APPS . '/h/helpwise/helpwise.php';

        include_once  AWP_FREE_APPS  . '/h/highlevel/highlevel.php';
        include_once  AWP_FREE_APPS  . '/h/hubspot/hubspot.php';        
        include_once  AWP_FREE_APPS  . '/i/influencersoft/influencersoft.php';        
        include_once  AWP_FREE_APPS  . '/i/insightly/insightly.php';
        include_once  AWP_FREE_APPS  . '/i/intercom/intercom.php';
        include_once  AWP_FREE_APPS  . '/j/jetwebinar/jetwebinar.php';        
        include_once  AWP_FREE_APPS  . '/j/jumplead/jumplead.php';
        include_once  AWP_FREE_APPS  . '/k/kajabi/kajabi.php';
        include_once  AWP_FREE_APPS  . '/k/kartra/kartra.php';
        include_once  AWP_FREE_APPS  . '/k/keap/keap.php';        
        include_once  AWP_FREE_APPS  . '/k/klaviyo/klaviyo.php';
        include_once  AWP_FREE_APPS  . '/k/klipfolio/klipfolio.php';
        include_once  AWP_FREE_APPS  . '/l/lemlist/lemlist.php';
        //include_once AWP_FREE_APPS . '/l/lessannoyingcrm/lessannoyingcrm.php';

        include_once  AWP_FREE_APPS  . '/l/lifterlms/lifterlms.php';        
        include_once  AWP_FREE_APPS  . '/l/liondesk/liondesk.php';
        include_once AWP_FREE_APPS . '/l/liveagent/liveagent.php';
        include_once AWP_FREE_APPS . '/l/livestorm/livestorm.php';
        include_once  AWP_FREE_APPS  . '/m/mailchimp/mailchimp.php';
        include_once AWP_FREE_APPS . '/m/mailercloud/mailercloud.php';

        include_once  AWP_FREE_APPS  . '/m/mailerlite/mailerlite.php';
        include_once  AWP_FREE_APPS  . '/m/mailgun/mailgun.php';        
        include_once  AWP_FREE_APPS  . '/m/mailify/mailify.php';
        include_once  AWP_FREE_APPS  . '/m/mailjet/mailjet.php';
        include_once AWP_FREE_APPS . '/m/mailpoet/mailpoet.php';
        include_once  AWP_FREE_APPS  . '/m/messagebird/messagebird.php';
        include_once AWP_FREE_APPS . '/m/mojohelpdesk/mojohelpdesk.php';

        include_once  AWP_FREE_APPS  . '/m/monday/monday.php';
        include_once  AWP_FREE_APPS  . '/m/moonmail/moonmail.php';
        include_once  AWP_FREE_APPS  . '/m/moosend/moosend.php';
        include_once AWP_FREE_APPS . '/o/onehash/onehash.php';
        //include_once AWP_FREE_APPS . '/o/onepagecrm/onepagecrm.php';

        include_once  AWP_FREE_APPS  . '/o/omnisend/omnisend.php';
        include_once  AWP_FREE_APPS  . '/o/ontraport/ontraport.php';
        include_once AWP_FREE_APPS . '/o/ortto/ortto.php';
        include_once  AWP_FREE_APPS  . '/p/pabbly/pabbly.php';     
        include_once AWP_FREE_APPS . '/p/paperform/paperform.php';        
   
        include_once  AWP_FREE_APPS  . '/p/pipedrive/pipedrive.php';
        include_once AWP_FREE_APPS . '/p/productlift/productlift.php';
        include_once  AWP_FREE_APPS  . '/p/pushover/pushover.php';
        include_once AWP_FREE_APPS . '/r/readwise/readwise.php';
       // include_once AWP_FREE_APPS . '/r/revampcrm/revampcrm.php';

        include_once  AWP_FREE_APPS  . '/p/postmark/postmark.php';
        include_once  AWP_FREE_APPS  . '/r/revue/revue.php';
     //   include_once AWP_FREE_APPS . '/s/salescamp/salescamp.php';        

        include_once  AWP_FREE_APPS  . '/s/salesmate/salesmate.php';
        include_once AWP_FREE_APPS . '/s/salesflare/salesflare.php';     
        include_once AWP_FREE_APPS . '/s/salesforce/salesforce.php';      
        include_once AWP_FREE_APPS . '/s/samdock/samdock.php'; 
        include_once AWP_FREE_APPS . '/s/sellsy/sellsy.php';        
        include_once AWP_FREE_APPS . '/s/selzy/selzy.php';        
        
        include_once  AWP_FREE_APPS  . '/s/sendfox/sendfox.php';
        include_once  AWP_FREE_APPS  . '/s/sendgrid/sendgrid.php';
        include_once  AWP_FREE_APPS  . '/s/sendinblue/sendinblue.php';
        include_once  AWP_FREE_APPS  . '/s/sendpulse/sendpulse.php';
        include_once  AWP_FREE_APPS  . '/s/sendy/sendy.php';
        include_once AWP_FREE_APPS . '/s/simvoly/simvoly.php';

        include_once  AWP_FREE_APPS  . '/s/shopify/shopify.php';
        include_once  AWP_FREE_APPS  . '/s/slack/slack.php';
        include_once  AWP_FREE_APPS  . '/s/smartsheet/smartsheet.php';
        include_once  AWP_FREE_APPS  . '/s/smtp/smtp.php';
        include_once AWP_FREE_APPS . '/s/squarespace/squarespace.php';
        include_once AWP_FREE_APPS . '/s/surecart/surecart.php';

        include_once  AWP_FREE_APPS  . '/t/teachable/teachable.php';
        include_once AWP_FREE_APPS . '/t/teamwork/teamwork.php';
        include_once AWP_FREE_APPS . '/t/teamworkcrm/teamworkcrm.php';
        include_once AWP_FREE_APPS . '/t/testmonitor/testmonitor.php';

        include_once  AWP_FREE_APPS  . '/t/todoist/todoist.php';
        include_once  AWP_FREE_APPS  . '/t/trello/trello.php';
        include_once AWP_FREE_APPS . '/t/trigger/trigger.php';

        include_once  AWP_FREE_APPS  . '/t/twilio/twilio.php';
        include_once AWP_FREE_APPS . '/v/validto/validto.php';
        include_once AWP_FREE_APPS . '/v/vbout/vbout.php';

        include_once AWP_FREE_APPS . '/v/vercel/vercel.php';
        include_once AWP_FREE_APPS . '/v/vicodo/vicodo.php';

        include_once  AWP_FREE_APPS  . '/w/wealthbox/wealthbox.php';
        include_once  AWP_FREE_APPS  . '/w/webhookin/webhookin.php';
        include_once  AWP_FREE_APPS  . '/w/webhookout/webhookout.php';
        include_once  AWP_FREE_APPS  . '/w/webinarjam/webinarjam.php';        
        include_once  AWP_FREE_APPS  . '/w/woodpecker/woodpecker.php';
        include_once AWP_FREE_APPS . '/w/wufooforms/wufooforms.php';

        include_once  AWP_FREE_APPS  . '/z/zapier/zapier.php';
        include_once  AWP_FREE_APPS  . '/z/zoho/zoho.php';
        include_once  AWP_FREE_APPS  . '/z/zulip/zulip.php';
//------ADD LIST OF WEB FORMS------------------------------------------//
        include_once  AWP_WEB_FORMS . '/buddyboss/buddyboss.php';
        include_once  AWP_WEB_FORMS . '/calderaforms/calderaforms.php';
        include_once  AWP_WEB_FORMS . '/calendly/calendly.php';
        include_once  AWP_WEB_FORMS . '/contactform7/contactform7.php';  
        include_once  AWP_WEB_FORMS . '/elementorpro/elementorpro.php';
        include_once  AWP_WEB_FORMS . '/everestforms/everestforms.php';
        include_once  AWP_WEB_FORMS . '/fluentforms/fluentforms.php';
        include_once  AWP_WEB_FORMS . '/formcraft/formcraft.php';
        include_once  AWP_WEB_FORMS . '/formidable/formidable.php';
        include_once  AWP_WEB_FORMS . '/forminator/forminator.php';
        include_once  AWP_WEB_FORMS . '/jetengineforms/jetengineforms.php';
        include_once  AWP_WEB_FORMS . '/jetpack/jetpack.php';
        include_once  AWP_WEB_FORMS . '/gravityforms/gravityforms.php';
        include_once  AWP_WEB_FORMS . '/happyforms/happyforms.php';
        include_once  AWP_WEB_FORMS . '/ninjaforms/ninjaforms.php';
        include_once  AWP_WEB_FORMS . '/plansoforms/plansoforms.php';
        include_once  AWP_WEB_FORMS . '/smartforms/smartforms.php';
        include_once  AWP_WEB_FORMS . '/weforms/weforms.php';
        include_once  AWP_WEB_FORMS . '/woocommerce/woocommerce.php';        
        include_once  AWP_WEB_FORMS . '/wpforms/wpforms.php';   
        include_once  AWP_WEB_FORMS . '/wsforms/wsforms.php';                 
        include_once  AWP_WEB_FORMS . '/webhook/receiver.php';                 
    }        
    /* Instantiate classes @since 1.0 @return void */
    public function sah_init_classes()
    {  
        if(class_exists('AWP_Free_Admin_Menu')){
            new AWP_Free_Admin_Menu();   // Admin Menu Class
        }
        if(class_exists('AWP_Free_Submission')){

        new AWP_Free_Submission();   // Submission Handler Class
        }
        if(class_exists('AWP_Free_Ajax_Handler')){

        new AWP_Free_Ajax_Handler(); //Ajax Handler Class
        }
    }    
    /* Initializes action hooks @since 1.0 @return  void */
    public function sah_init_actions()
    {   add_action( 'init', array( $this, 'sah_localization_setup' ) );
        add_action( 'init', [ $this, 'sah_setAllCookies' ] );
        add_action( 'init',[ $this, 'sah_process_form_queue_requests']);
        if(is_admin()){
            add_action( 'admin_enqueue_scripts', array( $this, 'sah_register_scripts' ) );
        }
        add_action( 'wp_footer', [ $this, 'sah_clipboard_script' ]);
        add_action( 'awp_schedule_data_post',[ $this, 'sah_integration_hook_trigger' ],1,3);
        add_action( 'wp_enqueue_scripts', [ $this, 'sah_add_scripts' ] );  
        add_action('init',[ $this, 'sah_change_l_status' ]);
        add_action('admin_footer', array($this, 'sah_deactivate_modal'));
    }

    function sah_deactivate_modal(){
        global $pagenow;
        if ('plugins.php' !== $pagenow) {
            return;
        }
        include_once AWP_VIEWS . '/deactivate_modal.php';
    }
    function sah_exp_admin_notice(){
        ?>
              <div class="notice notice-warning is-dismissible">
                 <p>
                    <?php echo sprintf( esc_html__('Your Automate Hub plugin renewal was unsuccessful. %s to reactivate and  avoid suspension..','automate_hub'),'<a href="https://sperse.io/upgrade?utm_source=WordPress&utm_campaign=freeplugin&utm_medium=renewnotice&utm_content=Upgrade" >'.esc_html__('Click here','automate_hub').'</a>'); ?>

                 </p>
             </div>
        <?php 
    }
    function sah_activate_l_status(){
        $url          = "https://".AWP_DOMAIN."/scripts/licenseManager/licenseManager.php";
        $license_key  = 'FREE-UXR4QU-ZYNF92-HUSA7B';
        update_option('sperse_license_key',$license_key);
        $properties   = array( 'licenseKey' => $license_key, 'setStatus' => 'activate');
        $args = array('headers' => array('Content-Type' => 'application/json'), 'body' => json_encode($properties));
        $response = wp_remote_post( $url, $args );
        if (is_wp_error($response)){ 
        }                                                               
        $license_data = json_decode(wp_remote_retrieve_body($response));
        if(($license_data->success == true)){ 
            require_once(AWP_FREE_INCLUDES .'/class_awp_updates_manager.php');
            $obj=new AWP_Updates_Manager();
            $obj->trigger_action('license_activated');
            update_option('sah_l_exp',strtotime($license_data->data->expiresAt));
            update_option('sperse_license_key', $license_key);                  //Save the license key in the options table
            //AWP_redirect( admin_url( 'admin.php?page=automate_hub'));
        }
        
    }
    function sah_get_l_status(){
        $url = "https://".AWP_DOMAIN."/scripts/licenseManager/licenseManager.php";
        $license_key = get_option('sperse_license_key');
        $return['success']=false;
        $properties = array('licenseKey'=> $license_key,'setStatus'=>'retrieve');
        $args       = array('headers'   => array('Content-Type' => 'application/json'), 'body' => json_encode($properties));
        $response = wp_remote_post( $url, $args );
        if (is_wp_error($response)){                                     
            return;
        }                                                                
        $license_data = json_decode(wp_remote_retrieve_body($response)); 
        if(($license_data->success == true)){
            $return['success']=true; 
            $return['exp']=strtotime($license_data->data->expiresAt);
        }
        return $return;
    }
    function sah_change_l_status() {
        $exp =(int)get_option('sah_l_exp');
        $curr_t=(int) time();        
        if(!empty($exp)){
            if( $exp>$curr_t ){
                return;
            }
            else if($curr_t > $exp   && $curr_t < $exp+86400){
                $status=$this->sah_get_l_status();
                if($status['success'] == true){
                    if($status['exp'] > time()){

                        update_option('sah_l_exp',$status['exp']);
                        return;
                    }
                    else{
                        add_action('admin_notices', [ $this, 'sah_exp_admin_notice' ]);   
                        return;     
                    }
                }
            }            
        }
        $url = "https://".AWP_DOMAIN."/scripts/licenseManager/licenseManager.php";
        $license_key = get_option('sperse_license_key');
        require_once(AWP_FREE_INCLUDES .'/class_awp_updates_manager.php');
        $obj=new AWP_Updates_Manager();
        $obj->trigger_action('subscription_ended'); 
        $properties = array('licenseKey'=> $license_key,'setStatus'=>'deactivate');
        $args       = array('headers'   => array('Content-Type' => 'application/json'), 'body' => json_encode($properties));
        $response = wp_remote_post( $url, $args );
        if (is_wp_error($response)){                                            // Check for error in the response
            //echo esc_html__("Unexpected Error! The query returned with an error.","automate_hub");
        }                                                                      //uncomment it if you want to look at the full response
        $license_data = json_decode(wp_remote_retrieve_body($response));        // License data.       
        update_option('sperse_license_key', '');
    }
    function sah_process_form_queue_requests(){
        $requests=awp_get_form_submission_queue();
        
        if(count($requests)){
            foreach ($requests as $key => $request) {
                $callable=$request['callable'];
                $record=$request['record'];
                $posted_data=$request['posted_data'];
                if(function_exists($callable)){
                call_user_func( $callable, $record, $posted_data );
                }
            }
            
        }
        //reset queue
        update_option('awp_form_submission_queue','');   
    }
    function sah_add_scripts() {
        wp_enqueue_script('awp-tracking-script',   AWP_ASSETS . '/js/tracking-info.js');
    }
    function sah_integration_hook_trigger($function_name,$record,$posted_data){

        call_user_func( $function_name, $record, $posted_data );
    }


    public function sah_clipboard_script() {
        if( wp_script_is( 'jquery', 'done' ) ) {
        ?>
        <script type="text/javascript">         
          if (typeof ClipboardJS !== 'undefined') {
               // code for both map and map.getCenter exists
               new ClipboardJS('.btn');
          }
        </script>
        <?php
        }
    }
    public function sah_setAllCookies()
    {   

        $actualUrl         = (isset($_SERVER['HTTPS']) && sanitize_text_field($_SERVER['HTTPS']) === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $affiliateCode     = "";
        $affiliateCodeName = 'refAffiliateCode';
        $url               = $actualUrl;
        $urlCopy           = explode("/", $url);
        $urlStatus         = true;
        foreach($urlCopy as $key => $val){
            if($val == "ref"){
                $affiliateCode = $urlCopy[$key+1];
                setcookie($affiliateCodeName, $affiliateCode,     time() + (86400 * 60), "/"); // 86400 = 1 day    
                $urlStatus = true;
                return;
            } else {
                $urlStatus = false;
            }
        }
        if(!$urlStatus) {
            $parts = parse_url($url);
            $p_query = !empty($parts['query']) ? strtolower($parts['query']) : '';
            parse_str($p_query, $query);

            if(isset($query['ref'])) {$affiliateCode = $query['ref'];    
                setcookie($affiliateCodeName, $affiliateCode,    time() + (86400 * 60), "/"); // 86400 = 1 day    
            }
        }
    
    }
    /* Initialize plugin for localization @since 1.0 @uses load_plugin_textdomain() @return void  */
    public function sah_localization_setup()
    {   load_plugin_textdomain( 'automate_hub', false, AWP_FILE . '/languages/' );
    }
    /* Initializes action filters @since 1.0 @return  void */
    public function sah_init_filters() {
        add_filter('awp_integration_fields',array($this,'awp_integration_form_fields'),10,3);
        add_filter('admin_footer_text', array($this,'sah_remove_footer_admin'));
        add_filter( 'update_footer', '__return_empty_string', 11 );
    }
    function sah_remove_footer_admin ($default){
            global $current_screen;
            $sperse_pages_base = array(
                'toplevel_page_automate_hub_dashboard'=>'',
                'automate-hub_page_awp_app_directory'=>'',
                'automate-hub_page_automate_hub'=>'',
                'automate-hub_page_my_integrations'=>'',
                'automate-hub_page_automate_hub-new'=>'#wpfooter{position:absolute}',
                'automate-hub_page_automate_hub_log'=>'',
                'automate-hub_page_automate_add_message_template'=>'',
                'automate-hub_page_automate_message_templates'=>'',
                'automate-hub_page_automate_license'=>'',
            );
        if(!empty($current_screen->base)  && !array_key_exists($current_screen->base, $sperse_pages_base) ){
            //this is not automate hub page
            return $default;
        }
        ob_start();
      ?>
        <header>        
            <nav>           
            <div class="container-header">      
                <div class="container-header-inner">
                <p> <?php esc_html_e('© Sperse Inc. All Rights Reserved','automate_hub'); ?><span ><?php echo sprintf('Version %s',esc_html($this->version)); ?></span></p>
                </div>
            </div>
            </nav>    
        </header>
        <?php 
         $content = ob_get_clean();
         return  $content;
    }
    function awp_integration_form_fields($fields,$form_provider,$form_id){
        if(!empty($fields)){
            $fields['refAffiliateCode'] = esc_html__('RefAffiliateCode','automate_hub');            
        }
        return $fields;
    }
    
    /* Register Script @since 1.0 @return mixed | void */
    public function sah_register_scripts( $hook )
    {   
        if(AWP_Free_Admin_Menu::sp_is_admin_or_embed_page()){
        wp_enqueue_script('jquery');
        wp_enqueue_style ('jquery-ui');
        wp_enqueue_script('jquery-ui');
        wp_enqueue_script('jquery-ui-draggable');
        wp_enqueue_script('jquery-ui-droppable');
        wp_enqueue_script('masonry');
        wp_enqueue_script('awp-vuejs',             AWP_ASSETS . '/js/vue.min.js', array('jquery'), '', 1);
        wp_enqueue_script('awp-vue-selectjs',      AWP_ASSETS . '/js/vue-select.js', array('jquery'), '', 1);
        wp_enqueue_script('awp-main-script',       AWP_ASSETS . '/js/script.js?version='.$this->version , array('awp-vuejs'), rand(10,100), 1);
        wp_enqueue_script('awp-secondary-script',  AWP_ASSETS . '/js/awp_favorites.js' , array('jquery','awp-vuejs'), rand(10,100), 1);
        wp_enqueue_script('awp-sweetalert-script', AWP_ASSETS . '/js/sweetalert2.js' , array('jquery','awp-vuejs'), rand(10,100), 1);
        wp_enqueue_style ('awp-main-style',        AWP_ASSETS . '/css/asset.css', array(),rand(10,100));
        wp_enqueue_style ('awp-responsive-style',  AWP_ASSETS . '/css/responsive.css');
        do_action('awp_custom_script');  
        $localize_scripts = array(
            'nonce'          => wp_create_nonce( 'automate_hub' ),
            'list_url'       => admin_url( 'admin.php?page=my_integrations&status=1' ),
            'message_template_url'       => admin_url( 'admin.php?page=automate_message_templates' ),
            'referrerUrl'=>isset($_COOKIE['_referringURL']) ? esc_url($_COOKIE['_referringURL']) : '',
            'entryUrl'=>isset($_COOKIE['_entryUrl']) ? esc_url($_COOKIE['_entryUrl']) : '',
            'licenseUrl'=>admin_url( 'admin.php?page=automate_license' ),
            'userAgent'=>isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field($_SERVER['HTTP_USER_AGENT']) :''  
        );
        wp_localize_script('awp-main-script', 'awp', $localize_scripts );
        wp_localize_script('awp-secondary-script', 'awp', $localize_scripts );
        wp_enqueue_style ('awp-vue-select-style',  AWP_ASSETS . '/css/vue-select.css');
        }
    }
}
$awp = SPERSEFREE::init();