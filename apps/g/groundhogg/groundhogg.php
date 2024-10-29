<?php
class AWP_Groundhogg extends appfactory
{
    public function init_actions()
    {
    }

    public function init_filters()
    {

    }

    public function action_provider($actions)
    {
        $actions['groundhogg'] = [
            'title' => esc_html__('Groundhogg', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Add Contact', 'automate_hub'), 'tag' => esc_html__('Create Tag', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['groundhogg'] = array('name' => esc_html__('Groundhogg', 'automate_hub'), 'cat' => array('crm'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'groundhogg') {
            return;
        }
        $nonce = wp_create_nonce("awp_groundhogg_settings");
        $api_key = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $token = isset($_GET['client_secret']) ? $_GET['client_secret'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $display_name = isset($_GET['account_name']) ? $_GET['account_name'] : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/groundhogg" target="_blank"><img src="<?php echo AWP_ASSETS;?>/images/logos/groundhogg.png" width="275" height="50" alt="groundhogg Logo"></a><br /><br />
            <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?>
                <br />
                <?php

        $form_fields = '';
        $app_name = 'groundhogg';
        $groundhogg_form = new AWP_Form_Fields($app_name);

        $form_fields = $groundhogg_form->awp_wp_text_input(
            array(
                'id' => "awp_groundhogg_display_name",
                'name' => "awp_groundhogg_display_name",
                'value' => $display_name,
                'placeholder' => esc_html__('Enter an identifier for this account', 'automate_hub'),
                'label' => esc_html__('Display Name', 'automate_hub'),
                'wrapper_class' => 'form-row',
                'show_copy_icon' => true,

            )
        );

        $form_fields .= $groundhogg_form->awp_wp_text_input(
            array(
                'id' => "awp_groundhogg_api_key",
                'name' => "awp_groundhogg_api_key",
                'value' => $api_key,
                'placeholder' => esc_html__('Enter your Groundhogg API Key', 'automate_hub'),
                'label' => esc_html__('Groundhogg Public API Key', 'automate_hub'),
                'wrapper_class' => 'form-row',
                'show_copy_icon' => true,

            )
        );

        $form_fields .= $groundhogg_form->awp_wp_text_input(
            array(
                'id' => "awp_groundhogg_token",
                'name' => "awp_groundhogg_token",
                'value' => $token,
                'placeholder' => esc_html__('Enter your Groundhogg Token', 'automate_hub'),
                'label' => esc_html__('Groundhogg Token', 'automate_hub'),
                'wrapper_class' => 'form-row',
                'show_copy_icon' => true,

            )
        );

        $form_fields .= $groundhogg_form->awp_wp_hidden_input(
            array(
                'name' => "action",
                'value' => 'awp_groundhogg_save_api_token',
            )
        );

        $form_fields .= $groundhogg_form->awp_wp_hidden_input(
            array(
                'name' => "_nonce",
                'value' => $nonce,
            )
        );
        $form_fields .= $groundhogg_form->awp_wp_hidden_input(
            array(
                'name' => "id",
                'value' => wp_unslash($id),
            )
        );

        $groundhogg_form->render($form_fields);
        ?>
        </div>


     
    <?php
}

   
    public function awp_groundhogg_js_fields($field_data)
    {
    }

    public function load_custom_script()
    {
    }

    public function action_fields()
    {

}
}

$AWP_Groundhogg = new AWP_Groundhogg();
 