<?php
include_once('config.php');

$sys = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
$sql = "SELECT pt.collumnsxxxx as id_titulo, pt.collumnsxxxx as titulo_post, pt.collumnsxxxx as data_post, aut.collumnsxxxx as id_autor, aut.collumnsxxxx as autor_nome, aut.collumnsxxxx as autor_sobrenome, ct.collumnsxxxx as id_coment, ct.collumnsxxxx as coment, ct.collumnsxxxx as nome_coment FROM your_table as pt INNER JOIN your_table2 as aut ON pt.collumnsxxxx=aut.collumnsxxxx LEFT JOIN coments as ct ON ct.collumnsxxxx=pt.collumnsxxxx  ORDER by pt.id";
$database = $sys->prepare($sql);
$database->setFetchMode(PDO::FETCH_ASSOC);
$database->execute();
$data = $database->fetchAll();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>Infinite Dropdown Menu R5FS</title>
<link rel=stylesheet href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous" />
<link rel=stylesheet href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" crossorigin="anonymous"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="app.js"></script>
</head>

<body>

<style>
div ul li {
	position:relative;	
}
</style>
<div>

<ul>
<?php 
foreach($data as $dt): 
$nome_completo = $dt['collumnsxxxx'].' '.$dt['collumnsx2'];
?>

<li> <p><?php echo $dt['collumnsxxxx']  ?> - <?php echo  $nome_completo?> <a class="getMenu" href="javascript:void(0)">[+]</a> <a class="getMenu2" href="javascript:void(0)">[infos]</a> </p> </li>
<?php 
endforeach; ?>

</ul>
</div>

</body>
</html>