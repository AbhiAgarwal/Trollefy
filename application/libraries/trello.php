<?php 

class Trello{
	public $CI = null;
	public $config = array();
	public $token = '';
	public function __construct(){
		$this->CI = &get_instance();
		$this->CI->load->helper('curl_helper');
		$app_id = '';
		$secret = '';
		$token = '';
		$this->token = $token;
		$this->config = array(
  			'appId'  => $app_id,
  			'secret' => $secret,
  			'token' => $token
 		);
	}
	
	public function get_board_info($org_name, $board_name){
		$url = "https://api.trello.com/1/organizations/$org_name/boards?key=5114689a10dacfd870550a47f0ea44e1&token=$this->token";
		$orgs = file_get_contents($url);
		$decoded = json_decode($orgs);
		$name = '';
		$id = '';
		foreach($decoded as $row){
			$name = $row->name;
			$id = $row->id;
			if($name == $board_name){
				return "https://trello.com/board/$name/$id";
			}
		}
		return false;
	}
	
	public function register_with_all_boards($org_name, $email){
		//$url = "https://api.trello.com/1/boards/50680f9730ea7eac13053107/invitations?email=me@abhiagarwal.com&key=5114689a10dacfd870550a47f0ea44e1&token=1db18635d3d31f676001b75828eef888c1c283c9c41cfd798d172c50eb3f6ab0";
		$boards_url = "https://api.trello.com/1/organizations/$org_name/boards?key=5114689a10dacfd870550a47f0ea44e1&token=$this->token";
		$orgs = file_get_contents($boards_url);
		$decoded = json_decode($orgs);
		$name = '';
		$id = '';
		$key = $this->config['appId'];
		$token = $this->config['token'];
		
		//first, register with an organization
		register_with_org($email, $org_name, $key, $token);
		
		foreach($decoded as $row){
			$name = $row->name;
			$id = $row->id;
			post_invitation($email, $id, $key, $token);
		}
		
		return true;
	}
	public function get_all_organizations(){
		$url = "https://api.trello.com/1/members/alinpd/organizations?key=5114689a10dacfd870550a47f0ea44e1&token=$this->token";
		$orgs = file_get_contents($url);
		print_r($orgs);
	}
	
	public function get_all_boards($org_id){
		//$organization_id;
		$url = "https://api.trello.com/1/organizations/$org_id/boards?key=5114689a10dacfd870550a47f0ea44e1&token=$this->token";
		$boards = file_get_contents($url);
		print_r($boards);
		
	}
	
	public function get_token(){
		$return_url = base_url() . "index.php/authen/logme";
		$request = "https://trello.com/1/authorize?key=5114689a10dacfd870550a47f0ea44e1&name=gangnamstyle&expiration=never&response_type=token&scope=read,write";
		redirect($request);
	}
	
	public function create_boards($org_id, $projects){
		$id = $this->config['appId'];
		$token = $this->config['token'];
		foreach($projects as $p){
			//$url = "https://api.trello.com/1/boards?name=$p->name&idOrganization=$org_id&key=$id&token=$token";
			make_post($p->name, $org_id, $id, $token);
		}
		
		return true;
		
	}
	
	public function get_public_member($username){
		$request = "https://api.trello.com/1/members/$username?key=5114689a10dacfd870550a47f0ea44e1";
		$info = file_get_contents($request);
		return $info;
	}
	
	public function update_organization($name){
		$id = $this->config['appId'];
		$token = $this->config['token'];
		make_organization_public($name, $id, $token);
	}
	public function create_organization($name){
		$id = $this->config['appId'];
		$token = $this->config['token'];
		$status = create_organization($name, $id, $token);
		return $status;
	}

}



?>
