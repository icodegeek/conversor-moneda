<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Conversor Composer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Conversor de monedas</h1>
            <br>
              <form class="form-inline"action="?load" method="post">
                <div class="form-group">
                  <label for="cantidad">Cantidad: </label>
                  <input type="text" name="cantidad" class="form-control" placeholder="Introduzca una cantidad"
                  value="<?php if (isset($_POST['cantidad'])) echo $cantidad;?>">
                </div>
                <select class="form-control" name="convertir">
                  <option <?php if(isset($_POST['convertir']) && $_POST['convertir'] == 'EUR') echo 'selected'?> value="EUR">Euros a Dólares</option>
                  <option <?php if(isset($_POST['convertir']) && $_POST['convertir'] == 'USD') echo 'selected'?> value="USD">Dólares a Euros</option>
                </select>
                <?php if (!empty($error['cantidad'])): ?>
                  <div class="row">
                    <div class="col-md-10">
                      <br>
                      <p class="alert alert-danger">Por favor, introduzca una cantidad!</p>
                    </div>
                  </div>
                <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <hr>
                <button type="submit" class="btn btn-primary">Convertir</button>
          </div>
        </div>
        <br>
        <?php if (empty($error)): ?>
        <div class="row">
          <div class="col-md-5">
            <div class="panel panel-success">
              <div class="panel-heading">Resultado conversión:</div>
                <div class="panel-body">
                  <?=$convertedValue->getNumber();?>
                </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
    </div>
    </form>
  </body>
</html>
