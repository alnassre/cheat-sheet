<?php 
    //create this file in ./administrator
  
		// Optional: Disable any firewall plugin by renaming its folder to *_old
		//rename('../plugins/system/firewallplugin', '../plugins/system/firewallyplugin_old');
		
		define('_JEXEC', 1);
		
		if (file_exists(__DIR__ . '/defines.php'))
		{
			include_once __DIR__ . '/defines.php';
		}		
		//Load the Joomla environment
		if (!defined('_JDEFINES'))
		{
			define('JPATH_BASE', __DIR__);
			require_once JPATH_BASE . '/includes/defines.php';
		}
		require_once JPATH_BASE . '/includes/framework.php';
		require_once JPATH_BASE . '/includes/helper.php';
		require_once JPATH_BASE . '/includes/toolbar.php';
		$app = JFactory::getApplication('administrator');
		
		
		//set task
		$app->input->set('option','[com_xxx]');
		$app->input->set('task','controller.xxxx');

		// Login the "admincron" user to the Joomla backend
		$credentials = array();
		$credentials['username'] = 'admincron';
		$credentials['password'] = '[password]';
		$app->login($credentials);
		$app->execute();

		// Optional: Re-enable any firewall plugin that was disabled at the beginning of the script
		//rename('../plugins/system/firewallplugin', '../plugins/system/firewallplugin');

		// Halt further execution of the script
		die();
		
		
?>
