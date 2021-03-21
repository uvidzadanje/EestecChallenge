<?php

require_once "core/core.php";




// # Dobijanje parametra
$parametar = trim($_POST['parametar']);

// # Proveravanje parametar tipa (domen, ip, hash)
$type = getTypeInput($parametar);

/*
 *	
 *	Preuzimanje podataka sa TI sajtova putem CURL i Web Sraping metode
 *
*/

// # Izvlacimo podatke sa metadefender.opswat.com
$getURL = 'https://api.metadefender.com/v4/'.$type.'/'.$parametar;
$JSON_metadefender = makeRequest($getURL, 'GET', ['apikey: c6043881db3c375a41da5c532179dcb8']);
$response_metadefender = json_decode($JSON_metadefender, true);
//

// # Izvlacimo podatke sa abuseipdb.com
$JSON_abuseipdb = getData('abuseipdb', $type, $parametar);
$response_abuseipdb = json_decode($JSON_abuseipdb, true);
//

// # Izvlacimo podatke sa securitytrails.com
$response_securitytrails = new SecurityTrails("28z7Q0NXFOYrbw5kzN8QYat4m2ul5XWF");

if($type == 'domain'){
	$status = json_decode($response_securitytrails->getDomain($parametar), true);
}

// # Racunanje konacnog rizicnog skora
$rate_abuseipdb = $response_abuseipdb['rate'];

if($type == 'domain' || $type == 'ip'){ 
	if($response_metadefender['lookup_results']['detected_by'] == 0)
		$response_metadefender['lookup_results']['detected_by'] = 1;
	$rate_metadefender = round((($response_metadefender['lookup_results']['detected_by']/sizeof($response_metadefender['lookup_results']['sources']))* 10));
}


include 'templates/header.php';

?>
    <svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 126" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"></path>
    </svg>
<div class="container">

<?php 

	if($type == 'domain' || $type == 'ip'){ 
?>
	<?php if($response_abuseipdb == NULL){ ?>


		<div class="col-lg-6" style="padding:0px;">
        <div class="card flex-md-row mb-4 box-shadow" style="padding: 20px;">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-purple">Korisne informacije</strong>
                	<div class="mb-1 card-muted">
                    	<b>Primena: </b> <span class="text-muted"><?php echo $response_abuseipdb['usage']; ?></span>
                    	<?php if($type == 'domain'){ ?>
                    		<br>
                    		<b>Broj subdomena: </b> <span class="text-muted"><?php echo $status['subdomain_count']; ?></span>
                    		<br>
                    		<b>Hostname: </b> <span class="text-muted"><?php echo $status['hostname']; ?></span>
                    		<br>
                    		<b>Endpoint: </b> <span class="text-muted"><?php echo $status['endpoint']; ?></span>
                    		<br>
                    		<b>Alexa rank: </b> <span class="text-muted"><?php echo ($status['alexa_rank'] == NULL) ? 'Nepoznato' : $status['alexa_rank']; ?></span>
                    	<?php }?>
                	</div>
            	</div>
        	</div>
		</div>

	<?php } ?>

		<?php if($response_metadefender != NULL){ ?>

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
		<?php } ?>

<?php } else if ($type == 'hash'){ ?>

		<?php if($response_metadefender != NULL){ ?>

		<div class="jumbotron p-5 jumbotron-fluid" style="background-color: #be473c;">
			<div class="container h-100">
				<div class="row justify-content-between align-items-center text-md-center text-lg-left">
					<div class="col-lg-9">
						<h3 style="color:white;"><b>Pažnja!</b></h3>
						<h5 class="font-weight-light" style="color:white;"><b><?php echo @$response_metadefender['threat_name'];  ?></b></h5>
					</div>
					<div class="col-lg-3 text-md-center text-lg-right mt-4 mb-4">
						<a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#info">Informacije</a>
					</div>
				</div>
			</div>
		</div>

	<div class="modal fade show" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detaljne informacije</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="word-break: break-all">
				    <p>MD5: <?php echo $response_metadefender['file_info']['md5']; ?></p>
			        <p>SHA1: <?php echo $response_metadefender['file_info']['sha1']; ?></p>
			        <p>SHA256: <?php echo $response_metadefender['file_info']['sha256']; ?></p>
			        <p>SHA1: <?php echo $response_metadefender['file_info']['sha1']; ?></p>
			        <br>
			        <p>Kategorija: <?php echo $response_metadefender['file_info']['file_type_category']; ?></p>
			        <p>Tip: <?php echo $response_metadefender['file_info']['file_type_description']; ?></p>
			        <p>Ekstenzija: <?php echo $response_metadefender['file_info']['file_type_extension']; ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
			</div>
		</div>
	</div>
</div>


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


	<div style="position:fixed; bottom:20px;left:20px;">
		<a href="/" target="_blank"><img class="rounded-circle shadow-lg" src="templates/assets/img/back.png" width="70" data-toggle="tooltip" data-placement="top"></a>
	</div>
</div>

<?php
include 'templates/footer.php';
?>

