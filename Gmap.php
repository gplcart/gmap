<?php

/**
 * @package Google Map
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\gmap;

use gplcart\core\Module,
    gplcart\core\Config;

/**
 * Main class for Google Map module
 */
class Gmap extends Module
{

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
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
        $controller->setJsSettings('gmap', array('key' => $this->config->getFromModule('gmap', 'key')));
        $controller->setJs('system/modules/gmap/js/common.js');
    }

}
