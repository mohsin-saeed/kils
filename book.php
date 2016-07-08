<?php 
require "connection.php";

$mysql_qry = "select * from books";

$result = mysqli_query($conn ,$mysql_qry);

require "connection.php";

$mysql_qry = "select * from books";

$result = mysqli_query($conn ,$mysql_qry);
$response=array();

while($row=mysqli_fetch_array($result)){
    array_push($response,array("id"=>$row[0],"bookName"=>$row[2]));
}
echo json_encode(array("server_response"=>$response));
mysqli_close($conn);

?>