<?php

class AWP_Trigger extends appfactory
{

   
    public function init_actions(){
        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_trigger_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['trigger'] = array(
            'title' => esc_html__( 'Trigger', 'automate_hub' ),
            'tasks' => array(
                'createcompany'   => esc_html__( 'Create Company', 'automate_hub' ),
                'trigger_createproject'   => esc_html__( 'Create Project', 'automate_hub' ),
                'createtask'   => esc_html__( 'Create Task', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['trigger'] = array('name'=>esc_html__( 'Trigger', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'trigger') {
            return;
        }
        $nonce = wp_create_nonce("awp_trigger_settings");
        $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $api_token     = isset($_GET['client_id']) ? sanitize_text_field($_GET['client_id']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/trigger" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/trigger.png'); ?>" height="50" alt="trigger Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'trigger';
                $trigger_form = new AWP_Form_Fields($app_name);

                $form_fields = $trigger_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_trigger_display_name",
                        'name'          => "awp_trigger_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $trigger_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_trigger_token",
                        'name'          => "awp_trigger_token",
                        'value'         => $api_token,
                        'placeholder'   =>  esc_html__('Enter Token for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Token', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $trigger_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_trigger_api_key",
                        'name'          => "awp_trigger_api_key",
                        'value'         => $api_key,
                        'placeholder'   => esc_html__( 'Enter your Trigger API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Trigger API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $trigger_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_trigger_save_api_token',
                    )
                );


                $form_fields .= $trigger_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $trigger_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $trigger_form->render($form_fields);

                ?>


        </div>


        <?php
    }

 
    
    public function load_custom_script() {
    }

    public function action_fields() {
       
    }

    
  
};


$Awp_Trigger = new AWP_Trigger();
