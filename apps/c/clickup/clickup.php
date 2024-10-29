<?php

class AWP_Clickup extends Appfactory
{

    // replace with live key
    const client_id = "###";

    protected function get_redirect_uri()
    {
        return 'https://sperse.io/scripts/authorization/auth.php';
    }

    public function init_actions()
    {
      
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_clickup_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/clickup');
    }

    public function getLoginURL(): string
    {
        $query = [
            'type' => "web_server",
            'client_id' => self::client_id,
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://app.clickup.com/api?";

        return add_query_arg($query, $authorization_endpoint);
    }



  

    public function action_provider($actions)
    {
        $actions['clickup'] = [
            'title' => esc_html__('Clickup', 'automate_hub'),
            'tasks' => array(
                'creategoal' => esc_html__('Create Goal', 'automate_hub'),
                'createspace' => esc_html__('Create Space', 'automate_hub'),
                'inviteuser' => esc_html__('Invite User', 'automate_hub'),
                'inviteguest' => esc_html__('Invite Guest', 'automate_hub'),
                'createfolder' => esc_html__('Create Folder', 'automate_hub'),
                'createlist' => esc_html__('Create List', 'automate_hub'),
                'createtask' => esc_html__('Create Task', 'automate_hub')
                
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['clickup'] = array('name' => esc_html__('Clickup', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'clickup') {
            return;
        }
        $nonce = wp_create_nonce("awp_clickup_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/clickup" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/clickup.png" height="50" alt="clickup Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="clickup_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_clickup_save_api_token">
                <input type="hidden" name="_nonce" value="<?php $nonce?>" />
                <input type="hidden" name="id" value="<?php $id?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a href="<?php $this->getLoginURL()?>" class="button button-primary"> Connect Your Clickup Account </a>
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

$AWP_Clickup = new AWP_Clickup();
