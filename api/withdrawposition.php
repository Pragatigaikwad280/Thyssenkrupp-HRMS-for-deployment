<?php

include "db.php";
$cursor = $db->session->findOne(array("sid" => $_COOKIE['sid']));
if($_POST || $cursor )
{   
    
    $cursor = $db->prfs->updateOne(array("prf"=>$_POST["id"]),array('$set'=>array("status"=>"withdrawn")));
    $cursor = $db->rounds->updateOne(array("prf"=>$_POST["id"]),array('$set'=>array("status"=>"withdrawn")));
    $cursor = $db->interviews->updateOne(array("prf"=>$_POST["id"]),array('$set'=>array("status"=>"withdrawn")));
    $cursor = $db->intereval->updateOne(array("prf"=>$_POST["id"]),array('$set'=>array("status"=>"withdrawn")));

    if($cursor)
    {
        echo("success");  
    }
    else
    {
        echo("fail");  
    }
}
else
{
    header("refresh:0;url=notfound.html");
}

?>