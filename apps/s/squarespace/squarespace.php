<?php

class AWP_Squarespace extends Appfactory
{

    // replace with live key
    const client_id = "$$$";
    const secret_id = "$$$";

    protected function get_redirect_uri()
    {
        return 'https://sperse.io/scripts/authorization/auth.php';
    }

    public function init_actions()
    {
     
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_squarespace_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/squarespace');
    }

    public function getLoginURL(): string
    {
        $query = [
            'client_id' => self::client_id,
            'redirect_uri' => $this->get_redirect_uri(),
            'scope' => 'website.orders,website.orders.read,website.transactions.read,website.inventory,website.inventory.read,website.products,website.products.read',
            'state' => 'SID'.rand(0001,1000),
            'access_type' => 'offline',
            
        ];
        $authorization_endpoint = "https://login.squarespace.com/api/1/login/oauth/provider/authorize";

      
        return add_query_arg($query, $authorization_endpoint);
    }

    public function action_provider($actions)
    {
        $actions['squarespace'] = [
            'title' => esc_html__('squarespace', 'automate_hub'),
            'tasks' => array(
                'createproduct' => esc_html__('Create Product', 'automate_hub'),
                'createcompany' => esc_html__('Create Company', 'automate_hub')
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['squarespace'] = array('name' => esc_html__('Squarespace', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'squarespace') {
            return;
        }
        $nonce = wp_create_nonce("awp_squarespace_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/squarespace" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/squarespace.png" width="292" height="50" alt="squarespace Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="squarespace_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_squarespace_save_api_token">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a id="squarespaceauthbtn" target="_blank"  class="button button-primary"> Connect Your Squarespace Account </a>
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

$AWP_Squarespace = new AWP_Squarespace();
