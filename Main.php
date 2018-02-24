<?php

/**
 * @package Google Map
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\gmap;

use gplcart\core\Controller;
use gplcart\core\Module;

/**
 * Main class for Google Map module
 */
class Main
{

    /**
     * Module class instance
     * @var \gplcart\core\Module $module
     */
    protected $module;

    /**
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
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
    public function hookConstructController(Controller $controller)
    {
        $this->setModuleAssets($controller);
    }

    /**
     * Sets module specific assets
     * @param \gplcart\core\Controller $controller
     */
    protected function setModuleAssets(Controller $controller)
    {
        if (!$controller->isInternalRoute()) {
            $controller->setJsSettings('gmap', array('key' => $this->module->getSettings('gmap', 'key')));
            $controller->setJs('system/modules/gmap/js/common.js');
        }
    }

}
