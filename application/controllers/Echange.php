<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Echange extends CI_Controller {

  public function index() {
    $id_objet = $this->input->get("id_objet");
    $id_objet_e = $this->input->get("id_objet_e");
    $id_client = $this->input->get("id_client");

    $tableau = array(
      "id_echange" => "null",
      "id_sender" => $this->session->userdata("client")["id_client"],
      "id_receiver" => $id_client,
      "objet_sender" => $id_objet,
      "objet_receiver" => $id_objet_e,
      "state" => '0'
    );

    $this->db->insert("echange", $tableau);
    redirect(site_url("home"));
  }

  public function accepter() {
    $id_sender = $this->input->get("id_sender");
    $objet_sender = $this->input->get("objet_sender");
    $objet_receiver = $this->input->get("objet_receiver");
    $id_receiver = $this->session->userdata("client")['id_client'];

    $histo_1 = "insert into historique values($id_receiver, $objet_sender, now())";
    $histo_2 = "insert into historique values($id_sender, $objet_receiver, now())";
    $this->db->query($histo_1);
    $this->db->query($histo_2);
    $update_1 = "update objet set id_client = $id_receiver where id_objet = $objet_sender";
    $update_2 = "update objet set id_client = $id_sender where id_objet = $objet_receiver";
    $this->db->query($update_1);
    $this->db->query($update_2);
    $query = "update echange set state = 1 where id_sender = $id_sender and id_receiver = $id_receiver and objet_sender = $objet_sender and objet_receiver = $objet_receiver";
    $delete = "delete from echange where id_receiver = $id_receiver and objet_receiver = $objet_receiver and state = 0 or
    id_sender = $id_sender and objet_sender = $objet_sender and state = 0";
    $this->db->query($query);
    $this->db->query($delete);
    redirect(base_url("home/notif"));
  }
	
}
