<?php

//in any view

$menu		= JFactory::getApplication()->getMenu();
$active		= $menu->getActive();
$itemId		= $active->id;
$link = JRoute::_('index.php?option=com_users&view=login&Itemid='.$itemId);
$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug));
$fullURL = new JUri($link);
$fullURL->setVar('return', base64_encode($returnURL));


echo $fullURL;
