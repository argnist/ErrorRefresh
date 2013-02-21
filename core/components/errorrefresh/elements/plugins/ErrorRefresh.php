<?php

if ($modx->event->name == 'OnManagerPageBeforeRender' && ($controller->config['controller'] == 'system/event')) {
    $modx->controller->addLastJavascript($modx->getOption('assets_url') . 'components/errorrefresh/js/errorrefresh.panel.js');
}