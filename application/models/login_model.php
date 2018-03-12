<?php
class Login_model extends CI_Model{

    public function login_valid($userName,$password){


        $q=$this->db->Where(['user_name'=>$userName,'password'=>$password])
            ->get('users');

        if ($q->num_rows()){

           return $q->row()->id;
            //print_r($q->row());
           // exit;

           // return $q->row()->id;




           // return TRUE;

        }
        else
        {
            return FALSE;
        }



    }


}