<?php

class AWP_Getgist extends Appfactory
{

    // replace with live key
    const client_id = "$$";
    const client_secret = "";
    const gist_app_id = "1058";

    protected function get_redirect_uri()
    {
        return 'https://sperse.io/scripts/authorization/auth.php';
    }

    public function init_actions()
    {
    }

    public function init_filters()
    {
        
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/getgist');
    }

    public function getLoginURL(): string
    {
        $query = [
            'client_id' => self::client_id,
            'response_type' => "code",
            'grant' => "basic",
            'redirect_uri' => urlencode($this->get_redirect_uri()),
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://app.getgist.com/oauth/authorize?";

        return add_query_arg($query, $authorization_endpoint);
    }



    public function action_provider($actions)
    {
        $actions['getgist'] = [
            'title' => esc_html__('Getgist', 'automate_hub'),
            'tasks' => array(
                'createcontact' => esc_html__('Create Lead', 'automate_hub')
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['getgist'] = array('name' => esc_html__('Getgist', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'getgist') {
            return;
        }
        $nonce = wp_create_nonce("awp_getgist_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/getgist" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/getgist.png" width="292" height="50" alt="getgist Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="getgist_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_getgist_save_api_token">
                <input type="hidden" name="_nonce" value="<?php $nonce?>" />
                <input type="hidden" name="id" value="<?php $id?>" />
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a  id="getgistauthbtn" target="_blank" class="button button-primary"> Connect Your Getgist Account </a>
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

$AWP_Getgist = new AWP_Getgist();

