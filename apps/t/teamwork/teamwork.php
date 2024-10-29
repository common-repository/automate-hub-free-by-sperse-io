<?php

class AWP_Teamwork extends Appfactory
{

    // replace with live key
    const client_id = "";
    const client_secret = "";

    protected function get_redirect_uri()
    {
        // return 'https://sperse.io/scripts/authorization/auth.php';
        return 'http://localhost/wp/wp-json/automatehub/teamwork';
    }

    public function init_actions()
    {
       
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_teamwork_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/teamwork');
    }

    public function getLoginURL(): string
    {
        $query = [
            'client_id' => self::client_id,
            'redirect_uri' => $this->get_redirect_uri(),
        ];
        $authorization_endpoint = "https://www.teamwork.com/launchpad/login?";

        return add_query_arg($query, $authorization_endpoint);
    }

   
    public function action_provider($actions)
    {
        $actions['teamwork'] = [
            'title' => esc_html__('Teamwork', 'automate_hub'),
            'tasks' => array(
                'createproject' => esc_html__('Create Project', 'automate_hub'),
                
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['teamwork'] = array('name' => esc_html__('Teamwork', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'teamwork') {
            return;
        }
        $nonce = wp_create_nonce("awp_teamwork_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/teamwork" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/teamwork.png" height="50" alt="teamwork Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="teamwork_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_teamwork_save_api_token">
                <input type="hidden" name="_nonce" value="<?php $nonce?>" />
                <input type="hidden" name="id" value="<?php $id?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a  target="_blank" id="teamworkauthbtn" class="button button-primary"> Connect Your Teamwork Account </a>
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

$AWP_Teamwork = new AWP_Teamwork();

