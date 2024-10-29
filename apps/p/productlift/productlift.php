<?php

class AWP_Productlift extends appfactory
{

   
    public function init_actions(){
       
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_productlift_platform_connection'], 10, 1);
    }

    public function action_provider( $providers ) {
        $providers['productlift'] = array(
            'title' => esc_html__( 'Productlift', 'automate_hub' ),
            'tasks' => array(
                'createuser'   => esc_html__( 'Create User', 'automate_hub' ),
                'createpost'   => esc_html__( 'Create Post', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['productlift'] = array('name'=>esc_html__( 'Productlift', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'productlift') {
            return;
        }
        $nonce = wp_create_nonce("awp_productlift_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $url     = isset($_GET['awp_productlift_domain_url']) ? sanitize_text_field($_GET['awp_productlift_domain_url']) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/productlift" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/productlift.png'); ?>" height="50" alt="Productlift Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />

                <?php 

                $form_fields = '';
                $app_name= 'productlift';
                $productlift_form = new AWP_Form_Fields($app_name);

                $form_fields = $productlift_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_productlift_display_name",
                        'name'          => "awp_productlift_display_name",
                        'value'         => $display_name,
                        'placeholder'   =>  esc_html__('Enter an identifier for this account', 'automate_hub' ),
                        'label'         =>  esc_html__('Display Name', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $productlift_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_productlift_api_token",
                        'name'          => "awp_productlift_api_token",
                        'value'         => $api_token,
                        'placeholder'   => esc_html__( 'Enter your Productlift API Key', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Productlift API Key', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $productlift_form->awp_wp_text_input(
                    array(
                        'id'            => "awp_productlift_domain_url",
                        'name'          => "awp_productlift_domain_url",
                        'value'         => $url,
                        'placeholder'   => esc_html__( 'https://abc.productlift.dev', 'automate_hub' ),
                        'label'         =>  esc_html__( 'Productlift Your Productlift Domain URL', 'automate_hub' ),
                        'wrapper_class' => 'form-row',
                        'show_copy_icon'=>true
                        
                    )
                );

                $form_fields .= $productlift_form->awp_wp_hidden_input(
                    array(
                        'name'          => "action",
                        'value'         => 'awp_productlift_save_api_token',
                    )
                );


                $form_fields .= $productlift_form->awp_wp_hidden_input(
                    array(
                        'name'          => "_nonce",
                        'value'         =>$nonce,
                    )
                );
                $form_fields .= $productlift_form->awp_wp_hidden_input(
                    array(
                        'name'          => "id",
                        'value'         =>wp_unslash($id),
                    )
                );


                $productlift_form->render($form_fields);

                ?>


        </div>
        <?php
    }


    
    public function load_custom_script() {
    }

    public function action_fields() {
    }


};


$Awp_Productlift = new AWP_Productlift();
