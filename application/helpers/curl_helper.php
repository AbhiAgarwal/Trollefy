<?php
	//Simple curl function
	function connect($url){
    	
    	$curl = curl_init($url);
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
    	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    	$output = curl_exec($curl);
    	
    	return $output;
    }
	
	function make_post($name, $idOrganization, $key, $token){
		$postdata = http_build_query(
			   array(
			        'name' => $name,
			        'idOrganization' => $idOrganization,
			        'key' => $key,
			        'token' => $token,
			        'prefs_comments' => 'org',
			        'prefs_permissionLevel' => 'public'
			    )
			);
	 
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);
	 
		$context  = stream_context_create($opts);
		 
		$result = file_get_contents('https://api.trello.com/1/boards', false, $context);
    }
	
	function register_with_org($email, $org_name, $key, $token){
		
		$postdata = http_build_query(
			   array(
			        'email' => $email,
			         'key' => $key,
			        'token' => $token
			    )
			);
	 
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);
	 
		$context  = stream_context_create($opts);
		 try{
			$result = file_get_contents("https://api.trello.com/1/organizations/$org_name/invitations", false, $context);
		 }catch(Exception $e){
		 	echo "";
		 }
		 
		return $result;
	}
	
	function post_invitation($email, $board_id, $key, $token){
		$postdata = http_build_query(
			   array(
			        'email' => $email,
			         'key' => $key,
			        'token' => $token
			    )
			);
	 
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);
	 
		$context  = stream_context_create($opts);
		 try{
			$result = file_get_contents("https://api.trello.com/1/boards/$board_id/invitations", false, $context);
		 }catch(Exception $e){
		 	echo "";
		 }
		return $result;
    }
	
	function create_organization($orgName, $key, $token){
		
			$postdata = http_build_query(
			   array(
			        'displayName' => $orgName,
			        'key' => $key,
			        'token' => $token
			    )
			);
	 
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);
	 
		$context  = stream_context_create($opts);
		$result = file_get_contents('https://api.trello.com/1/organizations', false, $context);
		return $result;
	}
	
	function make_organization_public($orgId, $id, $token){
		$postdata = http_build_query(
			   array(
			        'value' => "public",
			        'id' => $id,
			        'token' => $token
			    )
			);
	 
		$opts = array('http' =>
		    array(
		        'method'  => 'PUT',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);
	 
		$context  = stream_context_create($opts);
		 
		$result = file_get_contents("https://api.trello.com/1/organizations/$orgId/prefs/permissionLevel", false, $context);
		echo $result;
		
	}
/*End of curl helper*/