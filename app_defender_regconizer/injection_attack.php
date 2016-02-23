<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Name:  Injection Defender
* 
* Author: jackyshek
* 	 	  jackyshek@hkbu.edu.hk
*         @jackyshek
*          
*
* 
*          
* Created:  07.12.2015 
* 
* Description:  This is a Codeigniter library which allows you to detect applection layer attack of injection
* 
*/

class Injection_attack {
	public function sql(){
		$sql_patten = array(
			"\' or \'"
		,	" or "
		,	"UNION SELECT"
		,	"information_schema"
		,	"sleep\("
		,	"UPDATE"
		,	"INSERT INTO"
		,	"SELECT "
		);
		return 	$sql_patten;
	}
	public function xss(){
		$xss_patten = array(
			"javascript\:"
		,	"javascript \:"
		,	"ascript\:"
		,	htmlentities("javascript\:")
		,	"\%253Cscript"
		,	"\%253Escript"
		,	"\%3Cscript"
		,	"\%3E\/script"
		,	htmlentities("<script")
		);
		return 	$xss_patten;
	}
	public function file_inclusion(){
		$inclusion_patten = array(
			"etc\/passwd"
			,"\%2Fetc\%2Fpasswd"
			,"\%5cc\/boot.ini"
		);
		return 	$inclusion_patten;
	}
}