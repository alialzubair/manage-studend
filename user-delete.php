<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'config/connect.php';
		
		$pid = intval($_POST['delete']);
		$query = "DELETE FROM user WHERE ID=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
        
		
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Product Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete product ...';
		}
		echo json_encode($response);
	
    }
/*

	              $stmt=$con->prepare("INSERT into user(firstName,lastName,ID,mobile,email,username,gender,major,status) values('{$firstName}','{$lastName}','{$ID}','{$mobile}','{$email}','{$username}','{$gender}','{$major}','{$status}')");
              //prepare the query
                  $data=[];