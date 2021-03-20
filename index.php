<?php

require_once "core/core.php";


include "templates/header.php";

?>


<header>
    <div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative" style="padding: 3rem 1rem;">
        <div class="container-fluid text-white h-100">
            <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
                <div class="col pt-4 pb-4">
                    <h1 class="display-3">Cicada<strong>3301 TI</strong></h1>
                    <h5 class="font-weight-light mb-4">Proverite izvor <strong>od potencijalnih napada <i class="fas fa-shield-alt fa-2x text-info"></i></strong></h5>
                    <a href="#search" class="btn btn-lg btn-outline-white btn-round">Pretraži</a>
                </div>
                <div class="col align-self-bottom align-items-right text-right h-max-380 h-xl-560 position-relative z-index-1">
                    <img src="http://www.pngmart.com/files/7/Cyber-Security-Transparent-PNG.png" class="rounded img-fluid">
                </div>
            </div>
        </div>
    </div>
    <svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 126" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"></path>
    </svg>
</header>

<div class="container pt-5 pb-5">
    <form id="newsletter-form" action="response.php" method="POST" accept-charset="utf-8">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="form-group has-icon-left form-control-name">
                    <input type="text" name="parametar" id="name" required="" class="form-control" placeholder="Domen, IP adresa, Hash...">
                    <p style="font-size:12px;">* Domen unosite http/https parametara (domen.com, poddomen.domen.com...)</p>
                </div>
            </div>
            <div class="col-md-2 mb-3" id="#search">
                <input type="hidden" name="subform" value="yes">
                <input onclick="requiredConsent()" class="btn btn-block btn-primary mb-1" value="Proveri" type="submit" name="submit" id="submit">
            </div>
            
        </div>
    </form>
</div>

<?php

include "templates/footer.php";

?>
