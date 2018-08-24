<?php
    function getData($url)
    {
        $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,$url);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
        $result = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $result;
    }

    //ticker ini list marketnya
    $ticker = getData("https://api.idex.market/returnTicker");
    if($ticker != null){
        $ticker = (array)json_decode($ticker);
    }
    //currencies ini digunakan untuk mengambil nama dari kode yang ada pada ticker
    $currencies = getData("https://api.idex.market/returnCurrencies");
    if($currencies != null){
        $currencies = (array)json_decode($currencies);
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Idex Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.css" />
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Idex Market</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Idex <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Heat Wallet</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>No.</td>
                    <td>Link</td>
                    <td>Name</td>
                    <td>High</td>
                    <td>Low</td>
                    <td>Last</td>
                </tr>
                
                <?php $i = 1;
                    // loop sejumlah data ticker, simpan variabelnya ke key
                    foreach ($ticker as $key => $value) {
                        //explode kode untuk memecah berdasarkan '_', karena index 1 itu kode untuk currency nya, maka yang diambil index 1
                        $kode = explode('_', $key)[1];
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $key; ?></td>
                        <!-- ini menampilkan nama dari tiap ticker, ngambil dari currencies -->
                        <td><?php echo $currencies["$kode"]->name; ?></td>
                        <td><?php echo number_format((float)$value->high, 9); ?></td>
                        <td><?php echo number_format((float)$value->low, 9); ?></td>
                        <td><?php echo number_format((float)$value->last, 9); ?></td>
                    </tr>
                    <?php
                    $i++;   
                    }
                ?>
            </table>
        </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="assets/js/bootstrap.bundle .js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>