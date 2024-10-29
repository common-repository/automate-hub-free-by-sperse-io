<?php

class AWP_Livestorm extends appfactory
{

   
    public function init_actions(){
   
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_livestorm_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['livestorm'] = array(
            'title' => esc_html__( 'Livestorm', 'automate_hub' ),
            'tasks' => array(
                'createevent'   => esc_html__( 'Create Event', 'automate_hub' ),
                'createsession'   => esc_html__( 'Create Session', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['livestorm'] = array('name'=>esc_html__( 'Livestorm', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        
        if ($current_tab != 'livestorm') {
            return;
        }
        $nonce = wp_create_nonce("awp_livestorm_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/livestorm" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/livestorm.png'); ?>" width="320" height="50" alt="Livestorm Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'livestorm';
                $livestorm_form = new AWP_Form_Fields($app_name);

                $form_fields = $livestorm_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_livestorm_display_name",
                        'name'          => "awp_livestorm_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $livestorm_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_livestorm_api_token",
                        'name'          => "awp_livestorm_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Livestorm Live API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Livestorm API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $livestorm_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_livestorm_save_api_token',
                    )
                );


                $form_fields .= $livestorm_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $livestorm_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $livestorm_form->render($form_fields);

                ?>


        </div>

        
        <?php
    }

   
    
    public function load_custom_script() {
    }

    public function action_fields() {
        
    }

    
  
};


$Awp_Livestorm = new AWP_Livestorm();