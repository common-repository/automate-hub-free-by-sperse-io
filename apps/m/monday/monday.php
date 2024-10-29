<?php

class AWP_Monday extends Appfactory
{
    public static $url = "https://api.monday.com/v2";

    public function init_actions()
    {

    }

    public function init_filters()
    {
    }
    public function load_custom_script(){
               
    }
    public function settings_tab($tabs)
    {
        $tabs['monday'] = array('name' => esc_html__('Monday.com', 'automate_hub'), 'cat' => array('crm'));
        return $tabs;
    }



    public function action_provider($providers)
    {
        $providers['monday'] = [
            'title' => esc_html__('Monday.com', 'automate_hub'),
            'tasks' => array(
                'create_board_item'   => esc_html__('Add item to group ', 'automate_hub')
            )
        ];

        return  $providers;
    }


   


   

    public function settings_view($current_tab)
    {
        if ($current_tab != 'monday') {
            return;
        }

        $nonce = wp_create_nonce("awp_monday_api_key");
        $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $account_name = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";


?>
        <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

            <a href="https://sperse.io/go/monday" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/monday.png'); ?>" width="275" height="50" alt="Monday.com Logo"></a><br /><br />
            <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
            ?>
            <br />
            <form action='admin-post.php' method="post" class="container">
                <input type="hidden" name="action" value="awp_monday_save_api_key">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_monday_api_key"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('Account Identifier', 'automate_hub'); ?></th>
                        <td>
                            <input type="text" name="awp_monday_identifier" id="awp_monday_identifier" value="<?php echo esc_attr($account_name);  ?>" required placeholder="<?php esc_html_e('Enter Account Identifier', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_monday_identifier"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('API Token', 'automate_hub'); ?></th>
                        <td>
                            <input type="text" name="awp_monday_api_key" id="awp_monday_api_key" value="<?php echo esc_attr($api_key); ?>" required placeholder="<?php esc_html_e('Enter API Token', 'automate_hub'); ?>" class="basic-text" />
                            <span class="spci_btn" body-clipboard-action="copy" data-clipboard-target="#awp_monday_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button("Save API Token"); ?></div>
            </form>
        </div>

    <?php
    }

    public function action_fields()
    {
    ?>
        <script type="text/template" id="monday-action-template">

        </script>
<?php
    }
}

$Awp_Monday = AWP_Monday::get_instance();

