<?php
include "../../core/helpers/header.php";
inicio:: header('Dashboard');
?>
<h1 align="center"> Bienvenido Usuario </H1>
<h5 align="center"> Estas son las últimas ventas de esta semana: </H5><br><br>
<!-- Aqui es en donde se manda a llamar las graficas puestas en el controlador index -->
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
        <canvas id="myChart"></canvas>

      </div>
      <div class="col s12 m6 l6">
        <canvas id="myChart2"></canvas>

      </div>
    </div>
    <div class="row">
      <div class="col s12 m6 l6">
        <canvas id="myChart3"></canvas>

      </div>
      <div class="col s12 m6 l6">
        <canvas id="myChart4"></canvas>

      </div>
    </div>
  </div>
<?php
include "../../core/helpers/footer.php";
pie:: pagina('index.js');
?>
