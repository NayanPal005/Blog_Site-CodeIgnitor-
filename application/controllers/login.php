<?php

class Login extends MY_Controller{

   public function index(){
       if ($this->session->userdata('user_id'))
           return redirect('admin/dashboard');
       $this->load->helper('form');
       $this->load->view('public/admin_login');

   }
   public function admin_login(){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('userName','UserName','required|alpha|trim');
      $this->form_validation->set_rules('password','Password','required');

      $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); /*Error message coloring control ta globally kora hoilo :) */

      if ($this->form_validation->run()){
         // echo "Form Validation Successfull";

          $userName=$this->input->post('userName');
          $password=$this->input->post('password');
          $this->load->model('login_model');

         $login_id= $this->login_model->login_valid($userName,$password);

         if ($login_id){

             $this->load->library('session');
             $this->session->set_userdata('user_id',$login_id);

             return redirect('admin/dashboard');
         }
         else{

             $this->session->set_flashdata('login_Alert','Invalid Password/Username');
             return redirect('login');

         }

      }

      else{
          echo "Form Validation Failed";

          $this->load->view('public/admin_login');

          //echo validation_errors();


      }


   }
    public function logout()
    {
      $this->session->unset_userdata('user_id');

           return redirect('login');


    }


}