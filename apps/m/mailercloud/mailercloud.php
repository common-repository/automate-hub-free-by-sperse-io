<?php
class AWP_Mailercloud extends appfactory
{

    public function init_actions()
    {

    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_mailercloud_platform_connection'], 10, 1);
    }

    public function action_provider($actions)
    {
        $actions['mailercloud'] = [
            'title' => esc_html__('MailerCloud', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Create Contact', 'automate_hub'), 'createList' => esc_html__('Create List', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['mailercloud'] = array('name' => esc_html__('MailerCloud', 'automate_hub'), 'cat' => array('crm'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'mailercloud') {
            return;
        }
        $nonce = wp_create_nonce("awp_mailercloud_settings");
        $api_key = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $display_name = isset($_GET['account_name']) ? $_GET['account_name'] : "";

        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/mailercloud" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/mailercloud.png" height="50" alt="Mailercloud Logo"></a><br /><br />
            <?php
require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?>
                <br />
                <?php

        $form_fields = '';
        $app_name = 'mailercloud';
        $mailercloud_form = new AWP_Form_Fields($app_name);

        $form_fields = $mailercloud_form->awp_wp_text_input(
            array(
                'id' => "awp_mailercloud_display_name",
                'name' => "awp_mailercloud_display_name",
                'value' => $display_name,
                'placeholder' => esc_html__('Enter an identifier for this account', 'automate_hub'),
                'label' => esc_html__('Display Name', 'automate_hub'),
                'wrapper_class' => 'form-row',
                'show_copy_icon' => true,

            )
        );

        $form_fields .= $mailercloud_form->awp_wp_text_input(
            array(
                'id' => "awp_mailercloud_api_token",
                'name' => "awp_mailercloud_api_token",
                'value' => $api_key,
                'placeholder' => esc_html__('Enter your Mailercloud API Key', 'automate_hub'),
                'label' => esc_html__('Mailercloud API Key', 'automate_hub'),
                'wrapper_class' => 'form-row',
                'show_copy_icon' => true,

            )
        );

        $form_fields .= $mailercloud_form->awp_wp_hidden_input(
            array(
                'name' => "action",
                'value' => 'awp_mailercloud_save_api_token',
            )
        );

        $form_fields .= $mailercloud_form->awp_wp_hidden_input(
            array(
                'name' => "_nonce",
                'value' => $nonce,
            )
        );
        $form_fields .= $mailercloud_form->awp_wp_hidden_input(
            array(
                'name' => "id",
                'value' => wp_unslash($id),
            )
        );

        $mailercloud_form->render($form_fields);

        ?>
        </div>


    <?php
}

    
    public function awp_mailercloud_js_fields($field_data)
    {
    }

    public function load_custom_script()
    {
    }

    public function action_fields()
    {
       
}

}

$AWP_Mailercloud = new AWP_Mailercloud();
