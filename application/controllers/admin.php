<?php

class Admin extends MY_Controller
{

    public function dashboard()
    {
        // $this->load->helper('form');
        $this->load->library('session');
        /*
          if (!$this->session->userdata('user_id'))
          {
              return redirect('login');
          }
        */

        //$this->load->model('articlesmodel', 'articles');

        $this->load->library('pagination');

        $config=[
            'base_url'=>base_url('admin/dashboard'),
            'per_page'=>5,
            'total_rows'=>$this->articles->num_rows(),
            'full_tag_open'=>'<ul class="pagination">',
            'full_tag_close'=>'</ul>',
            'cur_tag_open'=>'<li class="active"><a>',
            'cur_tag_close'=>'</li>',
            'prev_tag_open'=>'<li>',
            'prev_tag_close'=>'</li>',
            'next_tag_open'=>'<li>',
            'next_tag_close'=>'</li>',
            'num_tag_open'=>'<li>',
            'num_tag_close'=>'</li>',


        ];

        $this->pagination->initialize($config);

        $articles = $this->articles->articles_list($config['per_page'],$this->uri->segment(3));


        $this->load->view('admin/dashboard.php', ['articles' => $articles]);

    }

    public function add_article()
    {
        /*
       if($this->input->post()){     eta post ba form diye data asle kaj korbe jeta pore store_article() hisebe dekhaisi

           //form validation
       }
       else{
           $this->load->helper('form');  eta get diye ba url diye asle kaj korbe

           $this->load->view('admin/add_article');
       }
       */
       // $this->load->helper('form');

        $this->load->view('admin/add_article');

    }
    public function store_article(){
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Article Title','required|alpha|trim');
        $this->form_validation->set_rules('body','Article Body','required');

       $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); /*Error message coloring control ta globally kora hoilo :)*/

       // if ($this->form_validation->run('add_article_rules')){
        if ($this->form_validation->run()){

            $post=$this->input->post();
             unset($post['ADD']);
           // $this->load->model('articlesmodel','articles');
            return $this->_flashAndRedirect($this->articles->add_article($post),
                'Article Inserted Successfully',
                'Article Inserted Falied!Please Try Again');
            /*
            if ($this->articles->add_article($post)){
               $this->session->set_flashdata('feedback','Article Inserted Successfully');
                $this->session->set_flashdata('feedback-class','alert-success');
            }
            else{
             $this->session->set_flashdata('feedback','Article Inserted Falied');
                $this->session->set_flashdata('feedback-class','alert-danger');
            }
            return redirect('admin/dashboard');
            */
        }

        else{
            echo "Form Validation Failed";

            $this->load->view('admin/add_article');
           // echo validation_errors();
        }
    }
    public function edit_article($articleId){
        //$this->load->helper('form');
        //$this->load->model('articlesmodel','articles');
       $getarticle= $this->articles->find_article($articleId);

       $this->load->view('admin/edit_article',['getarticle'=> $getarticle]);
       //  $this->load->library('form_validation');
/*
         $this->form_validation->set_rules('title','Article Title','required|alpha|trim');
         $this->form_validation->set_rules('body','Article Body','required');

         $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
         */ /*Error message coloring control ta globally kora hoilo :)*/
        if ($this->form_validation->run()){

        }
        else{

        }

    }

    public function update_article(){

       // $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Article Title','required|alpha|trim');
        $this->form_validation->set_rules('body','Article Body','required');

        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); /*Error message coloring control ta globally kora hoilo :)*/
        $post=$this->input->post();
        if ($this->form_validation->run()){

            $post=$this->input->post();
            $articleId=$post['articleId'];
            unset($post['EDIT']);
            unset($post['articleId']);
           // print_r($post);
           // $this->load->model('articlesmodel','articles');
            return $this->_flashAndRedirect($this->articles->update_article($articleId,$post),
                'Article Updated Successfully',
                'Article Updated Falied!Please Try Again');
          /*
            if ($this->articles->update_article($articleId,$post)){
                $this->session->set_flashdata('feedback','Article Updated Successfully');
                $this->session->set_flashdata('feedback-class','alert-success');
            }
            else{
                $this->session->set_flashdata('feedback','Article Updated Falied');
                $this->session->set_flashdata('feedback-class','alert-danger');
            }
            return redirect('admin/dashboard');
            */
        }


        else{
            echo "Form Validation Failed";

            $this->load->view('admin/add_article');
            // echo validation_errors();
        }
    }
    /*
     *==================================eta amar nijer way te kora ar ================
     * next ta hocche arektu secure vabe form cretae kore dlete er kaj korse=================================
     *
    public function delete_article($articleId){

        $this->load->model('articlesmodel','articles');
        if ($this->articles->delete_article($articleId)){
            $this->session->set_flashdata('feedback','Article Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('feedback','Article Deleted Falied');

        }
        return redirect('admin/dashboard');

    }
*/
    public function delete_article(){

        $post=$this->input->post();
        $articleId=$post['articleId'];
        unset($post['delete']);
      //  print_r($post);

        //$this->load->model('articlesmodel','articles');
        return $this->_flashAndRedirect($this->articles->delete_article($articleId),
            'Article Deleted Successfully',
            'Article Deleted Falied!Please try again');
        /*
        if ( $this->articles->delete_article($articleId)){
            $this->session->set_flashdata('feedback','Article Deleted Successfully');
            $this->session->set_flashdata('feedback-class','alert-success');
        }
        else{
            $this->session->set_flashdata('feedback','Article Deleted Falied');
            $this->session->set_flashdata('feedback-class','alert-danger');

        }

        return redirect('admin/dashboard');
        */
    }

    public function __construct()
    {

        parent::__construct(); //ei admin er parent hocche MY_Controller jehutu upore extends kora hoyeche. :)

        if (!$this->session->userdata('user_id')) {

            return redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('articlesmodel', 'articles');
    }
    private function _flashAndRedirect($successful,$successMessage,$failureMessage){

        if ($successful){

            $this->session->set_flashdata('feedback',$successMessage);
            $this->session->set_flashdata('feedback-class','alert-success');

        }
        else{
            $this->session->set_flashdata('feedback',$failureMessage);
            $this->session->set_flashdata('feedback-class','alert-danger');

        }
        return redirect('admin/dashboard');

    }


}

