<?php
 $perPage = 10;
 //Query
 $data ="";
$account_id = $_POST["account_id"];
// $account_id = "ycrydev.near";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v2-mainnet.paras.id/token?__limit=1000&owner_id=".$account_id."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "
-----011000010111000001101001--"
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
   $data = json_decode($response, true);
}
     foreach($data as $key => $value) {
      if($key === "data"){
          foreach($value as $sub_key => $Sub_value) {
              if($sub_key === "results"){
                  $totalRecords = count($Sub_value);
              }
          }
      }
  }

    $totalPages = ceil($totalRecords/$perPage);
    echo $totalPages;
?>