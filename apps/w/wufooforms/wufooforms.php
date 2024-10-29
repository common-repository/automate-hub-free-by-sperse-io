<?php
class AWP_WufooForms extends Appfactory
{
    public function init_actions()
    {
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_wufooforms_platform_connection'], 10, 1);
    }

    public function load_custom_script()
    {}

    public function action_provider($actions)
    {
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['wufooforms'] = array('name' => esc_html__('Wufoo Forms', 'automate_hub'), 'cat' => array('other'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'wufooforms') {
            return;
        }
        $nonce = wp_create_nonce("awp_wufooforms_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $display_name = isset($_GET['account_name']) ? $_GET['account_name'] : "";

        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/wufooforms" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/wufooforms.png" width="205" alt="WufooForms Logo"></a><br /><br />
            <?php
require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?>

                <br />
                <?php

        $form_fields = '';
        $app_name = 'wufooforms';
        $wufooforms = new AWP_Form_Fields($app_name);

        $form_fields = $wufooforms->awp_wp_text_input(
            array(
                'id' => "awp_wufooforms_display_name",
                'name' => "awp_wufooforms_display_name",
                'value' => $display_name,
                'placeholder' => esc_html__('Enter an identifier for this account', 'automate_hub'),
                'label' => esc_html__('Subdomain Name', 'automate_hub'),
                'wrapper_class' => 'form-row',
                'show_copy_icon' => true,
            )
        );

        $form_fields .= $wufooforms->awp_wp_text_input(
            array(
                'id' => "awp_wufooforms_api_token",
                'name' => "awp_wufooforms_api_token",
                'value' => $api_token,
                'placeholder' => esc_html__('Enter your Wufoo Form API Key', 'automate_hub'),
                'label' => esc_html__('Wufoo Form API Key', 'automate_hub'),
                'wrapper_class' => 'form-row',
                'show_copy_icon' => true,
            )
        );

        $form_fields .= $wufooforms->awp_wp_hidden_input(
            array(
                'name' => "action",
                'value' => 'awp_wufooforms_save_api_token',
            )
        );

        $form_fields .= $wufooforms->awp_wp_hidden_input(
            array(
                'name' => "_nonce",
                'value' => $nonce,
            )
        );
        $form_fields .= $wufooforms->awp_wp_hidden_input(
            array(
                'name' => "id",
                'value' => wp_unslash($id),
            )
        );

        $wufooforms->render($form_fields);

        ?>
        </div>

    <?php
}

  

    public function action_fields()
    {}
}

$AWP_WufooForms = new AWP_WufooForms();

add_action('wp_enqueue_scripts', 'filter_wufooforms_footer');
function filter_wufooforms_footer()
{
}
