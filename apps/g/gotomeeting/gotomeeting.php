<?php

class AWP_Gotomeeting extends Appfactory
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
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_gotomeeting_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/gotomeeting');
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
        register_rest_route('automatehub', '/gotomeeting',
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
            $platform_obj = new AWP_Platform_Shell_Table('gotomeeting');

            $platform_obj->save_platform(['account_name' => $params['original_response']['principal'], 'api_key' => $params['access_token']]);
        }


            wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=gotomeeting'));
            exit();
    }

    public function action_provider($actions)
    {
        $actions['gotomeeting'] = [
            'title' => esc_html__('Gotomeeting', 'automate_hub'),
            'tasks' => array(
                'createmeeting' => esc_html__('Create Meeting', 'automate_hub')
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['gotomeeting'] = array('name' => esc_html__('Gotomeeting', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'gotomeeting') {
            return;
        }
        $nonce = wp_create_nonce("awp_gotomeeting_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/gotomeeting" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/gotomeeting.png'); ?>"  height="50" width="229" alt="GoToMeeting Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="gotomeeting_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_gotomeeting_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( "awp_gotomeeting_settings" ); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a id="btngotomeetingauth" class="button button-primary"> Connect Your Gotomeeting Account </a>
                        </td>
                    </tr>
                    <script type="text/javascript">
                            document.getElementById("btngotomeetingauth").addEventListener("click", function(){
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
        <script type="text/template" id="gotomeeting-action-template">
        

    </script>
    <?php
    }

}

$AWP_Gotomeeting = new AWP_Gotomeeting();

