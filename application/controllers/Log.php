<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Log extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view("login");
	}		

  public function signin() {
    $array = array(
      "email" => $this->input->post("email"),
      "password" => $this->input->post("mot_de_passe")
    );
    $this->db->where($array);
    $tableau = $this->db->get("client")->result_array();
    if(count($tableau) == 0) {
      echo 3;
      return;
    }
    $this->session->set_userdata("client", $tableau[0]);
    echo 4;
  }
  public function signup() {
    $this->load->model("Login");

    $array = array(
      "id_client" => "null",
      "pseudo" => $this->input->post("pseudo"),
      "email" => $this->input->post("email"),
      "password" => $this->input->post("mot_de_passe")
    );
    $data = array($array);
    if($this->Login->exist($array["email"]) != 0) {
      echo 1;
      return;
    }
    $this->db->insert("client", $array);
    echo 2;
  }

}
