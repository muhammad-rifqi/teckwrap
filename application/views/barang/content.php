

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">MASTER BARANG</h1>
                </div>
               
            </div>
         
            <div class="row">
                <div class="col-lg-12">
 

                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="<?= base_url();?>home/add_barang"> ADD NEW  </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Print Barcode</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php         
                                   $jumlah  =count($barang);
                                  
                                   for($i=0;$i<$jumlah;$i++){ 
                                   
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?= $barang[$i]['id_barang']; ?></td>
                                        <td><?= $barang[$i]['kode_barang']; ?></td>
                                        <td><?= $barang[$i]['nama_barang']; ?></td>
                                        <td><?= $barang[$i]['tanggal']; ?></td>
                                        <td><?= $barang[$i]['deskripsi']; ?></td>
                                        <td class="center"><a href="<?= base_url();?>home/edit_barang/<?= $barang[$i]['id_barang']; ?>">Edit</a></td>
                                        <td class="center"><a href="<?= base_url();?>home/hapus_barang/<?= $barang[$i]['id_barang']; ?>">Delete</a></td>
                                        <td class="center"><a href="<?= base_url();?>home/cetak_barang/<?= $barang[$i]['id_barang']; ?>" target="_blank">Print Barcode</a></td>
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
       
