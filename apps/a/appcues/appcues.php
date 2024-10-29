<?php

class AWP_Appcues extends appfactory
{

   
    public function init_actions(){
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_appcues_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['appcues'] = array(
            'title' => esc_html__( 'Appcues', 'automate_hub' ),
            'tasks' => array(
                'createsegment'   => esc_html__( 'Create Segment', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['appcues'] = array('name'=>esc_html__( 'Appcues', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'appcues') {
            return;
        }
        $nonce = wp_create_nonce("awp_appcues_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $api_secret = isset($_GET['api_secret']) ? sanitize_text_field($_GET['api_secret']) : "";
        $account_id = isset($_GET['client_id']) ? sanitize_text_field($_GET['client_id']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
            <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/appcues" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/appcues.png'); ?>"  height="50" alt="Appcues Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'appcues';
                $appcues_form = new AWP_Form_Fields($app_name);

                $form_fields = $appcues_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_appcues_display_name",
                        'name'          => "awp_appcues_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $appcues_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_appcues_api_token",
                        'name'          => "awp_appcues_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Appcues Live API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Appcues API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );
                $form_fields .= $appcues_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_appcues_api_secret",
                        'name'          => "awp_appcues_api_secret",
                        'value'         => $api_secret,
                        'placeholder'   => esc_html__( 'Enter your Appcues API Secret', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Appcues API Secret', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $appcues_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_appcues_account_id",
                        'name'          => "awp_appcues_account_id",
                        'value'         => $account_id,
                        'placeholder'   => esc_html__( 'Enter your Appcues Account ID', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Appcues Account ID', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $appcues_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_appcues_save_api_token',
                    )
                );


                $form_fields .= $appcues_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $appcues_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $appcues_form->render($form_fields);

                ?>


        </div>
        <?php
    }


    
    public function load_custom_script() {
    }

    public function action_fields() {
        
    }
};

$Awp_Appcues = new AWP_Appcues();
