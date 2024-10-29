<?php

class AWP_Intercom extends Appfactory
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
        add_filter('awp_platforms_connections', [$this, 'awp_intercom_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/intercom');
    }

    public function getLoginURL(): string
    {
        $query = [
            'type' => "web_server",
            'client_id' => self::client_id,
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://app.intercom.com/oauth?";

        return add_query_arg($query, $authorization_endpoint);
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/intercom',
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


         if ( isset( $params['access_token'] ) ) {
            $intercom_access_token = sanitize_text_field($params['access_token']);
            $query= $wpdb->prepare("select * from {$wpdb->prefix}awp_platform_settings where platform_name=%s",'intercom');

            $data=$wpdb->get_results($query);

            $len=count($data) + 1;

            $platform_obj= new AWP_Platform_Shell_Table('intercom');

            $platform_obj->save_platform(['account_name'=>'Account Number '.$len,'api_key'=>$intercom_access_token]);
      
        }
        
        wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=intercom'));
        exit();
    }

    public function action_provider($actions)
    {
        $actions['intercom'] = [
            'title' => esc_html__('intercom', 'automate_hub'),
            'tasks' => array(
                'createcontact' => esc_html__('Create Contact', 'automate_hub'),
                'createcompany' => esc_html__('Create Company', 'automate_hub')
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['intercom'] = array('name' => esc_html__('Intercom', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'intercom') {
            return;
        }
        $nonce = wp_create_nonce("awp_intercom_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/intercom" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/intercom.png'); ?>" width="198" height="50" alt="Intercom Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="intercom_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_intercom_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_intercom_settings"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a href="<?php echo esc_url($this->getLoginURL()); ?>" class="button button-primary"> <?php esc_html_e( 'Connect Your Intercom Account ', 'automate_hub' ); ?></a>
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
        <script type="text/template" id="intercom-action-template">
            
        </script>
        <?php
    }

}

$AWP_Intercom = new AWP_Intercom();

