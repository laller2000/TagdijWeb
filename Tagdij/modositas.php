<?php
$modositas= filter_input(INPUT_POST, "modositas");
var_dump($_POST);
if($modositas!=null){
    $update= filter_input(INPUT_POST,'update',FILTER_VALIDATE_INT,FILTER_REQUIRE_ARRAY);
    $nev= filter_input(INPUT_POST,'nev', FILTER_SANITIZE_STRING,FILTER_REQUIRE_ARRAY);
    $szulev= filter_input(INPUT_POST,'szulev',FILTER_VALIDATE_INT,FILTER_REQUIRE_ARRAY);
    $irszam= filter_input(INPUT_POST,'irszam',FILTER_VALIDATE_INT,FILTER_REQUIRE_ARRAY);
    $orsz= filter_input(INPUT_POST,'orsz',FILTER_VALIDATE_INT,FILTER_REQUIRE_ARRAY);
    $azon= filter_input(INPUT_POST,'azon',FILTER_VALIDATE_INT,FILTER_REQUIRE_ARRAY);
    var_dump($szulev,$irszam);
    foreach ($_POST["update"] as $value) {
        $sql='UPDATE `ugyfel` SET '
                . '`nev`="'.$nev[$value].'"'
                . '`szulev`="'.$szulev[$value].'",'
                . '`irszam`="'.$irszam[$value].'",'
                . '`orsz`="'.$orsz[$value].'"'
                . ' WHERE `azon`='.$azon[$value];
        echo $sql;
        $conn->query($sql);
    }
}
?>
<h1>Módosítás</h1>
<form action="index.php?menu=modositas" method="POST">
<table>
    <thead>
    <tr>
        <th>Név</th>
        <th>Születési év</th>
        <th>Irányítóország</th>
        <th>Ország</th>
        <th>Modosítás</th>
    </tr>
</thead>
<tbody>
 <?php
 $sql="SELECT `azon`,`nev`,`szulev`,`irszam`,`orsz`FROM `ugyfel` WHERE 1";
 $result=$conn->query($sql);
 if($result->num_rows>0)
 {
     $index=0;
     while($row=$result->fetch_assoc())
     {
         echo '<tr><input type="hidden" name="azon[] value"'.$row["azon"].'">';
         echo '<td><input type="text" name="nev[]" value="'.$row["nev"].'"></td>';
         echo '<td><input type="number" name="szulev[]" value="'.$row["szulev"].'"></td>';
         echo '<td><input type="number" name="irszam[]" value="'.$row["irszam"].'"></td>';
         echo '<td><input type="text" name="orsz[]" value="'.$row["orsz"].'"></td>';
         echo '<td><input type="checkbox" name="update[]" value="'.$index++.'"></td>';
         echo '</tr>';
     }
 }else{
     echo '0 results';
 }
 ?>   
</tbody>
</table>
    <input type="submit" name="modosit" value="modositas"/>
 </form>