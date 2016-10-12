<?php
//define a maxim size for the uploaded images in Kb


include_once("DatabaseInfotsav.php");
    $query1="SELECT name, email, institute FROM infotsav12.users";
    $res1=mysql_query($query1) or die("error2");
    if(mysql_num_rows($res1)==0)
    {
        echo '<script>alert("No users found!")</script>';
    }
	else
	{
        $header = array('Name', 'E-mail id', 'Institute');
        $temp = array();
        $temp[] = $header;

        //$dataFetch = mysql_fetch_array($res1);
        while ($data = mysql_fetch_array($res1))
        {
            $temp[] = $data;
        }

		/*if(!is_dir("/generated_files/"))
            mkdir("/generated-files/");*/
            //chmod("/",766);
        $fp = fopen("InfotsavUsers.csv", 'w');

        foreach ($temp as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
		header("Location:InfotsavUsers.csv");
	}
	

?>
