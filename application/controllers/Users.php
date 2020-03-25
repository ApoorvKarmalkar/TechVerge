<?php
class Users extends MY_Controller {
  public function index() {
    $this->load->model('login_model');
    $config = [
      'base_url'=>base_url('users/index'),
      'per_page'=>8,
      'total_rows'=>$this->login_model->totalArticles(),
      'full_tag_open'=>'<ul class="pagination mt-3">',
      'full_tag_close'=>'</ul>',
      'first_tag_open'=>'<li class="page-item page-link">',
      'first_tag_close'=>'</li>',
      'last_tag_open'=>'<li class="page-item page-link">',
      'last_tag_close'=>'</li>',
      'next_tag_open'=>'<li class="page-item page-link">',
      'next_tag_close'=>'</li>',
      'prev_tag_open'=>'<li class="page-item page-link">',
      'prev_tag_close'=>'</li>',
      'num_tag_open'=>'<li class="page-item page-link">',
      'num_tag_close'=>'</li>',
      'cur_tag_open'=>'<li class="page-item page-link"><a>',
      'cur_tag_close'=>'</a></li>'
    ];
    $this->pagination->initialize($config);
    $data['articles'] = $this->login_model->allArticleList($config['per_page'],$this->uri->segment(3));
    $this->load->view('users/home',$data);
  }
  public function showArticle($id) {
    $this->load->model('login_model');
    if ($data['article'] = $this->login_model->findArticle($id)) {
      $this->load->view('users/show_article',$data);
    }
    else {
      echo "An error has occurred, please try again!";
    }
  }
}
