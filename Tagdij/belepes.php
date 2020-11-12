<h1>Belépés</h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="index.php?menu=belepes" method="POST">
    <label>AZON:</label>
    <input type="number" id="azon"/>
    <label>Nev:</label>
    <input type="text" id="nev"/>
    <label>Szulev:</label>
    <input type="number" id="szulev"/>
    <label>irszam:</label>
    <input type="number" id="irszam"/>
    <label>orsz:</label>
    <input type="text" id="orsz"/>
    <button type="submit" id="button">SAVE</button>
</form>
<script>
    $(document).ready(function(){
    $("#button").click(function(){
     var azon=$("#azon").val();
     var nev=$("#nev").val();
     var szulev=$("#szulev").val();
     var irszam=$("#irszam").val();
     var orsz=$("#orsz").val();
     $.ajax({
        url:'index.php?menu=belepes',
        method:'POST',
        data:{
          azon:azon,
          nev:nev,
          szulev:szulev,
          irszam:irszam,
          orsz:orsz
        },
        success:function(data){
            alert(data);
        }
     });
    });    
    });
</script>
<?php
$azon= filter_input(INPUT_POST,"azon", FILTER_VALIDATE_INT);
$nev= filter_input(INPUT_POST,"nev", FILTER_SANITIZE_STRING);
$szulev= filter_input(INPUT_POST,"szulev",FILTER_VALIDATE_INT);
$irszam= filter_input(INPUT_POST,"irszam",FILTER_VALIDATE_INT);
$orsz= filter_input(INPUT_POST,"orsz",FILTER_SANITIZE_STRING);
$sql="INSERT INTO `ugyfel`(`azon`, `nev`, `szulev`, `irszam`, `orsz`) VALUES ('$azon','$nev','$szulev','$irszam','$orsz')";
if($conn->query($sql)===TRUE)
{
    echo 'data inserted';
}else{
    echo 'failed';
}
?>