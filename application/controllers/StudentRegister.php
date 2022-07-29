<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentRegister extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$this->load->model("Student_model");
		//$this->load->view('studentRegisterForm');
		$this->load->database();
		//$this->load->view('student_login.php');
		$this->load->library('session');
		
	}

	public function registrationForm()
	{
		if ($this->input->method() === 'post') {
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->form_validation->set_rules('name', 'Name', 'required|regex_match[/^([a-z ])+$/i]|min_length[5]|max_length[12]');
			//$this->form_validation->set_rules('email', 'Email', 'required');
			//$this->form_validation->set_message('is_unique[student_register.email]', 'The email is already taken');
			// $this->form_validation->set_rules('email','Email','is_unique',array('is_unique' => 'The  is already taken'));
			$this->form_validation->set_rules('email', 'Email ', 'required|is_unique[student_register.email]');

			$this->form_validation->set_message('is_unique', 'The email is already taken please try again!');
			$this->form_validation->set_rules('city', 'City', 'required|regex_match[/^([a-z ])+$/i]');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('pincode', 'Pincode', 'required|regex_match[/^([0-9])/]|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('ConfirmPassword', 'Confirm_Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^([0-9])/]|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('dob', 'DOB', 'required');
			$this->form_validation->set_rules('department', 'Department', 'required');
			$this->form_validation->set_rules('branch', 'Branch', 'required');

			if ($this->form_validation->run() == true) {

				//your coding area
				$data = array(
					"name" => $this->input->post("name"),
					"email" => $this->input->post("email"),
					"city" => $this->input->post("city"),
					"country" => $this->input->post("country"),
					"state" => $this->input->post("state"),
					"pincode" => $this->input->post("pincode"),
					"password" => $this->input->post("password"),
					"ConfirmPassword" => $this->input->post("ConfirmPassword"),
					"phone" => $this->input->post("phone"),
					"dob" => $this->input->post("dob"),
					"department" => $this->input->post("department"),
					"branch" => $this->input->post("branch"),
				);
				//	print_r($data);die;
				$response = $this->Student_model->insert_data($data);

				if ($response == true) {
					echo "Registered successfully ";
				} else {
					echo "Insert error !";
				}
			}
		}

		$this->data['getAllBranch'] = $this->Student_model->getAllBranch();
		$this->data['getAllDepartment'] = $this->Student_model->getAllDepartment();
		$this->load->view('studentRegisterForm', $this->data);
		//$this->load->view('addBranchForm',$this->data);
		//print_r($this->data);die;
	}

	public function login_view()
	{
		$this->load->view("student_login.php");
	}
	function check_email($str)
	{
		$this->db->where('email', $str);
		$found = $this->db->get('student_register');
		if ($found != false) {
			$this->form_validation->set_message('check_email', 'Email Address is already in use');
			return false;  // more than 0 rows found. the callback fails.
		} else {
			return true;   // 0 rows found. callback is ok.
		}
	}
	public function addBranch()
	{
		if ($this->input->method() == 'post') {
			$this->form_validation->set_rules('name', 'Branch', 'required|alpha');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() == true) {
				$Bdata = array(
					"name" => $this->input->post("name"),
					"status" => $this->input->post("status"),
				);
				//print_r($Bdata);die;
				$res = $this->Student_model->insert_Branchdata($Bdata);
				if ($res == true) {
					echo "Registered successfully ";
				} else {
					echo "Insert error !";
				}
			}
		}
		$this->load->view("addBranchForm");
	}

	public function addDepartment()
	{
		if ($this->input->method() == 'post') {
			$this->form_validation->set_rules('name', 'Branch', 'required|alpha');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() == true) {
				$Ddata = array(
					"name" => $this->input->post("name"),
					"status" => $this->input->post("status"),
				);
				//print_r($Ddata);die;
				$resp = $this->Student_model->insert_Departmentdata($Ddata);
				if ($resp == true) {
					echo "Registered successfully ";
				} else {
					echo "Insert error !";
				}
			}
		}
		$this->load->view("addDepartmentForm");
	}


	public function registerList(){
	$data['h']=$this->Student_model->getList();  
	
	$config = array();
	$config["base_url"] = base_url() . "StudentRegister/registerList";
	$config["total_rows"] = $this->Student_model->data_count();
	$config["per_page"] = 2;
	$config["uri_segment"] = 3;
	$this->pagination->initialize($config);
	$page = (!empty($this->uri->segment(3))) ? $this->uri->segment(3) : 1;
	$data["keyword"] = $this->input->get('sh');
	$dataArray =[
		'per_page' =>  $config["per_page"],
		'page' => $page,
		'keyword' => $data["keyword"]
	];
	$data["h"] = $this->Student_model->fetch_data($dataArray);
	$data["links"] = $this->pagination->create_links();
	$this->load->view('student_view/register_list',$data);
	}


	// $config = array();
	// $config["base_url"] = base_url() . "StudentRegister/departmentdata";
	// $config["total_rows"] = $this->Student_model->record_count();
	// $config["per_page"] = 2;
	// $config["uri_segment"] = 3;
	// $this->pagination->initialize($config);
	// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	// $data["keyword"] = $this->input->get('search');
	// $dataArray =[
	// 	'per_page' =>  $config["per_page"],
	// 	'page' => $page,
	// 	'keyword' => $data["keyword"]
	// ];
	// $data["results"] = $this->Student_model->fetch_departments($dataArray);
	// $data["links"] = $this->pagination->create_links();
	// $this->load->view('student_view/ajax_pagination',$data);
	// }


	public function branchlist()
	{
	$data['h']=$this->Student_model->getbranchdata(); 
	$this->load->view('student_view/branch_listing',$data);
	}

	public function departmentlist()
	{
		$data['h']=$this->Student_model->getdepartmentdata();
		$this->load->view('student_view/department_listing',$data);

	}
	
	public function updatedata($slugId) {
		$id = $slugId;
		$msg = '';
		if ($this->input->method() == 'post') {
			$this->form_validation->set_rules('id', 'id', 'required|numeric');
			
			if ($this->form_validation->run() == true) {
				if($this->input->post("id") == $id){
					$data = array(
						'name'=> $this->input->post("name"),
						'city' => $this->input->post("city"),
						'country' => $this->input->post("country"),
						'state' =>$this->input->post("state"),
						'pincode' => $this->input->post("pincode"),
						'phone' => $this->input->post("phone"),
					);
					$dataArray = array_filter($data);
					$where = array('id'=> $id);
					$dbResponse = $this->Student_model->update_records($where,$dataArray );
					//print_r($dbResponse);
					if ($dbResponse == true) {
						$msg = "Update successfully ";
					} else {
						$msg = "Update error !";
					}
				}else{
					$msg = "User not matched !";
				}
				
			}
		}

		
		$this->data['h'] = $this->Student_model->getRecordsById(array('id'=> $id));
		$this->data['messge'] =  $msg;
		$this->load->view('student_view/update_records',$this->data);
	}


			/*Delete Record*/
		// public function deletedata($slugId)
		// {	
		// 	$id=$slugId;
		// 	if(is_numeric($id)){
		// 		$exist=$this->Student_model->checkId($id);
		// 		if($exist){
		// 			$response=$this->Student_model->deleterecords($id);
		// 			//print_r($response);die;
		// 			if($response==true){
		// 				echo "Data deleted successfully !";
		// 			}
		// 			else{
		// 				echo "Data deleted successfully ! !";
		// 			}
		// 		}else{
		// 			echo "id not exist in table";
		// 		}
				
		// 	}else{
		// 		echo "character not allowed";
		// 	}
		
		// }

	public function dltdata() {
		$msg = '';
		if ($this->input->method() == 'post') {
			$this->form_validation->set_rules('id', 'id', 'required|numeric');
			if ($this->form_validation->run() == true) {
				$exist=$this->Student_model->checkId($this->input->post("id"));
				if($exist){
					$response=$this->Student_model->dltdata($this->input->post("id"));
					//print_r($response);die;
					if($response==true){
						$msg = "success|Data deleted successfully ! !";
					}
					else{
						$msg = "error|Error in data deletion ! !";
					}
				}else{
					$msg = "error|id not exist in table";
				}
				echo $msg ;
			}
		}
	}


