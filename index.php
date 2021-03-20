<?php

require "core/core.php";


include "templates/header.php";

?>
 

<div class="jumbotron jumbotron-lg jumbotron-fluid mb-3 bg-black position-relative" style="background-color: #00a2e2">
	<div class="container text-white h-100 tofront">
		<div class="row align-items-center justify-content-center text-center">
			<div class="col-md-10">
				<h1 class="display-3">Proverite izvor od potencijalnih napada</div>
		</div>
	</div>
</div>


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
                    <input type="text" name="name" id="name" required="" class="form-control" placeholder="Domen, IP adresa, Hash...">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <input type="hidden" name="subform" value="yes">
                <input onclick="requiredConsent()" class="btn btn-success btn-block shadow-sm" value="Proveri" type="submit" name="submit" id="submit" style="background-color: #00a2e2">
            </div>
        </div>
    </form>
</div>

<?php

include "templates/footer.php";

?>
