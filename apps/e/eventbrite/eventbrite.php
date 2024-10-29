<?php
class AWP_Eventbrite extends Appfactory
{

    // replace with live key
    
    const api_key = "";

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
        add_filter('awp_platforms_connections', [$this, 'awp_eventbrite_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null, 'automatehub/eventbrite');
    }

    public function getLoginURL(): string
    {
        $query = [
            'response_type' => "code",
            'client_id' => self::api_key,
            'redirect_uri' => $this->get_redirect_uri(),
            'state' => $this->get_callback(),
        ];

        $authorization_endpoint = "https://www.eventbrite.com/oauth/authorize?";

        return add_query_arg($query, $authorization_endpoint);
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/eventbrite',
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

        if (isset($params['access_token'])) {
            $access_token = $params['access_token'];

            $query =  $wpdb->prepare("select * from {$wpdb->prefix}awp_platform_settings where platform_name=%s",'eventbrite');

            $data = $wpdb->get_results($query);

            $len = count($data) + 1;

            $platform_obj = new AWP_Platform_Shell_Table('eventbrite');

            $platform_obj->save_platform(['account_name' => 'Account Number ' . $len, 'api_key' => $access_token]);

        }
        wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=eventbrite'));
        exit();
    }

    public function action_provider($actions)
    {
        $actions['eventbrite'] = [
            'title' => esc_html__('Eventbrite', 'automate_hub'),
            'tasks' => array(
                'createevent' => esc_html__('Create Event', 'automate_hub'),
                'createvenue' => esc_html__('Create Venue', 'automate_hub'),
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['eventbrite'] = array('name' => esc_html__('Eventbrite', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'eventbrite') {
            return;
        }
        $nonce = wp_create_nonce("awp_eventbrite_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/eventbrite" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/eventbrite.png'); ?>" width="292" height="50" alt="eventbrite Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="eventbrite_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_eventbrite_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_eventbrite_settings" ); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a id="btneventbrightAuth" class="button button-primary"><?php esc_html_e( 'Connect Your Eventbrite Account ', 'automate_hub' ); ?> </a>
                        </td>
                    </tr>
                </table>
            </form>
            <script type="text/javascript">
                            document.getElementById("btneventbrightAuth").addEventListener("click", function(){
                                var win=window.open('<?php echo esc_url($this->getLoginURL()) ?>','popup','width=600,height=600');
                                var id = setInterval(function() {
                                const queryString = win.location.search;
                                const urlParams = new URLSearchParams(queryString);
                                const page_type = urlParams.get('page');
                                if(page_type=='automate_hub'){win.close(); clearInterval(id); location.reload();}
                                }, 1000);
                            });
                        </script>
        </div>
        <?php
}

    public function load_custom_script()
    {
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="eventbrite-action-template">

        </script>
        <?php
}


}

$AWP_Eventbrite = new AWP_Eventbrite();