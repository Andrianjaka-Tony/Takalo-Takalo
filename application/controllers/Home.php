<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

  public function index() {
    if(count($this->session->has_userdata("client")) == 0) {
      redirect(site_url("log"));
    }
		$tableau = array();
		$this->load->model("Produits");
		$tableau["resultat"] = $this->Produits->selectOthers();
		$this->load->view("home", $tableau);
  }

	public function produit() {
    if(count($this->session->has_userdata("client")) == 0) {
      redirect(site_url("log"));
    }
		$tableau = array();
		$this->load->model("Produits");
		$tableau["resultat"] = $this->Produits->selectMine();
		$this->load->view("produit", $tableau);
  }

	public function echanger() {
		if(count($this->session->has_userdata("client")) == 0) {
      redirect(site_url("log"));
    }
		$tableau = array();
		$this->load->model("Produits");
		$tableau["resultat"] = $this->Produits->selectMine();

		$get = $this->input->get("id_objet");
		$query = "select o.id_objet, o.designation, o.description, o.prix, o.id_client, p.designation as source from objet as o join photo as p on o.id_objet = p.id_objet where o.id_objet = $get order by o.id_objet desc limit 1";
		$resultat = $this->db->query($query);
		$tableau["echange"] = $resultat->result_array();

		$t = $this->db->query("select id_client from objet where id_objet = $get");
		$tableau["client"] = $t->result_array();

		$this->load->view("echange", $tableau);
	}

	public function notif() {
		if(count($this->session->has_userdata("client")) == 0) {
      redirect(site_url("log"));
    }
		$this->load->model("Echange");
		$tableau = array();
		$tableau["echange"] = $this->Echange->echanges();

		$this->load->view("notif", $tableau);
	}


}
