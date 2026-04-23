<?php

namespace ModularityCtaIconLinks;

use ModularityCtaIconLinks\Helper\CacheBust;

/**
 * Class App
 * 
 * Main application bootstrap class.
 * Initialize your plugin components here.
 * 
 * @package ModularityCtaIconLinks
 */
class App
{
    public function __construct()
    {
        // Register module with Modularity
        add_action('init', [$this, 'registerModule']);

        // Enqueue styles
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
        add_action('enqueue_block_editor_assets', [$this, 'enqueueEditorStyles']);
    }

    /**
     * Enqueue styles
     * 
     * @return void
     */
    public function enqueueStyles(): void
    {
        $styleFile = CacheBust::name('css/modularity-cta-icon-links.css');

        if ($styleFile) {
            wp_enqueue_style(
                'modularity-cta-icon-links',
                MODULARITYCTAICONLINKS_URL . '/assets/dist/' . $styleFile,
                [],
                null
            );
        }
    }

    /**
     * Enqueue the same built CSS in the block editor as on the frontend.
     */
    public function enqueueEditorStyles(): void
    {
        $styleFile = CacheBust::name('css/modularity-cta-icon-links.css');

        if ($styleFile) {
            wp_enqueue_style(
                'modularity-cta-icon-links-editor',
                MODULARITYCTAICONLINKS_URL . '/assets/dist/' . $styleFile,
                [],
                null
            );
        }
    }

    /**
     * Register the module with Modularity
     * 
     * @return void
     */
    public function registerModule(): void
    {
        if (function_exists('modularity_register_module')) {
            modularity_register_module(
                MODULARITYCTAICONLINKS_MODULE_PATH,
                'CtaIconLinks',
            );
        }
    }
}
