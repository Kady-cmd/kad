<?php
function addLog($data = array())
{
	include("../../../conn.php");

	// Data array paramateres
	// user_id = user unique id
	// action_made = action made by the user

	if(count($data) > 0)
	{
		extract($data);
		$sql = "INSERT INTO `admin_audit_logs` (`user_id`, `action_made`) VALUES ('{$user_id}', '{$action_made}')";
		$save = $conn->query($sql);

		if(!$save)
		{
			die($sql." <br> ERROR:".$conn->error);
		}
	}
	
	return true;
}