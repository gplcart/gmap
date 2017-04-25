<?php

/**
 * @package Google Map
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\gmap;

use gplcart\core\Module;

/**
 * Main class for Google Map module
 */
class Gmap extends Module
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        // Module settings page
        $routes['admin/module/settings/gmap'] = array(
            'access' => 'module_edit',
            'handlers' => array(
                'controller' => array('gplcart\\modules\\gmap\\controllers\\Settings', 'editSettings')
            )
        );
    }

    /**
     * Implements hook "construct.controller"
     * @param \gplcart\core\Controller $controller
     */
    public function hookConstructController($controller)
    {
        $controller->setJsSettings('gmap', array('key' => $this->config->module('gmap', 'key')));
        $controller->setJs('system/modules/gmap/js/common.js');
    }

}
