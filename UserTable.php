<?php
include 'dbconfig.php';

class UserTable{
{

public function getUsers()
{
$sql = "SELECT uid FROM user";
$result = $conn->query($sql);
$storeArray = Array();
while ($row = $result->fetch_assoc())
{
    $storeArray[] =  $row['uid'];
}
return $storeArray;
}
}
?>
