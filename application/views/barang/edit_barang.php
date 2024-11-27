    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">EDIT USER</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Edit User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="<?= base_url();?>admin/proses_edit_user">
                                        <input type="hidden" name="id_user" value="<?= $data[0]['id_user'];?>"">    
                                        <div class="form-group">
                                            <label>User Name </label>
                                            <input class="form-control" name="username" placeholder="Enter Username" value="<?= $data[0]['username'];?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Enter Email" name="email" value="<?= $data[0]['email'];?>"">
                                        </div>
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Enter password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label>Access</label>
                                            <input class="form-control" placeholder="Enter Level Access" name="access" value="<?= $data[0]['access'];?>"">
                                        </div>
                                     
                                        <button type="submit" class="btn btn-default">Save Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>

                                   

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>