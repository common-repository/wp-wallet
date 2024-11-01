<?php
/**
 * The settings of the plugin.
 *
 * @link       https://wpwallet.com/
 * @since      1.0.0
 *
 * @package    Wp_Wallet
 * @subpackage Wp_Wallet/admin
 */
/**
 * Class WordPress_Plugin_Template_Settings
 *
 */
class Wp_Wallet_Admin_Settings {

    /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $plugin_name    The ID of this plugin.
   */
    private $plugin_name;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }


    


    /**
     * This function introduces the theme options into the 'Appearance' menu and into a top-level
     * 'WPWallet' menu.
     */
    public function setup_plugin_options_menu() {

        add_menu_page(
            __( 'WP Wallet', 'wp-wallet' ),
            'WP Wallet',
            'manage_options',
            'wp-wallet',
            array( $this, 'render_settings_page_content'),
            plugin_dir_url( __FILE__ ) . 'images/WPWallet_Icon_White.svg',
            3
        );

        
        //Add the menu to the Plugins set of menu items
        // add_plugins_page(
        // 'WPWallet',           // The title to be displayed in the browser window for this page.
        // 'WPWallet',          // The text to be displayed for this menu item
        // 'manage_options',          // Which type of users can see this menu item
        // 'wp-wallet',      // The unique ID - that is, the slug - for this menu item
        // array( $this, 'render_settings_page_content')        // The name of the function to call when rendering this menu's page
        // );
    }



    /**
   * Initializes the theme's display options page by registering the Sections,
   * Fields, and Settings.
   *
   * This function is registered with the 'admin_init' hook.
   */
  public function initialize_display_options() {
    // If the theme options don't exist, create them.
   
    // Finally, we register the fields with WordPress
    register_setting(
      'wp_wallet_display_options',
      'wp_wallet_display_options'
    );
  } // end wppb-demo_initialize_theme_options


  /**
   * Renders a simple page to display for the theme menu defined above.
   */
  public function render_settings_page_content() {
    $plugins = get_plugins();
    $listed_plugins = false;
    if($plugins){
        $listed_plugins = [];
        foreach ($plugins as $key => $value) {
            $listed_plugins[] = [
                'name' => $value['Name'],
                'dir' => $key,
            ];
        }
    }
    $data = [
        'version' => $this->version,
        'site_name'  => get_bloginfo(),
        'site_url' => get_site_url(),
        'plugins' => $listed_plugins,
        'user' => wp_get_current_user(),
        'plugin_dir' => plugin_dir_url(__FILE__),
    ];



	include_once 'partials/wp-wallet-admin-display.php';
  }

}