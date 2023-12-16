<?php
$chiffre = '8005022.521'; 
$ccp = $chiffre * 12;
//echo $chiffre.' x 12 = '.$ccp;

//echo strtoupper(toLetter($ccp));

    function toLetter($num){
        $num_str=strval($num);
    
        $num_arr = preg_split ("/[.]+/", $num_str);

        $unit = oneByOneAsLetter($num_arr[0]);

        if (isset($num_arr[1]) && ($num-intval($num_arr[0]))>=0.19){
            $dec = oneByOneAsLetter($num_arr[1]);
        }
        else{
            $dec = "";
        }

        return ucfirst($unit." Ariary ".$dec);
    }

    function oneByOneAsLetter($str){
        $res="";
       for ($i=0;$i<strlen($str);$i++){
            if($str[$i] == '0'){
                $res.= "zero ";
            }
            
            else{
                $f = new NumberFormatter("fr",NumberFormatter::SPELLOUT);
                $res.= $f->format(intval($str));
                return $res;
            }
        }  
       return $res;
    }
       
    

?>