<?php 
include("../functioning/functions.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    	<link rel="stylesheet" href="http://outlookboard.atwebpages.com/admin/admin.css">
    <title>Work Sample</title>
  </head>
  
  <body>
     
            <?php 
            if ($_SESSION['id2']) { ?>
        
        <a class="btn btn-success mr-2 mt-2 float-right" href="?function=logout">Logout</a>
     
        <div class="container text-center text-white">
       
          <div class="row d-flex justify-content-center align-items-center">

  <img style="width:75px; height:75px;" src="https://img.icons8.com/bubbles/2x/user-male.png" >
  <h4 class="display-4 text-center text-white">Users Lists</h4> 
  </div>
         
         <hr>
        <?php
                  $query = "SELECT * FROM users";
            $result2 = mysqli_query($link, $query);
            while($row1=$result2->fetch_assoc()){
        echo "<strong>Username - </strong>".$row1['email'];
        
         $sql45 = "SELECT * FROM images WHERE userid=".$row1['id']."";
        $result45= mysqli_query($link,$sql45);
        
   $data = '';
   $icon="<i class='fa fa-heart text-dark' aria-hidden='true'></i>";
  while($row=$result45->fetch_assoc()){
 
 
  
  if($row['bestimage']==1){
$data.= '<div class="item2">
<a >
    <img class="big" src="../image/'.$row['image_path'].'"> '.$icon.'</a>
    </div>';
  
} else {
$data.= '<div class="item2">
<a >
    <img class="big" src="../image/'.$row['image_path'].'"> </a>
    </div>';

}
 
 
 }
 echo '<div class="masonry">'.$data.'</div>';
        
        }
        
        ?>
      </div>
      <?php } else { ?>
      <div class="row d-flex justify-content-center align-items-center">

  <img src="https://img.icons8.com/plasticine/2x/camera.png" style="width:85px; height: 85px;">
  <h4 class="display-4 text-center text-white">OutLook Board</h4> 
  </div>
   <div class="container h-100">
        <h1 class="text-white text-center">Admin Panel</h1>
      
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
                                        
						<img src="https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form>
					    <div class="alert alert-danger" id="loginAlert"></div>
					     <input type="hidden" name= "loginActive" value="1" id="loginActive">
                                            <p class="text-white" >  Use admin As Username and Password </p>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="" class="form-control input_user" value="" placeholder="Username" id="email">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="" class="form-control input_pass" value="" id="password" placeholder="Password">
						</div>
					
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="button" name="button" class="btn login_btn" id="loginbutton">Login</button>
				   </div>
					</form>
				</div>
		
			</div>
		</div>
	</div>
      
      <?php } ?>
      
     
   
    	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="admin.js"></script>
    
  </body>
</html>