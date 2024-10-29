<?php

class AWP_Testmonitor extends appfactory
{

   
    public function init_actions(){
       

        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_testmonitor_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['testmonitor'] = array(
            'title' => esc_html__( 'Testmonitor', 'automate_hub' ),
            'tasks' => array(
                'createproject'   => esc_html__( 'Create Project', 'automate_hub' ),
                'createteam'   => esc_html__( 'Create Team', 'automate_hub' ),
                'createenvironment'   => esc_html__( 'Create Test Environment', 'automate_hub' ),
                'createapplication'   => esc_html__( 'Create Application', 'automate_hub' ),
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['testmonitor'] = array('name'=>esc_html__( 'Testmonitor', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'testmonitor') {
            return;
        }
        $nonce = wp_create_nonce("awp_testmonitor_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $url = isset($_GET['url']) ? intval( sanitize_text_field($_GET['url'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/testmonitor" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/testmonitor.png'); ?>"   alt="Testmonitor Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'testmonitor';
                $testmonitor_form = new AWP_Form_Fields($app_name);

                $form_fields = $testmonitor_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_testmonitor_display_name",
                        'name'          => "awp_testmonitor_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $testmonitor_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_testmonitor_api_token",
                        'name'          => "awp_testmonitor_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Testmonitor API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Testmonitor API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );
                $form_fields .= $testmonitor_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_testmonitor_domain_url",
                        'name'          => "awp_testmonitor_domain_url",
                        'value'         => $url,
                        'placeholder'   => esc_html__( 'https://abc.testmonitor.com/', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Testmonitor Domain Url', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $testmonitor_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_testmonitor_save_api_token',
                    )
                );


                $form_fields .= $testmonitor_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $testmonitor_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $testmonitor_form->render($form_fields);

                ?>


        </div>

       
        <?php
    }


    
    public function load_custom_script() {
    }

    public function action_fields() {
        
    }

    
  

};


$Awp_Testmonitor = new AWP_Testmonitor();
