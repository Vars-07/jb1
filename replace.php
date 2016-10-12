<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nitin
 * Date: 30/10/12
 * Time: 5:07 AM
 * To change this template use File | Settings | File Templates.
 */
include_once('DatabaseInfotsav.php');

$query="select email from users";
$res=mysql_query($query);
while($data=mysql_fetch_array($res))
{
    $mail = $data['email'];
    if(strstr($mail,'@'))
    {
        $eid=explode("@", $mail);

        if($eid[1]=="gmail.com")
        {
            $email=str_replace(".", "", $eid[0]);
            $mail=$email."@gmail.com";
        }

    }

    mysql_query("UPDATE users SET email='{$mail}' WHERE email='{$data['email']}'");


}