// 	public function index(){

// 		$this->load->view('post_view');
 
// 	 }
// 	  public function loadRecord(){
// 		$rowno = $this->input->post("pageno");
// 		//echo $pgno;exit;
//   $rowperpage = 3;
 
//  if($rowno != 0){
// 		   $rowno = ($rowno-1) * $rowperpage;
// 		 }
//   $allcount = $this->db->count_all('student_register');
// 		 $this->db->limit($rowperpage, $rowno);
// 		 $users_record = $this->db->get('student_register')->result_array();
// 		 $config['base_url'] = base_url().'StudentRegister/loadRecord';
// 		 $config['use_page_numbers'] = TRUE;
// 		 $config['total_rows'] = $allcount;
// 		 $config['per_page'] = $rowperpage;
// 		 $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
// 		 $config['full_tag_close']   = '</ul></nav></div>';
// 		 $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
// 	     $config['num_tag_close']    = '</span></li>'; 
// 		 $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
// 		 $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
// 		 $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
// 		 $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
// 		 $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
// 		 $config['prev_tag_close']  = '</span></li>';
// 		 $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
// 		 $config['first_tag_close'] = '</span></li>';
// 		 $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
// 		 $config['last_tag_close']  = '</span></li>';
// 		 $this->pagination->initialize($config);
// 		 $data['pagination'] = $this->pagination->create_links();
// 		 $data['result'] = $users_record;
// 		 $data['row'] = $rowno;
// 		 echo json_encode($data);
//    }
 


// public function departmentdata() {
// 	$config = array();
// 	$config["base_url"] = base_url() . "StudentRegister/departmentdata";
// 	$config["total_rows"] = $this->Student_model->record_count();
// 	$config["per_page"] = 2;
// 	$config["uri_segment"] = 3;
// 	$this->pagination->initialize($config);
// 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
// 	$data["results"] = $this->Student_model->
// 	fetch_departments($config["per_page"], $page);
// 	$data["links"] = $this->pagination->create_links();	
// 	$data['results']=$this->Student_model->GetSearchdata();
// 	$this->load->view('student_view/ajax_pagination',$data);
// }

public function departmentdata() {

	$config = array();
	$config["base_url"] = base_url() . "StudentRegister/departmentdata";
	$config["total_rows"] = $this->Student_model->record_count();
	$config["per_page"] = 2;
	$config["uri_segment"] = 3;
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data["keyword"] = $this->input->get('search');
	$dataArray =[
		'per_page' =>  $config["per_page"],
		'page' => $page,
		'keyword' => $data["keyword"]
	];
	$data["results"] = $this->Student_model->fetch_departments($dataArray);
	$data["links"] = $this->pagination->create_links();
	$this->load->view('student_view/ajax_pagination',$data);
}





 }


?>

