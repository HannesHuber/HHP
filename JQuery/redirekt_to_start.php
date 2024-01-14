<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


if (empty($_SESSION['WeK']) || $_SESSION['WeK']==0) {

echo"
 <script>
 setTimeout(function(){
     location = 'start.php'
   },0)
 </script>
";

}else
    $_SESSION['WeK']=$_SESSION['WeK'];

?>