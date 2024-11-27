<table width="850" border="0" align="center" style="border:3px dashed #ccc;">


  <tr>
    <td width="200" height="50" align="left" valign="top"><img src="<?= base_url();?>/assets/teckwrap.jpg"></td>
    <td width="592" align="left" valign="top"> 
	
	<h3>PT. TeckWrap Indonesia Gemilang </h3>
	Kedoya Raya no.3 Kedoya Selatan, KebonJeruk, Jakarta Barat 11520
	</td>
  </tr>


  <tr>
    <td height="21" colspan="2" align="left" valign="top"><hr></td>
  </tr>


  <tr>	
		<td colspan="2"> <h1> SURAT JALAN</h1> </td>	
  </tr>

    <tr>	
		<td colspan="2">  Nomor : 1A89UH</td>	
  </tr>

  <tr>	
		<td colspan="2">  Tanggal :  <?= date('d/m/Y');?></td>	
  </tr>

  <tr>	
		<td colspan="2"> No Invoice : 0001</td>	
  </tr>

  <tr>	
		<td colspan="2">  Kepada : </td>	
  </tr> 	

  <tr>	
		<td colspan="2">  Alamat : </td>	
  </tr> 	

  <tr>	
		<td colspan="2">   -------------------------------------------------  </td>	
  </tr> 	

  <tr>	
		<td colspan="2">   -------------------------------------------------  </td>	
  </tr> 	

 	
  <tr>
    <td colspan="2">
	
	<table width="100%" cellpadding="5" cellspacing="0" border="1" style="border-collapse:collapse">
	
	<tr bgcolor="#ccc">
		<td align="center"> Kode Barang </td>
		<td align="center"> Nama Barang </td>
		<td align="center"> Jumlah Barang </td>		
	</tr>	

	
	<?php	
	$jumlah = count($data);
	for($i=0;$i<$jumlah;$i++){
		
		echo"
		<tr>
			<td align='center'>".$data[$i]['kode_barang']."</td>
			<td align='center'>".$data[$i]['nama_barang']."</td>
			<td align='center'>".$data[$i]['qty']."</td>
			
		</tr>
		";
	}
	?>


	
	</table>
	</td>
  </tr>

	

  <tr>
    <td colspan="2"> <p align="center"> Diteriman Oleh </p></td>
  </tr>

	<tr>
    <td colspan="2">  Tanggal : <?= date('d/m/Y'); ?> </p></td>
  </tr>

   <tr>
	<td colspan="2">
		<table width="100%">
			<tr>
				<td width="50%" height="150" style="border:1px solid #ccc" align="center" valign="top"> Nama </td> 
				<td width="50%" height="150" style="border:1px solid #ccc" align="center" valign="top"> Tanda Tangan </td>
			</tr>
		</table>
	</td>
  </tr>


</table>

<script> window.print();</script>