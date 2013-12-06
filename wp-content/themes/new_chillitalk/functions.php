<?php




function remove_menu_pages() {
	remove_menu_page('edit.php?post_type=page');
	remove_menu_page('edit.php');
	remove_menu_page('upload.php');
	remove_menu_page('link-manager.php');
	remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'remove_menu_pages' );


function codeigniter_bootstrap() {
  // with this and $config['uri_protocol']  = "AUTO";
  // the 0th _GET will be the REQUEST_URI, which is what we want for our routing
  $_GET[$_SERVER['REQUEST_URI']] = null;
  end($_GET);
  // standard codeigniter index.php gets us going.
  require_once( 'index.php' );
}
// Add the action before any templates load, but after all other WordPress system actions run
add_action( 'template_redirect', 'codeigniter_bootstrap' );
//... followed by the rest of twentyten functions.php 