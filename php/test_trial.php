<?php
            $curl_price = curl_init();
                    curl_setopt_array($curl_price, array(
                  CURLOPT_URL => "https://api.coingecko.com/api/v3/simple/price?ids=NEAR&vs_currencies=USD",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET"
                ));
                
                $response_price = curl_exec($curl_price);
                
                $err = curl_error($curl_price);
                $data_price = json_decode($response_price);
              echo  $data_price->near->usd;
                    echo $response_price;
?>