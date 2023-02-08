<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Model {


  public function selectOthers() {
    $sql = "select o.id_objet, o.designation, o.description, o.prix, o.id_client, p.designation as source from objet as o join photo as p on o.id_objet = p.id_objet where id_client != " . $this->session->userdata("client")["id_client"] . '  order by id_objet desc';
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
    return $reponse;
  }

  public function selectMine() {
    $sql = "select o.id_objet, o.designation, o.description, o.prix, o.id_client, p.designation as source from objet as o join photo as p on o.id_objet = p.id_objet where id_client = " . $this->session->userdata("client")["id_client"] . ' order by id_objet desc';
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
    return $reponse;
  }

}
