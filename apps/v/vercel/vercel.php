<?php

class AWP_Vercel extends appfactory
{

   
    public function init_actions(){
       

        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_vercel_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['vercel'] = array(
            'title' => esc_html__( 'Vercel', 'automate_hub' ),
            'tasks' => array(
                'createteam'   => esc_html__( 'Create Team', 'automate_hub' ),
                'createproject'   => esc_html__( 'Create Project', 'automate_hub' ),
                'createsecret'   => esc_html__( 'Create Secret', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['vercel'] = array('name'=>esc_html__( 'Vercel', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'vercel') {
            return;
        }
        $nonce = wp_create_nonce("awp_vercel_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">

            <a href="https://sperse.io/go/vercel" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/vercel.png'); ?>"  height="50" alt="VercelLogo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'vercel';
                $vercel_form = new AWP_Form_Fields($app_name);

                $form_fields = $vercel_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_vercel_display_name",
                        'name'          => "awp_vercel_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $vercel_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_vercel_api_token",
                        'name'          => "awp_vercel_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your VercelLive API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'VercelAPI Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $vercel_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_vercel_save_api_token',
                    )
                );


                $form_fields .= $vercel_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $vercel_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $vercel_form->render($form_fields);

                ?>


        </div>

        <?php
    }

 
    public function load_custom_script() {
    }

    public function action_fields() {
       
    }

    
  

};


$Awp_vercel= new AWP_Vercel();
