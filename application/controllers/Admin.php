<?php
class Admin extends MY_Controller {
  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('id')) {
      return redirect('login/index');
    }
  }
  public function welcome() {
      $this->load->model('login_model');
      $config = [
        'base_url'=>base_url('admin/welcome'),
        'per_page'=>2,
        'total_rows'=>$this->login_model->totalRows(),
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
      $data['articles'] = $this->login_model->articleList($config['per_page'],$this->uri->segment(3));
      $this->load->view('admin/dashboard', $data);
  }
  public function logout() {
    $this->session->sess_destroy('id');
    return redirect('login/index');
  }
  public function addArticle() {
    $config = [
      'upload_path'=>'./upload/',
      'allowed_types'=>'gif|jpg|png'
    ];
    $this->load->library('upload',$config);
    if ($this->form_validation->run('add_article_rules') && $this->upload->do_upload('image') ) {
      $articlePost = $this->input->post();
      $data = $this->upload->data();
      $imagePath = base_url('upload/'.$data['raw_name'].$data['file_ext']);
      $articlePost['image'] = $imagePath;
      $this->load->model('login_model');
      if ($this->login_model->insertArticle($articlePost)) {
        $this->session->set_flashdata('article_added','Article added successfully');
        return redirect('admin/welcome');
      }
      else {
        $this->session->set_flashdata('article_not_added','Article not added. Please try again!');
        return redirect('admin/welcome');
      }
    }
    else {
      $data['uploadError'] = $this->upload->display_errors();
      $this->load->view('admin/add_article',$data);
    }
  }
  public function delArticle() {
    $id = $this->input->post('id');
    $this->load->model('login_model');
    if ($this->login_model->removeArticle($id)) {
      $this->session->set_flashdata('article_deleted','Article deleted successfully');
    }
    else {
      $this->session->set_flashdata('article_not_deleted','Article not deleted. Please try again!');
    }
    return redirect('admin/welcome');
  }
  public function editArticle($id) {
    $this->load->model('login_model');
    if ($data['article'] = $this->login_model->findArticle($id)) {
      $this->load->view('admin/edit_article',$data);
    }
    else {
      echo "Article not fetched";
    }
  }
  public function changeArticle($id) {
    $this->load->model('login_model');
    if ($this->form_validation->run('add_article_rules')) {
      if ($this->login_model->updateArticle($id,$this->input->post())) {
        $this->session->set_flashdata('article_updated','Article updated successfully');
      }
      else {
        $this->session->set_flashdata('article_not_updated','Article not updated. Please try again!');
      }
      return redirect('admin/welcome');
    }
    else {
      $data['article'] = $this->login_model->findArticle($id);
      $this->load->view('admin/edit_article',$data);
    }
  }
}
