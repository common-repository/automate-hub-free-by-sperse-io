<?php
$filename = 'Export_Logs' . time() . '.csv';
        $header_row =  array(
                'id',
                'response_code',
                'response_message',
                'integration_id',
                'request_data',
                'response_data',
                'time',
                'start_time',
                'ip',
            );
       $data_rows = array();
 global $wpdb;
$table            = $wpdb->prefix . 'automate_log';

        $users = $wpdb->get_results("SELECT * FROM {$table}","ARRAY_A");
        if(count($users)){

                foreach ( $users as $user ) 
                {

                  $user_id = isset($user['id']) ?  $user['id']:"";
                   $response_code =  isset($user['response_code']) ? $user['response_code']:'';
                   
                   $response_message = isset($user['response_message']) ? $user['response_message'] :'';

                   $integration_id = isset($user['integration_id']) ? $user['integration_id'] :'' ;
                  $request_data = isset($user['request_data']) ?  $user['request_data']:'';
                  $response_data = isset($user['response_data']) ? $user['response_data'] :'';
                  $time = isset($user['time']) ? $user['time'] :'';
                  $start_time = isset($user['start_time']) ?  $user['start_time'] :'';
                  $ip = isset($user['ip']) ? $user['ip'] :'' ;


                    $row = array(
                        $user_id,$response_code,$response_message,$integration_id,$request_data,$response_data,$time,$start_time,$ip  
                    );
                    $data_rows[] = $row;
                }
                ob_end_clean ();
                $fh = @fopen( 'php://output', 'w' );
                header( "Content-Disposition: attachment; filename={$filename}" );
                fputcsv( $fh, $header_row );
                foreach ( $data_rows as $data_row ) 
                {
                    fputcsv( $fh, $data_row );
                }
            
                
                exit();
        }
        else{
                echo esc_html__("No records to export", 'automate_hub' );
        }
        

?>
