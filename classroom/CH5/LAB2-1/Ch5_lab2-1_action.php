<?php
$user_check ="test";
$pass_check ="1234";

$user2_check ="admin";
$pass2_check ="5678";

$user3_check ="earn";
$pass3_check ="8765";

$user = $_POST["uname"];
$pass = $_POST["psw"];

if (($user == $user_check) && ($pass == $pass_check)){
    header("location:https://youtu.be/fbFnF-86eYs?si=uphuzpiDud2Xn1u4");
}
else if(($user == $user2_check ) && ($pass == $pass2_check)){
    header("location:https://flexboxfroggy.com/");
}
else if(($user == $user3_check ) && ($pass == $pass3_check)){
    header("location:https://translate.google.co.th/?hl=th&sl=en&tl=th&op=translate");
}
else{
    header("location:Ch5_lab2-1.html");
}


?>