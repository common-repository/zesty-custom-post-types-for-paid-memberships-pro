<?php

    add_action( 'wp_ajax_zpmpro_save_cp_types', 'zpmpro_save_cp_types_php', 12 );

    function zpmpro_save_cp_types_php() {

        check_ajax_referer( 'zpmpro_nonce', 'security' );

        $post_types = array_map('sanitize_title', $_POST['postTypes']);

        update_option('zpmpro_cp_types', $post_types);
        
        wp_die();
    }

?>