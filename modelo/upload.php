<?php
	//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	//echo "Type: " . $_FILES["file"]["type"] . "<br>";
//include "ControlImagenes.php";

	//$controlImagenes = new ControlImagenes();
	
	//if ($controlImagenes->subir($src, $comments)){
		if (file_exists("../dirImagenes/" . $_FILES["Filedata"]["name"]))
		{
			echo "(".$_FILES["Filedata"]["name"].")"." already exists. "."</div>";
		}else{
			move_uploaded_file($_FILES["Filedata"]["tmp_name"], "../dirImagenes/" . $_FILES["Filedata"]["name"]);
			echo "Stored in: " ."dirImagenes/" . $_FILES["Filedata"]["name"]."";
		}
	//}
?>