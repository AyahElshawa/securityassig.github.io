<?php

// the time when the page is loaded
date_default_timezone_set('Asia/Gaza');
$requestTime = date("Y-m-d H:i:s");

$conn =  mysqli_connect("localhost", "root", "", "security");
   if (!$conn) {
       die("Not connected<br>".mysqli_connect_error());
}

// (bug_url) is the URL of the bug file (this file)
$bugURL= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
// echo $bugURL."<br>";

//(victim_ip) client ip is the ip of the victim
$victimIP = $_SERVER['REMOTE_ADDR'];
// echo $victimIP;

$myfile = fopen("malFile2.txt", "a") or die("Unable to open file!");
$txt = "Donald Duck\n";
fwrite($myfile, $txt);
fwrite($myfile, "\nThe bug URL(");
fwrite($myfile, $bugURL);
fwrite($myfile, ")\nThe victim's IP(");
fwrite($myfile, $victimIP);
fwrite($myfile, ")\nThe request time(");
fwrite($myfile, $requestTime);
fwrite($myfile, ")\n");
fclose($myfile);


// $query = "INSERT INTO app2logger(request_time, victim_ip, bug_url) VALUES ('$requestTime', '$victimIP', '$bugURL')";
// // echo $query;

// $result = $conn->query($query);

// if ($result) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $query . "<br>" . $conn->error;
// }

?>
