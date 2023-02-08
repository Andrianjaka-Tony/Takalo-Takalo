<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

  public function load() {

    if($this->session->userdata("client")["id_client"] != 0) {
      redirect("home");
    }

    $this->db->where("state", 1);
    $tableau = $this->db->get("echange");
    $echange = count($tableau->result_array());

    $this->db->select();
    $tableau = $this->db->get("client");
    $clients = count($tableau->result_array()) - 1;

    $data = array(
      'clients' => $clients,
      'echanges' => $echange
    );

    $this->load->view("admin", $data);
  }
  public function index() {

    $this->load();

  }

  public function insert() {
    $nom = $this->input->get("nom");
    $table = array(
      "id_categorie" => "null",
      "designation" => $nom
    );
    $this->db->insert("categorie", $table);
    $this->load();
  }
	
}
