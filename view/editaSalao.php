<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salão de Beleza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">    
</head>

    <body>
        <?php
        include "topo.php";
        $id = $_GET['id'];
        $url = "https://app-salao2.herokuapp.com/salao/".$id;
        //$url = "localhost:8080/salao/".$id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $resultado = json_decode(curl_exec($ch));




        ?>
        <div class="container-fluid">
        <div class="container">
            <h1>Atualizar <small>Salão</small></h1><br>
            <form method="POST" action="../controller/salaoController.php">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nome" value="<?=$resultado->nome?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">CNPJ</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  name="cnpj" value="<?=$resultado->cnpj?>">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  name="descricao" value="<?=$resultado->descricao?>">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="telefone" value="<?=$resultado->telefone?>">
                    </div>
                </div> 
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" class="btn btn-primary" name="btn" value="Atualizar">
            </form><br>


        </div>    
        </div>
            
        <?php
        include 'rodape.php';
        ?>
    </body>
</html>
    