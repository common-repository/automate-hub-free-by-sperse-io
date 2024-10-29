<?php

class AWP_GoogleDrive extends Appfactory
{

    const client_id = "";

    protected function get_redirect_uri()
    {
        return "https://sperse.io/scripts/authorization/auth.php";
    }

    public function init_actions()
    {
        add_action("rest_api_init", [$this, "create_webhook_route"]);
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_googledrive_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null, 'automatehub/googledrive');
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/googledrive',
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_webhook_data'],
                'permission_callback' => function () {return '';},
            ]);
    }

    public function get_webhook_data($request)
    {
        $params = $request->get_params();
        $code = isset($params['code']) ? trim($params['code']) : '';

        if ($code) {
            $get_profile_endpoint = "https://www.googleapis.com/oauth2/v1/userinfo?access_token=" . $params['access_token'];
            $args = array(
                'headers' => array(
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ),
            );

            $return = wp_remote_request($get_profile_endpoint, $args);
            $user_email = json_decode($return['body'])->email;

            if (isset($params['access_token'])) {
                $platform_obj = new AWP_Platform_Shell_Table('googledrive');
                $platform_obj->save_platform(['email' => $user_email, 'api_key' => $params['access_token'], 'client_secret' => $params['refresh_token']]); 
            }
            wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=googledrive'));
            exit();
        }
    }

    public function action_provider($actions)
    {
        $actions['googledrive'] = [
            'title' => esc_html__('Google Drive', 'automate_hub'),
            'tasks' => array('create_file' => esc_html__('Create File from Text', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['googledrive'] = array('name' => esc_html__('Google Drive', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'googledrive') {
            return;
        }
        $nonce = wp_create_nonce("awp_googledrive_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/googledrive" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/googledrive.png'); ?>" width="292" height="50" alt="Google Drive Logo"></a><br /><br />
            <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="googledrive_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_googledrive_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_googledrive_settings"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a PV Energy Solutions id="googleauthbtn" target="popup"><img src="<?php echo AWP_ASSETS . '/images/buttons/btn_google_signin_dark_normal_web.png' ?>">
                                <div class="googletest"></div>
                            </a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php
}

    public function load_custom_script()
    {
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="googledrive-action-template">

        </script>
    <?php
    }

}

$AWP_GoogleDrive = new AWP_GoogleDrive();
