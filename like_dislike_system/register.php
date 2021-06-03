<?php

//declaring the name
$uname1 = $_POST['uname1'];
$email  = $_POST['email'];
$upswd1 = $_POST['upswd1'];
// form can't be empty




if(!empty($uname1) || !empty($email) || !empty($upswd1))
{
	//declaring which database name
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "login";
	//database connection
	
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno() .')'.mysqli_connect_error());
	}
	//form validation part starts
	
	else{
		//limiting only 1 email id can exist
		$SELECT="SELECT email From register Where email = ? Limit 1";
        //inserting the table
		$INSERT = "INSERT Into register(uname1 , email , upswd1 )values(?,?,?)";
        //storing
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		//checking username
		if($rnum==0){
		$stmt->close();
		$stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sss", $uname1,$email,$upswd1);
        $stmt->execute();
        echo "new record inserted sucessfully";
		}else{
            echo"Someone already register using this email";
		}
		$stmt->close();
		$conn->close();
	}
}else{
	echo "All field are required";
	die();
}
?>