<?php
include 'db.php';
$cursor = $db->session->findOne(array("sid" => $_COOKIE['sid']));
if($cursor)
{
    include 'maildetails.php';
    

    $mail->setFrom('thyssenkrupp@tkep.com', 'tkei');
    $mail->addReplyTo(Email, 'Information');
    $mail->isHTML(true);   

    $email = $_POST['mail'];

    $candidate = $_POST['candidate'];
    $mail->addAddress($email);

    $mail->Subject = 'Update regarding offer letter';
    $mail->Body    = 'Offer Letter Sent to '.$candidate;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $result = $db->intereval->updateOne(array("prf"=>$_POST['prf'],"pos"=>$_POST['pos'],"iid"=>$_POST['iid'],"rid"=>$_POST['rid'],"email"=>$candidate),array('$set'=>array("offerletter"=>"sent")));


    //Query to update round id in token of member
    $criteria2=array("prf"=>$_POST['prf'],"pos"=>$_POST['pos']."*","rid"=>$_POST['rid'],'iid'=>$_POST['iid'],"email"=>$candidate); 

    //Changed by sarang - 10/01/2020
    $db->tokens->updateOne(array("email"=>$candidate),array('$set'=>array("progress"=>"Offer Letter sent","afterselection"=>"6")));


    if($mail->send()) 
    {
        echo "success";
    }
    else
    {
        echo "not sent";
    }

}
else
{
    header("refresh:0;url=notfound.html");    
}

?>