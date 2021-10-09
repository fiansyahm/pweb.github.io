<?php 

 

 //Get Data Kabupaten 
  $curl = curl_init();  
  curl_setopt_array($curl, array( 
    CURLOPT_URL => "http://api.rajaongkir.com/starter/city", 
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_ENCODING => "", 
    CURLOPT_MAXREDIRS => 10, 
    CURLOPT_TIMEOUT => 30, 
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
    CURLOPT_CUSTOMREQUEST => "GET", 
    CURLOPT_HTTPHEADER => array( 
      "Key: Anda bisa isi dengan api key milik Anda sendiri" 
    ), 
  )); 

  $response = curl_exec($curl); 
  $err = curl_error($curl); 

  curl_close($curl); 

  echo "<label>Kota Asal</label><br>"; 
  echo "<select name='asal' id='asal'>"; 
  echo "<option>Pilih Kota Asal</option>"; 
  $data = json_decode($response, true); 
  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {  
      echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>"; 
  } 
  echo "</select><br><br><br>"; 
  //Get Data Kabupaten 


  //----------------------------------------------------------------------------- 

  //Get Data Provinsi 
  $curl = curl_init(); 

  curl_setopt_array($curl, array( 
    CURLOPT_URL => "http://api.rajaongkir.com/starter/province", 
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_ENCODING => "", 
    CURLOPT_MAXREDIRS => 10, 
    CURLOPT_TIMEOUT => 30, 
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
    CURLOPT_CUSTOMREQUEST => "GET", 
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        // "key: f2d8947b6a7bf5edaa107365786eeb46"
        "key: 21ea539defc7c0771cc4950c2a706e06"
    ),
  )); 

  $response = curl_exec($curl); 
  $err = curl_error($curl); 

  echo "Provinsi Tujuan<br>"; 
  echo "<select name='provinsi' id='provinsi'>"; 
  echo "<option>Pilih Provinsi Tujuan</option>"; 
  $data = json_decode($response, true); 
  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
  echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>"; 
  } 
  echo "</select><br><br>"; 
  //Get Data Provinsi 

 ?> 