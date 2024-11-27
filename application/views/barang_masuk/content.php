    <div id="page-wrapper">
	
	
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DATA BARANG</h1>
                </div>
               
            </div>
          
			
            <div class="row">
                <div class="col-lg-12">
 
 

                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="#"> DATA   </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Kode Barang</th>
										<th>Kode Barcode</th>
                                        <th>Tanggal</th>
                                        <th>Tahun Bulan</th>                                        
                                        <th>Status</th>                                        
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php         
                                   $jumlah  =count($barang);
                                  
                                   for($i=0;$i<$jumlah;$i++){ 
                                   
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?= $barang[$i]['id']; ?></td>
                                        <td><?= $barang[$i]['kode_barang']; ?></td>
                                        <td><?= $barang[$i]['kode_barcode']; ?></td>
                                        <td><?= $barang[$i]['tanggal']; ?></td>
                                        <td><?= $barang[$i]['thnbln']; ?></td>
                                         <td><?= $barang[$i]['status']; ?></td>
										<td><a href="<?= base_url();?>home/validasi_masuk/<?= $barang[$i]['id'];?>">Validasi</a></td>
                                    </tr>
                                <?php
                                }    
                                ?>   


                                </tbody>
                            </table>
                            
                        </div>

                    </div>

                </div>
                
            </div>
			
			
			
           
        </div>
		
		
		

     
         
