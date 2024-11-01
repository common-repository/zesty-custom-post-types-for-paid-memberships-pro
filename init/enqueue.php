<?php

    function zpmpro_enqueue_admin_scripts(){

        wp_enqueue_script('admin-js', plugins_url('../js/admin.js', __FILE__), 'jquery');
        wp_enqueue_style( 'font-awesome-icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' );

        if(isset($_GET['page'])) {
        	if($_GET['page'] === 'zpmpro_options' || $_GET['page'] === 'zpmpro_help' || $_GET['page'] === 'zpmpro_plugins'){
	        	wp_enqueue_style( 'bootstrap', plugins_url('../css/bootstrap.min.css',  __FILE__ ) );
	        	wp_enqueue_script('bootstrap', plugins_url('../js/bootstrap.bundle.min.js', __FILE__ ), 'jquery', null, true);
	        }
        }

        wp_enqueue_style('zpmpro-style', plugins_url('../css/style.css', __FILE__));
        wp_localize_script( 'admin-js', 'zpmpro_ajax', array( 'url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('zpmpro_nonce') ) );
    }
    add_action( 'admin_enqueue_scripts', 'zpmpro_enqueue_admin_scripts' );

?>