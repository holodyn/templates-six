<?php

use Carbon\Carbon;
use WHMCS\View\Menu\Item as MenuItem;

// Add a helpful support hours notice to the top of the sidebar on the submit
// ticket page.
add_hook('ClientAreaPrimaryNavbar', 1, function (MenuItem $nav)
{

		$client = $client = Menu::context('client');

		if (!$client)
		{
			$nav->removeChild('Affiliates');
			$nav->removeChild('Network Status');
	    $navItem = $nav->addChild(
	    	'Software Products',
	    	array(
	    		'uri' => 'cart.php'
	    	)
	  	);
	    $navItem->moveToFront();
	    $navItem->moveDown();
		}

});

// Add a helpful support hours notice to the top of the sidebar on the submit
// ticket page.
add_hook('ClientAreaHeadOutput', 1, function ()
{
	if (strpos($_SERVER['SERVER_NAME'], 'whmcstag') !== false)
	{
		ob_start();
		?><style>.main-content > div:first-child {display: none;}</style><?php
		return ob_get_clean();
	}
});
