<?php

  error_reporting(E_ERROR | E_PARSE);
  if(isset($_GET['city'])){
    $urlContent= file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&units=metric&appid=8a8e6a554c2bdab90b8015551bdb0728');
    $forecastArray = json_decode($urlContent,true);

    
    if($forecastArray['cod']==200){
      
      $weather = $forecastArray['weather'][0]["description"];
      $weather = $weather.'. The temperature is '.$forecastArray['main']['temp'].'&#8451. The speed of wind is '.$forecastArray['wind']['speed'].'m/sec';
    }else{
      $weather = 'Wrong city';
    }
  }
?>










<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>


  <body class="bg">


    <div class="container" id='mainDiv' >
      <h2>Weather in the city</h2>
    </div>



<!-- Form   -->

  <form style='margin:auto 40%;'>
    <div class="mb-3" >
      <label for="city" class="form-label" style='margin-left:33%;'>Input a city name</label>
      <input type="text" class="form-control" id="city" name='city' aria-describedby="forecast city" placeholder='Enter city name'>
    </div>

    <button type="submit" class="btn btn-primary" style='margin:auto 40%;'>Submit</button>
  </form>


<!--Informations -->
  <div id="forecastDiv">
      <?php
          if(isset($weather) && $weather != 'Wrong city'){
            echo '<div style = "margin-top:2%;" class="alert alert-primary" role="alert">'.'The weather in '.$_GET['city'].' is '.$weather.'</div>';
          }else{
            echo '<div style = "margin-top:2%;" class="alert alert-danger" role="alert">'.'The city name is incorrect,please try another name'.'</div>';
          }
      ?>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>