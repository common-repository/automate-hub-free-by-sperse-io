<?php
add_filter( 'awp_action_providers', 'awp_trello_actions', 10, 1 );
function awp_trello_actions( $actions ) {
    $actions['trello'] = array(
        'title' => __( 'Trello', 'automate_hub' ),
        'tasks' => array(
            'add_card'   => __( 'Add New Card', 'automate_hub' ),
        )
    );
    return $actions;
}

add_filter( 'awp_settings_tabs', 'awp_trello_settings_tab', 10, 1 );

function awp_trello_settings_tab( $providers ) {
    $providers['trello'] = __( 'Trello', 'automate_hub' );
    return $providers;
}

add_action( 'awp_settings_view', 'awp_trello_settings_view', 10, 1 );

function get_permission_url(){
    return 'https://trello.com/1/authorize?expiration=never&name=Automate%20Hub&scope=read%2Cwrite%2Caccount&response_type=token&key='.awp_trello_get_api_key();
}
function awp_trello_settings_view( $current_tab ) {
    if( $current_tab != 'trello' ) { return; }
    $nonce     = wp_create_nonce( 'awp_trello_settings' );
    $api_key   = awp_trello_get_api_key();
    $id = isset($_GET['id']) ? intval( sanitize_text_field($_GET['id'])) : "";
    $api_keys = isset($_GET['api_key']) ? sanitize_text_field($_GET['api_key']) : "";
    $display_name     = isset($_GET['account_name']) ? sanitize_text_field($_GET['account_name']) : "";
    ?>
    <div class="platformheader">
			<?php include AWP_FREE_INCLUDES.'/upgrade-button.php'; ?>

    <a href="https://sperse.io/go/trello" target="_blank"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/trello.png'); ?>" width="180" height="50" alt="Trello Logo"></a><br/><br/>
    <?php 
                    require_once(AWP_FREE_INCLUDES.'/class_awp_updates_manager.php');
                    $instruction_obj = new AWP_Updates_Manager(sanitize_text_field($_GET['tab']));
                    $instruction_obj->prepare_instructions();
                        
                ?>
                <br/>   
    <form name="trello_save_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="container">
        <input type="hidden" name="action" value="awp_trello_save_api_token">
        <input type="hidden" name="id" value="<?php echo esc_attr( wp_unslash($id)) ?>">

        <table class="form-table">


            <tr id="get_token_btn" valign="top">
                    <th scope="row"></th>
                    <td>

        
                        <a href="#" id="trelloauthbtn" target="_blank" class="button button-primary">Sign in with Trello</a>
                        
                        <script type="text/javascript">

                            jQuery("#trelloauthbtn").unbind().click(function(e) {
                                e.preventDefault();
                                var win=window.open('','popup','width=600,height=600');
                            });
                       
                    </script>           
                    </td>
            </tr>

            <tr valign="top">
                <th scope="row"> <?php esc_html_e( 'Display name', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_trello_display_name" id="awp_trello_display_name"  placeholder="<?php esc_html_e( 'Enter Display name', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn form-table__input-btn" data-clipboard-action="copy" data-clipboard-target="#awp_trello_display_name"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span>
                    </div>
                </td>
            </tr>

            

            

            <tr id="token_row" valign="top" >
                <th scope="row"> <?php _e( 'API Token', 'automate_hub' ); ?></th>
                <td>
                    <div class="form-table__input-wrap">
                    <input type="text" name="awp_trello_api_token" id="awp_trello_api_token"  placeholder="<?php _e( 'Please enter API Token', 'automate_hub' ); ?>" class="basic-text"/>
                    <span class="spci_btn" data-clipboard-action="copy" data-clipboard-target="#awp_trello_api_token"><img src="<?php echo esc_url(AWP_COPY_ICON); ?>" alt="Copy to clipboard"></span></div>
                    
                </td>
            </tr>
        </table>
        <div class="submit-button-plugin"><?php submit_button(); ?></div>
    </form>
    </div>
    <?php 
}


add_action( 'awp_action_fields', 'awp_trello_action_fields' );

function awp_trello_action_fields() {
    ?>
    <script type="text/template" id="trello-action-template">
        
    </script>
    <?php
}

function awp_trello_get_api_key() {
    return '';
}
