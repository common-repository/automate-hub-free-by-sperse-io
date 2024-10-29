<?php

class AWP_LiveAgent extends appfactory
{

   
    public function init_actions(){
       
        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_liveagent_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['liveagent'] = array(
            'title' => esc_html__( 'LiveAgent', 'automate_hub' ),
            'tasks' => array(
                'createcustomer'   => esc_html__( 'Create Contact', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['liveagent'] = array('name'=>esc_html__( 'LiveAgent', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'liveagent') {
            return;
        }
        $nonce = wp_create_nonce("awp_liveagent_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $api_url     = isset($_GET['awp_liveagent_api_url']) ? sanitize_text_field($_GET['awp_liveagent_api_url']) : "";
        ?>
        <div class="platformheader">
            <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/liveagent" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/liveagent.png'); ?>" height="50" alt="LiveAgent Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'liveagent';
                $liveagent_form = new AWP_Form_Fields($app_name);

                $form_fields = $liveagent_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_liveagent_display_name",
                        'name'          => "awp_liveagent_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $liveagent_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_liveagent_api_token",
                        'name'          => "awp_liveagent_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your LiveAgent Live API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'LiveAgent API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $liveagent_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_liveagent_api_url",
                        'name'          => "awp_liveagent_api_url",
                        'value'         => $api_url,
                        'placeholder'   => esc_html__( 'http://abc.ladesk.com', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Enter your LiveAgent API Url', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $liveagent_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_liveagent_save_api_token',
                    )
                );


                $form_fields .= $liveagent_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $liveagent_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $liveagent_form->render($form_fields);

                ?>


        </div>
        <?php
    }


    public function load_custom_script() {
    }

    public function action_fields() {
       
    }


   
};


$Awp_LiveAgent = new AWP_LiveAgent();
