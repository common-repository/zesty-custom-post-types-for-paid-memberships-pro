<?php include 'admin-nav-menu.php'; ?>

<?php $pmprocpt_cp_types = get_option('zpmpro_cp_types'); ?>
<?php $pmpro_active = is_plugin_active( 'paid-memberships-pro/paid-memberships-pro.php' ); ?>

<?php 
    $args = array(
        'public'                => true,
        'publicly_queryable'    => true,
        '_builtin'              => false,
    );

    $all_post_types = get_post_types( $args, 'names' );
?>

<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($all_post_types)) { ?>
                    <?php if($pmpro_active === true) { ?>
                    <div class="card tbs-card tbs-options-card">
                        <div class="card-body" style="padding: 0;">
                            <table class="table table-striped zed-emails-table">
                              <thead>
                                <tr>
                                    <th scope="col"><?php _e('Enable', 'zesty-pmpro-cpt'); ?></th>
                                    <th scope="col"><?php _e('Custom Post Type', 'zesty-pmpro-cpt'); ?></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 

                                    foreach( $all_post_types as $post_type ) { 

                                        $checked = '';

                                        if( !empty( $pmprocpt_cp_types ) ) {
                                            $checked = in_array( $post_type, $pmprocpt_cp_types ) ? 'checked' : '';
                                        }

                                        if( post_type_supports( $post_type, 'editor' ) ) { ?>

                                            <tr>
                                                <td><input class="zpmpro-cpt-checkbox" id="pmprocpt-<?php echo esc_attr($post_type); ?>" type="checkbox" value="<?php echo esc_attr($post_type); ?>" <?php echo esc_attr($checked); ?>/></td>
                                                <td scope="row"><?php echo esc_attr($post_type); ?></td>
                                            </tr>

                                        <?php }

                                    } // end foreach ?>
                                    
                              </tbody>
                            </table>
                        </div>
                    </div>
                     <?php } else { ?>
                        <div class="alert alert-warning" style="margin: 20px;"><?php _e('Paid Memberships Pro needs to be installed and activated before you can enable custom post types for use with Paid Memberships Pro.', 'zesty-pmpro-cpt'); ?></div>
                    <?php } ?>
                <?php } else { // !empty $all_post_types ?>
                    <div class="alert alert-warning" style="margin: 20px;"><?php _e('There are no custom post types to enable.  Make sure you\'re using one or more plugins that use custom post types.', 'zesty-pmpro-cpt'); ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>