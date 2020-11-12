<h1>Tőrlés</h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="index.php?menu=torles">
    <label>Azon:</label>
    <input type='number' id='azon'/>
    <button type="submit" id="button"/>Delete</button>
</form>
<script>
 $(document).ready(function(){
 $("#button").click(function(){
    var azon=$("#azon").val();
    $.ajax({
       url:'index.php?menu=torles',
       method:'POST',
       data:{
           azon:azon
       },
       success:function(data){
           alert(data);
       }
    });
 });    
 });
</script>
<?php
require_once 'index.php';
$azon= filter_input(INPUT_POST,"azon",FILTER_VALIDATE_INT);
$sql="DELETE FROM `ugyfel` WHERE `ugyfel`.`azon` ='$azon'";
if($conn->query($sql)===TRUE){
    echo 'Sikeres rekord törlés';
}else{
    echo 'failed';
}
?>