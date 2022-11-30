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
        ?>
        <div class="container-fluid">
        <div class="container">
            <h1>Remover <small>Salão</small></h1><br>
            <form method="POST" action="../controller/salaoController.php">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tem certeza que deseja remover?</label>                   
                </div>                
                
                <input type="hidden" name="id" value="<?=$id?>">        
                <input type="submit" class="btn btn-primary" name="btn" value="Cancelar">
                <input type="submit" class="btn btn-primary" name="btn" value="Remover">
            </form><br>
        </div>    
        </div>
            
        <?php
        include 'rodape.php';
        ?>
    </body>
</html>
    
