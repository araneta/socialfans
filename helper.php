<?php
/**
* @version		$Id: mod_ujiankusocial.php 2011-02-1  Aldo S. Praherda
* @package		Joomla
* @copyright	Copyright (c) Ujianku.com. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* 
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class modUjiankuSocialHelper
{
	function getFollowers($username){
	  $toopen="http://twitter.com/users/show.xml?screen_name=$username";
	
	  $ch = curl_init(); /// initialize a cURL session
	  curl_setopt($ch, CURLOPT_URL, $toopen );
	  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	  $content = curl_exec ($ch);//end get cool feedburner count
	  curl_close($ch);
	
	  $dom = new DOMDocument();
	  $dom->preserveWhiteSpace = false;
	  $dom->loadXML($content);
	  $count=$dom->getElementsByTagName("followers_count")->item(0)->nodeValue;
	  return $count;
	}
	function getFans($pageid)
	{	  
	  $json = file_get_contents("https://graph.facebook.com/$pageid");	
	  $obj = json_decode($json);
	  return $obj->{'likes'};
	}
	function endswith($string, $test) {
	    $strlen = strlen($string);
	    $testlen = strlen($test);
	    if ($testlen > $strlen) return false;
	    return substr_compare($string, $test, -$testlen) === 0;
	}
	
	function getBookmarkCount($url)
	{	
		if(!modUjiankuSocialHelper::endswith($url,"/"))
		{
			$url .= "/";
		}
	  	$json = file_get_contents("http://feeds.delicious.com/v2/json/urlinfo/data?url=".$url);	
	  	$obj = json_decode($json);
	  	return $obj[0]->{'total_posts'};
	}
	function getFeedCount($idx)
	{
		$fburl="https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=".$idx;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $fburl);
		$stored = curl_exec($ch);
		curl_close($ch);
	  	$grid = new SimpleXMLElement($stored);
	  	$rsscount = $grid->feed->entry['circulation'];
	  	return $rsscount;
	}
}