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
        $cnpj = $_POST['cnpj'];
        $descricao = $_POST['descricao'];
        $telefone = $_POST['telefone'];
        $array = array('nome' => $nome,'cnpj'=>$cnpj,'descricao'=>$descricao,'telefone'=>$telefone);
        $json = json_encode($array);       
        $ch = curl_init('https://app-salao2.herokuapp.com/salao');     
        //$ch = curl_init('localhost:8080/salao');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                          
            'Content-Type: application/json',           
            'Content-Length: ' . strlen($json)) 
        );              

        $jsonRet = json_decode(curl_exec($ch));

        header ('Location: ../view/listaSalao.php');

    }
    function atualizar() {
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $descricao = $_POST['descricao'];
        $telefone = $_POST['telefone'];


        $data = array('id' => $id, 'nome' => $nome, 'cnpj' => $cnpj, 'descricao' => $descricao, 'telefone' => $telefone);

        $update_plan = pullAPI('PUT', 'https://app-salao2.herokuapp.com/salao/'.$id, json_encode($data));
        //$update_plan = pullAPI('PUT', 'localhost:8080/salao/'.$id, json_encode($data));
        $response = json_decode($update_plan, true);
        header('Location: ../view/listaSalao.php');
               
    }

    function pullAPI($param1, $uri, $data){
        $curl = curl_init();
        switch ($param1){
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    function remover() {
        $id = $_POST['id'];
        $url = "https://app-salao2.herokuapp.com/salao/".$id;
        //$url = "localhost:8080/salao/".$id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        header('Location: ../view/listaSalao.php');
    }

    function cancelar(){
        header('Location: ../view/listaSalao.php');
    }

    
?>