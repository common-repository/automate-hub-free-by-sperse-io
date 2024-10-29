<?php

class AWP_Messagebird extends Appfactory  {
    public static $contact_url = "https://rest.messagebird.com/contacts";

    public function init_actions(){
    }
    
    public function init_filters(){}

    public function load_custom_script(){
               
    }

    public function settings_tab( $tabs ) {
        $tabs['messagebird'] = array('name'=>esc_html__( 'MessageBird', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }




    public function action_provider( $providers ) {
        $providers['messagebird'] = [
            'title' => __( 'MessageBird', 'automate_hub' ),
            'tasks' => array(
                'create_contact'   => __( 'Create contact', 'automate_hub' )
                )
            ];

        return  $providers;
    }

    public function settings_view( $current_tab ) { 
      if( $current_tab != 'messagebird' ) { return; }

      $nonce = wp_create_nonce( "awp_messagebird_api_key" );
      $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
      $awp_messagebird_api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
      $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";

      ?>
          <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

              <a href="https://sperse.io/go/messagebird" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/messagebird.png'); ?>" width="258" height="50" alt="messagebird"></a><br/><br/>
              <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
              <br/>
              <form action='admin-post.php' method="post"  class="container" >
                  <input type="hidden" name="action" value="awp_messagebird_save_api_key">
                  <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_messagebird_api_key" ); ?>">
                  <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                  <table class="form-table">
                    <tr valign="top">
                          <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                          <td>
                              <div class="form-table__input-wrap">
                              <input type="text" name="awp_messagebird_display_name" id="awp_messagebird_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                              <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_messagebird_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                              </div>
                          </td>
                      </tr>



                      <tr valign="top">
                          <th scope="row"><?php esc_html_e( 'MessageBird API Key', 'automate_hub'); ?></th>
                          <td>
                              <div class="form-table__input-wrap">
                              <input type="text" name="awp_messagebird_api_key" id="awp_messagebird_api_key" value="<?php echo esc_attr($awp_messagebird_api_key); ?>" placeholder="<?php esc_html_e( 'Enter your MessageBird API Key', 'automate_hub' ); ?>" class="basic-text"/>
                              <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_messagebird_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>       
                              </div>
                          </td>
                      </tr>

                  </table>
                  <div class="submit-button-plugin"><?php submit_button(); ?></div>
              </form>
          </div>


      <?php
    }

    public function action_fields() { 
      ?>
      <script type="text/template" id="messagebird-action-template">
                 
      </script>
  <?php
    }
}

$Awp_Messagebird = AWP_Messagebird::get_instance();
