<?php

class Echange extends CI_Model {
  public function myObject(){
    $idClient = $this->session->userdata("client")["id_client"];
    $sql = "select * from objet where id_objet in (select objet_receiver from echange where id_receiver = ".$idClient." and state = 0) order by id_objet asc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function otherObject(){
    $idClient = $this->session->userdata("client")["id_client"];
    $sql = "select * from objet where id_objet in (select objet_sender from echange where id_receiver = ".$idClient." and state = 0) order by id_objet asc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function echanges() {
    $idClient = $this->session->userdata("client")["id_client"];
    $query = "select e.*, o1.designation as desi1, o1.description as desc1, o1.prix as p1, o2.designation as desi2, o2.description as desc2, o2.prix as p2 from echange as e join objet as o1 on o1.id_objet = e.objet_sender join objet as o2 on o2.id_objet = e.objet_receiver where id_receiver = $idClient and state = 0";
    $query = $this->db->query($query);
    return $query->result_array();
  }

}

?>