<?php
$user=@$_POST['user'];
$pass=@$_POST['pass'];
$ok=false;
$mesaj='';
if($user && $pass){
    $muser=$db->real_escape_string($user);
    $mpass=$db->real_escape_string($pass);
    $result = $db->query("SELECT * FROM `utilizatori` WHERE `username`='$muser' AND `password`='$mpass';");
    if($result->num_rows==1){
        $rand=$result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['uid']=$rand['uid'];
        $_SESSION['user']=$user;
        $_SESSION['pass']=$pass;
        $_SESSION['admin']=(bool)$rand['admin'];
        $_SESSION['operator']=(bool)$rand['operator'];
        header('Location: '.$linkpath.$defaultpage);
        die();
    }else{
        $mesaj='<br /> <span style="color:red;">Date incorecte</span>';
    }
}
$continut='<div style="color:white;">
        Log in as an administrator. <br>
        <form method="post">
		<table align="center"><tr>
        	<td> username: </td> 
			<td> <input type="text" name="user" value="" /> </td>
		</tr> <tr>
        	<td> password: </td>
			<td> <input type="password" name="pass" value="" /> </td>
		</tr><tr>
			<td></td>
        	<td align="left"> <input type="submit" value="  log in  " /> </td>
		</tr> </table>
        </form></div>
'.$mesaj.'
';
