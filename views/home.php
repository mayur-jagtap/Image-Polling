<?php
error_reporting(0); 
?> 
<?php

// If upload button is clicked ... 
if (isset($_POST['upload'])) { 
$db = mysqli_connect("your database details"); 

	$filename = $_FILES["uploadfile"]["name"]; 
	$tempname = $_FILES["uploadfile"]["tmp_name"];	 
		$folder = "image/".$filename; 
		
	
$mysess = $_SESSION['id'];

		// Get all the submitted data from the form 
		$sql = "INSERT INTO images (image_path,userid) VALUES ('$filename','$mysess')"; 

		// Execute query 
		mysqli_query($db, $sql); 
		
		// Now let's move the uploaded image into the folder: image 
		 
                 $info = getimagesize($tempname);
            if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($tempname);
            elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($tempname);
            elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($tempname);
           
            imagejpeg($image, $folder, 50);
             

} 

?> 


   <a class="btn btn-success float-right  mr-2" href="?function=logout">Logout</a>

      
    <div class="row justify-content-center mt-5">
<div class="col-sm-3 bg-light mt-4 px-4 p-2 rounded">
<form method="POST" action="" enctype="multipart/form-data" id="form"> 
<div class="form-group">
<div class="custom-file">
	<input type="file" name="uploadfile" class="custom-file-input" id="imagesad" value=""/> 
         <label class="custom-file-label" for="imagesad">Choose File</label>
		</div>
                </div>
	<div class="form-group"> 
		<input type="submit" class="btn  btn-block" style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
" name="upload" value="Upload">
		</div> 
                    
                      
             
                
</form> 
</div> 
</div>
<div class="container">
 <?php 
    	$db = mysqli_connect("your database details"); 
    $swl =  "SELECT * FROM images WHERE userid='".mysqli_real_escape_string($db,$_SESSION['id'])."' ORDER BY id DESC";
    $result = mysqli_query($db, $swl); 
    $data ='';
while($row=$result->fetch_assoc()){
  $data.= '<div class="item2">
    <img class="big" src="image/'.$row['image_path'].'">
    </div>';
}
  echo '<div class="masonry">'.$data.'</div>';
    ?>
    
</div>
<div class="container d-flex justify-content-center align-items-center text-white pb-3">
<img src="https://img.icons8.com/bubbles/2x/quote-left.png"><br>
<h1 style="font-family: 'Montserrat', sans-serif;">Memories are always good, but there's always your favourite memory, Let's Choose It.</h1><br>

</div>
<div class="container text-center text-white pb-3">
<?php
echo '<a style="color: wheat;" href="views/voting.php?vote='.$_SESSION['id'].'"><i class="fa fa-camera mr-2" aria-hidden="true"></i>Favourite Images</a>';
?>
</div>


