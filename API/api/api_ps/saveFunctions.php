<?php include_once 'connection.php';
class Save{
	public function saveTransit(){
		if (!empty($_POST)) {
		    $idColi = $_POST['idColi'];
		    $idTransporteur = $_POST['idTransporteur'];
		    $idTransitaire = $_POST['idTransitaire'];
		    $idRelais = $_POST['idRelais'];
		    $idCentreTri = $_POST['idCentreTri'];
		    $date=strtoupper(date("Y-m-d h:i:s"));

		    $verifyStateColi="SELECT * from coli where code='".$idColi."'";
		    $resultStateColi=mysqli_query(Constants::connect(),$verifyStateColi);
		    if(mysqli_num_rows($resultState)<=0){
		    	echo json_encode("not found");
		    }
		    else{
			    $verifyState="SELECT * from transaction where ref_coli='".$idColi."' and ref_agent='".$idCentreTri."' and statut='Transit'";
			    $resultState=mysqli_query(Constants::connect(),$verifyState);
			    if(mysqli_num_rows($resultState)>0){
			    	echo json_encode("exists");
			    }
			    else{
				    $query = "INSERT INTO transaction (`ref_coli`, `ref_transpo_agent`, `ref_transit_agent`, `ref_agent`, `statut`, `relais_suivant`, updated_at) VALUES ('".$idColi."','".$idTransporteur."','".$idTransitaire."','".$idCentreTri."','Transit','".$idRelais."','".$date."')";

				    $result =mysqli_query(Constants::connect(),$query);

				    echo($result)
				    ? json_encode("Save succes")
				    : json_encode("Save error");
				}
			}
		}
	}

	public function saveTriage(){
		if (!empty($_POST)) {
		    $idColi = $_POST['idColi'];
		    $idCentreTri = $_POST['idCentreTri'];
		    $date=strtoupper(date("Y-m-d h:i:s"));

		    $verifyStateColi="SELECT * from coli where code='".$idColi."'";
		    $resultStateColi=mysqli_query(Constants::connect(),$verifyStateColi);
		    if(mysqli_num_rows($resultState)<=0){
		    	echo json_encode("not found");
		    }
		    else{
			    $verifyState="SELECT * from transaction where ref_coli='".$idColi."' and ref_agent='".$idCentreTri."' and statut='triage'";
			    $resultState=mysqli_query(Constants::connect(),$verifyState);
			    if(mysqli_num_rows($resultState)>0){
			    	echo json_encode("exists");
			    }
			    else{
				    $query = "INSERT INTO transaction (`ref_coli`, `ref_agent`, `statut`, updated_at) VALUES ('".$idColi."','".$idCentreTri."','Triage','".$date."')";

				    $result =mysqli_query(Constants::connect(),$query);

				    echo($result)
				    ? json_encode("Save succes")
				    : json_encode("Save error");
				}
			}
		}
	}
}
$saveInstance=new Save();
if(strtolower($_POST['transaction'])=="transit"){
	$saveInstance->saveTransit();
}
else if(strtolower($_POST['transaction'])=="triage"){
	$saveInstance->saveTriage();
}
?>