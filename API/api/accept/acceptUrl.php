<html>
<head>
	<title>Zakuuza | Payment confirmation</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section>
		<div class="col-md-3 left-side">
			<div class="logo">
				<img src="img/logo.png", style="width:80%; display:block; margin:0 auto;">
			</div>
			<br>
			<div>
				<p style="color:rgba(255,255,255,0.5); font-size:14px;text-align:center">Les meilleurs services de vente, c'est chez nous.</p>
			</div>
		</div>
		<div class="col-md-9">
			<h1 class="title">Paiement</h1>
			<br>
			<h3>Merci pour votre passation des commandes</h3>
			<br>
			<p style="font-size:16px;">La transaction s'est effectuée avec succès. Les details sont fournis ci-dessous</p>
			<table class="detailCmd table-striped" table-bordered>
				<?php
					$reference=trim(htmlspecialchars($_GET['reference']));
					include_once 'connection.php';
					$query="select bag.id, bag.total, oder_date, nom, tel, (select count(*) from bag_detail where bag_detail.bagID=bag.id) as nbrProd, bag.statut from bag inner join t_client on t_client.code_client=bag.userID where bag.id=".$reference."";
					if(Constants::connect() != null){
						$update="update bag set statut='En attente de livraison' where id=".$reference."";
						$resUpdate=mysqli_query(Constants::connect(), $update);
						if($resUpdate)
						{
							$res=mysqli_query(Constants::connect(), $query);
							if(mysqli_num_rows($res)>0){
								while ($row=mysqli_fetch_assoc($res)) {?>
									<tr>
										<td>ID Commande</td>
										<td style="font-weight:bold;"><?php echo $row['id']; ?></td>
									</tr>
									<tr>
										<td>Total</td>
										<td style="font-weight:bold;">$<?php echo $row['total']; ?></td>
									</tr>
									<tr>
										<td>Date</td>
										<td style="font-weight:bold;"><?php echo $row['oder_date']; ?></td>
									</tr>
									<tr>
										<td>Statut</td>
										<td style="font-weight:bold;"><?php echo strtoupper(trim(htmlspecialchars($_GET['status']))); ?></td>
									</tr>
									<tr>
										<td>Nombre des produits</td>
										<td style="font-weight:bold;"><?php echo $row['nbrProd']; ?></td>
									</tr>
									<tr>
										<td>Etat de la commande</td>
										<td style="font-weight:bold;"><?php echo $row['statut'];; ?></td>
									</tr>
					<?php
								}
							}
						}
					}
					?>
			</table>

			<table>
				
			</table>

		</div>
	</section>

</body>
</html>