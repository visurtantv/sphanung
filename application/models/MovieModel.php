<?php

class MovieModel extends CI_Model
{
  public function getMovie()
  {
    $query = $this->db->get('movies');
    return $query->result();
  }

  public function getTrailer()
  {
    $query = $this->db->get('trailers');
    return $query->result();
  }

  public function getReview()
  {
    $query = $this->db->get('reviews');
    return $query->result();
  }

  public function getPage()
  {
    $query = $this->db->get('pages');
    return $query->result();
  }

  public function getUser()
  {
    $query = $this->db->get('users');
    return $query->result();
  }

  public function insertReview()
  {
    date_default_timezone_set("Asia/Bangkok");
    $query = array(
      'userid' => $this->input->post('userid'),
      'score' => $this->input->post('score'),
      'rshort' => $this->input->post('review'),
      'movieid' => $this->input->post('movieid'),
      'date' => date('Y-m-d H:i:s')
    );
    $this->db->insert("reviews", $query);
  }

  public function signup()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $displayname = $this->input->post('name');
    $imagename = $_FILES["picture"]["name"];
    $picture = addslashes(file_get_contents($_FILES['picture']['tmp_name']));

    $insert_image = "INSERT INTO users(username, password, name, picture, imagename) VALUES('$username','$password','$displayname','$picture','$imagename')";

    $this->db->query($insert_image);
  }
}

?>