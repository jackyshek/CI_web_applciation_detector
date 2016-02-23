<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logBase_controller extends CI_Controller {
	
	protected $bc_logID;
	
	function __construct() {
		
		parent::__construct();
		
		//logging
		$this->load->model('logs_model');	
		$this->load->helper("session_helper");
		$this->load->helper("ci_view_helper");
		
		$userAgent = $this->input->user_agent() ? $this->input->user_agent() : "";
		$controller = $this->uri->segment(1) ? $this->uri->segment(1) : "";
		$method = $this->uri->segment(2) ? $this->uri->segment(2) : "";
		$post = $this->input->post() ? $this->input->post() : "";
		if(isset($_POST["log_p"]))
		{
			$post["log_p"] = hash("sha512","Do Not Log any ***Password*** With Plain Text");
		}
		
		
		$get = $this->input->get() ? $this->input->get() : "";
		$user_id = ($this->session->userdata("id"))?$this->session->userdata("id"):'';
		$IP = "";
		if(isset($_SERVER["HTTP_X_FORWARDED_FOR"]) && $_SERVER["HTTP_X_FORWARDED_FOR"] != ""){
		   $IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
		   $proxy = $_SERVER["REMOTE_ADDR"];
		   $host = @gethostbyaddr($_SERVER["HTTP_X_FORWARDED_FOR"]);
		}else{
		   $IP = $_SERVER["REMOTE_ADDR"];
		   $proxy = "No proxy detected";
		   $host = @gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		}
		$this->bc_logID = $this->logs_model->InsertLog($IP ,$proxy, $host,
						$user_id,
						$userAgent,
						$controller, 
						$method,						
						"post:".json_encode($post)."|| get:".json_encode($get), 
						$user_id);
						
		
	}
	
}
	