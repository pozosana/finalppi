<html>
<head><title>Ingresa los datos del nuevo pez:</title></head>
<body bgcolor="#33BEFF">
<h1 align="center">Selecciona los datos de tu pez que quieres cambiar</h1>
<form method="post" action="cambio.php">

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

   $q="SELECT * FROM fish;";
   $r=pg_Exec($conn,$q);
   $n=pg_NumRows($r);

   if(!$r){
      echo"Error al cargar la tabla<br>\n";
      exit;
   }
?>

<div align="center">
<table style=100% align="center" border="1" bgcolor="#C1DAE6">

<tr><td colspan="2">Seleccione el pez a configurar:</td></tr>

<tr><td colspan="2"><div align="center">
<select name="fnum" size="5">
 <?PHP
    for($i=0; $i<$n; $i++){
        $fnum=pg_Result($r, $i, "fnum");
        $fnombre=pg_Result($r, $i, "fnombre");
        echo "<option value=\"$fnum\"> $fnum $fnombre\n";
    }
 ?>
</select></div></td></tr>

<tr>
<td><input name="op[]" type="checkbox" value="fnombre"/></td><td align="right">Nombre: <input name="fnombre_text" size="30" type="text" maxlength="30"/></td>
</tr>

<tr>
<td><input name="op[]" value="fcolor" type="checkbox"/></td><td align="right">Color:  <input name="fcolor_text" size="30" type="text" maxlength="30"/></td>
</tr>

<tr>
<td><input name="op[]" value="fpeso" type="checkbox"/></td><td align="right">Peso:   <input name="fpeso_text" size="30" type="text" maxlength="30"/></td>
</tr>

<tr>
<td colspan="2" align="right">
<?
echo "Numero de tanques disponibles: $nT<br>\n";
?>
</td>
</tr>
<tr>
<td><input name="op[]" value="tnum" type="checkbox"/></td>
<td align="left">Tanque:<SELECT name="tnum_text">
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
<td><input name="op[]" value="snum" type="checkbox"/></td>
<td align="left">Especie:<SELECT name="snum_text">
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
<td colspan="2" align="center">
<?PHP
echo "<br><input name='cambiar' type='submit' id='cambiar' value='Cambiar' >";
echo "<br><br>";
?>
</td>
</tr>
</table>
</div>

</form></body></html>
