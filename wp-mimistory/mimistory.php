<?php
/*
	Plugin Name: Mimistory Archive
	Plugin URI: http://www.flippakitten.com/plugins/
	Description: Show all your previous sends using Mad Mimi
	Author: James G-Taylor
	Version: 0.0.1
	Author URI: http://www.flippakitten.com/
 */
/*function mimistory_admin() {
    include('mimistory-admin.php');
}

add_action('admin_menu', 'mimistory_admin_action');

function mimistory_admin_action() {
    add_options_page('Mimistory Setttings', 'Mimistory Settings', 'manage_options', 'mimistory-admin.php', 'mimistory_admin');
}
*/

// ====== Statice Functions ========

/*
// hook into WP's admin_init action hook
public function admin_init()
{
    // Set up the settings for this plugin
    $this->init_settings();
    // Possibly do additional admin_init tasks
} // END public static function activate

//Initialize some custom settings
public function init_settings()
{
    // register the settings for this plugin
    register_setting('mimistory_admin-group', 'mimist_username');
    //register_setting('mimistory_admin-group', 'mimist_api_key');
} // END public function init_custom_settings()
/*
//add a menu    
public function add_menu()
{
    add_options_page('Mimistory Setttings', 'Mimistory Setttings', 'manage_options', 'mimistory_admin', array(&$this, 'plugin_settings_page'));
} // END public function add_menu()

//Menu Callback    
public function plugin_settings_page()
{
    if(!current_user_can('manage_options'))
    {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Render the settings template
    include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
} // END public function plugin_settings_page()
*/

if(!class_exists('mimistory_admin'))
{
    class mimistory_admin
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
        	add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));
        } // END public function __construct

        /**
         * Activate the plugin
         */
        public static function activate()
        {
            // Do nothing
        } // END public static function activate

        /**
         * Deactivate the plugin
         */     
        public static function deactivate()
        {
            // Do nothing
        } // END public static function deactivate
    } // END class WP_Plugin_Template
} // END if(!class_exists('WP_Pl

//Register activation/deactivation hooks and instantiate the plugin class	
if(class_exists('mimistory_admin'))
{
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('mimistory_admin', 'activate'));
    register_deactivation_hook(__FILE__, array('mimistory_admin', 'deactivate'));

    // instantiate the plugin class
    $mimistory_admin = new mimistory_admin();
}
if(isset($mimistory_admin))
{
    // Add the settings link to the plugins page
    function plugin_settings_link($links)
    { 
        $settings_link = '<a href="options-general.php?page=wp_plugin_template">Settings</a>'; 
        array_unshift($links, $settings_link); 
        return $links; 
    }

    $plugin = plugin_basename(__FILE__); 
    add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
}
?>
