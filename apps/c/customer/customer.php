<?php

class AWP_Customer extends appfactory
{

    public function init_actions()
    {
    }

    public function init_filters()
    {
        add_filter('awp_platforms_connections', [$this, 'awp_customer_platform_connection'], 10, 1);
    }

    public function action_provider($actions)
    {
        $actions['customer'] = [
            'title' => esc_html__('Customer.io', 'automate_hub'),
            'tasks' => array('subscribe' => esc_html__('Add a Person', 'automate_hub')),
        ];
        return $actions;
    }

    public function settings_tab($tabs)
    {
        $tabs['customer'] = array('name' => esc_html__('Customer', 'automate_hub'), 'cat' => array('crm'));
        return $tabs;
    }

    public function settings_view($current_tab)
    {
        if ($current_tab != 'customer') {
            return;
        }
        $nonce = wp_create_nonce("awp_customer_settings");
        $api_key = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
        $site_id = isset($_GET['client_id']) ? sanitize_text_field($_GET['client_id']) : "";
        $account_name = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
        $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'] )) : "";
        ?>
        <div class="platformheader">
        <?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>
          <a href="https://sperse.io/go/customer.io" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/customer.png'); ?>" width="275" height="50" alt="Customer.io Logo"></a><br /><br />
            <?php
        require_once AWP_FREE_INCLUDES . '/class_awp_updates_manager.php';
        $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
        $instruction_obj->prepare_instructions();

        ?><br />
            <form name="customer_save_form" action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" class="container">
                <input type="hidden" name="action" value="awp_customer_save_api_token">
                <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce("awp_customer_settings"); ?>" />
                <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)); ?>">
                <table class="form-table">
                <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Account Name', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" required name="awp_customer_account_name" id="awp_customer_account_name"  placeholder="<?php esc_html_e('Enter Account Name', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_customer_account_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('Site ID', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" required name="awp_customer_site_id" id="awp_customer_site_id"  placeholder="<?php esc_html_e('Enter Site ID', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_customer_site_id"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"> <?php esc_html_e('API Key', 'automate_hub');?></th>
                        <td>
							<div class="form-table__input-wrap">
                            <input type="text" required name="awp_customer_api_key" id="awp_customer_api_key"  placeholder="<?php esc_html_e('Enter API Key', 'automate_hub');?>" class="basic-text" />
                            <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_customer_api_key"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                        </td>
                    </tr>
                </table>
                <div class="submit-button-plugin"><?php submit_button();?></div>
            </form>
        </div>


        <div class="wrap">
                <form id="form-list" method="post">
                    <input type="hidden" name="page" value="automate_hub"/>
                    <?php
$data = [
            'table-cols' => ['account_name' => 'Account Name', 'client_id' => 'Site ID', 'active_status' => 'Active'],
        ];
        $platform_obj = new AWP_Platform_Shell_Table('customer');
        $platform_obj->initiate_table($data);
        $platform_obj->prepare_items();
        $platform_obj->display_table();

        ?>
                </form>
        </div>
    <?php
}

    public function awp_customer_js_fields($field_data)
    {
    }

    public function load_custom_script()
    {
    }

    public function action_fields()
    {
        ?>
        <script type="text/template" id="customer-action-template">

        </script>
    <?php
    }

}

$AWP_Customer = new AWP_Customer();
