<?php
use Illuminate\Support\Arr;

function pdn_selection($x =''){
    $exp1= explode(',',$x);
    
    foreach($exp1 as $item => $val){
         $a = $val;
         $check_spell1 = str_replace(array(
                                    ' As ',' as ', ' aS ',
                                ), ' AS ' , $a);
        $check_spell2 = str_replace(array(
            '\'', '"'
        ), '' , $check_spell1);                       
         $get =  explode('AS',$check_spell2);


         $get2[] = end($get);

    }    
    return $get2;
}

function pdn_action($action=array()){
    foreach($action as $item){
        $CheckCommand = explode('|', $item);

        if ($CheckCommand[0] == 'PROSES') {
            $data['PROSES'][] = ['nama_proses' => $CheckCommand[1], 'url' => $CheckCommand[2]];
        }

        if ($CheckCommand[0] == 'POPUP') {
            $data['POPUP'][] = ['nama_popup' => $CheckCommand[1], 'url' => $CheckCommand[2]];
        }

    }
    // dd($data);
    return $data;
}

function pdntable($string ='', $id = array(), $action =array())
{   
    if($string == '*'){
        return "*";
    }else{
     $res = pdn_selection($string);
     $res = array_map('trim', $res);
    
     foreach($res as $item => $value){
        $res_faker[$value] = ''; 
    }
    // dd($res_faker);
    if(!empty($id)){
        $Resfiltered = Arr::except($res_faker,$id);
        [$FinalRes]  = Arr::divide($Resfiltered);
        // dd($FinalRes);

    }else{
        $FinalRes = $res;
    }
     
     #++ MODUL TABEL-20
     $table['page']     = (empty($_GET['page']) ? '' : $_GET['page']*10);
     $table['Field']    = array_map('trim', $FinalRes);
     $table['RowNames'] = array_map('trim', $FinalRes);
     $table['id']       = array_map('trim', $id);
     $table['action']   = pdn_action($action);
     return  $table;
    }
    
}