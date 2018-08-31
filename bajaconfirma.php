
<?php

session_start();


$k = array_keys($_GET);
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
if (!isset($_SESSION['lang'])) { $_SESSION['lang'] = 'en'; }

if     ($_SESSION['lang'] == 'en') { include_once("lang_en.php"); }
elseif ($_SESSION['lang'] == 'es') { include_once("lang_es.php"); }
elseif ($_SESSION['lang'] == 'pt') { include_once("lang_pt.php"); }
elseif ($_SESSION['lang'] == 'it') { include_once("lang_it.php"); }

  include('./databases/databasename.php');
$direccionBaja= "/send_baja.php";


if (isset($_SESSION['useremail'])){ 

echo   "<h2>".$l_mensajebaja1."</h2>";
echo  " <p style='text-align: center;'>".$l_mensajebaja2."</p>";
echo  " <p style='text-align: center;'>".$l_mensajebaja3."</p>";
echo " <p style='text-align: center;'>".$l_mensajebaja4."</p>";

echo " <p style='text-align: center;'>".$l_mensajebaja5."</p>";

$imagen="https://yfys.eu/wp-content/uploads/2018/05/confirmaborrar.png";
echo " <p style='text-align: center;'>" ;
echo "<a href='.$direccionBaja'>";
    
    echo "<img src='$imagen' style='border:0;' width='63' height='63' />";

echo "</a>";
echo "</p>";


         
    
}
else
{
echo " <p style='text-align: center;'>".$l_mensajebaja6."</p>";
}

?>