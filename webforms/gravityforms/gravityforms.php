<?php

add_filter( 'awp_form_providers', 'awp_gravityforms_add_provider' );

function awp_gravityforms_add_provider( $providers ) {

    if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
        $providers['gravityforms'] = esc_html__( 'Gravity Forms', 'automate_hub' );
    }

    return $providers;
}

function awp_gravityforms_get_forms( $form_provider ) {

    if ( $form_provider != 'gravityforms' ) {
        return;
    }

    global $wpdb;

    $query  = "SELECT id, title FROM {$wpdb->prefix}gf_form";
    $result = $wpdb->get_results( $query, ARRAY_A );
    $forms  = wp_list_pluck( $result, 'title', 'id' );

    return $forms;
}

function awp_gravityforms_get_form_fields( $form_provider, $form_id ) {

    if ( $form_provider != 'gravityforms' ) {
        return;
    }

    global $wpdb;

    $query  = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_form_meta WHERE form_id = %d",$form_id);
    $result = $wpdb->get_row( $query, ARRAY_A );
    $data   = json_decode( $result["display_meta"] );
    $fields = array();

    foreach ( $data->fields as $field ) {

        if ( $field->inputs ) {
            foreach ( $field->inputs as $input ) {
                $fields[$input->id] = $input->label;
            }
            continue;
        }

        $fields[$field->id] = $field->label;
    }
    return $fields;
}

function awp_gravityforms_get_form_name( $form_provider, $form_id ) {

    if ( $form_provider != "gravityforms" ) {
        return;
    }

    global $wpdb;

    $form_name = $wpdb->get_var($wpdb->prepare( "SELECT title FROM {$wpdb->prefix}gf_form WHERE id = %d", $form_id ));

    return $form_name;
}

add_action( 'gform_after_submission', 'awp_gravityforms_after_submission', 10, 2 );

function awp_gravityforms_after_submission( $entry, $form ) {

    $posted_data                    = $entry;
    $posted_data["submission_date"] = date( "Y-m-d" );

    //tracking info
    include AWP_FREE_INCLUDES.'/tracking_info_cookies.php';


    global $wpdb;

    $saved_records = $wpdb->get_results($wpdb->prepare( "SELECT * FROM {$wpdb->prefix}awp_integration WHERE status = 1 AND form_provider = 'gravityforms' AND form_id = %d",$entry["form_id"]), ARRAY_A );

    foreach ( $saved_records as $record ) {
        $action_provider = isset($record['action_provider']) ? $record['action_provider']:'';
        awp_add_queue_form_submission("awp_{$action_provider}_send_data",$record,$posted_data);
    }
}
