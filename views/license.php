<?php include AWP_FREE_INCLUDES.'/header.php'; 
$consumptions=plugin_status();
    if (isset($_POST['activate_license'])) {
        $url          = "https://".AWP_DOMAIN."/scripts/licenseManager/licenseManager.php";
        $license_key  =  isset( $_REQUEST['sperse_license_key']) ?  sanitize_text_field($_REQUEST['sperse_license_key']):'';
        $properties   = array( 'licenseKey' => $license_key, 'setStatus' => 'activate');
        $args = array('headers' => array('Content-Type' => 'application/json'), 'body' => json_encode($properties));
        $response = wp_remote_post( $url, $args );
        if (is_wp_error($response)){                                        
            echo esc_html__("Unexpected Error! The query returned with an error.",'automate_hub' );
        }
        $license_data = json_decode(wp_remote_retrieve_body($response));        
        if(($license_data->success == true)){ 
            require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
            $obj=new AWP_Updates_Manager();
            $obj->trigger_action('license_activated');
            update_option('awp_l_exp',strtotime($license_data->data->expiresAt));
            update_option('sperse_license_key', $license_key);              
            AWP_redirect( admin_url( 'admin.php?page=automate_hub'));
        }
        else{  
           //Show error to the user. Probably entered incorrect license key.
           echo esc_html(sprintf('Status: %s', !empty($license_data->message)) ? $license_data->message :'' );
          }
    } 
    if (isset($_REQUEST['deactivate_license'])) {
        require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
        $obj=new AWP_Updates_Manager();
        $obj->trigger_action('license_deactivated');

        $url = "https://".AWP_DOMAIN."/scripts/licenseManager/licenseManager.php";
        $license_key  =  isset( $_REQUEST['sperse_license_key']) ?  sanitize_text_field($_REQUEST['sperse_license_key']):'';
        $properties = array('licenseKey'=> $license_key,'setStatus'=>'deactivate');
        $args       = array('headers'   => array('Content-Type' => 'application/json'), 'body' => json_encode($properties));
        $response = wp_remote_post( $url, $args );
        if (is_wp_error($response)){
            echo esc_html__("Unexpected Error! The query returned with an error.",'automate_hub' );
        }                                                                   
        $license_data = json_decode(wp_remote_retrieve_body($response));    
        if($license_data->success == true){                                 
            update_option('sperse_license_key', '');
            AWP_redirect( admin_url( 'admin.php?page=automate_license' ) ); 
        }else{
            echo esc_html(sprintf('Status: %s', !empty($license_data->message)) ? $license_data->message :'' );
        }
    } 
