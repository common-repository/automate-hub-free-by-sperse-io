<?php

class AWP_Samdock extends appfactory
{

   
    public function init_actions(){

    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_samdock_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['samdock'] = array(
            'title' => esc_html__( 'Samdock', 'automate_hub' ),
            'tasks' => array(
                'createcontact'   => esc_html__( 'Create Contact', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['samdock'] = array('name'=>esc_html__( 'Samdock', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'samdock') {
            return;
        }
        $nonce = wp_create_nonce("awp_samdock_settings");
        $username = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $password     = isset($_GET['awp_samdock_password']) ? sanitize_text_field($_GET['awp_samdock_password']) : "";
        ?>
        <div class="platformheader">
            <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/samdock" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/samdock.jpg'); ?>"  height="50" alt="Samdock Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'samdock';
                $samdock_form = new AWP_Form_Fields($app_name);

                $form_fields = $samdock_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_samdock_display_name",
                        'name'          => "awp_samdock_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $samdock_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_samdock_username",
                        'name'          => "awp_samdock_username",
                        'value'         => $username,
                        'placeholder'   => esc_html__( 'Enter your Samdock Account Email', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Samdock Account Email', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $samdock_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_samdock_password",
                        'name'          => "awp_samdock_password",
                        'value'         => $password,
                        'placeholder'   => esc_html__( 'Enter your Samdock Password', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Samdock Account Password', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $samdock_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_samdock_save_api_token',
                    )
                );


                $form_fields .= $samdock_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $samdock_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $samdock_form->render($form_fields);

                ?>


        </div>

        <?php
    }

 
    
    public function load_custom_script() {
    }

    public function action_fields() {
       
    }
};


$Awp_Samdock = new AWP_Samdock();
