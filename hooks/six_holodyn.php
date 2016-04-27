<?php

use Carbon\Carbon;
use WHMCS\View\Menu\Item as MenuItem;

/**
 *
 */
	add_hook('ClientAreaPage', 1, function ( $vars )
	{

	  if (isset($vars['products'])) {
	  	foreach ($vars['products'] AS &$product){
				$product['featuresdesc'] = $product['description'];
				$product['features'] = array();
		  }
			return $vars;
		}

	});

/**
 *
 */
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

/**
 *
 */
	add_hook('ClientAreaHeadOutput', 1, function ()
	{
		$html = array();
		$html[] = '<link rel="icon" type="image/png" href="/images/favicon.ico">';
		if (strpos($_SERVER['SERVER_NAME'], 'whmcstag') !== false)
		{
			$html[] = '<style>.main-content > div:first-child {display: none;}</style>';
		}
		return implode("\n", $html);
	});

/**
 *
 */
	add_hook('AdminAreaHeadOutput', 1, function ()
	{
		$html = array();
		$html[] = '<link rel="icon" type="image/png" href="/images/favicon.ico">';
		return implode("\n", $html);
	});