if(!empty(get_option('sperse_license_key'))){
?>
    <div id="root" style="width: 99%;">
      <div class="container pt-5 myrules" style="width: 100%;">
        <h4 style="padding-left: 10px;"> <?php esc_html_e("Overview",'automate_hub'); ?></h4>
        <div class="row align-items-stretch">
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">
                <?php esc_html_e("Active Accounts",'automate_hub'); ?>
              </h4>
              <span class="hind-font caption-12 c-dashboardInfo__count"><?php 
              $consumptions_x = isset($consumptions['X']) ? sanitize_text_field($consumptions['X']) : '';
              echo esc_html($consumptions_x) ; 
              ?></span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">
                  
                  <?php esc_html_e("Active Integrations",'automate_hub'); ?>
              </h4>
              <span class="hind-font caption-12 c-dashboardInfo__count"><?php 
              $consumptions_w = isset($consumptions['W']) ? sanitize_text_field($consumptions['W']) :'';
              echo esc_html($consumptions_w);    ?></span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title"><?php esc_html_e("Apps Used",'automate_hub'); ?>
</h4>
              <span class="hind-font caption-12 c-dashboardInfo__count"><?php 
              $consumptions_y = isset($consumptions['Y']) ? sanitize_text_field($consumptions['Y']) :'';
              echo esc_html($consumptions_y);  ?></span>
            </div>
          </div>
          <div class="c-dashboardInfo col-lg-3 col-md-6">
            <div class="wrap">
              <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">
                <?php esc_html_e("API Calls",'automate_hub'); ?>
              </h4>
              <span class="hind-font caption-12 c-dashboardInfo__count"><?php 
                $consumptions_z = isset($consumptions['Z']) ? $consumptions['Z'] :'';
                echo esc_html($consumptions_z);  ?></span>
         
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
}
?>
<main>
    <section class="main-section">
		  <div class="container-license">
			<div class="pages-background"></div>
            <div class="row-license">   
                    <div class="form-container">
                        <div class="form-container-left">                  
                            <?php 
                            if(get_option('sperse_license_key')){ ?>
                                <div class="activate-instruction"><center>
                                <h3><?php esc_html_e('Free Version','automate_hub'); ?></h3>
                                <h4><?php esc_html_e('You have successfully acivated the free version of Automate Hub.','automate_hub'); ?></h4></center>
                                </div>
                            <?php } else { ?>
                                <div class="activate-instruction"><center>
                                <h3><?php esc_html_e('Activate your license and access all 100+ SaaS apps and forms!','automate_hub'); ?></h3>
                                <h5><?php esc_html_e('To activate Sperse Automate Hub plugin, enter the license key that you received after your order.','automate_hub'); ?></h5></center>
                                </div>
                            <?php } ?>
                            <div id="form-wrap">
                                <form action="" method="post">
                                    <table class="form-table">
                                        <tr>
                                            <td>
                                                <span><label for="sperse_license_key"><p class="license-key"><?php esc_html_e("Your License Key",'automate_hub'); ?></p></label></span>
                                                <span class="simple_active_license"><center><input class="license-code" type="text" id="sperse_license_key_copy" name="sperse_license_key"  placeholder=" <?php esc_html_e('Free Trial','automate_hub'); ?>" data-required="true" value="<?php esc_html_e('Free Trial','automate_hub'); ?>" readonly>
                                                <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#sperse_license_key_copy"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="<?php esc_html_e('Copy to clipboard','automate_hub'); ?>"></span></center></span>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="submit-button-plugin sign-up">
                                        <a href="https://sperse.io/upgrade/?utm_source=WordPress&utm_campaign=freeplugin&utm_medium=upgradebtn1&utm_content=Upgrade&offfer=" target="_blank">
                                        	<?php esc_html_e("Upgrade",'automate_hub'); ?>
                                        </a> 
                                    </div>
                                </form>
                            </div>
                            <p class="get-license-key"><?php echo sprintf( esc_html__( 'How can I  get my license key?%s', 'automate_hub' ), '<a href="https://sperse.io/?utm_source=WordPress&utm_campaign=freeplugin&utm_medium=upgradelink&utm_content=Activate&offfer=" target="_blank">read this article.</a>' ); ?></a></p>
			</div>
                        <div class="form-container-right">
                            <h3><?php esc_html_e(" Need A New License Key?",'automate_hub'); ?></h3>
                            <ul><li><i class="checkmarks"></i> <?php esc_html_e("Unlock access to all 100+ apps",'automate_hub'); ?></li>
                                <li><i class="checkmarks"></i> <?php esc_html_e("Unlimited triggers and actions",'automate_hub'); ?></li>
                                <li><i class="checkmarks"></i> <?php esc_html_e("Integrate with multiple WP forms",'automate_hub'); ?></li>
                                <li><i class="checkmarks"></i> <?php esc_html_e("Access to all advanced features",'automate_hub'); ?></li>
                                <li><i class="checkmarks"></i> <?php esc_html_e("Monthly new additions and updates",'automate_hub'); ?></li>
                                <li><i class="checkmarks"></i> <?php esc_html_e("Premium online customer support",'automate_hub'); ?></li>
                            </ul>
                            <div class="sign-up">
                                <?php if(get_option('sperse_license_key')){ ?>
                                <a href="https://sperse.io/upgrade/?utm_source=WordPress&utm_campaign=freeplugin&utm_medium=upgradebtn2&utm_content=Upgrade&offfer=" target="_blank"><?php esc_html_e("Upgrade Options",'automate_hub'); ?></a>
                                <?php } else { ?>
                                <a href="https://sperse.io/?utm_source=WordPress&utm_campaign=freeplugin&utm_medium=upgradelink&utm_content=Signup&offfer=" target="_blank"><?php esc_html_e("Sign Up Now",'automate_hub'); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</main>