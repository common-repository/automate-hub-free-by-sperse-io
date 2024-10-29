<?php

class AWP_Airmeet extends appfactory
{

   
    public function init_actions(){
       

        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_airmeet_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['airmeet'] = array(
            'title' => esc_html__( 'Airmeet', 'automate_hub' ),
            'tasks' => array(
                'createmeet'   => esc_html__( 'Create Meeting', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['airmeet'] = array('name'=>esc_html__( 'Airmeet', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'airmeet') {
            return;
        }
        $nonce = wp_create_nonce("awp_airmeet_settings");
        $api_token = isset($_GET['awp_airmeet_api_access_key']) ? sanitize_text_field($_GET['awp_airmeet_api_access_key']) : "";
        $api_secret_key = isset($_GET['awp_airmeet_api_secret_key']) ? sanitize_text_field($_GET['awp_airmeet_api_secret_key']) : "";
        $airmeet_email = isset($_GET['awp_airmeet_email']) ? sanitize_text_field($_GET['awp_airmeet_email']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/airmeet" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/airmeet.png'); ?>" height="50" alt="Airmeet Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'airmeet';
                $airmeet_form = new AWP_Form_Fields($app_name);

                $form_fields = $airmeet_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_airmeet_display_name",
                        'name'          => "awp_airmeet_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $airmeet_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_airmeet_api_access_key",
                        'name'          => "awp_airmeet_api_access_key",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Airmeet API Access Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Airmeet API Acess Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $airmeet_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_airmeet_api_secret_key",
                        'name'          => "awp_airmeet_api_secret_key",
                        'value'         => $api_secret_key,
                        'placeholder'   => esc_html__( 'Enter your Airmeet API Secret Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Airmeet API Secret Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $airmeet_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_airmeet_email",
                        'name'          => "awp_airmeet_email",
                        'value'         => $airmeet_email,
                        'placeholder'   => esc_html__( 'Enter your Email Address', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Email Address', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                

                $form_fields .= $airmeet_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_airmeet_save_api_token',
                    )
                );


                $form_fields .= $airmeet_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $airmeet_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $airmeet_form->render($form_fields);

                ?>


        </div>

        <?php
    }

   
    public function load_custom_script() {
    }

    public function action_fields() {
       
    }

};


$Awp_Airmeet = new AWP_Airmeet();

