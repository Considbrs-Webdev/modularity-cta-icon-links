<?php

/**
 * Plugin Name:       Modularity CTA icon links
 * Plugin URI:        https://github.com/helsingborg-stad/modularity-cta-icon-links
 * Description:       Modularity module: row of CTA link cards (icon, text, custom background) in a responsive column grid.
 * Version: 1.0.0
 * Author:            Starter
 * Author URI:        https://github.com/helsingborg-stad
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       modularity-cta-icon-links
 * Domain Path:       /languages
 */

// Protect against direct file access
if (! defined('WPINC')) {
    die;
}

define('MODULARITYCTAICONLINKS_PATH', plugin_dir_path(__FILE__));
define('MODULARITYCTAICONLINKS_URL', plugins_url('', __FILE__));
define('MODULARITYCTAICONLINKS_MODULE_VIEW_PATH', plugin_dir_path(__FILE__) . 'source/php/Module/views');
define('MODULARITYCTAICONLINKS_MODULE_PATH', MODULARITYCTAICONLINKS_PATH . 'source/php/Module/');

// Load text domain
add_action('init', function () {
    load_plugin_textdomain('modularity-cta-icon-links', false, plugin_basename(dirname(__FILE__)) . '/languages');
});

// Autoload from plugin
if (file_exists(MODULARITYCTAICONLINKS_PATH . 'vendor/autoload.php')) {
    require_once MODULARITYCTAICONLINKS_PATH . 'vendor/autoload.php';
}

// ACF auto import and export
add_action('acf/init', function () {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain('modularity-cta-icon-links');
    $acfExportManager->setExportFolder(MODULARITYCTAICONLINKS_PATH . 'source/php/AcfFields/');
    $acfExportManager->autoExport(array(
        'cta-icon-links-module' => 'group_cta-icon-links_module',
    ));
    $acfExportManager->import();
});

// Modularity 3.0 ready - ViewPath for Component library
add_filter('/Modularity/externalViewPath', function ($arr) {
    $arr['mod-cta-icon-links'] = MODULARITYCTAICONLINKS_MODULE_VIEW_PATH;
    return $arr;
}, 10, 3);

// Start application
new ModularityCtaIconLinks\App();

