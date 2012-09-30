<?php
//Extends CI_Controller in Codeigniter 2
class Main extends CI_Controller {

   public function  __construct() {
        parent::__construct();
		$this->load->helper('curl_helper');
		$this->load->library('trello.php');
    }
    
    public function index(){
    	//connect to hackerleague
        $this->load->view('main', $data=array());
    }
	
	public function enter_team(){
		$this->load->view('propermain', $data = array());
	}

	
	public function get_board_data(){
		$org_name = $this->input->post('org_name');
		$board_name = $this->input->post('board_name');
		
		$info = $this->trello->get_board_info($org_name, $board_name);
		
		//spit out the link
		echo $info;
	}
	
	public function get_all_boards($id){
		$data['id'] = $id;
		$img_url = "https://s3.amazonaws.com/hackerleague/organizations/logos/502d6b9faee31e0002000012/original.png?1345153951";
		$data['img'] = $img_url;
		//print_r($img_url);exit(1);

		//curl the fucking info
		$info = connect("http://hackerleague.org/api/v1/hackathons/$id/hacks.json");
		$decoded = json_decode($info); 
		$data['projects'] = $decoded;
		//print_r($id);exit(1);
		$this->load->view('search.php', $data);


	}

	public function login_to_board(){
		$board_name = $this->input->post("board_name");
		$info = $this->trello->get_board_info('hackny', $board_name);
		print_r($info);exit(1);
	}

	//also known as update. Since it's indepmonotent.
	public function create_boards($org_id){
		$info = connect("http://hackerleague.org/api/v1/hackathons/502d6b9faee31e0002000012/hacks.json");
		$decoded = json_decode($info); 
		$status = $this->trello->create_boards($org_id, $decoded);
		
		if($status){
			echo "Boards are created successfully for $org_id";
		}
	}
	public function register_all_page(){
		$this->load->view('register_all');
	}


	public function show_create_board($name){
		$data['org_id'] = $name;
		$this->load->view('update_teams', $data);
	}
	
	public function register_with_org_boards(){
		$email = $this->input->post('user_email');
		$org_name = $this->input->post('org_name');
		$status = $this->trello->register_with_all_boards($org_name, $email);
		if($status){
			echo "Congrats. You're now registered with all active teams.";
		}
	}
	
	//craete
	public function create_organization(){
		$name = $this->input->post('org_name');
		//get the name of the organization
		$status = $this->trello->create_organization($name);
		
		if($status){
			//echo $name . " was created successfully";
			redirect("main/show_create_board/$name");
		}
		
		//redirect to update boards
		//if successful
	}
	
	public function update_organization(){
		$this->trello->update_organization("NewOrganization");
	}
/*
    public function comments(){
        $msg = 'My secret message';
         $key = 'super-secret-key';
        $encrypted_string = $this->encrypt->encode($msg, $key);
        $data['secret'] = $encrypted_string;
        $this->load->view('comments_view', $data);
       // echo "Yo whatup homie, this be the comments page";
}*/
}
?>
