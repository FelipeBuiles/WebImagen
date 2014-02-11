<?php
	//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	//echo "Type: " . $_FILES["file"]["type"] . "<br>";
//include "ControlImagenes.php";

	//$controlImagenes = new ControlImagenes();
	$src 			= $_FILES['file']['name'];
	$comments 		= "DESC PRUEBA";
	
	//if ($controlImagenes->subir($src, $comments)){
		if (file_exists("dirImagenes/" . $_FILES["file"]["name"]))
		{
			echo "(".$_FILES["file"]["name"].")"." already exists. "."</div>";
		}else{
			move_uploaded_file($_FILES["file"]["tmp_name"], "dirImagenes/" . $_FILES["file"]["name"]);
			//echo "Stored in: " ."dirImagenes/" . $_FILES["file"]["name"]."";
			header('location: /webimagen/www');
		}
	//}
?>