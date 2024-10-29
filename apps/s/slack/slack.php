<?php
add_filter( 'awp_action_providers', 'awp_slack_actions', 10, 1 );

function awp_slack_actions( $actions ) {
    $actions['slack'] = array(
        'title' => __( 'Slack', 'automate_hub' ),
        'tasks' => array(
            'sendmsg'   => __( 'Send Channel Message', 'automate_hub' )
        )
    );
    return $actions;
}

add_action( 'awp_action_fields', 'awp_slack_action_fields' );

function awp_slack_action_fields() {
    ?>
    <script type="text/template" id="slack-action-template">
        
    </script>
    <?php
}

