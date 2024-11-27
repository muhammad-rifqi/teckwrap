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
		<td colspan="2"> <h1> INVOICE </h1> </td>	
  </tr>

    <tr>	
		<td colspan="2">  Nomor : 00001</td>	
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
    <td height="282" colspan="2">
	
	<table width="100%" cellpadding="5" cellspacing="0" border="1" style="border-collapse:collapse">
	<tr>
		<td align="center">Kode Barang </td>
		<td align="center">Nama Barang </td>
		<td align="center">Harga Barang </td>
		
	</tr>	
	<?php	
	$jumlah = count($data);
	for($i=0;$i<$jumlah;$i++){
		
		echo"
		<tr>
			<td align='center'>".$data[$i]['kode_barang']."</td>
			<td align='center'>".$data[$i]['nama_barang']."</td>
			<td align='center'>".$data[$i]['harga']."</td>
			
		</tr>
		";
	}
	?>
	<tr>
		<td>  </td>
		<td> Total </td>
		<td align="center"> <?php echo "<b> Jumlah : ".$hasil[0]['hasil']."</b>"; ?> </td>
	</tr>

	<tr>
		<td>  </td>
		<td> PPN </td>
		<td align="center"> 400.000 </td>
	</tr>

	<tr>
		<td>  </td>
		<td> Total </td>
		<td align="center"> <?php $ppn = 400000;  echo "<b> Jumlah : ".($hasil[0]['hasil']+$ppn)."</b>"; ?> </td>
	</tr>



	</table>
	</td>
  </tr>


<tr>	
		<td colspan="2" style="border:1px solid #ccc" align="left">  Catatan  </td>	
  </tr>
  
	<tr>	
		<td colspan="2" height="100" style="border:1px solid #ccc">    </td>	
  </tr> 




</table>

<br>


<script>window.print();</script>