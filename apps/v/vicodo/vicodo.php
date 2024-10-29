<?php

class AWP_Vicodo extends appfactory
{

   
    public function init_actions(){
       
        add_action('admin_post_awp_vicodo_save_api_token', [$this, 'awp_save_vicodo_api_token'], 10, 0);
        
        add_action( 'wp_ajax_awp_fetch_source', [$this, 'awp_fetch_source']);
        
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_vicodo_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['vicodo'] = array(
            'title' => esc_html__( 'Vicodo', 'automate_hub' ),
            'tasks' => array(
                'createcase'   => esc_html__( 'Create Case', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['vicodo'] = array('name'=>esc_html__( 'Vicodo', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'vicodo') {
            return;
        }
        $nonce = wp_create_nonce("awp_vicodo_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $app_secret = isset($_GET['client_id']) ? sanitize_text_field($_GET['client_id']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/vicodo" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/vicodo.png'); ?>" height="50" alt="Vicodo Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'vicodo';
                $vicodo_form = new AWP_Form_Fields($app_name);

                $form_fields = $vicodo_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_vicodo_display_name",
                        'name'          => "awp_vicodo_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $vicodo_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_vicodo_api_token",
                        'name'          => "awp_vicodo_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Vicodo APP ID', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Vicodo  APP ID', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $vicodo_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_vicodo_app_secret",
                        'name'          => "awp_vicodo_app_secret",
                        'value'         => $app_secret,
                        'placeholder'   => esc_html__( 'Enter your Vicodo APP Secret ID', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Vicodo  APP Secret ID', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $vicodo_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_vicodo_save_api_token',
                    )
                );


                $form_fields .= $vicodo_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $vicodo_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $vicodo_form->render($form_fields);

                ?>


        </div>


        <?php
    }


    
    public function load_custom_script() {
    }

    public function action_fields() {
       
    }

    
 
};


$Awp_Vicodo = new AWP_Vicodo();

