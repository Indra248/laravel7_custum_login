<?php
use Illuminate\Support\Facades\DB;

/*Helper Module  
    Indra Pandean, 1-may-2020
*/


function getdata($table = ''){
    
    return $table->paginate(10);
}

function Azdgcrypt($t) {
    $k = '3d11@0s5'; 
    $r = md5($k);
    $c = 0;
    $v = "";
    for ($i = 0; $i < strlen($t); $i++) {
        if ($c == strlen($r)) {
            $c = 0;
        }

        $v .= substr($t, $i, 1)^substr($r, $c, 1);
        $c++;
    }


    srand((double) microtime()*1000000);
        $r  = md5(rand(0, 32000));
        $c  = 0;
        $v  = "";
        $ln = strlen($t);
        for ($i = 0; $i < $ln; $i++) {
            if ($c == strlen($r)) {
                $c = 0;
            }

            $v .= substr($r, $c, 1).
            (substr($t, $i, 1)^substr($r, $c, 1));
            $c++;
        }

        $rtn = str_replace('/', 'garing', base64_encode($v));
        return $rtn;
}

function Azdgdecrypt($t) {
    srand((double) microtime()*1000000);
    $r  = md5(rand(0, 32000));
    $c  = 0;
    $v  = "";
    $ln = strlen($t);
    for ($i = 0; $i < $ln; $i++) {
        if ($c == strlen($r)) {
            $c = 0;
        }

        $v .= substr($r, $c, 1).
        (substr($t, $i, 1)^substr($r, $c, 1));
        $c++;
    }

    $t = str_replace('garing', '/', $t);
    $t = base64_decode($t);
    $v = "";
    for ($i = 0; $i < strlen($t); $i++) {
        $md5 = substr($t, $i, 1);
        $i++;
        $v .= (substr($t, $i, 1)^$md5);
    }
    return $v;
}