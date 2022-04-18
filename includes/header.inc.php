<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no maximum-scale=1" />
   <meta name="" content="" />
   <title>Taw and Torridge Photography Club</title>
   <link rel="icon" href="images/icon.svg">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lato&family=Merriweather&family=Roboto&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
   <link rel="stylesheet" href="style.css" />
</head>

<body>
   <div class="container d-flex justify-content-around">
      <nav class="navbar navbar-expand-lg navbar-light align-items-end p-0 py-2">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ">
               <li class="nav-item active pl-4">
                  <a class="nav-link" href="index.html">Home</a>
               </li>
               <li class="nav-item pl-4">
                  <a class="nav-link px-2" href="">Competitions</a>
               </li>
               <li class="nav-item pl-4">
                  <a class="nav-link px-2" href="">Gallery</a>
               </li>
               <li class="nav-item pl-4">
                  <a class="nav-link" href="signup.php">Sign-up</a>
               </li>
               <li class="nav-item pl-4">
                  <a class="nav-link" href="login.php">Login</a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
   <div class="banner-parent">
      <!-- Display size optimisation -->
      <picture>
         <source media="(max-width: 568px)" srcset="images/beach-568.jpg" class="img-fluid" />
         <source media="(max-width: 1080px)" srcset="images/beach-1080.jpg" class="img-fluid" />
         <source media="(max-width: 1920px)" srcset="images/beach-1920.jpg" class="img-fluid" />
         <source media="(min-width: 1921px)" srcset="images/beach-3440.jpg" class="img-fluid" />
         <img src="images/beach-1920.jpg" class="img-fluid" alt="A Devon Beach" />
      </picture>
      <h3 class="top-left">Taw and Torridge</h3>
      <h4 class="middle-left">Photography Club</h4>
   </div>

   </body>

</html>