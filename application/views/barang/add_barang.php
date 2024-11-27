    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">CETAK BARCODE</h1>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Cetak Barcode
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="<?= base_url(); ?>home/proses_add_barang" enctype="multipart/form-data">

										<!--input type="hidden" name="kode_barcode" value="<?//php echo "000".$bc[0]['autonumber']?>"class="form-control"-->

										 <input type="hidden" name="thnbln" value="<?= date("ym");?>"class="form-control">

                                        <div class="form-group">
                                            <label>Kode Barang </label> <br>
                                            <select name="kode_barang" class="form-control">
											<option value="--"> Pilih Kode Barang </option>
												<?php
												$jumlah = count($combo);
												for($i=0;$i<$jumlah;$i++){
													echo"<option value=".$combo[$i]['kode_barang'].">".$combo[$i]['kode_barang']."</option>";
												}
												?>
											</select>
                                        </div>


										<div class="form-group">
                                            <label>Jumlah Copy </label> <br>
                                            <input type="text" name="copy" class="form-control">
                                        </div>

                                        <div class="form-group">
                                                                <label>Jumlah Page </label> <br>
                                                                <input type="text" name="page" class="form-control">
                                                            </div>



                                        <!--div class="form-group">
                                            <label>  Tahun Bulan </label>
                                            <input type="hidden" name="thnbln" value="<?//= date("Ym");?>"class="form-control">
                                        </div -->

									    <button type="submit" class="btn btn-default">Print Button</button>
                                        <button type="button" class="btn btn-default">Reset Button</button>

                                </div>

                                <!--div class="col-lg-6">

                                        <!--div class="form-group">
                                            <label>  Auto Number  </label>
											<input type="hidden" name="kode_barcode" value="<?//= $bc[0]['autonumber']?>"class="form-control">
                                        </div-->


										<!--button type="submit" class="btn btn-default">Print Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>


                                </div-->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
