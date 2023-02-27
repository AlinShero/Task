<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $dob=$_POST['dob'];
    $mob=$_POST['mob'];
    $gen=$_POST['gender'];
}
if(!empty($name) || !empty($mail) || !empty($pass) || !empty($dob) ||!empty($mob)){
    include 'config.php'; 
    $Select = "SELECT email FROM test WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO test(name, email,password,dob, mobile, gender) values(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssiis",$name, $mail, $pass, $dob, $mob, $gen);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                    header("Location: index.html?error=login to view profile");
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
}
else{
    echo "all fields are required";
    die();
}


?>