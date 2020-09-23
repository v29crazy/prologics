<?php
    ob_start();
    require_once '../connection.php';
    require "vendor/autoload.php";


        

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;


    $developmentMode = true;
    $mailer = new PHPMailer($developmentMode);

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, 8 );



    if(isset($_POST['submitnew']))
    {
    $idIndex=1;
    $resultlastid=$conn->query("SELECT u_id FROM user_data ORDER BY u_id DESC LIMIT 1");
    $lastindex=mysqli_fetch_assoc($resultlastid);
    $lastid=$lastindex['u_id'];
    
    $pieces = explode("o", $lastid);
    if($pieces[1]>=1){
        $idIndex=$pieces[1];
        $idIndex+=1;
    }
    $user_id="upro".sprintf("%'.03d",$idIndex);
        $conn->query("INSERT INTO user_data(u_id,u_name,u_email,u_tel,u_company,u_password,u_pp) VALUES('{$user_id}','{$_POST['u_name']}','{$_POST['u_email']}','{$_POST['u_tel']}','{$_POST['u_company']}','".md5($password)."','unpro.png')");
        global $email,$name,$id;
        $email=$_POST['u_email'];
        $name=$_POST['u_name'];
        $id=$user_id;

                                    
    $address=$email;
    $subject="Your FSC E-Helper account was approved.";
    $body="Hey {$name},<br> You can log your account through those details.<br><center><h1>Login ID : {$id}</h1></center><br><center><h1>Login Password : {$password}</h1></center>"; 
    }




 

    if(isset($_POST['messagesubmit'])){

        $address="vishvawm@gmail.com";
        $subject="Prologic Test";
        $body="Name : {$_POST['name']} <br>Email : {$_POST['email']} <br>Message : {$_POST['message']} <br> : ";
    }


    try {
        $mailer->SMTPDebug = 2;
        $mailer->isSMTP();
    
        if ($developmentMode) {
            $mailer->SMTPOptions = [
                'ssl'=> [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];
        }
    

    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'ruhfsc@gmail.com';
    $mailer->Password = 'Ruhunafsc13';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;

    $mailer->setFrom('ruhfsc@gmail.com', 'Prologic Test ');
    $mailer->addAddress($address, 'Prologic Test');


    if(isset($_POST['submitnew'])){
        $subject="Prologic Test | User Account Details";
        $body="Hello {$name},<br> You can log your account through those details.<br><center><h1>Login ID : {$id}</h1></center><br><center><h1>Login Password : {$password}</h1></center>";

    }


    $mailer->isHTML(true);
    $mailer->Subject = $subject;
    $mailer->Body = $body;

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
if(isset($_POST['submitnew'])){
    exit(header('location:../login.php?modal=epu'));
}
if(isset($_POST['messagesubmit'])){
    exit(header('location:../../index.php'));
}

//////////////////////////////////////////////////////////////////////////////
