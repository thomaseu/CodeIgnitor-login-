<?php
class User_model extends CI_Model{

    // public function get_users($user_id,$username){

        // $config['hostname'] = "localhost";
        // $config['username'] = "root";
        // $config['password'] = "";
        // $config['database'] = "user_model";

        // $this->load->database($config);  //manual config db
       
        // $this->db->where('id',$user_id); call user id
    //    $this->db->where([
    //        'id'=>$user_id,
    //        'username'=>$username]); //same with above


    //     $query = $this->db->get('um');

    //     return $query->result(); //display how many column fields in db

    //     //return $query->num_rows(); //display num row

        


    // }

    // public function create_user($data){
    //     $this->db->insert('um',$data);
    // }

    // public function update_user($data,$id){
    //     $this->db->where(['id'=> $id]);
    //     $this->db->update('um',$data);
    // }

    // public function delete_user($id){

    //     $this->db->where(['id'=>$id]);
    //     $this->db->delete('um');
    // }


    public function login_user($username,$password){
        $this->db->where('username', $username);
        $this->db->where('password',$password);

        $result = $this->db->get('um');

        if($result->num_rows()==1){

            return $result->row(0)->id;




        }else {
            return false;
        }



    }
}


?>