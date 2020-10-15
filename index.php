<?php

include_once "config.php"; 
include_once "function.php"; 

$pahtBig = "big/" .$_FILES["photo"]["name"];
$pahtSmall = "small/";
$tmpPaht = "tmpPaht/";
	if (!empty($_FILES)) {
		$name = resize($_FILES['photo']);
 			if (!@copy($tmpPaht . $name, $pahtSmall.$name)){
 				echo '<p>Что-то пошло не так.</p>';
 			}
	 	move_uploaded_file($_FILES["photo"]["tmp_name"], $pahtBig);
	 	unlink($tmpPaht . $name);
	 	$idImg = mysqli_query($connect,"SELECT id FROM images WHERE name_img = '".$_FILES['photo']['name']."'");
	 	
	 	$output = mysqli_fetch_assoc($idImg); 
	 	
	 	if ($output['id']) {
	 	}else{
	 		mysqli_query($connect, "INSERT INTO images(name_img,size_img,paht_img_small,paht_img_big) VALUES ('".$_FILES['photo']['name']."',
	 		'".$_FILES['photo']['size']."', '".$pahtSmall.$_FILES['photo']['name']."','".$pahtBig."')");
	 			}
	 			$pachImg = mysqli_query($connect,"SELECT paht_img_small,paht_img_big FROM images ");
	 			while ($pachImgs = mysqli_fetch_assoc($pachImg)) {
	 				echo "<a href = '".$pachImgs['paht_img_big']."'><img src='".$pachImgs['paht_img_small']."'></a>";
	 	} 
 
	 	?>
	
<?php
	}else{
		echo "что-то пошло не так!";
	}


 ?>
 