<ul class="nav nav-pills zpmpro-admin-nav-menu">
  <li><a href="https://zestyplugins.com/"><img id="zpmpro-nav-logo" src="<?php echo esc_url(ZPMPRO_PLUGIN_URL) . 'images/logo-med.png'; ?>"/></a></li>
  <li class="nav-item">
    <a class="nav-link <?php echo $_GET['page'] == 'zpmpro_options' ? 'active' : ''; ?>" aria-current="page" href="admin.php?page=zpmpro_options"><?php _e('Options', 'zesty-pmpro-cpt'); ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo $_GET['page'] == 'zpmpro_help' ? 'active' : ''; ?>" href="admin.php?page=zpmpro_help"><?php _e('Help', 'zesty-pmpro-cpt'); ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo $_GET['page'] == 'zpmpro_plugins' ? 'active' : ''; ?>" href="admin.php?page=zpmpro_plugins"><?php _e('More by Zesty Plugins', 'zesty-pmpro-cpt'); ?></a>
  </li>
</ul>