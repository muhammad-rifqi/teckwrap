    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">EDIT BARANG</h1>
                </div>
          
            </div>
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Edit Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="<?= base_url(); ?>home/proses_edit_master_barang">
										<input type="hidden" name="id_barang" value="<?= $data[0]['id_barang']; ?>">
                                        <div class="form-group">
                                            <label>Kode Barang </label> <br>
                                            <input name="kode_barang" type="text" class="form-control" placeholder="Kode Barang" value="<?= $data[0]['kode_barang'];?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Harga Barang </label> <br>
                                            <input name="harga" type="text" class="form-control" placeholder="Harga Barang" value="<?= $data[0]['harga'];?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Qty Barang / * <i> jika barang bukan sriker </i></label>
                                            <input type="text" class="form-control" placeholder="Enter Qty Barang" name="qty" value="<?= $data[0]['qty'];?>">
                                        </div>
									
                              
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" placeholder="Enter Nama Barang" name="nama_barang" value="<?= $data[0]['nama_barang'];?>">
                                        </div>
										

										<div class="form-group">
                                            <label>Jenis Barang</label>
                                            <select class="form-control" placeholder="Enter Jenis Barang" name="jenis_barang">
											<?php
											
											$jumlah = count($jenis);
											for($i=0;$i<$jumlah;$i++){
											echo"<option value='".$jenis[$i]['id']."'>".$jenis[$i]['jenis_barang']."</option>";

											}
											?>
											</select>	
                                        </div>
	
									
                                        <button type="submit" class="btn btn-default">Save Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>

                                   

                                </div>
                               
                            </div>
                           
                        </div>

                    </div>
                    
                </div>
                
            </div>
           
        </div>