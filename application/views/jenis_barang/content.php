     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">JENIS BARANG</h1>
                </div>               
            </div>         
            <div class="row">
                <div class="col-lg-12">
 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="<?= base_url();?>home/add_jenis_barang"> ADD NEW  </a> 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Jenis Barang</th>
                                        <th>Delete</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                <?php         
                                   $jumlah  =count($jenis);                                 
                                   for($i=0;$i<$jumlah;$i++){                                    
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?= $jenis[$i]['id']; ?></td>                                  
                                        <td><?= $jenis[$i]['jenis_barang']; ?></td>
                                        <td class="center"><a href="<?= base_url();?>home/hapus_jenis_barang/<?= $jenis[$i]['id']; ?>">Delete</a></td>
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
