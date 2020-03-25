<?php
class Login_model extends CI_Model {
  public function isValidate($username,$password) {
    $query = $this->db->get_where('users',['username'=>$username,'password'=>$password]);
    if($query->num_rows()) {
      return $query->row()->id;
    }
    else {
      return false;
    }
  }
  public function totalRows() {
    $user_id = $this->session->userdata('id');
    $query = $this->db->select(['id','title'])
                      ->from('articles')
                      ->where(['user_id'=>$user_id])
                      ->get();
    return $query->num_rows();
  }
  public function totalArticles() {
    return $this->db->get('articles')->num_rows();
  }
  public function articleList($limit,$offset) {
    $user_id = $this->session->userdata('id');
    $query = $this->db->select(['id','title'])
                      ->from('articles')
                      ->where(['user_id'=>$user_id])
                      ->limit($limit,$offset)
                      ->order_by('id','desc')
                      ->get();
    return $query->result();
  }
  public function allArticleList($limit,$offset) {
    $query = $this->db->select()
                      ->from('articles')
                      ->limit($limit,$offset)
                      ->order_by('id','desc')
                      ->get();
    return $query->result();
  }
  public function insertArticle($articlePost) {
    return $this->db->insert('articles',$articlePost);
  }
  public function addUser($userData) {
    return $this->db->insert('users',$userData);
  }
  public function removeArticle($id) {
    return $this->db->delete('articles',['id'=>$id]);
  }
  public function findArticle($id) {
    $query = $this->db->select()
                      ->from('articles')
                      ->where(['id'=>$id])
                      ->get();
    return $query->row();
  }
  public function updateArticle($id,$article) {
    return $this->db->where(['id'=>$id])
                    ->update('articles',$article);
  }
}
