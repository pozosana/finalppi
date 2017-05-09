<html>
<head><title>Ingresa los datos del nuevo pez:</head></title>
<body style="background:#33BEFF">
<h1 align="center">Ingresa los datos de tu pez</h1>
<form method="post" action="insert.php" id="ins_lab">

<?PHP
   $host="localhost";
   $port="5432";
   $user="a205407";
   $password="pez2014";
   $db="a205407";
   $strconnect="host=$host port=$port dbname=$db user=$user password=$password";
   $conn = pg_Connect("$strconnect");
   if(!$conn){
        echo "Atencion, no hay conexion a la db";
        exit;
   }

   $queryT="SELECT * FROM tank;";
   $queryS="SELECT * FROM species;";
   $resT=pg_Exec($conn,$queryT);
   $resS=pg_Exec($conn,$queryS);
   $nT=pg_NumRows($resT);
   $nS=pg_NumRows($resS);
   $mT=pg_NumFields($resT);
   $mS=pg_NumFields($resS);
?>

<table style=100% align="center" border="1" bgcolor="#C1DAE6">
<tr>
<td>Nombre:</td><td><input name="fnombre" size="60" type="text" maxlength="60"/></td>
</tr>
<tr>
<td>Color:</td><td><input name="fcolor" size="60" type="text" maxlength="60"/></td>
</tr>
<tr>
<td>Peso:</td><td><input name="fpeso" size="60" type="text" maxlength="60"/></td>
</tr>
<tr>
<td colspan="2" align="right">
<?
echo "Numero de tanques disponibles: $nT<br>\n";
?>
</td>
</tr>
<tr>
<td>Tanque:</td><td><SELECT name="tnum">
	<?
for($i=0;$i<$nT;$i++){
	 $tnum=pg_Result($resT,$i,"tnum");
	 $tnombre=pg_Result($resT,$i,"tnombre");
	 echo "<option value=$tnum>$tnombre</option>";
}
	?>
</SELECT></td>
</tr>
<tr>
<td colspan="2" align="right">
<?
echo "Numero de especies disponibles: $nS<br>\n";
?>
</td>
</tr>
<tr>
<td>Especie:</td><td><SELECT name="snum">
	<?
for($i=0;$i<$nS;$i++){
	 $snum=pg_Result($resS,$i,"snum");
	 $snombre=pg_Result($resS,$i,"snombre");
	 echo "<option value=$snum>$snombre</option>";
}
	?>
</SELECT></td>
</tr>
<tr>
<td>Descripcion(opcional):</td><td><textarea form="ins_lab" name="desc" id="taid" cols="55" wrap="soft"></textarea></td>
</tr>
<td colspan="2" align="center">
<?PHP
echo "<br><input name='agregar' type='submit' id='agregar' value='Agregar' >";
echo "<br><br>";
?>
</td>
</tr>
</table>

</form></body></html>
