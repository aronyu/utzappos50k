<?php

$email = $_POST['email'];
$data = "$email\n";
$fh = fopen("/projects/vision/1/webspace/projects/finegrained/utzap50k/forms/user_email.txt", "a");
fwrite($fh, $data);
fclose($fh);

include '/projects/vision/1/webspace/projects/finegrained/utzap50k/forms/count.php';

header('location:/projects/finegrained/utzap50k/success.html');

?> 
