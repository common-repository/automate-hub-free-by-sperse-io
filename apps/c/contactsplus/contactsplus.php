<?php

class AWP_ContactsPlus extends Appfactory
{

    const client_id = "";
    const client_secret = "";

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
        add_filter('awp_platforms_connections', [$this, 'awp_contactsplus_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/contactsplus');
    }

    public function getLoginURL(): string
    {
        $query = [
            'type' => "web_server",
            'client_id' => self::client_id,
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'scope' => "account.read,contacts.read,contacts.write,tags.read",
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://app.contactsplus.com/oauth/authorize?";
        return add_query_arg($query, $authorization_endpoint);
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/contactsplus',
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_webhook_data'],
                'permission_callback' => function () {return '';},
            ]);
    }

    public function get_webhook_data($request)
    {
        $params = $request->get_params();
        

        
        if ( isset( $params['access_token'] ) ) {
            $client_accessToken = $params['access_token'];
            $client_refreshToken = $params['refresh_token'];
            if (isset($client_accessToken) && isset($client_refreshToken)) {

                $authorize_client_url = "https://api.contactsplus.com/api/v1/account.get";
                $authorize_args = array(
                    'method' => 'POST',
                    'headers' => array(
                        'Authorization' => "Bearer " . $client_accessToken,
                        'Content-Type' => "application/json",
                    ),
                );
                $return_client_data = wp_remote_request($authorize_client_url, $authorize_args);

                $return_client_data_body = json_decode($return_client_data['body']);

                $client_email = $return_client_data_body->account->profileData->emails[0]->value;

                $platform_obj = new AWP_Platform_Shell_Table('contactsplus');
                $platform_obj->save_platform(['api_key' => $client_accessToken, 'email' => $client_email, 'client_secret' => $client_refreshToken]);

            }
        }
            wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=contactsplus'));
            exit();
    }

    public function action_provider($actions)
    {
        $actions['contactsplus'] = [
            'title' => esc_html__('Contacts+', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Subscribe To List', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['contactsplus'] = array('name' => esc_html__('Contacts Plus', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'contactsplus') {
            return;
        }
        $nonce = wp_create_nonce("awp_contactsplus_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
		<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/contactsplus" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/contactsplus.png'); ?>" width="204" height="50" alt="Contacts+ Logo"></a><br /><br />
                <?php
require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="contactsplus_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_contactsplus_save_api_token">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a href="<?php echo esc_url($this->getLoginURL()) ?>" class="button button-primary"> Sign In to Contacts+ </a>
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
        <script type="text/template" id="contactsplus-action-template">

        </script>
    <?php
    }

}

$AWP_ContactsPlus = new AWP_ContactsPlus();

