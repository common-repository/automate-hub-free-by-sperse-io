<?php

class AWP_Drift extends Appfactory
{

    const client_id = "";

    protected function get_redirect_uri()
    {
        return 'https://sperse.io/scripts/authorization/auth.php';
    }

    public function init_actions()
    {
        add_action("rest_api_init", [$this, "create_webhook_route"]);
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_drift_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null, 'automatehub/drift');
    }

    public function getLoginURL(): string
    {
        $query = [
            'response_type' => "code",
            'client_id' => self::client_id,
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://dev.drift.com/authorize?";
        return add_query_arg($query, $authorization_endpoint);
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/drift',
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_webhook_data'],
                'permission_callback' => function () {return '';},
            ]);
    }

    public function get_webhook_data($request)
    {
        $params = $request->get_params();
        $code = $params['code'] ? $params['code'] : "";
        
        if ($code != "") {

            $client_accessToken = $params['access_token'];
            $client_refreshToken = $params['refresh_token'];

            if (isset($client_accessToken) && isset($client_refreshToken)) {
                global $wpdb;
                $query_drift_db = $wpdb->prepare("select * from  {$wpdb->prefix}awp_platform_settings where platform_name=%s",'drift');
                $data = $wpdb->get_results($query_drift_db);
                $len = count($data) + 1;
                $platform_obj = new AWP_Platform_Shell_Table('drift');
                $platform_obj->save_platform(['account_name' => 'Account Number ' . $len, 'api_key' => $client_accessToken, 'client_secret' => $client_refreshToken]);
            }
            wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=drift'));
            exit();
        }
    }

    public function action_provider($actions)
    {
        $actions['drift'] = [
            'title' => esc_html__('Drift', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Create Contact', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['drift'] = array('name' => esc_html__('Drift', 'automate_hub'), 'cat' => array('crm'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'drift') {
            return;
        }
        $nonce = wp_create_nonce("awp_drift_settings");
        $access_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/drift" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/drift.png'); ?>" width="215" height="50" alt="Drift Logo"></a><br /><br />
                <?php
                require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
                $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                $instruction_obj->prepare_instructions();

            ?><br />
            <form name="drift_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_drifccesssave_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_drift_settings"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a href="<?php echo esc_url($this->getLoginURL()); ?>" class="button button-primary"> Sign In to Drift </a>
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
        <script type="text/template" id="drift-action-template">
          
    </script>
<?php
}

}

$AWP_Drift = new AWP_Drift();
