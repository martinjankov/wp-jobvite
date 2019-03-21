<?php
/**
 * Plugin Name: WP Jobvite
 * Description: Offers helper functions for easily retriving data from jobvite, like jobs, categories, departments, etc.
 * Author:      Martin Jankov
 * Author URI:  https://www.martincv.com
 * Version:     0.0.1
 * Text Domain: jv
 *
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Jobvite. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    WPJobvite
 * @author     Martin Jankov
 * @since      0.0.1
 * @license    GPL-3.0+
 * @copyright  Copyright (c) 2018, Martin Jankov
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class WPJobvite {

	private static $_instance;

	private $_version = '0.0.1';

	public $api;

	public static function instance() {

		if ( ! isset( self::$_instance ) && ! ( self::$_instance instanceof WPJobvite ) ) {

			self::$_instance = new WPJobvite;
			self::$_instance->constants();
			self::$_instance->includes();

			add_action( 'plugins_loaded', array( self::$_instance, 'objects' ), 10 );
		}
		return self::$_instance;
	}

	private function includes() {
		require_once JV_PLUGIN_DIR . 'classes/JV_Remote_Client.php';
		require_once JV_PLUGIN_DIR . 'classes/JV_Api.php';

		// Admin/Dashboard only includes
		if ( is_admin() ) {
			require_once JV_PLUGIN_DIR . 'classes/admin/JV_Admin_Dashboard.php';
		}
	}

	private function constants() {

		// Plugin version
		if ( ! defined( 'JV_VERSION' ) ) {
			define( 'JV_VERSION', $this->_version );
		}

		// Plugin Folder Path
		if ( ! defined( 'JV_PLUGIN_DIR' ) ) {
			define( 'JV_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		}

		// Plugin Folder URL
		if ( ! defined( 'JV_PLUGIN_URL' ) ) {
			define( 'JV_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		}

		// Plugin Root File
		if ( ! defined( 'JV_PLUGIN_FILE' ) ) {
			define( 'JV_PLUGIN_FILE', __FILE__ );
		}
	}

	public function objects() {
		// Init classes if is Admin/Dashboard
		if(is_admin()) {
			new JV_Admin_Dashboard;
		}

		$this->api = new JV_Api;
	}
}

/**
 * Use this function as global in all other classes and/or files. 
 */
function jv() {
	return WPJobvite::instance();
}
jv();
