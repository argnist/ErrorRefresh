<?php

/**
 * Add plugins to build
 * 
 * @package errorrefresh
 * @subpackage build
 */
$plugins = array();

$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->fromArray(array(
    'id' => 1,
    'name' => 'ErrorRefresh',
    'description' => 'Return refresh button in error log',
    'plugincode' => getSnippetContent($sources['source_core'] . '/elements/plugins/ErrorRefresh.php'),
        ), '', true, true);

$events = array();

$events[0] = $modx->newObject('modPluginEvent');
$events[0]->fromArray(array(
    'pluginid' => 1,
    'event' => 'OnManagerPageBeforeRender',
    'priority' => 0,
    'propertyset' => 0,
        ), '', true, true);

if (is_array($events) && !empty($events))
{
    $plugins[0]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO, 'Packaged in ' . count($events) . ' plugin events for ErrorRefresh.');
    flush();
}
else
{
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not find plugin events for ErrorRefresh!');
}
unset($events);

return $plugins;