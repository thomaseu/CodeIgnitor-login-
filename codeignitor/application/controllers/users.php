<?php

class Users extends CI_Controller{

    // public function show($user_id){

    //     //$this->load->model('user_model');

    //     // $result = $this->user_model->get_users();

       

    //     $data['result']= $this->user_model->get_users($user_id,'eu');

    //     $this->load->view('user_view',$data);

        

        

        



        // foreach ($result as $object) {

        //     echo $object->id; "<br>"
            
        // }




    // }

    // public function insert(){
    //     $username = "thomaseu";
    //     $password = "123456789";

    //     $this->user_model->create_user([
    //         'username'=>$username,
    //         'password'=>$password
    //          ]);
    // }

    // public function update(){
    //     $id=3;
    //     $username = "Alan";
    //     $password = "LOL";

    //     $this->user_model->update_user([
    //         'username'=>$username,
    //         'password'=>$password

    //     ],$id);
    // }

    // public function delete(){

    //     $id = 4;

    //     $this->user_model->delete_user($id);


    // }

    public function login(){
    //    echo $_POST['username']; //php way to print data from phpmyadmin
    //    echo $_POST['password']; 

    //  $this->input->post('username');// codeignitor print from db

    // $this->input->post();    // Catch values form url via POST Method
    // $this->input->get();                 // Catch values form url via GET Method
    // $this->input->get_post();      // Search data first for POST then for GET.

    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

    if($this->form_validation->run()==FALSE){
        $data = array(

            'errors' => validation_errors() 
        );
        $this->session->set_flashdata($data);

        redirect('home');


    }else{


        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user_id = $this->user_model->login_user($username,$password);

        if ($user_id) {
            $user_data = array(

                 'user_id' => $user_id,
                 'username' =>$username,
                'logged_in' =>true

                );
            
        $this->session->set_userdata($user_data); 

        $this->session->set_flashdata('login_success','You are logged in!!!');

        redirect('home/index');

        }else {

            $this->session->set_flashdata('login_failed','Sorry,You are not logged in!!!');
            redirect('home/index');
        }






    }
    }







}



?>