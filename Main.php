<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $email=$this->input->post('email');
                $password=$this->input->post('password');
               
                $this->form_validation->set_rules('email','Email','required');
                $this->form_validation->set_rules('password','Password','required');
               
                if($this->form_validation->run()==false){

                   $this->load->view('includes/header');
                   $this->load->view('login');
                   $this->load->view('includes/footer');
                }else{
                    $where=array('email'=>$email,'password'=>md5($password),'status'=>1);
                    $check_email=$this->common_model->Getwhere('users',$where);
                    //print_r($check_email);die;
                    if(!empty($check_email)){
                        $sess_array=array(
                            'member_id'=>$check_email[0]->id,
                            'name'=>$check_email[0]->name,
                            'email'=>$check_email[0]->email,
                        );
                        $this->session->set_userdata($sess_array);	
                        $this->session->set_userdata('member_data', $sess_array);	
                                      
                        echo "success";
                    }else{
                        echo "invalid";
                    }
                }
	}
        public function signup(){
            
                $name=$this->input->post('name');
                $email=$this->input->post('email');
                $password=$this->input->post('password');
                $address=$this->input->post('address');
                $phone=$this->input->post('phone');
            
                $this->form_validation->set_rules('name','Name','required');
                $this->form_validation->set_rules('email','Email','required');
                $this->form_validation->set_rules('password','Password','required');
                $this->form_validation->set_rules('phone','Phone','required');
                $this->form_validation->set_rules('address','address','required');
                
                if($this->form_validation->run()==false){
                
                    $this->load->view('includes/header');
                    $this->load->view('signup');
                    $this->load->view('includes/footer');
                }else{
                   
                    $check_email=$this->common_model->getAllrecords('users','','','email',trim($email));
                   // print_r($check_email);die;print_r($this->session->all_userdata());die;
                    //echo $this->db->last_query();die;
                    if(empty($check_email)){
                        $data=array(
                            'name'  =>$name,
                            'email'=>$email,
                            'password'=>md5($password),
                            'phone'=>$phone,
                            'address'=>$address,
                            'status'=>1,
                            'create_date'=>date('Y-m-d h:i:s'),
                        );
                        $request=$this->common_model->insert_entry('users',$data);
                        if($request){
                            echo "success";
                        }
                    }else{
                        echo "already";
                    }
                }
        }
	public function welcome(){
            $userdata = $this->session->all_userdata(); 


             if(!empty($userdata['data'])){
               $user_id = $userdata['data']['member_id'];}else{
                $user_id = 0;
               }

			//print_r($this->session->all_userdata());die;
	}
        
        
}
