<!DOCTYPE html>
<html lang="en">
<head>
<title>Distribusi Gas PT Java Energy Semesta</title>
	<style>
		body {
			font-family: "segoe ui";
		}
		h1 {
			font-size: 25px;
		}
		input, select {
			border: 1px solid #CCCCCC;
			padding: 7px;
			font-size: 14px;
		}
		input[type="submit"] {
			padding: 7px 15px;
			margin-left: 120px;
			cursor: pointer;
		}
		label {
			width: 120px;
			display: block;
			float: left;
		}
		.checkbox, .radio {
			float:none;
			width: auto;
		}
		.row::after {
			content: "";
			display: block;
			clear:both;
		}
		.row {
			margin-bottom: 5px;
			clear: both;
		}
		.options {
			float:left;
		}
	</style>
</head>
<body>

				
	<h1>Distribusi Gas PT Java Energy Semesta</h1>
	<form action="" method="post">
		<div class="row">
			<h1>Data Teknis</h1>
			<label>Flow Rate</label>
			<input type="int" name="flow" value="<?=isset($_POST['flow']) ? $_POST['flow'] : ''?>"/>
		</div>
		<div class="row">
			<input type="submit" name="showflow" value="Tampilkan Flow Rate"/>
		</div>
		<div class="row">
			<label>Jam Operasi Hari/Bulan</label>
			<input type="int" name="hari" value="<?=isset($_POST['hari']) ? $_POST['hari'] : ''?>"/>
		</div>
		<div class="row">
			<label>Jam Operasi Jam/Hari</label>
			<input type="int" name="jam" value="<?=isset($_POST['jam']) ? $_POST['jam'] : ''?>"/>
		</div>
		<div class="row">
			<label>Jarak Cust - Sta</label>
			<input type="int" name="jarak" value="<?=isset($_POST['jarak']) ? $_POST['jarak'] : ''?>"/>
		</div>


		
		<?php
	if (isset($_POST['showflow'])) {
		echo '<h1>Flow Rate</h1>';
		echo '<ul>';

		echo '<li>Flow Rate 2: ' . $_POST['flow'] * $_POST['jam'] / 28316 . '</li>';
		echo '<li>Flow Rate 3: ' . $_POST['flow'] * $_POST['jam'] . '</li>';
		echo '<li>Flow Rate 4: ' . $_POST['flow'] * $_POST['jam'] / 28316 * 1016 *  $_POST['hari'] . '</li>';

	}?>

		<div class="row">
			<h1>Analisa kebutuhan Alat Produksi</h1>
			<label>Waktu Tempuh</label>
			<input type="int" name="wkt" value="<?=isset($_POST['wkt']) ? $_POST['wkt'] : ''?>"/>
		</div>
		<div class="row">
			<label>Waktu Unloading</label>
			<input type="int" name="wktunload" value="<?=isset($_POST['wktunload']) ? $_POST['wktunload'] : ''?>"/>
		</div>
		<div class="row">
			<label>Waktu Loading</label>
			<input type="int" name="loading" value="<?=isset($_POST['loading']) ? $_POST['loading'] : ''?>"/>
		</div>
		<div class="row">
			<label>PRU</label>
			<input type="int" name="pru" value="<?=isset($_POST['pru']) ? $_POST['pru'] : ''?>"/>
		</div>
		<div class="row">
			<label>Tube Skid</label>
			<input type="int" name="tubeskid" value="<?=isset($_POST['tubeskid']) ? $_POST['tubeskid'] : ''?>"/>
		</div>
		<div class="row">
			<label>Tube Skid Stanby di Cust</label>
			<input type="int" name="skidstanby" value="<?=isset($_POST['skidstanby']) ? $_POST['skidstanby'] : ''?>"/>
		</div>
		<div class="row">
		<label>Trailer</label>
			<input type="int" name="trailer" value="<?=isset($_POST['trailer']) ? $_POST['trailer'] : ''?>"/>
		</div>
		<div class="row">
		<label>Head Truck</label>
			<input type="int" name="truck" value="<?=isset($_POST['truck']) ? $_POST['truck'] : ''?>"/>
		</div>
		<div class="row">
		<label>Operator PRU</label>
			<input type="int" name="oprt" value="<?=isset($_POST['oprt']) ? $_POST['oprt'] : ''?>"/>
		</div>
		<div class="row">
		<label>Lama Service</label>
			<input type="int" name="service" value="<?=isset($_POST['service']) ? $_POST['service'] : ''?>"/>
		</div>




		<div class="row">
			<input type="submit" name="submit" value="Analisa Biaya Perbulan"/>
		</div>
		<div class="row">
			<input type="submit" name="clear" value="Hapus"/>
		</div>
	</form>

