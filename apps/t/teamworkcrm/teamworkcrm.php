<?php

class AWP_Teamworkcrm extends appfactory
{

   
    public function init_actions(){
        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_teamworkcrm_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['teamworkcrm'] = array(
            'title' => esc_html__( 'Teamwork CRM', 'automate_hub' ),
            'tasks' => array(
                'createcontact'   => esc_html__( 'Create Contact', 'automate_hub' ),
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['teamworkcrm'] = array('name'=>esc_html__( 'Teamworkcrm', 'automate_hub'), 'cat'=>array('crm'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'teamworkcrm') {
            return;
        }
        $nonce = wp_create_nonce("awp_teamworkcrm_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $url     = isset($_GET['awp_teamworkcrm_domain_url']) ? sanitize_text_field($_GET['awp_teamworkcrm_domain_url']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/teamworkcrm" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/teamworkcrm.png'); ?>" height="50" alt="Teamworkcrm Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'teamworkcrm';
                $teamworkcrm_form = new AWP_Form_Fields($app_name);

                $form_fields = $teamworkcrm_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_teamworkcrm_display_name",
                        'name'          => "awp_teamworkcrm_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $teamworkcrm_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_teamworkcrm_api_token",
                        'name'          => "awp_teamworkcrm_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Teamworkcrm API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Teamworkcrm API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $teamworkcrm_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_teamworkcrm_domain_url",
                        'name'          => "awp_teamworkcrm_domain_url",
                        'value'         => $url,
                        'placeholder'   => esc_html__( 'https://abc.teamworkcrm.com', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Teamworkcrm Your Teamworkcrm Domain URL', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $teamworkcrm_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_teamworkcrm_save_api_token',
                    )
                );


                $form_fields .= $teamworkcrm_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $teamworkcrm_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $teamworkcrm_form->render($form_fields);

                ?>


        </div>

        
        <?php
    }

    
    public function load_custom_script() {
    }

    public function action_fields() {
        
    }

    
   

};


$Awp_Teamworkcrm = new AWP_Teamworkcrm();
