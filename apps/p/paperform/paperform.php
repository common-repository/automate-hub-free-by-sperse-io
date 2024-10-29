<?php
class AWP_PaperForm extends Appfactory
{
    public function init_actions()
    {
        add_action('admin_post_awp_paperform_save_api_token', [$this, 'awp_save_paperform_api_token'], 10, 0);
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_paperform_platform_connection'], 10, 1);
    }

    public function load_custom_script()
    {
    }

    public function action_provider($actions)
    {
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['paperform'] = array('name' => esc_html__('Paperform', 'automate_hub'), 'cat' => array('other'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'paperform') {
            return;
        }
        $nonce = wp_create_nonce("awp_paperform_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $display_name = isset($_GET['account_name']) ? $_GET['account_name'] : "";

?>
        <div class="platformheader">
            <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/paperform" target="_blank"><img src="<?php  AWP_ASSETS; ?>/images/logos/paperform.png" width="202" height="50" alt="Paperform Logo"></a><br /><br />
            <?php
            require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
            $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
            $instruction_obj->prepare_instructions();

            ?>

            <br />
            <?php

            $form_fields = '';
            $app_name = 'paperform';
            $paperform = new AWP_Form_Fields($app_name);

            $form_fields = $paperform->awp_wp_text_input(
                array(
                    'id' => "awp_paperform_display_name",
                    'name' => "awp_paperform_display_name",
                    'value' => $display_name,
                    'placeholder' => esc_html__('Enter an identifier for this account', 'automate_hub'),
                    'label' => esc_html__('Display Name', 'automate_hub'),
                    'wrapper_class' => 'form-row',
                    'show_copy_icon' => true,
                )
            );

            $form_fields .= $paperform->awp_wp_text_input(
                array(
                    'id' => "awp_paperform_api_token",
                    'name' => "awp_paperform_api_token",
                    'value' => $api_token,
                    'placeholder' => esc_html__('Enter your Paperform API Key', 'automate_hub'),
                    'label' => esc_html__('Paperform API Key', 'automate_hub'),
                    'wrapper_class' => 'form-row',
                    'show_copy_icon' => true,

                )
            );

            $form_fields .= $paperform->awp_wp_hidden_input(
                array(
                    'name' => "action",
                    'value' => 'awp_paperform_save_api_token',
                )
            );

            $form_fields .= $paperform->awp_wp_hidden_input(
                array(
                    'name' => "_nonce",
                    'value' => $nonce,
                )
            );
            $form_fields .= $paperform->awp_wp_hidden_input(
                array(
                    'name' => "id",
                    'value' => wp_unslash($id),
                )
            );

            $paperform->render($form_fields);

            ?>
        </div>

<?php
    }



    public function action_fields()
    {
    }
}

$AWP_PaperForm = new AWP_PaperForm();

add_action('wp_enqueue_scripts', 'filter_paperform_footer');
function filter_paperform_footer()
{
}
