<?php
$user=@$_POST['user'];
$pass=@$_POST['pass'];
$ok=false;
$mesaj='';
if($user && $pass){
    $muser=$db->real_escape_string($user);
    $mpass=$db->real_escape_string($pass);
    if($result = $db->query("SELECT COUNT(*) FROM `administratori` WHERE `username`='$muser' AND `password`='$mpass';")){
        if($result->num_rows==1 && $result->field_count==1)
            $ok=((int)current($result->fetch_array(MYSQLI_NUM))===1);
        $result->close();
    }
    if($ok){
        $_SESSION['admin']=$user;
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
