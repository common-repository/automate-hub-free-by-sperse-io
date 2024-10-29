<?php

class AWP_Clockify extends appfactory
{

   
    public function init_actions(){

    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_clockify_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['clockify'] = array(
            'title' => esc_html__( 'Clockify', 'automate_hub' ),
            'tasks' => array(
                'createclient'   => esc_html__( 'Create Client', 'automate_hub' ),
                'createproject'   => esc_html__( 'Create Project', 'automate_hub' ),
                'createtag'   => esc_html__( 'Create Tag', 'automate_hub' ),
                'createtask'   => esc_html__( 'Create Task', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['clockify'] = array('name'=>esc_html__( 'Clockify', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'clockify') {
            return;
        }
        $nonce = wp_create_nonce("awp_clockify_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/clockify" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/clockify.png'); ?>"  alt="Clockify Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'clockify';
                $clockify_form = new AWP_Form_Fields($app_name);

                $form_fields = $clockify_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_clockify_display_name",
                        'name'          => "awp_clockify_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $clockify_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_clockify_api_token",
                        'name'          => "awp_clockify_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Clockify Live API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Clockify API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $clockify_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_clockify_save_api_token',
                    )
                );


                $form_fields .= $clockify_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $clockify_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $clockify_form->render($form_fields);

                ?>


        </div>

       
        <?php
    }


    
    public function load_custom_script() {
    }

    public function action_fields() {
    
       
    }

    



};


$Awp_Clockify = new AWP_Clockify();
