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
        ?>
        <div class="container-fluid">
        <div class="container">
            <h1>Inserção <small>Cliente</small></h1><br>
            <form method="POST" action="../controller/clienteController.php">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nome">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">e-mail</label>
                    <div class="col-sm-3">
                        <input type="email" class="form-control"  name="cnpj">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="telefone">
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
    