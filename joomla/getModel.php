<?php

// used on the same component
$ReceiptsModel = JModelLegacy::getInstance('Receipts', 'LlsModel'); 
$query = $ReceiptsModel->getListQuery();


//Admin Model:
function getModelAdmin($component, $name = 'Custom', $prefix = 'CustomModel')
{
    JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/' . $component . '/tables', $prefix);
    JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/' . $component . '/models', $prefix);
    $model = JModelLegacy::getInstance($name, $prefix, array('ignore_request' => true));
    return $model;
}
//Site Model:

function getModelSite($component, $name = 'Custom', $prefix = 'CustomModel')
{
    JTable::addIncludePath(JPATH_SITE . '/components/' . $component . '/tables', $prefix);
    JModelLegacy::addIncludePath(JPATH_SITE . '/components/' . $component . '/models', $prefix);
    $model = JModelLegacy::getInstance($name, $prefix, array('ignore_request' => true));
    return $model;
}
