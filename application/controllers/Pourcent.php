<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pourcent extends CI_Controller {

  public function index() {
    // taux
    $taux = $this->input->get("taux");
    // prix
    $prix = $this->input->get("prix");

    // calcul
    $multiplicateur = $taux / 100;
    $min = $prix - ($prix * $multiplicateur);
    $max = $prix + ($prix * $multiplicateur);

    $sql = "select o.id_objet, o.designation, o.description, o.prix, o.id_client, p.designation as source from objet as o join photo as p on o.id_objet = p.id_objet where id_client != " . $this->session->userdata("client")["id_client"] . " and o.prix >= $min and o.prix <= $max order by id_objet desc";
    $result = $this->db->query($sql);
    $tableau = $result->result_array();
    $reponse = array();
    for ($i=0; $i < count($tableau); $i++) { 
      $count = 0;
      for ($j=0; $j < count($reponse); $j++) {
        if ($reponse[$j]["id_objet"] == $tableau[$i]["id_objet"])
          $count++;
      }
      if ($count == 0)
        $reponse[] = $tableau[$i];
    }

    $tableau = array(
      "resultat" => $reponse
    );
    $this->load->view("pourcentView", $tableau);
    
  }

}
