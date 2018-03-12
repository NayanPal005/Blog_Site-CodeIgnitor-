<?php

class User extends MY_Controller{
    public function index()
    {

        $config=[
            'base_url'=>base_url('user/index'),
            'per_page'=>5,
            'total_rows'=>$this->articles->count_allArticles(),

            'full_tag_open'=>'<ul class="pagination">',
            'full_tag_close'=>'</ul>',

            'cur_tag_open'=>'<li class="active"><a>',
            'cur_tag_close'=>'</li>',
            'first_tag_open'=>'<li>',

            'first_tag_close'=>'</li>',
            'prev_tag_open'=>'<li>',
            'prev_tag_close'=>'</li>',

            'next_tag_open'=>'<li>',
            'next_tag_close'=>'</li>',

            'num_tag_open'=>'<li>',
            'num_tag_close'=>'</li>',


        ];

        $this->pagination->initialize($config);

        $articles = $this->articles->all_articleList($config['per_page'],$this->uri->segment(3));
       // $this->load->helper('html'); //autoload diye dynamically kora jai korsi
        //$this->load->helper('url');
       //$this->load->view('public/article_lists');




     // $articles= $this->articles->all_articleList();

      $this->load->view('public/article_lists.php',compact('articles'));

       //print_r($get);


    }
    /*
     //nije jeta korsi oitar jonno ei search without linit
    public  function search(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('query','Query','required');

        if (!$this->form_validation->run()){
            $this->index();
        }
        else{
            $query=$this->input->post('query');

            return redirect("user/search_results/$query");
                //erpor er kajta ami search_result() e kortesi



           // print_r($query);

          //  $this->load->model('articlesmodel','articles');

            //$this->articles->search_articles($query);

          // $this->load->view('public/searchArticles_list',compact('articles'));

        }

    }

     */



    public  function search(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('query','Query','required');

        if (!$this->form_validation->run()){
            $this->index();
        }
        else{
            $query=$this->input->post('query');

            return redirect("user/search_results/$query");
                //erpor er kajta ami search_result() e kortesi



           // print_r($query);

          //  $this->load->model('articlesmodel','articles');

            //$this->articles->search_articles($query);

          // $this->load->view('public/searchArticles_list',compact('articles'));

        }

    }

    public function search_results($query){
      // print_r($query);

       //$test=$this->articles->count_allSearchArticles($query);

       //print_r($test);
        $config=[
            'base_url'=>base_url('user/search_results/$query'),
            'per_page'=>4,
            'total_ rows'=>$this->articles->count_SearchArticles($query),

            'full_tag_open'=>'<ul class="pagination">',
            'full_tag_close'=>'</ul>',

            'cur_tag_open'=>'<li class="active"><a>',
            'cur_tag_close'=>'</li></a>',
            'uri_segment'=>4,

            'prev_tag_open'=>'<li>',
            'prev_tag_close'=>'</li>',

            'next_tag_open'=>'<li>',
            'next_tag_close'=>'</li>',

            'num_tag_open'=>'<li>',
            'num_tag_close'=>'</li>',


        ];

        $this->pagination->initialize($config);

        $articles=$this->articles->search_articles($query,$config['per_page'],$this->uri->segment(4));

         $this->load->model('articlesmodel','articles');

        // $articles=$this->articles->search_articles($query);

         $this->load->view('public/searchArticles_list',compact('articles'));



    }

    public function __construct()
    {
        parent::__construct(); //ei admin er parent hocche MY_Controller jehutu upore extends kora hoyeche. :)
        $this->load->model('articlesmodel','articles');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->model('articlesmodel','articles');
    }

}