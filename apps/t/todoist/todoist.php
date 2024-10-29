<?php

class AWP_Todoist extends appfactory
{
    // replace with life keys
    const client_id = "";

    protected function get_redirect_uri()
    {
        return 'https://sperse.io/scripts/authorization/auth.php';
    }
   
    public function init_actions(){       
        add_action("rest_api_init", [$this, "create_webhook_route"]);
    }

    public function init_filters(){

        add_filter('awp_platforms_connections', [$this, 'awp_todoist_platform_connection'], 10, 1);
        
    }


    public function get_callback()
    {
        return get_rest_url(null,'automatehub/todoist');
    }

    public function getLoginURL(): string
    {
        $query = [
            'client_id' => self::client_id,
            'redirect_uri' => $this->get_redirect_uri(),
            'scope'=>'task:add,data:read,data:read_write,data:delete,project:delete',
            'state' => $this->get_callback(),
        ];
        $authorization_endpoint = "https://todoist.com/oauth/authorize?";

        return add_query_arg($query, $authorization_endpoint);
    }

    public function create_webhook_route()
    {
        register_rest_route('automatehub', '/todoist',
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

            $access_token = $params['access_token'];

            if (isset($access_token)) {
                $platform_obj = new AWP_Platform_Shell_Table('todoist');

                $query="select * from {$wpdb->prefix}awp_platform_settings where platform_name='todoist'";

                $data=$wpdb->get_results($query);

                $len=count($data) + 1;

                $platform_obj= new AWP_Platform_Shell_Table('todoist');

                $platform_obj->save_platform(['account_name'=>'Account Number '.$len,'api_key'=>$access_token]);


            }
            wp_safe_redirect(admin_url('admin.php?page=automate_hub&tab=todoist'));
            exit();
    
    }

    public function action_provider( $providers ) {
        $providers['todoist'] = array(
            'title' => esc_html__( 'Todoist', 'automate_hub' ),
            'tasks' => array(
                'createproject'   => esc_html__( 'Create Project', 'automate_hub' ),
                'createtask'   => esc_html__( 'Create Task', 'automate_hub' ),
                'createsession'   => esc_html__( 'Create Session', 'automate_hub' )
            )
        );
    
        return  $providers;
    }

    public function settings_tab( $tabs ) {
        $tabs['todoist'] = array('name'=>esc_html__( 'Todoist', 'automate_hub'), 'cat'=>array('esp'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'todoist') {
            return;
        }
        $nonce = wp_create_nonce("awp_todoist_settings");
        $api_token = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        ?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/todoist" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/todoist.png'); ?>" width="191" height="50" alt="Todoist Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>

                <br />
            <form name="todoist_save_form" action="<?php esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_todoist_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_todoist_settings"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)) ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"> </th>
                        <td>
                            <a href="<?php echo esc_url($this->getLoginURL()); ?>" class="button button-primary"><?php echo esc_html__( 'Connect Your todoist Account', 'automate_hub') ?></a>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <?php
    }


    public function load_custom_script() {
    }

    public function action_fields() {
        ?>
            <script type="text/template" id="todoist-action-template">
               
            </script>
        <?php
    }

   
};


$Awp_Todoist = new AWP_Todoist();