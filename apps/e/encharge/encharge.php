<?php
class AWP_Encharge extends appfactory
{

    const client_id = "automatehub";
    const client_secret = "$$$";

    protected function get_redirect_uri()
    {
        return 'https://sperse.io/scripts/authorization/auth.php';
    }

    public function init_actions()
    {
       
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_encharge_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null, 'automatehub/encharge');
    }

    public function getLoginURL(): string
    {
        $query = [
            'type' => "authorizationCode",
            'client_id' => self::client_id,
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'state' => $this->get_callback(),
        ];

        $authorization_endpoint = "https://api.encharge.io/v1/oauth/authorize?";

        return add_query_arg($query, $authorization_endpoint);
    }

    


    public function action_provider($actions)
    {
        $actions['encharge'] = [
            'title' => esc_html__('Encharge', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Add Person', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['encharge'] = array('name' => esc_html__('Encharge', 'automate_hub'), 'cat' => array('crm'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'encharge') {
            return;
        }
        $nonce = wp_create_nonce("awp_encharge_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        ?>
        <div class="platformheader">
            <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/encharge" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/encharge.png"  alt="Encharge Logo"></a><br /><br />
                <?php
            require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
            $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
            $instruction_obj->prepare_instructions();
            ?>
        <br />
            <form name="encharge_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_encharge_save_api_token">
                <input type="hidden" name="_nonce" value="<?php $nonce?>" />
                <input type="hidden" name="id" value="<?php $id?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a href="<?php $this->getLoginURL()?>" class="button button-primary"> Sign In to Encharge </a>
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
       
}

}

$AWP_Encharge = new AWP_Encharge();
