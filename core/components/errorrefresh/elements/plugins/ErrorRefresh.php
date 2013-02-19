<?php

if ($modx->event->name == 'OnManagerPageBeforeRender') {
    $modx->controller->addJavascript($modx->getOption('assets_url') . 'components/errorrefresh/js/errorrefresh.panel.js');
}
