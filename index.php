<?php
    $resultado= "";
    $color= "";
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calculadora IMC</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
      
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">Nutrición y fecilidad - SALTA</p>
  <nav class="my-2 my-md-0 me-md-3">
    <a class="p-2 text-dark" href="#">Saber tu IMC</a>
  <!--   <a class="p-2 text-dark" href="#">Recetas</a>
    <a class="p-2 text-dark" href="#">Contactame</a> -->
  </nav>
</header>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Calculadora de índice de masa corporal</h1>
    <p class="lead">Esta calculadora proporciona el IMC y la correspondiente categoría de nivel</p>
</div>

<br>  
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h3 class="btn-lg">Calculadora para adultos</h3>
     
      <form action="index.php" method="post">
         
  
          <input type="number" name="altura" class="form-control"  step=".01" placeholder="Ingresa tu altura ">
          <br>
          <input type="number" name="peso" class="form-control"  step=".01" placeholder="Peso">
          <br>

        <input type="submit"  value="CALCULAR">
        <br> <br>

        <?php
 
          if (isset($_POST['peso']) && isset($_POST['altura']) 
            && is_numeric($_POST['peso']) && is_numeric($_POST['altura'])){
   
             $altura = $_POST['altura'];
             $peso = $_POST['peso'];
             $imc = round($peso / ($altura*$altura),1); 

            if ($imc < 18.5) {
                $resultado = "Peso inferior al normal";
                $color ="red";
              }
            if ($imc > 18.5 && $imc < 24.9) {
              $resultado = "Peso normal";
              $color ="green";
             }
             
             if ($imc > 24.9 && $imc < 29.9) {
              $resultado = "Peso superior al normal";
              $color ="red";
             }
               
             if ($imc > 24.9 && $imc < 29.9) {
                    $resultado = "Estas excedido/a de peso";
                    $color ="red";
             }
           }
         ?>
</form>
     
     
    </div>
    
    <div class="col-sm-6">
        <h3>IMC</h3>
      
        <?php echo 'tu imc es de '.$imc;?>
      <div style="color:<?php echo $color;?>">Resultado: <?= $resultado;?>  </div>
    </div>
  </div>
</div>

</body>
</html>