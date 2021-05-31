<?php
session_start();

if(isset($_POST['koszyk_id'])){

            if($_POST['action'] == 'add'){
               
                if(isset($_SESSION['koszyk'])){
                    $isalreadyExist = 0;
                    foreach($_SESSION['koszyk'] as $key => $value){
                        
                        if($_SESSION['koszyk'][$key]['p_id'] == $_POST['koszyk_id']){
                            $isalreadyExist++;
                            $_SESSION['koszyk'][$key]['p_ilosc'] =  $_SESSION['koszyk'][$key]['p_ilosc'] + $_POST['koszyk_ilosc'];
                        }
                    }
                    if($isalreadyExist < 1){
                        $itemArray = array(
                            'p_id' => $_POST['koszyk_id'],
                            'p_nazwa_produktu' => $_POST['koszyk_nazwa_produktu'], 
                            'p_cena' => $_POST['koszyk_cena'],
                            'p_ilosc' => $_POST['koszyk_ilosc'] 
                        );
                        $_SESSION['koszyk'][]  = $itemArray;
                    }

                }else{
                    $itemArray = array(
                        'p_id' => $_POST['koszyk_id'],
                        'p_nazwa_produktu' => $_POST['koszyk_nazwa_produktu'], 
                        'p_cena' => $_POST['koszyk_cena'],
                        'p_ilosc' => $_POST['koszyk_ilosc'] 
                    );
                    $_SESSION['koszyk'][] = $itemArray;
                }
           }
}

if($_POST['action'] == 'remove'){
    foreach($_SESSION['koszyk'] as $key => $val){
        if( $val['p_id'] == $_POST['id_to_remove']){
            unset($_SESSION['koszyk'][$key]);
        }
    }
}

if(!empty($_SESSION['koszyk'])){
    $outputTable = '';
    $total = 0;
    $outputTable .= "<table class='table table-bordered'><thead><tr><td>nazwa_produktu</td><td>cena</td><td>ilosc</td><td>Usuń</td></tr></thead>";
    foreach($_SESSION['koszyk'] as $key => $value){
        $outputTable .= "<tr><td>".$value['p_nazwa_produktu']."</td><td>".($value['p_cena'] * $value['p_ilosc']) ."</td><td>".$value['p_ilosc']."</td><td><button id=".$value['p_id']." class='btn btn-danger delete'>Usuń</button></td></tr>";  
        $total = $total + ($value['p_cena'] * $value['p_ilosc']);
    }
    $outputTable .= "</table>";
    $outputTable .= "<div class='text-center'><b>Suma: ".$total."</b></div>";

}


echo json_encode($outputTable);
?>



