<?php include('layouts/header.php'); ?>

<body>
  <div class="container mt-5">
  <img src="assets/imgs/back.jpg" alt="Logo do Zodíaco" class="img-fluid mb-4" style="max-width: 100%;">
    <h1 class="text-center text-white">Descubra seu Signo</h1>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
      <div class="mb-3">
        <label for="data_nascimento" class="form-label text-white">Data de Nascimento:</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
      </div>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Descobrir</button>
    </form>

    <div class="row mt-5">
      <?php 
      $signos = simplexml_load_file("signos.xml");
      foreach ($signos->signo as $signo): 
        $signoImagem = 'assets/imgs/' . strtolower(str_replace(' ', '_', $signo->signoNome)) . '.jpg';
      ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header text-center text-white"><?php echo $signo->signoNome; ?></div>
          <div class="card-body">
            <img src="<?php echo $signoImagem; ?>" alt="Imagem de <?php echo $signo->signoNome; ?>" class="card-img-top">
            <h5 class="card-title"><?php echo $signo->dataInicio . ' - ' . $signo->dataFim; ?></h5>
            <p class="card-text"><?php echo $signo->descricao; ?></p>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalSigno<?php echo $signo->signoNome; ?>" tabindex="-1" aria-labelledby="modalSignoLabel<?php echo $signo->signoNome; ?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalSignoLabel<?php echo $signo->signoNome; ?>"><?php echo $signo->signoNome; ?> - Signo do Zodíaco</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p><?php echo $signo->descricao; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <?php endforeach; ?>
    </div>
  </div>
  <footer class="text-center mt-5 py-4">
    <p>Desenvolvido por <strong>Igor Xavier</strong></p>
  </footer>
</body>
</html>