<table border = "1" cellpadding="1" cellspacing="1">	

	<?php
	if (isset($_POST['submit'])) {

	
		echo '<h2>Analisa Biaya Perbulan </h2>';
		echo '<table border="1" style="width:75%">';
		
		echo '<tr>';
		 echo '<td> Alat Produksi </td>';
		 echo '<td> QTY </td>';
		 echo '<td> Biaya /Bulan </td>';
		 echo '<td> Biaya USD /Bulan </td>';
		 echo '<td> Biaya USD /MMBTU </td>';
		echo'</tr>';

		echo '<tr>';
		 echo '<td> PRU (Tanpa PPN) </td>';
		 echo '<td>'. ( $_POST["pru"] ) . '</td>';
		 echo '<td> IDR '. ( $_POST["pru"] * 7000000 * 1 ) . '</td>';
		 echo '<td> $ '. ( $_POST["pru"] * 7000000 * 1 /14500 ) . '</td>';
		 echo '<td> </td>';
		echo'</tr>';
	   
		echo '<tr>';
		 echo '<td> Tube skid (tanpa PPN) </td>';
		  echo '<td>'. ( $_POST["tubeskid"] + $_POST["skidstanby"] ) . '</td>';
		  echo '<td> IDR '. ( $_POST["tubeskid"] + $_POST["skidstanby"]) * (30000000) * (1) . '</td>';
		  echo '<td> $ '. ( $_POST["tubeskid"] + $_POST["skidstanby"]) * (30000000) * (1) / (14500) . '</td>';		
		  echo '<td> $ '. ( $_POST["tubeskid"] + $_POST["skidstanby"]) * (30000000) * (1) / (14500) / (($_POST['flow']) * ($_POST['jam']) / (28316) * (1016) *  ($_POST['hari'])) . '</td>';	  
		echo'</tr>';

		echo '<tr>';
		 echo '<td> Trailer Sewa (Tanpa PPN) </td>';
		 echo '<td>'. ( 0 ) . '</td>';
		 echo '<td> IDR '. ( 0 ) . '</td>';
		 echo '<td> $ '. ( 0 ) . '</td>';
		 echo '<td> $ '. ( 0 ) . '</td>';
		echo'</tr>';

		echo '<tr>';
		 echo '<td> Head truck (Tanpa PPN) </td>';
		 echo '<td>'. ( $_POST["truck"] ) . '</td>';
		 echo '<td> IDR '. ( $_POST["truck"] ) * (24000000) . '</td>';
		 echo '<td> $ '. ( $_POST["truck"] ) * (24000000) / (14500) . '</td>';
		 echo '<td> $ '. ( $_POST["truck"] ) * (24000000) / (14500) / (($_POST['flow']) * ($_POST['jam']) / (28316) * (1016) *  ($_POST['hari'])) . '</td>';
	   	echo'</tr>';

		echo '<tr>';
		 echo '<td> Biaya transport </td>';
		 echo '<td> '. ($_POST['flow']) * ($_POST['jam']) / (28316) * (30) * (28316) / (4000) . '</td>';	
		 echo '<td> IDR '. ($_POST['flow']) * ($_POST['jam']) / (28316) * (30) * (28316) / (4000) * (2350000) . '</td>';
		 echo '<td> $ '. ($_POST['flow']) * ($_POST['jam']) / (28316) * (30) * (28316) / (4000) * (2350000) / (14500) . '</td>';
		 echo '<td> $ '. ($_POST['flow']) * ($_POST['jam']) / (28316) * (30) * (28316) / (4000) * (2350000) / (14500) / (($_POST['flow']) * ($_POST['jam']) / (28316) * (1016) *  ($_POST['hari'])) . '</td>';		 	 
		echo'</tr>';

		echo '<tr>';
		 echo '<td> Operator </td>';
		 echo '<td>'. ( $_POST["oprt"] ) . '</td>';
		 echo '<td> IDR '. ( $_POST["oprt"] ) * (2000000) . '</td>';
		 echo '<td> $ '. ( $_POST["oprt"] ) * (2000000) / (14500) . '</td>';
		 echo '<td> -  </td>';
		echo'</tr>';
		
		echo '<tr>';
		 echo '<td> Total biaya delivery </td>';
		 echo '<td> - </td>';
		 echo '<td> IDR '. ((( $_POST["pru"] * 7000000 * 1 )) + (( $_POST["tubeskid"] + $_POST["skidstanby"]) * (30000000) * (1)) + (( $_POST["truck"] ) * (24000000)) + (($_POST['flow']) * ($_POST['jam']) / (28316) * (30) * (28316) / (4000) * (2350000)) + (( $_POST["oprt"] ) * (2000000))) . '</td>';
		 echo '<td> $ '. (( $_POST["pru"] * 7000000 * 1 /14500 ) + (( $_POST["tubeskid"] + $_POST["skidstanby"]) * (30000000) * (1) / (14500)) + (( $_POST["truck"] ) * (24000000) / (14500)) + (($_POST['flow']) * ($_POST['jam']) / (28316) * (30) * (28316) / (4000) * (2350000) / (14500)) + (( $_POST["oprt"] ) * (2000000) / (14500))) . '</td>';
		 echo '<td> $ '. (( $_POST["tubeskid"] + $_POST["skidstanby"]) * (30000000) * (1) / (14500) / (($_POST['flow']) * ($_POST['jam']) / (28316) * (1016) *  ($_POST['hari'])) + (( $_POST["truck"] ) * (24000000) / (14500) / (($_POST['flow']) * ($_POST['jam']) / (28316) * (1016) *  ($_POST['hari']))) + (($_POST['flow']) * ($_POST['jam']) / (28316) * (30) * (28316) / (4000) * (2350000) / (14500) / (($_POST['flow']) * ($_POST['jam']) / (28316) * (1016) *  ($_POST['hari'])))) . '</td>';
		echo'</tr>';

		echo '<tr>';
		echo '<td> TRANSPORT COST </td>';
		echo '<td>   </td>';
		echo '<td>   </td>';
		echo '<td>   </td>';
		echo '<td>   </td>';
	   	echo'</tr>';

		echo '<tr>';
		echo '<td> Marketing fee </td>';
		echo '<td>   </td>';
		echo '<td>   </td>';
		echo '<td>   </td>';
		echo '<td>   </td>';
		echo'</tr>';

	}?>					
</table>


					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
						<a href="logout.php" class="btn btn-info" onclick="return confirm('Yakin ingin logout?')">Log Out</a>
						</span>
					</div>

	</div>


</html>