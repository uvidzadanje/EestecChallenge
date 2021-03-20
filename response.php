<?php

require_once "core/core.php";

$parametar = $_POST['parametar'];

$type = getTypeInput($parametar);

// # Izvlacimo podatke sa metadefender.opswat.com
$response_metadefender = json_decode(makeRequest('https://api.metadefender.com/v4/'.$type.'/'.$parametar.'', 'GET', ['apikey: 93cfb78ef00410412c8691b123437ac9']), true);

include 'templates/header.php';
?>

    <svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 126" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"></path>
    </svg>

<div class="container">


<?php 

if($response_metadefender != NULL){
	if($type == 'domain' || $type == 'ip'){ ?>

		<div class="card border-0 shadow-sm">
			<div class="card-header bg-info border-0 pt-4 pb-4">
				<h4 class="my-0 font-weight-normal">Izvršili smo proveru na ispod navedenim sajtovima, izveštaj se nalazi ispod</h4>
			</div>
			<div class="card-body">
				<ul class="list-unstyled mt-3 mb-4">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">
									Izvor
								</th>
								<th scope="col">
									Pretnja
								</th>
								<th scope="col">
									Ažurirano
								</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						foreach ($response_metadefender['lookup_results']['sources'] as $key => $value) {
							echo "<tr><td>".$value['provider']."</td>
								      <td>".(($value['assessment'] == '') ? 'Nema pretnji' : '<span style="color:red;">'.$value['assessment'].'</span>')."</td>
								      <td>".$value['update_time']."</td>
								  </tr>";
						} 
						?>
						</tbody>
					</table>
				</ul>
			</div>
		</div>

<?php } else if ($type == 'hash'){ ?>

		<div class="card border-0 shadow-sm">
			<div class="card-header bg-info border-0 pt-4 pb-4">
				<h4 class="my-0 font-weight-normal">Izvršili smo proveru na ispod navedenim antivirusima, izveštaj se nalazi ispod</h4>
			</div>
			<div class="card-body">
				<ul class="list-unstyled mt-3 mb-4">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">
									Izvor
								</th>
								<th scope="col">
									Pretnja
								</th>
								<th scope="col">
									Ažurirano
								</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						foreach ($response_metadefender['scan_results']['scan_details'] as $key => $value) {
							echo "<tr><td>".$key."</td>
								      <td>".(($value['threat_found'] == '') ? 'Nema pretnji' : '<span style="color:red;">'.$value['threat_found'].'</span>')."</td>
								      <td>".$value['def_time']."</td>
								  </tr>";
						} 
						?>
						</tbody>
					</table>
				</ul>
			</div>
		</div>

<?php 
	} 
}
?>





</div>

<?php
include 'templates/footer.php';
?>

