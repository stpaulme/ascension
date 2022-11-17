<?php
/**
 * Third party plugins that hijack the theme will call wp_footer() to get the footer template.
 * We use this to end our output buffer (started in header.php) and render into the view/page-plugin.twig template.
 *
 * If you're not using a plugin that requries this behavior (ones that do include Events Calendar Pro and
 * WooCommerce) you can delete this file and header.php
 */

$queried_object = get_queried_object();

$timberContext = $GLOBALS['timberContext'];
if (!isset($timberContext)) {
    throw new \Exception('Timber context not set in footer.');
}

$timberContext['content'] = ob_get_contents();
if (isset($queried_object->ID)) {
    $timberContext['current'] = $queried_object->ID;
}
$timberContext['title'] = 'Events';
ob_end_clean();

$templates = array('page-plugin.twig');
Timber::render($templates, $timberContext);
