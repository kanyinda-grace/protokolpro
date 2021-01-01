<?php

class RaviKoQr
{
  public $server = "localhost";
  public $user = "root";
  public $pass = "";
  public $dbname = "protokole_bd";
	public $conn;
  public function __construct()
  {
  	$this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
  	if($this->conn->connect_error)
  	{
  		die("connection failed");
  	}
  }
 	public function insertQr($final,$qrDest,$qrHeure,$qrDate,$qrimage,$id_agent)
 	{
 			$sql = "INSERT INTO qrcode(demandeur,destinataire,qr_Img,id_agent,heure_qr,date_qr) VALUES('$final','$qrDest','$qrimage','$id_agent','$qrHeure','$qrDate')";
 			$query = $this->conn->query($sql);
 			return $query;

 	
 	}
 	public function displayImg()
 	{
 		$sql = "SELECT * from qrcode where qr_Img='$qrimage'";

 	}
}
$meravi = new RaviKoQr();