<?php

class Encryption
{
private $key = 'localhost';
    function convert($name,$score,$fromflash)
    {

        $data=$name.$score.$this->key;
        $dataenc=md5($data);
        if(strcmp($dataenc,$fromflash))
        {
echo "mast";

        }
        else{

            echo "loda";
        }

    }

}

?>