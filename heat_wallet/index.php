<?php
    define('BASE_URL', 'http://localhost/bitcoin_market_exchange_list');

    function getData($url)
    {
        $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,$url);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl_handle, CURLOPT_COOKIEJAR, 'cookies.txt');
        curl_setopt($curl_handle, CURLOPT_COOKIEFILE, 'cookies.txt');
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0');
        $result = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $result;
    }

    $marketName = array("BTC/HEAT", "BTC/BCH", "BTC/FIMK", "BTC/GNT", "BTC/IGNS", "BTC/XRP", "FIMK/HEAT", "HEAT/BCH", "HEAT/FIMK", "HEAT/IGNS", "BTC/BIS", "BTC/CCT", "BTC/CREC", "BTC/EMV", "BTC/ETC", "BTC/FUND", "BTC/GN", "BTC/KMD", "BTC/L0VE", "BTC/MBC", "BTC/RMB", "BTC/USDT", "BTC/XEL", "BTC/XLM", "BTC/XR", "FIMK/FIM2", "HEAT/BIS", "HEAT/BTC", "HEAT/COLD", "HEAT/CREC", "HEAT/ETC", "HEAT/FIM2", "HEAT/FUND", "HEAT/GN", "HEAT/KMD", "HEAT/STW", "HEAT/USDT", "HEAT/XEL", "HEAT/XLM", "HEAT/XR", "HEAT/XRPW", "RMB/HEAT", "ETH*/", "HEAT/L0VE");
    $currency = array("5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","8593933499455210945","0","0","0","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","5592059897546023466","8593933499455210945","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","95101648888460655","9193777835706995617","11001351626834694937");
    $asset = array( "0", "12411813474259859458", "8593933499455210945", "12638687347417181640", "4691035241767273425", "3861265706988762530", "0", "12411813474259859458", "8593933499455210945", "4691035241767273425", "4918941603432662329", "4587343645338998192", "15416332384053193677", "14929164942871212197", "16275355309672821507", "2609287597734615610", "4249904286321844153", "11253245394150595190", "12481603864195837875", "9690781604040953365", "95101648888460655", "4821340132638613724", "3413518603556647655", "6444179647750103491", "11606969851250964612", "5790175697196062771", "4918941603432662329", "2717430553710272372", "16766297531871498265", "15416332384053193677", "16275355309672821507", "5790175697196062771", "2609287597734615610", "4249904286321844153", "11253245394150595190", "4818883390713339700", "4821340132638613724", "3413518603556647655", "6444179647750103491", "11606969851250964612", "3825438017095868761", "0", "14929164942871212197", "12481603864195837875");
    $ticker = array();
    for ($i=0; $i < count($currency); $i++) { 
        $currencyItem = $currency[$i];
        $assetItem = $asset[$i];
        $ticker[] = json_decode(getData("https://heatwallet.com:7734/api/v1/exchange/market/$currencyItem/$assetItem/0/0"));
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Heat Wallet Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.css" />
    <meta http-equiv="refresh" content="5">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Heat Wallet Market</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/idex/">IDEX <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo BASE_URL;?>/heat_wallet/">HEAT WALLET<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/idax/">IDAX <span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/independentreserve/">Independent Reserve<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/itbit/">Itbit<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/koinex/">Koinex<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/hotbit/">Hotbit<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/infinity_coin/">InfinityCoin Exchange<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/iquant/">Iquant<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>/isx/">ISX<span class="sr-only"></span></a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover ">
                <caption>List of Tickers</caption>
                <thead class="table-primary">
                    <tr scope="row">
                        <th scope="col">No.</th>
                        <th scope="col">Link</th>
                        <th scope="col">Name</th>
                        <th scope="col">High</th>
                        <th scope="col">Low</th>
                        <th scope="col">Last</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php $i = 1;
                    // loop sejumlah data ticker, simpan variabelnya ke key
                    foreach ($ticker as $key => $value) {
                        //explode kode untuk memecah berdasarkan '_', karena index 1 itu kode untuk currency nya, maka yang diambil index 1
                        // $kode = explode('_', $key)[1];
                ?>
                    <tr scope="row">
                        <td scope="col"><?php echo $i; ?></td>
                        <td scope="col"><?php echo $marketName[$i-1]; ?></td>
                        <!-- ini menampilkan nama dari tiap ticker, ngambil dari currencies -->
                        <td scope="col"><?php echo $marketName[$i-1]; ?></td>
                        <td scope="col"><?php echo number_format((float)$value->hr24High, 9); ?></td>
                        <td scope="col"><?php echo number_format((float)$value->hr24Low, 9); ?></td>
                        <td scope="col"><?php echo number_format((float)$value->lastPrice, 9); ?></td>
                    </tr>
                    <?php
                    $i++;   
                    }
                ?>
                </tbody>
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