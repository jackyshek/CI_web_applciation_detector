class logs_model extends CI_Model {
public function InsertLog($ip,$proxy,$host, $userID, $userAgent, $controllerName, $methodName, $postString, $createID){
		
		$query = $this->db->query("
			insert into `uLogSurvey_LoginReg` (ip,proxy,host, user_id, user_agent, controller_name, method_name, post_data, create_id, create_dt)
			values (?,? ,?,?, ?, ?, ?, ?, ?, now());
		",
			array($ip,$proxy,$host, $userID, $userAgent, $controllerName, $methodName, $postString, $createID)	
		);	
		return $this->db->insert_id();
		
	}
}