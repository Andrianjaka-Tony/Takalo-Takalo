<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Upload extends CI_Controller {

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

		$this->db->select_max("id_photo");
		$tableau = $this->db->get("photo");
		$valeur = 0;
		if($tableau->result_array()[0]['id_photo'] > 0) {
			$valeur = $tableau->result_array()[0]['id_photo'];
		}

		$array = array(
			"id_objet" => "null",
			"designation" => $this->input->post("designation"),
			"description" => $this->input->post("description"),
			"prix" => $this->input->post("prix"),
			"id_client" => $this->session->userdata("client")["id_client"],
			"id_categorie" => $this->input->post("id_categorie")
		);
		$this->db->insert("objet", $array);


		$this->db->select_max("id_objet");
		$tab = $this->db->get("objet");
		$objet_max = $tab->result_array()[0]['id_objet'];

		$id_client = $this->session->userdata("client")["id_client"];
		$histo = "insert into historique values($id_client, $objet_max, now())";
		$this->db->query($histo);


		$dossier = 'assets/image/';
    $files = $_FILES['files'];
    foreach($files['name'] as $key => $value) {
			$valeur++;
			$photo = array(
				"id_photo" => $valeur,
				"designation" => "$valeur.png",
				"id_objet" => $objet_max
			);	
			$this->db->insert("photo", $photo);

      $fileName = "$valeur.png";
      $fileTmpName = $files['tmp_name'][$key];
      $fileSize = $files['size'][$key];
      $fileError = $files['error'][$key];
      $fileType = $files['type'][$key];
  
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
  
      $allowed = array('jpg', 'jpeg', 'png', 'svg');
  
      if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
          if($fileSize < 1000000) {
            $fileDestination = $dossier.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
						echo 5;
          } else {
            echo "Your file is too big!";
          }
        } else {
          echo "There was an error uploading your file!";
        }
      } else {
        echo "You cannot upload files of this type!";
      }
    }
		
		// $target_dir = "assets/image/";
		// $target_file = $target_dir . 'popo.jpg';
		// $uploadOk = 1;
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// if(isset($_POST["submit"])) {
		// 	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		// 	if($check !== false) {
		// 			echo "File is an image - " . $check["mime"] . ".";
		// 			$uploadOk = 1;
		// 	} else {
		// 			echo "File is not an image.";
		// 			$uploadOk = 0;
		// 	}
		// }
		// if (file_exists($target_file)) {
		// 	echo "Sorry, file already exists.";
		// 	$uploadOk = 0;
		// }
		// if ($_FILES["fileToUpload"]["size"] > 500000) {
		// 	echo "Sorry, your file is too large.";
		// 	$uploadOk = 0;
		// }
		// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		// && $imageFileType != "gif" ) {
		// 	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		// 	$uploadOk = 0;
		// }
		// if ($uploadOk == 0) {
		// 		echo "Sorry, your file was not uploaded.";
		// } else {
		// 	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		// 		echo 5;
		// 	} else {
		// 		echo "Sorry, there was an error uploading your file.";
		// 	}
		// }
	}

}
