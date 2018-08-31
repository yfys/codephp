<?php


session_start();


$k = array_keys($_GET);
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
if (!isset($_SESSION['lang'])) { $_SESSION['lang'] = 'en'; }

if     ($_SESSION['lang'] == 'en') { include_once("lang_en.php"); }
elseif ($_SESSION['lang'] == 'es') { include_once("lang_es.php"); }
elseif ($_SESSION['lang'] == 'pt') { include_once("lang_pt.php"); }
elseif ($_SESSION['lang'] == 'it') { include_once("lang_it.php"); }

  //include('./databases/databasename.php');
       require_once('./databases/databasename.php');


//ini_set( 'display_errors', 1 );
//error_reporting( E_ALL );
 

if (!isset($_POST['email']) && !isset($_POST['password']))
{
    
 
      echo $l_nuevomensa;
 
}
else{
      // declarado los campos
  
       $email =$_POST['email'];
       $password = $_POST['password'];
    
 

       $link = mysqli_connect(SERVERMYSQL, USER, PASS, DATABASE);
 
        if (mysqli_connect_errno()) {
            
            exit();
        }
    
       $email=mysqli_real_escape_string($link,$email);
       $queryobtenid = "SELECT ID, PASSWORD, IDINST  FROM ".TABLE_CONTACTPERSON." WHERE EMAIL = '".$email."'";
   
        if ($resultado = mysqli_query($link, $queryobtenid)) {
 
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row['ID'];
                $idinst = $row['IDINST'];
                $passguarda= $row['PASSWORD']; 
                $passwordok= password_verify($password,$row['PASSWORD']);
            }
         if ($passwordok)
                {  // BORRADO DEL SISTEMA
                 $query1="DELETE FROM  ".TABLE_CONTACTPERSON."  WHERE ID =". $id." AND EMAIL = '". $email."'";
                 $query2="DELETE FROM  ".TABLE_PROJECT." WHERE IDCONTACT =". $id ;
                 $query3="DELETE FROM ".TABLE_INSTITUTION." WHERE ID =". $idinst ;
               
                 if ($result = mysqli_query($link, $query1)) 
                     if($resultado = mysqli_query($link, $query2))
                         if($resultadon = mysqli_query($link, $query3))
                             {
                             unset($_SESSION['userlogin']);
                             unset($_SESSION['useremail']);
                             echo $l_mensajebajadelok;
			                 }
     
             
             
             // FIN DEL BORRADO
         }
        else
        {
            echo $l_passfail;
        }


    
 
}
 
  mysqli_close($link);
}
?>