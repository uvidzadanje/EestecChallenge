<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.ico">
<link rel="icon" type="image/png" href="./assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Anchor Bootstrap 4.1.3 UI Kit by WowThemesNet</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,800" rel="stylesheet">
    
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
<!-- Main CSS -->
<link href="./assets/css/main.css" rel="stylesheet"/>
    
<!-- Animation CSS -->
<link href="./assets/css/vendor/aos.css" rel="stylesheet"/>
    
</head>
    
<body> 
    
<!--------------------------------------
NAVBAR
--------------------------------------->
<nav class="topnav navbar navbar-expand-lg navbar-dark bg-black fixed-top">
<div class="container-fluid">
	<a class="navbar-brand" href="./index.html"><img style="width: 100px" src="client/img/EC_logo.png" alt="EestecChallenge"></a>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarColor02" style="">
		<ul class="navbar-nav mr-auto d-flex align-items-center">
			<li class="nav-item">
			    <a class="nav-link" href="./index.html">Pocetna</a>
			</li>
		</ul>
	</div>
</div>
</nav>
<!-- End Navbar -->
    
    
<!--------------------------------------
HEADER
--------------------------------------->
=======
<?php

require "core/core.php";


include "templates/header.php";

?>
 

>>>>>>> 2415d2dda916600cca978cda1f8999a5eb43f8db
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-3 bg-black position-relative" style="background-color: #00a2e2">
	<div class="container text-white h-100 tofront">
		<div class="row align-items-center justify-content-center text-center">
			<div class="col-md-10">
				<h1 class="display-3">Proverite izvor od potencijalnih napada</div>
		</div>
	</div>
</div>
<<<<<<< HEAD
<!-- End Header -->

    
<!--------------------------------------
MAIN
--------------------------------------->
=======


>>>>>>> 2415d2dda916600cca978cda1f8999a5eb43f8db
<div class="container pt-5 pb-5">
    <form id="newsletter-form" action="index.php" method="POST" accept-charset="utf-8">
        <div class="d-none">
            <label for="hp">HP</label>
            <br>
            <input type="text" name="hp" id="hp">
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="form-group has-icon-left form-control-name">
<<<<<<< HEAD
                    <label class="sr-only" for="inputName">Your name</label>
                    <input type="text" name="name" id="name" required="" pattern="[A-Za-z\s]+" class="form-control" placeholder="Domen ili IP adresa">
                </div>
            </div>
            <input type="hidden" name="list" value="CVN62nDKE0qTf4XLs8J9iQ" checked="checked">
=======
                    <input type="text" name="name" id="name" required="" class="form-control" placeholder="Domen, IP adresa, Hash...">
                </div>
            </div>
>>>>>>> 2415d2dda916600cca978cda1f8999a5eb43f8db
            <div class="col-md-2 mb-3">
                <input type="hidden" name="subform" value="yes">
                <input onclick="requiredConsent()" class="btn btn-success btn-block shadow-sm" value="Proveri" type="submit" name="submit" id="submit" style="background-color: #00a2e2">
            </div>
        </div>
<<<<<<< HEAD
        <div class="row justify-content-center d-none mt-3">
            <label class="c-input c-checkbox small">
            <input type="checkbox" name="gdpr" id="gdpr" checked="checked">
            <span class="c-indicator"></span> I agree to the <a target="_blank" href="https://www.wowthemes.net/privacy-policy/#newsletter-subscription-forms">privacy policy</a>. </label>
        </div>
    </form>
</div>
<!-- End Main -->
    
    
<!--------------------------------------
FOOTER
--------------------------------------->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
<path class="bg-black" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<footer class="bg-black pb-5">
<div class="container">
	<div class="row">
		<div class="col-12 col-md mr-12">
			<h4 class="d-block mt-3 mb-4 text-muted text-center">©
			<script>document.write(new Date().getFullYear())</script>
			 , tim Cicada 3301
			 </h4>
		</div>
	</div>
</div>
</footer>
<!-- End Footer -->
    
    
   
<!--------------------------------------
JAVASCRIPTS
--------------------------------------->    
<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/functions.js" type="text/javascript"></script>
    
<!-- Animation -->
<script src="./assets/js/vendor/aos.js" type="text/javascript"></script>
<noscript>
    <style>
        *[data-aos] {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
    </style>
</noscript>
<script>
    AOS.init({
        duration: 700
    });
</script>
 
<!-- Disable animation on less than 1200px, change value if you like -->
<script>
AOS.init({
  disable: function () {
    var maxWidth = 1200;
    return window.innerWidth < maxWidth;
  }
});
</script>

</body>
</html>
=======
    </form>
</div>

<?php

include "templates/footer.php";

?>
>>>>>>> 2415d2dda916600cca978cda1f8999a5eb43f8db
