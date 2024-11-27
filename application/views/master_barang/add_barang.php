    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ADD BARANG</h1>
                </div>
          
            </div>
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Add Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="<?= base_url(); ?>home/proses_add_master_barang">

                                        <div class="form-group">
                                            <label>Kode Barang </label> <br>
                                            <input name="kode_barang" type="text" class="form-control" placeholder="Kode Barang">
                                        </div>
										
										 <div class="form-group">
                                            <label>Harga Barang</label>
                                            <input type="text" class="form-control" placeholder="Enter Harga Barang" name="harga">
                                        </div>
										
										<div class="form-group">
                                            <label>Qty Barang / * <i> jika barang bukan sriker </i></label>
                                            <input type="text" class="form-control" placeholder="Enter Qty Barang" name="qty" value="1">
                                        </div>
									
                              
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" placeholder="Enter Nama Barang" name="nama_barang">
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