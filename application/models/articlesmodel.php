<?php

class Articlesmodel extends CI_Model
{
    public function articles_list($limit, $offset)
    {

        $this->load->library('session');

        $user_id = $this->session->userdata('user_id');

        $query = $this->db
            ->select(['title', 'id'])
            ->from('articles')
            ->limit($limit, $offset)
            ->where('user_id', $user_id)
            ->get();
        // print_r($query);

        return $query->result();
    }

    public function all_articleList($limit, $offset)
    {

        $this->load->library('session');

        $query = $this->db
            ->select(['title', 'id','article_date'])
            ->from('articles')
            ->limit($limit, $offset)
            ->order_by('article_date','DESC')
            ->get();

        return $query->result();

    }

    public function count_allArticles()
    {
        $this->load->library('session');
        $query = $this->db
            ->select(['title', 'id','article_date'])
            ->from('articles')
            ->get();
        return $query->num_rows();
    }

    public function num_rows()
    {

        $this->load->library('session');

        $user_id = $this->session->userdata('user_id');

        $query = $this->db
            ->select(['title', 'id','article_date'])
            ->from('articles')
            ->where('user_id', $user_id)
            ->get();
        // print_r($query);

        return $query->num_rows();


    }

    public function add_article($array)
    {

        return $this->db->insert('articles', $array);


    }

    public function find_article($articleId)
    {

        $q = $this->db
            ->select(['id', 'title', 'body','article_date'])
            ->where('id', $articleId)
            ->get('articles');

        return $q->row();


    }

    public function update_article($articleId, Array $article)
    {
        return $this->db
            ->where('id', $articleId)
            ->update('articles', $article);

    }

    public function delete_article($articleId)
    {

        return $this->db
            ->where('id', $articleId)
            ->delete('articles');
    }

    public function search_articles($query,$limit,$offset)
    {

        $q = $this->db
            ->from('articles')
            ->like('title', $query)
            ->limit($limit,$offset)
            ->get();
        /*
        $value = $this->db->last_query();
        print_r($value);
        */
        return $q->result();


    }

    public function count_SearchArticles($query)
    {

        $this->load->library('session');
         $q=$this->db
                 ->from('articles')
             ->like('title',$query)
             ->get();
         return $q->num_rows();

      /*
        $query = $this->db
            ->select('*')->where('title', $query)
            ->from('articles')
            ->limit($limit, $offset)
            ->get();
        $test = $query->result();

        */




    }

    public function count_allSearcharticleList($query,$limit,$offset)
    {

        $this->load->library('session');

        //$query = $this->db
            //->select(['title', $query])
           // ->from('articles')
          //  ->get();
      //  $query = $this->db->select('*')->where('title', $query)->get();
        $query = $this->db
           // ->select(['title', $query])
               ->select('*')
            ->from('articles')
            ->where('title',$query)

            ->limit($limit, $offset)
            //->where('user_id', $user_id)
            ->get();
        // print_r($query);

        return $query->result();


    }
    /*
    public function find_singleArticle($id){

        $q=$this->db
            ->from('articles')
            ->where('id',$id)
            ->get();
         if ($q->num_rows())
             return $q->rows();
         return false;


    }
    */
    public function find_singleArticle($id){

        $q=$this->db
                ->where('id',$id)
                ->get('articles');


        //print_r($q);



            return $q->row();

        //return false;




    }



}