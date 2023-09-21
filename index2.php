<?php
  $data = file_get_contents('data/pizza.json');
  $menu = json_decode($data, true);

  $res = $menu['menu'];

?>

<?php
  function truncate_text($text, $max = 10, $append = '...'){
    if(strlen($text) <= $max) return $text;
    $return = substr($text,0, $max);
    if (strpos($text, ' ') === false) return $return.$append;
    return preg_replace('/\w+$/', '', $return) . $append;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />

    <title>Foodiee</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          
      </div>      
    </nav>

    <!-- menu card list -->

    <div class="container">
      <div class="row mt-3">
        <div class="col">
          <h1>All Menu</h1>
        </div>
      </div>

      <!-- card -->
      <div class="row" id="daftar-menu">
        <?php foreach($res as $menu ) : ?>
      <div class="col-md-4">
        <div class="card mb-3">
          <img src="img/pizza/<?= $menu['gambar']?>" class="card-img-top" alt=""/>
          <div class="card-body">
            <h5 class="card-title"><?= $menu['nama']?></h5>
            <h5 class="card-title">Rp.<?= $menu['harga']?></h5>
            <p class="card-text" <?= truncate_text($text, 10, '...')?>><?= $menu['deskripsi']?></p>
            <a href="#" class="btn btn-primary">Order sekarang</a>
          </div>
        </div>
      </div>
    </div>
    <?php
    endforeach;
    ?>
      <!-- card end -->
    </div>
    <!-- menu card list end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/api.js"></script>
  </body>
</html>

