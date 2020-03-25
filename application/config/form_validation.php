<?php
$config = [
  'add_article_rules'=>[
    [
      'field'=>'title',
      'label'=>'Article Title',
      'rules'=>'trim|required|max_length[100]'
    ],
    [
      'field'=>'body',
      'label'=>'Article Content',
      'rules'=>'required'
    ]
  ]
];
