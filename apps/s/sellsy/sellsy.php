<?php

class AWP_sellsy extends Appfactory
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
        add_filter('awp_platforms_connections', [$this, 'awp_sellsy_platform_connection'], 10, 1);
    }

    public function get_callback()
    {
        return get_rest_url(null,'automatehub/sellsy');
    }

    public function getLoginURL(): string
    {

         // Generate the code challenge using the OS / cryptographic random function
         $verifierBytes = random_bytes(64);
         $codeVerifier = rtrim(strtr(base64_encode($verifierBytes), "+/", "-_"), "=");
 
         $challengeBytes = hash("sha256", $codeVerifier, true);
         $codeChallenge = rtrim(strtr(base64_encode($challengeBytes), "+/", "-_"), "=");
         update_option("awp_sellsy_keys_holder",$codeVerifier);

        
        $query = [
            'response_type' => 'code',
            'redirect_uri' => $this->get_redirect_uri(),
            'code_challenge' => $codeChallenge,
            'code_challenge_method' => 'S256',
            'client_id' => self::client_id,
            'client_secret' => self::secret_id,
            'state' => uniqid(),
            'scope' => 'all'
            
        ];
        $authorization_endpoint = "https://login.sellsy.com/oauth2/authorization?";

      
        return add_query_arg($query, $authorization_endpoint);
    }



   

    public function action_provider($actions)
    {
        $actions['sellsy'] = [
            'title' => esc_html__('Sellsy', 'automate_hub'),
            'tasks' => array(
                'createcontact'   => esc_html__( 'Create Contact', 'automate_hub' ),
                'createtask'   => esc_html__( 'Create Task', 'automate_hub' ),
                // 'createindividual'   => esc_html__( 'Create Individual', 'automate_hub' ),
            ),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['sellsy'] = array('name' => esc_html__('Sellsy', 'automate_hub'), 'cat' => array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'sellsy') {
            return;
        }
        $nonce = wp_create_nonce("awp_sellsy_settings");
        $api_token = isset($_GET['api_key']) ? $_GET['api_key'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES . '/upgrade-button.php'; ?>
            <a href="https://sperse.io/go/sellsy" target="_blank"><img src="<?php AWP_ASSETS;?>/images/logos/sellsy.png" height="50" alt="sellsy Logo"></a><br /><br />
                <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager($_GET['tab']);
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="sellsy_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_sellsy_save_api_token">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a id="sellsyauthbtn" target="_blank"  class="button button-primary"> Connect Your sellsy Account </a>
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

    public function action_fields() {
       
    }

}

$AWP_sellsy = new AWP_sellsy();