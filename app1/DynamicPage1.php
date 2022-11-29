<?php

// the time when the page is loaded
$requestTime = date("Y-m-d H:i:s");

$conn =  mysqli_connect("localhost", "root", "", "security");
   if (!$conn) {
       die("Not connected<br>".mysqli_connect_error());
}

// (bug_url) is the URL of the bug file (this file)
$bugURL= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
echo $bugURL."<br>";

//(victim_ip) client ip is the ip of the victim
$victimIP = $_SERVER['REMOTE_ADDR'];
// echo $victimIP;

$query = "INSERT INTO app1logger(request_time, victim_ip, bug_url) VALUES ('$requestTime', '$victimIP', '$bugURL')";
echo $query."<br>";

$result = $conn->query($query);
echo $result."<br>";

if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>