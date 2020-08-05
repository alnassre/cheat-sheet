<?php

// used on the same component
$ReceiptsModel = JModelLegacy::getInstance('Receipts', 'LlsModel'); 
$query = $ReceiptsModel->getListQuery();


// for other component
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 *
 *
 * getModelSite function
 *
 * @param [String] $component name of component
 * @param string $name name of model
 * @param string $prefix
 * @return Object
 */
function getModelSite($component, $name = 'Custom', $prefix = 'CustomModel')
{
    if (!isset($component)) {
        JFactory::getApplication()->enqueueMessage(JText::_("COM_ERROR_MSG"), 'error');
        return false;
    }
    $path=JPATH_SITE . '/components/'.$component.'/models/';
    JModelLegacy::addIncludePath($path);
    require_once $path.strtolower($name).'.php';
    $model = JModelLegacy::getInstance($name, $prefix);
    // If the model is not loaded then $model will get false
    if ($model == false) {
        $class=$prefix.$name;
        // initilize the model
        new $class();
        $model = JModelLegacy::getInstance($name, $prefix);
    }
    return $model;
}
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 *
 * getModelAdmin function
 *
 * @param [String] $component name of component
 * @param string $name name of model
 * @param string $prefix
 * @return Object
 */
function getModelAdmin($component, $name = 'Custom', $prefix = 'CustomModel')
{
    if (!isset($component)) {
        JFactory::getApplication()->enqueueMessage(JText::_("COM_ERROR_MSG"), 'error');
        return false;
    }
    $path=JPATH_ADMINISTRATOR . '/components/'.$component.'/models/';
    JModelLegacy::addIncludePath($path);
    require_once $path.strtolower($name).'.php';
    $model = JModelLegacy::getInstance($name, $prefix);
    // If the model is not loaded then $model will get false
    if ($model == false) {
        $class=$prefix.$name;
        // initilize the model
        new $class();
        $model = JModelLegacy::getInstance($name, $prefix);
    }
    return $model;
}
