<?php
$doc = &JFactory::getDocument();
$renderer   = $doc->loadRenderer('modules');
$position   = 'Position-1';
$options   = array('style' => 'raw');
echo $renderer->render($position, $options, null); 
