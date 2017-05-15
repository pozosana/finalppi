<?PHP
   $host="localhost";
   $port="5432";
   $user="a205407";
   $password="pez2014";
   $db="a205407"; 
   $strconn="dbname=$db port=$port host=$host user=$user password=$password"; 
   $conn=pg_Connect("$strconn");
   if(!$conn){
        echo "Atencion, no hay conexion a la db";
        exit;
   }

$fnombre_text= trim($_POST['fnombre_text']);
$fcolor_text= trim($_POST['fcolor_text']);
$fpeso_text= trim($_POST['fpeso_text']);
$tnum_text= trim($_POST['tnum_text']);
$snum_text= trim($_POST['snum_text']);
$fnum= trim($_POST['fnum']);

$chk = $_POST["op"];

foreach ($chk as $opcion) {

switch ($opcion) {
case "fnombre":
	$a_actualizar="UPDATE fish SET fnombre='$fnombre_text' WHERE fnum=$fnum;";
	$b_actualizar=pg_Exec($conn, $a_actualizar);
    	echo "Dato nombre registrado con exito<br>";
	break;
case "fcolor":
	$a_actualizar="UPDATE fish SET fcolor='$fcolor_text' WHERE fnum=$fnum;";
        $b_actualizar=pg_Exec($conn, $a_actualizar);
        echo "Dato color registrado con exito<br>";
	break;
case "fpeso":
	$a_actualizar="UPDATE fish SET fpeso='$fpeso_text' WHERE fnum=$fnum;";
        $b_actualizar=pg_Exec($conn, $a_actualizar);
        echo "Dato peso registrado con exito<br>";
	break;
case "tnum":
	$a_actualizar="UPDATE fish SET tnum='$tnum_text' WHERE fnum=$fnum;";
        $b_actualizar=pg_Exec($conn, $a_actualizar);
        echo "Dato tanque registrado con exito<br>";	
	break;
case "snum":
	$a_actualizar="UPDATE fish SET snum='$snum_text' WHERE fnum=$fnum;";
        $b_actualizar=pg_Exec($conn, $a_actualizar);
        echo "Dato especie registrado con exito<br>";
	break;

}

}

?>
