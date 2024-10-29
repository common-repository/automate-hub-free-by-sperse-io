<?php

class AWP_Gotowebinar extends Appfactory
{

    // replace with live key
    const client_id = "";

    protected function get_redirect_uri()
    {        
        return 'https://sperse.io/scripts/authorization/auth.php';
    }

    public function init_actions()
    {
        add_action("rest_api_init", [$this, "create_webhook_route"]);
        add_action( 'wp_ajax_awp_get_accounts', [$this, 'awp_get_accounts']);
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_gotowebinar_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/gotowebinar');
    }

    public function getLoginURL(): string
    {
        $query = [
            'client_id' => self::client_id,
            'response_type'=>'code',
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://authentication.logmeininc.com/oauth/authorize?";

        return add_query_arg($query, $authorization_endpoint);
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/gotowebinar',
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_webhook_data'],
                'permission_callback' => function () {return '';},
            ]);
    }

    public function get_webhook_data($request)
    {
        global $wpdb;

        $params = $request->get_params();
        if (isset( $params['access_token'] )) {
            $platform_obj = new AWP_Platform_Shell_Table('gotowebinar');

            $platform_obj->save_platform(['account_name' => $params['original_response']['principal'], 'api_key' => $params['access_token']]);
        }
            wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=gotowebinar'));
            exit();
    }

    public function action_provider($actions)
    {
        $actions['gotowebinar'] = [
            'title' => esc_html__('Gotowebinar', 'automate_hub'),
            'tasks' => array(
                'createwebinar' => esc_html__('Create webinar', 'automate_hub')
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['gotowebinar'] = array('name' => esc_html__('Gotowebinar', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'gotowebinar') {
            return;
        }
        $nonce = wp_create_nonce("awp_gotowebinar_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/gotowebinar" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/gotowebinar.png'); ?>"  height="50" width="229" alt="GoToWebinar Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="gotowebinar_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_gotowebinar_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_helpscout_settings" ); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a id="btngotowebinarauth" class="button button-primary"> Connect Your Gotowebinar Account </a>
                        </td>
                    </tr>
                    <script type="text/javascript">
                            document.getElementById("btngotowebinarauth").addEventListener("click", function(){
                                var win=window.open('<?php echo esc_url($this->getLoginURL()); ?>','popup','width=600,height=600');
                                var id = setInterval(function() {
                                const queryString = win.location.search;
                                const urlParams = new URLSearchParams(queryString);
                                const page_type = urlParams.get('page');
                                if(page_type=='automate_hub'){win.close(); clearInterval(id); location.reload();}
                                }, 1000);
                            });
                        </script>
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
        <script type="text/template" id="gotowebinar-action-template">
           
    </script>
    <?php
    }

    public static function awp_get_accounts($key){
        $url = "https://api.getgo.com/admin/rest/v1/me?includeAdmins=true&includeInvitation=true";

        $args = array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => $key
            )
        );

        $response = wp_remote_get( $url, $args );
        $retrievebody = wp_remote_retrieve_body( $response);
        $body = json_decode( $retrievebody, true );
        return($body['key']);
        
    }

}

$AWP_Gotowebinar = new AWP_Gotowebinar();
