<?php
/*
 * e107 Bootstrap CMS
 *
 * Copyright (C) 2008-2015 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 * 
 * IMPORTANT: Make sure the redirect script uses the following code to load class2.php: 
 * 
 * 	if (!defined('e107_INIT'))
 * 	{
 * 		require_once("../../class2.php");
 * 	}
 * 
 */
 
if (!defined('e107_INIT')) { exit; }

// v2.x Standard  - Simple mod-rewrite module. 

class forum_url // plugin-folder + '_url'
{
	function config() 
	{
		$config = array();
	
		$config['index'] = array(
			'regex'			=> '^forum/?$', 						// matched against url, and if true, redirected to 'redirect' below.
			'sef'			=> 'forum', 							// used by e107::url(); to create a url from the db table.
			'redirect'		=> '{e_PLUGIN}forum/forum.php', 		// file-path of what to load when the regex returns true.
			
		);


		$config['topic'] = array(
			'regex'			=> '^forum/(.*)/(.*)$',
			'sef'			=> 'forum/{forum_sef}/{topic_sef}',
			'redirect'		=> '{e_PLUGIN}forum/forum_viewtopic.php?id=$1'
		);


		$config['forum'] = array(
			'regex'			=> '^forum/(.*)$',
			'sef'			=> 'forum/{forum_sef}',
			'redirect'		=> '{e_PLUGIN}forum/forum_viewforum.php?id=$1'
		);

		return $config;
	}
	

	
}