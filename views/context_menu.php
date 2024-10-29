<ul class="menu menu-platform">

	<?php 

		global $wpdb;
        $wpdb_table    = $wpdb->prefix . 'awp_integration';
        $query =  "SELECT * FROM  `{$wpdb_table}` GROUP BY action_provider";
        $query_results = $wpdb->get_results( $query, ARRAY_A );
		$actions = awp_get_action_providers();
        
		foreach ($query_results as $key => $value) {
			$action  = isset( $actions[$value['action_provider']] ) ? $actions[$value['action_provider']] : '';
			$action_provider_img = AWP_IMAGES.'/icons/'.$value['action_provider'].'.png';
			?>

			<li class="menu-item">
		        <a href="<?php echo esc_url( admin_url( 'admin.php?page=my_integrations&selectedplatforms='.$value['action_provider'] ) ); ?>" class="menu-btn">
		        	<span><img class="menu-icon" src="<?php echo esc_url($action_provider_img); ?>"></span>
		            <span class="menu-text"><?php echo esc_html($action); ?></span>
		        </a>
		    </li>
			<?php

		}
	?> 
</ul>



<ul class="menu menu-form-source">

    <?php 

        global $wpdb;
        $wpdb_table    = $wpdb->prefix . 'awp_integration';
        $query =  "SELECT * FROM `{$wpdb_table}` GROUP BY form_provider";
        $query_results = $wpdb->get_results( $query, ARRAY_A );
        $form_providers = awp_get_form_providers();
        
        foreach ($query_results as $key => $value) {
            $action  = isset( $form_providers[$value['form_provider']] ) ? $form_providers[$value['form_provider']] : '';
            $action_provider_img = AWP_IMAGES.'/icons/'.$value['form_provider'].'.png';
            ?>

            <li class="menu-item">
                <a href="<?php echo esc_url( admin_url( 'admin.php?page=my_integrations&selectedformprovider='.$value['form_provider'] ) ); ?>" class="menu-btn">
                    <span><img class="menu-icon" src="<?php echo esc_url($action_provider_img); ?>"></span>
                    <span class="menu-text"><?php echo esc_html($action); ?></span>
                </a>
            </li>
            <?php

        }
    ?>
</ul>


<ul class="menu menu-form-name">

    <?php 

        global $wpdb;
        $wpdb_table    = $wpdb->prefix . 'awp_integration';
        $query = "SELECT * FROM `{$wpdb_table}` GROUP BY form_name";
        $query_results = $wpdb->get_results( $query, ARRAY_A );
        
        
        foreach ($query_results as $key => $value) {

            $form_name = isset($value['form_name']) ? sanitize_text_field($value['form_name']) :'';
            
            ?>

            <li class="menu-item">
                <a href="<?php echo esc_url( admin_url( 'admin.php?page=my_integrations&selectedformname='.$value['form_name'] ) ); ?>" class="menu-btn">
                    <span></span>
                    <span class="menu-text"><?php echo esc_html($form_name); ?></span>
                </a>
            </li>
            <?php

        }
    ?>
</ul>
