

<?php
    //funcao retornando um json
    function teste(){
        echo json_encode(array('valor' => $_POST['id']));
    }

    //executando a funcao
    teste();
?>