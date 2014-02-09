<?php
	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	echo "Type: " . $_FILES["file"]["type"] . "<br>";

	if (file_exists("C:\Users\sgarcesm\Desktop\Cosas/" . $_FILES["file"]["name"]))
	{
		echo "(".$_FILES["file"]["name"].")"." already exists. "."</div>";
	}else{

		move_uploaded_file($_FILES["file"]["tmp_name"], "C:\Users\sgarcesm\Desktop\Cosas/" . $_FILES["file"]["name"]);
		echo "Stored in: " ."C:\Users\sgarcesm\Desktop\Cosas/" . $_FILES["file"]["name"]."";
	}
?>