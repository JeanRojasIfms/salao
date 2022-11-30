<?php
   
    $btn = $_POST['btn'];

    switch ($btn){
        case 'Inserir': inserir();
            break;
        case 'Atualizar': atualizar();
            break;
        case 'Remover': remover();
            break;        
        case 'Cancelar': cancelar();
            break;   
    }
    
    function inserir() {
        $nome = $_POST['nome'];        
        $descricao = $_POST['descricao'];
        $dataValidade = $_POST['dataValidade'];
        $salao = $_POST['salao'];
        $array = array('nome' => $nome,'descricao'=>$descricao,'dataValidade'=>$dataValidade, 'salao'=>array('id'=>"3",'nome'=>null,'cnpj'=>null,'descricao'=>null,'usuario'=>null));
        $json = json_encode($array);            
        $ch = curl_init('localhost:8080/promocao');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                          
            'Content-Type: application/json',           
            'Content-Length: ' . strlen($json)) 
        );              

        $jsonRet = json_decode(curl_exec($ch));

        header ('Location: ../view/listaPromocao.php');

    }
    function atualizar() {}
    function remover() {
        $id = $_POST['id'];
        $url = "localhost:8080/promocao/".$id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        header('Location: ../view/listaPromocao.php');
    }

    function cancelar(){
        header('Location: ../view/listaPromocao.php');
    }

    
?>