<?php
/**
 * Default Events Template
 *
 * @package TribeEventsCalendar
 * @version 4.6.23
 *
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

if (!defined('ABSPATH')) {
    die('-1');
}

$context = Timber::get_context();
$context['tribe_markup'] = tribe(Template_Bootstrap::class)->get_view_html();

Timber::render(array('events.twig'), $context);
