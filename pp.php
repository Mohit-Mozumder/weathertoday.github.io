<?php
    
    $weather = "";
    $error = "";
    
    if (($_GET['city'])) {
        
        $_GET['city']= str_replace('','',$_GET['city']);

        $file_headers = @get_headers("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=21d37d5283448090567ed457c64d39ac");
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        $error = "not found";
        }
        else{
     $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=21d37d5283448090567ed457c64d39ac");
     
        $weatherArray = json_decode($urlContents, true);
        
        
        
            $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";

            $tempInCelcius = intval($weatherArray['main']['temp'] - 273);

            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
            
       
            
        }     
            
            
        
        
    }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

      <title>Weather Today</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">

<h1 style="text-align:center;font-family: 'Noto Sans JP', sans-serif;margin-top: 1px">Weather Today</h1>

    <style type="text/css">
      
      html { 
          background: url(background.jpeg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
        
          body {
              
              background: none;
              
          }
          
          .container {
              
              text-align: center;
              margin-top: 0px;
              width: 450px;
              
font-family: 'Noto Sans JP', sans-serif;
          }
          
          
          input {
              
              margin: 20px 0;
              
          }
          
          #weather {
              
              margin-top:15px;
              
          }
          .containers{
      style="text-align:right;
      text: bold;
      color: #000000;
      background-color: #ffeee6;
    }
         
      </style>
      <img src="pr.jpg" alt="Paris" width="200" height="200">
    
      <style>
img {
  border-radius: 300%;
  margin-top:15px
}

</style>
      
  </head>
  <body>
    
      <div class="container">
      
          
         <form>
  <fieldset class="form-group">
    <label for="city">Enter the name of a city.</label>
    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "<?php echo $_GET['city']; ?>">
  </fieldset>
  
  <button type="submit" class="btn btn-primary">Submit</button><br>
</form>
      
          <div id="weather"><?php 
              
              if ($weather) {
                  
                  echo '<div class="alert alert-success" role="alert">
                  '.$weather.'
 
</div>';
                  
         } else if ($error) {
         
                  echo '<div class="alert alert-danger" role="alert">
                  The city is not available in our map.please check the name & try again.
</div>';
                  
              }
              
              ?></div>
      </div>
      <div class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="containers">
        <p class="navbar-text">   © mohitmozumder@gmail.com</p>
      </div>
    </div>
   

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>