<?php

require('../../config.php');

$context = context_system::instance();
$url = new moodle_url('/local/admin/delegatedadmin.php');

require_login();
require_capability('local/admin:hasdelegation', $context);

$strdelegatedadmin = get_string('delegatedadmin', 'local_admin');

$PAGE->set_context($context);
$PAGE->set_url($url);
$PAGE->navbar->add($strdelegatedadmin);
$PAGE->set_title($strdelegatedadmin);
$PAGE->set_heading($strdelegatedadmin);
$PAGE->set_cacheable(false);
$PAGE->set_pagelayout('admin');
$PAGE->set_pagetype('admin-index');

$PAGE->blocks->load_blocks();
/*
if (!$DB->count_records('block_instances', array('blockname' => 'navigation', 'pagetypepattern' => 'local-admin-delegatedadmin'))) {
    $PAGE->blocks->add_block_at_end_of_default_region('navigation');
}
*/

echo $OUTPUT->header();

$renderer = $PAGE->get_renderer('core', 'admin');

echo $renderer->quick_access_buttons(true);

echo $OUTPUT->footer();
