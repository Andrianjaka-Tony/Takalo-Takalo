<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Historique extends CI_Controller {

  public function index() {
    $id_objet = $this->input->get("id_objet");
    $result = $this->db->query("select h.date, o.designation, o.description, o.prix, o.id_objet, c.pseudo from historique as h join objet as o on o.id_objet = h.id_objet join client as c on c.id_client = h.id_client where o.id_objet = $id_objet order by date asc");
    $data = array();
    $data["histoire"] = $result->result_array();
    $this->load->view("historique", $data);
  }
	
}
