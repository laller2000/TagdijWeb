<?php
header('Content-Type: text/html; charset="utf-8"');
session_start();
$menu = filter_input(INPUT_GET, "menu");
$servername="localhost";
$username="root";
$password="";
$databasename="tagdij";
$conn=new mysqli($servername,$username,$password,$databasename);
if($conn->connect_error)
{
    die("Adatbázis hiba".$conn->connect_error);
}
$conn->set_charset("utf-8");
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Tagdij nyílvántartás</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Tagok
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?menu=belepes">Új</a>
                  <a class="dropdown-item" href="index.php?menu=modositas">Módosítás</a>
                  <a class="dropdown-item" href="index.php?menu=torles">Törlés</a>
                </div>
                  <li class="nav-item active">
                <a class="nav-link" href="#">Befizetések</a>
              </li>
            </ul>
          </div>
        </nav>
        <?php
         require_once 'tartalom.php';
         $sql="SELECT `azon`,`nev`,`szulev`,`irszam`,`orsz` FROM `ugyfel` WHERE 1";
         $result=$conn->query($sql);
         if($result->num_rows>0)
         {
             ?>
            <table>
                <tr>
                    <th>azon</th>
                    <th>nev</th>
                    <th>szulev</th>
                    <th>irszam</th>
                    <th>orsz</th>
                </tr>
            <?php
             while($row=$result->fetch_assoc()){
                 echo '<tr><td>'.$row["azon"].'</td>';
                 echo '<td>'.$row["nev"].'</td>';
                 echo '<td>'.$row["szulev"].'</td>';
                 echo '<td>'.$row["irszam"].'</td>';
                 echo '<td>'.$row["orsz"].'</td>';
                 echo '</tr>';
             }
             echo '</table>';
         }else{
             echo '0 results';
         }
         $conn->close();
         
        ?>
      
       </div>
    </body>
</html>
