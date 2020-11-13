<?php

include("functions.php");

    
    if ($_GET['action'] == "loginSignup") {
        
        $error = "";
        
        if (!$_POST['email']) {
            
            $error = "An Username is required.";
            
        } else if (!$_POST['password']) {
            
            $error = "A password is required";
            
        } 
        
        if ($error != "") {
            
            echo $error;
            exit();
            
        }
        
        
        if ($_POST['loginActive'] == "0") {
            
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) $error = "That email address is already taken.";
            else {
                
                $query = "INSERT INTO users (`email`, `password`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    $_SESSION['id'] = mysqli_insert_id($link);
                    
                    $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                    mysqli_query($link, $query);
                    
                    echo 1;
                    
                    
                    
                } else {
                    
                    $error = "Couldn't create user - please try again later";
                    
                }
                
            }
            
        } else {
            
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
                if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                    
                    echo 1;
                    
                    $_SESSION['id'] = $row['id'];
                    
                } else {
                    
                    $error = "Could not find that username/password combination. Please try again.";
                    
                }

            
        }
        
         if ($error != "") {
            
            echo $error;
            exit();
            
        }
        
        
        
    }
    
    if ($_GET['action'] == "loginSignup2") {
        
        $error = "";
        
        if (!$_POST['email']) {
            
            $error = "An Username is required.";
            
        } else if (!$_POST['password']) {
            
            $error = "A password is required";
            
        } 
        
        if ($error != "") {
            
            echo $error;
            exit();
            
        }
        
        
        if ($_POST['loginActive'] == "0") {
            
            $query = "SELECT * FROM admin WHERE username = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) $error = "That email address is already taken.";
            else {
                
                $query = "INSERT INTO admin (`username`, `password`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    $_SESSION['id2'] = mysqli_insert_id($link);
                    
                    $query = "UPDATE admin SET password = '". md5(md5($_SESSION['id2']).$_POST['password']) ."' WHERE id = ".$_SESSION['id2']." LIMIT 1";
                    mysqli_query($link, $query);
                    
                    echo 1;
                    
                    
                    
                } else {
                    
                    $error = "Couldn't create user - please try again later";
                    
                }
                
            }
            
        } else {
            
            $query = "SELECT * FROM admin WHERE username = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
                if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                    
                    echo 1;
                    
                    $_SESSION['id2'] = $row['id'];
                    
                } else {
                    
                    $error = "Could not find that username/password combination. Please try again.";
                    
                }

            
        }
        
         if ($error != "") {
            
            echo $error;
            exit();
            
        }
        
        
        
    }
    
    
    
    if($_GET['action']=="voting"){
         $query = "SELECT * FROM images WHERE userid='".$_POST['userid']."' AND bestimage=1";
              $result = mysqli_query($link,$query);
              $data = mysqli_num_rows($result);
              if ($data<2){
    $query12 = "UPDATE images SET bestimage=1 WHERE userid='".$_POST['userid']."' AND image_path = '".$_POST['imagename']."'";
    $result2 = mysqli_query($link, $query12);
    echo 1;
  } else {
  echo "THere can only be 2 favourite images right now!";
  }
  
    
    }
?>