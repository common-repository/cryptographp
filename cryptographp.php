<?php
/*
Plugin Name: Cryptographp
Plugin URI: http://www.mog-soft.org
Description: Uses the Cryptographp (http://www.cryptographp.com) library to add Captchas for comments
Author: Leo Cacheux
Version: 1.2
Author URI: http://leo.cacheux.net
*/
/*  Copyright 2005  Leo Cacheux  (email : leo@cacheux.net)
**
**  This program is free software; you can redistribute it and/or modify
**  it under the terms of the GNU General Public License as published by
**  the Free Software Foundation; either version 2 of the License, or
**  (at your option) any later version.
**
**  This program is distributed in the hope that it will be useful,
**  but WITHOUT ANY WARRANTY; without even the implied warranty of
**  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
**  GNU General Public License for more details.
**
**  You should have received a copy of the GNU General Public License
**  along with this program; if not, write to the Free Software
**  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
require_once(dirname(__FILE__).'/../../../wp-config.php');
require_once(dirname(__FILE__).'/crypt/cryptographp.fct.php');

class Cryptographp
{
	var $settings = array();
	
	function Cryptographp()
	{
		if (isset($this))
		{
			$this->settings = get_settings('cryptographp');
			add_action('admin_menu', array(&$this, 'admin_menu'));
			//add_action( 'comment_form', array( &$this, 'comment_form' ) );
			add_filter( 'preprocess_comment', array( &$this, 'comment_post') );    // add post comment post security code check
		}
	}
	
	function getText($id)
	{
		$languages = array(
			'en' => array
				(
					'enter_code' => 'Security code (Required)',
					'explaination' => "To prove that you're not a bot, enter this code"
				),
			'fr_FR' => array
				(
					'enter_code' => "Code de s&eacute;curit&eacute;: (Requis)",
					'explaination' => "Pour prouver que vous n'&ecirc;tes pas un bot, recopiez le code ci-dessous"
				)
		);

		$lang = 'en';
		if (isset($languages[WPLANG])) $lang = WPLANG;
		return $languages[$lang][$id];
	}

	function admin_menu()
	{
		if (function_exists('add_options_page')) {
			add_options_page('Cryptographp', 'Cryptographp', 8, "options-general.php?page=cryptographp/admin.php");
		}
	}
	
	function update_settings($settings)
	{
		foreach($settings as $key => $val)
		{
			$this->settings[$key] = $val;
		}
		
		// Boolean values
		if ($settings['bgclear'] == 'on')
			$this->settings['bgclear'] = true;
		else
			$this->settings['bgclear'] = false;
		
		if ($settings['bgframe'] == 'on')
			$this->settings['bgframe'] = true;
		else
			$this->settings['bgframe'] = false;
		
		if ($settings['charcolorrnd'] == 'on')
			$this->settings['charcolorrnd'] = true;
		else
			$this->settings['charcolorrnd'] = false;
		
		if ($settings['crypteasy'] == 'on')
			$this->settings['crypteasy'] = true;
		else
			$this->settings['crypteasy'] = false;
			
		if ($settings['difuplow'] == 'on')
			$this->settings['difuplow'] = true;
		else
			$this->settings['difuplow'] = false;
		
		if ($settings['charup'] == 'on')
			$this->settings['charup'] = true;
		else
			$this->settings['charup'] = false;
		
		if ($settings['cryptgaussianblur'] == 'on')
			$this->settings['cryptgaussianblur'] = true;
		else
			$this->settings['cryptgaussianblur'] = false;
		
		if ($settings['cryptgrayscal'] == 'on')
			$this->settings['cryptgrayscal'] = true;
		else
			$this->settings['cryptgrayscal'] = false;
		
		if ($settings['noiseup'] == 'on')
			$this->settings['noiseup'] = true;
		else
			$this->settings['noiseup'] = false;
		
		if ($settings['logenable'] == 'on')
			$this->settings['logenable'] = true;
		else
			$this->settings['logenable'] = false;
		
		update_option('cryptographp', $this->settings);
	}
	
	function comment_form()
	{
		global $logenable, $cryptwidth, $cryptheight;

		if ($logenable || !is_user_logged_in()) {
			$pic_url = get_option('siteurl') . "/wp-content/plugins/cryptographp/crypt/cryptographp.php";
		
			$text = "\t\t\t".'<div style="display:block;" id="secureimgdiv">'."\n\t\t\t\t";
			$text .= '<p><label for="securitycode">'.Cryptographp::getText('enter_code').'</label><span style="color:#FF0000;">*</span><br />'."\n\t\t\t\t" ;
			$text .= "<small>".Cryptographp::getText('explaination')."</small><br />\n\t\t\t\t" ;
			$text .= '<input type="text" name="securitycode" id="securitycode" size="30" tabindex="4" />'."\n\t\t\t\t" ;
			$text .= '<img src="' . $pic_url . "\"\n\t\t\t\t" ;
			$text .= 'alt="Anti-Spam Image" ';
			$text .= 'style="vertical-align:top;' ;
			$text .= 'height:' . $cryptheight .';width:' . $cryptwidth . ";\" /></p>\n\t\t\t";
			$text .= "</div>\n\t\t\t" ;
		
			echo $text;
		}
	}

	function comment_post($incoming_comment)
	{
		global $_POST;
		
		// Check if the comment is a trackback or pingback
		if ($incoming_comment['comment_type'] == 'trackback' || $incoming_comment['comment_type'] == 'pingback') {
			return $incoming_comment;
		}
		
		if (is_user_logged_in() && !$this->settings['logenable']) return $incoming_comment;
		
		require_once(dirname(__FILE__).'/crypt/cryptographp.cfg.php');
		if (chk_crypt($_POST['securitycode'])) {
			return $incoming_comment;
		} else {
			wp_die (__('Error: Wrong anti-spam word.'));
		}
	}
}

$cryptographp = new Cryptographp();

function display_cryptographp()
{
	Cryptographp::comment_form();
}

require_once(dirname(__FILE__).'/crypt/cryptographp.cfg.php');

?>