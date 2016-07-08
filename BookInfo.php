<?php 
require "connection.php";

$bookId = $_POST["id"];


$mysql_qry = "select * from books where id like '$bookId';";

$result = mysqli_query($conn ,$mysql_qry);
$response=array();

while($row=mysqli_fetch_array($result)){
    array_push($response,array("bookName"=>$row[2],"disc"=>$row[4]));
}
echo json_encode(array("server_response"=>$response));
mysqli_close($conn);

?>