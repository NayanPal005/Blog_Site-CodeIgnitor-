<?php
$config=[
    'add_article_rules'=>[

         [
             'field'=>'title',
             'label'=>'Article Title',
             'rules'=>'required|alpha|trim'
         ],
    [
        'field'=>'body',
        'label'=>'Article Body',
        'rules'=>'required'

    ]

   ]


];