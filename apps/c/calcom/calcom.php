<?php

class AWP_Calcom extends appfactory
{

   
    public function init_actions(){
       
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_calcom_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['calcom'] = array(
            'title' => esc_html__( 'Cal.com', 'automate_hub' ),
            'tasks' => array(
                'createbooking'   => esc_html__( 'Create Bookings', 'automate_hub' ),
                'addattendee'   => esc_html__( 'Add Attendee', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['calcom'] = array('name'=>esc_html__( 'Cal.com', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'calcom') {
            return;
        }
        $nonce = wp_create_nonce("awp_calcom_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
            <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/calcom" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/calcom.png'); ?>"  alt="Calcom Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'calcom';
                $calcom_form = new AWP_Form_Fields($app_name);

                $form_fields = $calcom_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_calcom_display_name",
                        'name'          => "awp_calcom_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $calcom_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_calcom_api_token",
                        'name'          => "awp_calcom_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Calcom Live API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Calcom API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $calcom_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_calcom_save_api_token',
                    )
                );


                $form_fields .= $calcom_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $calcom_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $calcom_form->render($form_fields);

                ?>


        </div>

        
        <?php
    }

 
    
    public function load_custom_script() {
    }

    public function action_fields() {
       
    }
   
};


$Awp_Calcom = new AWP_Calcom();
