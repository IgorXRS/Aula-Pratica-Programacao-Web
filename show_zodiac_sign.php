<?php include('layouts/header.php'); ?>

<body >
  <div class="container mt-5">
    <?php
      if (isset($_POST['data_nascimento'])) {
          $data_nascimento = $_POST['data_nascimento'];
          $signos = simplexml_load_file("signos.xml");

          $dataFormatada = date('d/m', strtotime($data_nascimento));

          foreach ($signos->signo as $signo) {
              $dataInicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
              $dataFim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
              $dataUsuario = DateTime::createFromFormat('d/m', $dataFormatada);

              if ($dataInicio > $dataFim) {
                  if ($dataUsuario >= $dataInicio || $dataUsuario <= $dataFim) {
                      echo "<div class='text-center text-white'>";
                      echo "<h2 class='display-4 mb-4'>Seu signo é: <strong>{$signo->signoNome}</strong></h2>";
                      echo "<p class='lead'>{$signo->descricao}</p>";
                      
                      $signoImagem = 'assets/imgs/' . strtolower(str_replace(' ', '_', $signo->signoNome)) . '.jpg'; 
                      echo "<img src='{$signoImagem}' alt='{$signo->signoNome}' class='img-fluid mb-4' style='max-width: 300px;'>";
                      echo "</div>";

                      echo "<div class='text-center mt-3'><a href='index.php' class='btn btn-light btn-lg'>Voltar</a></div>";
                      break;
                  }
              } else {
                  if ($dataUsuario >= $dataInicio && $dataUsuario <= $dataFim) {
                      echo "<div class='text-center text-white'>";
                      echo "<h2 class='display-4 mb-4'>Seu signo é: <strong>{$signo->signoNome}</strong></h2>";
                      echo "<p class='lead'>{$signo->descricao}</p>";
                      
                      $signoImagem = 'assets/imgs/' . strtolower(str_replace(' ', '_', $signo->signoNome)) . '.jpg'; 
                      echo "<img src='{$signoImagem}' alt='{$signo->signoNome}' class='img-fluid mb-4' style='max-width: 300px;'>";
                      echo "</div>";

                      echo "<div class='text-center mt-3'><a href='index.php' class='btn btn-light btn-lg'>Voltar</a></div>";
                      break;
                  }
              }
          }
      } else {
          echo "<h2 class='text-center text-white'>Data de nascimento não enviada!</h2>";
      }
    ?>
  </div>
  
</body>

</html>
