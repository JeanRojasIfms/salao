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
         //$url = "https://app-salao2.herokuapp.com/salao";
         $url = "localhost:8080/salao";
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
         $resultado = json_decode(curl_exec($ch));  
        ?>
        <div class="container-fluid">
        <div class="container">
            <h1>Inserção <small>Promoção</small></h1><br>
            <form method="POST" action="../controller/promocaoController.php">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nome">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  name="descricao">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Validade</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="dataValidade">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Salao</label>
                    <div class="col-sm-3">
        <select name="salao" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option selected>Escolher o salão</option>
        <?php            
            foreach($resultado as $obj){
        ?>   
            <option value="<?=$obj->id?>"><?=$obj->nome?></option>            
        <?php               
            }
        ?>
        </select>
                    </div>
                </div> 
  
                <input type="submit" class="btn btn-primary" name="btn" value="Inserir">
            </form><br>


        </div>    
        </div>
            
        <?php
        include 'rodape.php';
        ?>
    </body>
</html>
    