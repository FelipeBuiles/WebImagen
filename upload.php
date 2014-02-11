<?php
	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	echo "Type: " . $_FILES["file"]["type"] . "<br>";

	if (file_exists("dirImagenes/" . $_FILES["file"]["name"]))
	{
		echo "(".$_FILES["file"]["name"].")"." already exists. "."</div>";
	}else{

		move_uploaded_file($_FILES["file"]["tmp_name"], "dirImagenes/" . $_FILES["file"]["name"]);
		echo "Stored in: " ."dirImagenes/" . $_FILES["file"]["name"]."";
	}
?>