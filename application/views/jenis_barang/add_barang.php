    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ADD JENIS BARANG</h1>
                </div>
          
            </div>
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Add  Jenis Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="<?= base_url(); ?>home/proses_add_jenis_barang">

                                        <div class="form-group">
                                            <label>Jenis Barang </label> <br>
                                            <input name="jenis_barang" type="text" class="form-control" placeholder="Jenis Barang">
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