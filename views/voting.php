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
    	<link rel="stylesheet" href="../styles/styles.css">
   
  </head>
  
  <body>
    <a href="help.php" class="help" title="Help, How it works?"> <i class="fa fa-question-circle fa-4x" aria-hidden="true"></i> </a>
       <a class="btn btn-warning float-left mt-2 ml-2" href="http://outlookboard.atwebpages.com/">Back To Home</a>
     
 
    <div class="container">
 <?php 
    	$db = mysqli_connect("your database details"); 
    $swl =  "SELECT * FROM images WHERE userid='".mysqli_real_escape_string($db,$_GET['vote'])."' ORDER BY id DESC";
    $result = mysqli_query($db, $swl); 
    $data ='';
   $icon="<i class='fa fa-heart ' aria-hidden='true'></i>";
while($row=$result->fetch_assoc()){
if($row['bestimage']==1){
$data.= '<div class="item2">
<a class="imagea" userid="'.$_GET['vote'].'" name="'.$row['image_path'].'">
    <img class="big" src="../image/'.$row['image_path'].'"> '.$icon.'</a>
    </div>';
  
} else {
$data.= '<div class="item2">
<a class="imagea" userid="'.$_GET['vote'].'" name="'.$row['image_path'].'">
    <img class="big" src="../image/'.$row['image_path'].'"> </a>
    </div>';

}
 }
 echo '<div class="masonry">'.$data.'</div>';

    ?>
    </div>

  
   
  
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="../scripts/starterscript.js"></script>
    
  </body>
</html>

