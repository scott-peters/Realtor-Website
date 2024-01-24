<?php
header("Content-Type:application/json");

$conn= mysqli_connect('localhost', 'root', '', 'propertymanager') or die("Connection Failed:" .mysqli_connect_error());

$sql= "CALL appointment()";
$query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($query)) {
    $result[] = array(
        'AppointmentID'    => $row['AppointmentID'],
        'ClientID'   => $row['ClientID'],
        'RealtorID'     => $row['RealtorID'],
        'Date'     => $row['Date'],
    );
}


response(200,"Outputting all appointments.",$result);



function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}

?>