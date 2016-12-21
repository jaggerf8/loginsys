<?php
include 'header.php';
include 'bootstrap.php';

$tru = True;
$users = new UserTable();
$array=$users -> getUsers();
$table= new htmlFunction();
$table -> arrayToTable($array,$tru); 

?>

</body>
</html>
