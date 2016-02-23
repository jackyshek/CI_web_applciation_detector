<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Name:  Application Defender
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

class App_defender {
	function __construct() {
		include_once "injection_attack.php";
	}
	public function get_file_InclusionAttack()
	{
		$i_a = new Injection_attack();
		$sql_pattern = $i_a->file_inclusion();
		$sql = "";
		$i = 0;
		foreach($sql_pattern as $pattern)
		{
			if($i > 0 )
			{
				$sql = $sql." or post_data like '%".$pattern."%'";
			}
			else 
			{
				$sql = $sql."'%".$pattern."%'";
			}
			$i++;
			
		}
		return 	$sql;
	}
	public function get_sql_SQLInjection(){
		
		$i_a = new Injection_attack();
		$sql_pattern = $i_a->sql();
		$sql = "";
		$i = 0;
		foreach($sql_pattern as $pattern)
		{
			if($i > 0 )
			{
				$sql = $sql." or post_data like '%".$pattern."%'";
			}
			else 
			{
				$sql = $sql."'%".$pattern."%'";
			}
			$i++;
			
		}
		return 	$sql;
	}
	
	public function get_sql_XSSInjection(){
		
		$i_a = new Injection_attack();
		$xss_pattern = $i_a->xss();
		$sql = "";
		$i = 0;
		foreach($xss_pattern as $pattern)
		{
			if($i > 0 )
			{
				$sql = $sql." or post_data like '%".$pattern."%'";
			}
			else 
			{
				$sql = $sql."'%".$pattern."%'";
			}
			$i++;
			
		}
		return 	$sql;
	}
}