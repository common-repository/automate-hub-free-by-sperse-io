<?php

class AWP_Airtable {
    private static $instance = null;
    public static $url = "https://api.airtable.com/v0";

    public static function get_instance() {
        if ( empty( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        $this->init_filters();
        $this->init_actions();
    }

    public function init_actions(){
        add_action( 'awp_custom_script', [$this, 'load_custom_script']);
        add_action( 'awp_settings_view', [$this, 'add_settings_view'], 10, 1 );
        add_action( 'wp_ajax_awp_fetch_table_fields', [$this, 'fetch_table_fields']);
    }
    
    public function init_filters(){
        add_filter( 'awp_action_providers', [$this, 'add_action_provider'], 10, 1 );
        add_filter( 'awp_settings_tabs', [$this, 'add_settings_tab'], 10, 1 );
    }



    public function add_settings_tab( $tabs ) {
        $tabs['airtable'] = array('name'=>esc_html__( 'Airtable', 'automate_hub'), 'cat'=>array('crm'));
        return $tabs;
    }

    public function load_custom_script() {
    }

    public function add_action_provider( $providers ) {
        $providers['airtable'] = [
            'title' => __( 'Airtable', 'automate_hub' ),
            'tasks' => array(
                'create_record'   => __( 'Create Record', 'automate_hub' )
                )
            ];

        return  $providers;
    }



    public function add_settings_view( $current_tab ) {
        
        if( $current_tab != 'airtable' ) { return; }

        $nonce     = wp_create_nonce( "awp_airtable_api_key" );
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";

        ?>
            <div class="platformheader">
				<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
                <a href="https://sperse.io/go/airtable" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/airtable.png'); ?>" width="221" height="50" alt="Airtable Logo"></a><br/><br/>
                <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>
                <form action='admin-post.php' method="post"  class="container" >
                    <input type="hidden" name="action" value="awp_airtable_save_api_key">
                    <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                            <td>
                                <div class="form-table__input-wrap">
                                <input type="text" name="awp_airtable_display_name" id="awp_airtable_display_name" value="<?php echo esc_attr($display_name); ?>" placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_airtable_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"> <?php esc_html_e( 'Airtable API Key', 'automate_hub'); ?></th>
                            <td>
								<div class="form-table__input-wrap">
								<input type="text" name="awp_airtable_api_key" id="awp_airtable_api_key" value="<?php echo esc_attr($api_key); ?>" placeholder="<?php esc_html_e( 'Enter your Airtable API Key', 'automate_hub' ); ?>" class="basic-text"/>
                                <span class="spci_btn form-table__input-btn" body-clipboard-action="copy" data-clipboard-target="#awp_airtable_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>				
									</div>
                            </td>
                        </tr>
                    </table>
                    <div class="submit-button-plugin"><?php submit_button(); ?></div>
                </form>
            </div>

        <?php
    }
}
$Awp_Airtable = AWP_Airtable::get_instance();
