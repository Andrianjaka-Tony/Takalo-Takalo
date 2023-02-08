<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller {

	public function index() {
    $id_categorie = $this->input->get("id_categorie");
    $titre = $this->input->get("titre");

    // $this->db->where("id_categorie", $id_categorie);
    // $this->db->like("designation", $titre);
    // $tableau = $this->db->get("objet");
    $sql = "select * from objet where designation LIKE '%".$titre."%'  and id_categorie = ".$id_categorie;
    $query = $this->db->query($sql);
    $table = $query->result_array();

    // var_dump($tableau);
    // $table = array();
    // $table = $tableau->result_array();
    
    for ($i=0; $i < count($table); $i++) {
      echo $table[$i]["description"] . " " . $table[$i]["designation"] . " " . $table[$i]["prix"] . "<br>";
    }
  }

}
