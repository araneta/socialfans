<?php
/**
* @version		$Id: mod_ujiankusocial.php 2011-02-01  Aldo S. Praherda
* @package		Joomla
* @copyright	Copyright (c) Ujianku.com. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* 
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
$cssurl = "";
//CONFIGURATION

$fbpageid = $params->get('fbpageid');
$fbpageurl = $params->get('fbpageurl');
$delurl = $params->get('delurl');
$deltitle = $params->get('deltitle');
$feedburnerusername = $params->get('feedburnerusername');
$twitterusername = $params->get('twitterusername');

require(dirname(__FILE__).DS.'helper.php'); 

$cssurl = JURI::root().'modules/mod_ujiankusocial/tmpl/css/';
$document = JFactory::getDocument();
$document->addStyleSheet($cssurl . "style.css");

if(!empty($twitterusername))
	$twitterfollowercount =  modUjiankuSocialHelper::getFollowers($twitterusername);
if(!empty($fbpageid))
	$fbfanscount = modUjiankuSocialHelper::getFans($fbpageid);
if(!empty($delurl))	
	$delbookmarkcount = modUjiankuSocialHelper::getBookmarkCount($delurl);
if(!empty($feedburnerusername))
	$feedcount = modUjiankuSocialHelper::getFeedCount($feedburnerusername);
 
require(JModuleHelper::getLayoutPath('mod_ujiankusocial'));

?>