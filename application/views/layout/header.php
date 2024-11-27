<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Inventory Management </title>


    <link href="<?= base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="<?= base_url(); ?>assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">


    <link href="<?= base_url(); ?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">


    <link href="<?= base_url(); ?>assets/admin/vendor/morrisjs/morris.css" rel="stylesheet">


    <link href="<?= base_url(); ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


     <link href="<?= base_url(); ?>assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">


    <link href="<?= base_url(); ?>assets/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url();?>">INVENTORY MANAGEMENT</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url()?>home/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                </li>
              
            </ul>
           

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
						<?php if($info == 'admin') {?>
						
						
                        <li>
                            <a href="<?= base_url(); ?>home/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						
						<li>
                            <a href="<?= base_url();?>home/master_barang"><i class="fa fa-shopping-cart fa-fw"></i> Master Barang </a>
                        </li>
						
						<li>
                            <a href="<?= base_url();?>home/jenis_barang"><i class="fa fa-shopping-cart fa-fw"></i> Jenis Barang </a>
                        </li>
						
                        <li>
                            <a href="<?= base_url();?>home/cetak_barcode"><i class="fa fa-shopping-cart fa-fw"></i> Cetak Barcode </a>
                        </li>
						
						 <li>
                            <a href="<?= base_url();?>barang_masuk"><i class="fa fa-shopping-cart fa-fw"></i>  Barang Masuk </a>
                        </li>
						
						
                        <li>
                            <a href="<?= base_url();?>barang_keluar"><i class="fa fa-shopping-cart fa-fw"></i>  Barang Keluar </a>
                        </li>
                        
						<?php } if($info == 'gudang') { ?>


						<li>
                            <a href="<?= base_url();?>barang_masuk_gud"><i class="fa fa-shopping-cart fa-fw"></i>  Barang Masuk </a>
                        </li>
						
						
                        <li>
                            <a href="<?= base_url();?>barang_keluar_gud"><i class="fa fa-shopping-cart fa-fw"></i>  Barang Keluar </a>
                        </li>
						
						
						<?php } if($info == 'supervisi') { ?>

	
						<li>
                            <a href="<?= base_url();?>barang_masuk_sup"><i class="fa fa-shopping-cart fa-fw"></i>  Barang Masuk </a>
                        </li>
						
						
                        <li>
                            <a href="<?= base_url();?>barang_keluar_sup"><i class="fa fa-shopping-cart fa-fw"></i>  Barang Keluar </a>
                        </li>
						


						<?php } ?>	
                    </ul>
                </div>
            
            </div>
           
        </nav>