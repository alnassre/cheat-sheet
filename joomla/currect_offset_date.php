<?php
/*
 *perfect date print with currect offset
 */
echo JHTML::_('date', $receipt->created_date, JText::_('DATE_FORMAT_LC2'));


// without time
echo JHTML::_('date', $receipt->created_date, 'l, d F Y');
