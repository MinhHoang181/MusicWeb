<?php
    require_once("../connect.php");
    
	$name = $_POST["name"];
	$link = $_POST["link"];
	$description = $_POST["description"];

	$target_dir = "images/";
	$file_name = basename($_FILES["fileUpload"]["name"]);
	$target_file = $target_dir . $file_name;
	
	if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
	
	$sql = "INSERT INTO music (name, link, description, image)
			VALUES ('$name', $link, '$description', '$file_name')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		echo "Added successfully";
	}
	
?>