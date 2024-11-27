<?php
Class Home Extends CI_Controller{


public function __construct()
 {

  parent::__construct();

  $this->load->helper(array('form', 'url','file'));

 }


private function set_barcode($code)
	{

		$this->load->library('zend');

		$this->zend->load('Zend/Barcode');

		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}




public function index(){

	$this->load->view('login');

}

public function proses_login(){

		$this->load->library('session');

		$username = $this->input->post('username');

		$password = md5($this->input->post('password'));

		$this->load->model('Model_data','proses_login');

		$data['log'] = $this->proses_login->login($username,$password);

		$cek = count($data['log']);

		if($cek > 0){

		$newdata = array(

		'id_user'=> $data['log'][0]['id_user'],

		'username' => $data['log'][0]['username'],

		'status' => $data['log'][0]['status']

		);

		$this->session->set_userdata($newdata);

		redirect(base_url().'home/dashboard');

		}else{

			echo"<h3 align='center'>Ulangi Login</h3>";

		}

}


public function logout()

	{

		$this->session->sess_destroy();

		redirect(base_url());

	}





public function dashboard(){

	$t['info'] = $this->session->userdata('status');

	$a['header'] =  $this->load->view('layout/header',$t, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('layout/content',null, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}




public function master_barang(){


	$t['info'] = $this->session->userdata('status');

	 $this->load->model('Model_data','master_barang');

	 $t['barang'] = $this->master_barang->master_barang();

	 $a['header'] =  $this->load->view('layout/header',$t, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('master_barang/content',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}




public function add_master_barang(){

	$this->load->model('Model_data','jenis_barang');

	$t['jenis'] = $this->jenis_barang->all_jenis();

	$t['info'] = $this->session->userdata('status');

	$a['header'] =  $this->load->view('layout/header',$t, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('master_barang/add_barang',$t, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}



public function proses_add_master_barang(){

	$this->load->model('Model_data','proses_add_master_barang');

	$this->proses_add_master_barang->proses_add_master_barang();

	redirect(base_url().'home/master_barang');


}


public function hapus_master_barang(){

	$id = $this->uri->segment(3);

	$this->load->model('Model_data','proses_hapus_master_barang');

	$this->proses_hapus_master_barang->proses_hapus_master_barang($id);

	redirect(base_url().'home/master_barang');



}


public function cetak_barcode(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','select_master_barang');

	$t['combo'] = $this->select_master_barang->input_barang();

	$t['bc'] = $this->select_master_barang->select_barcode();

	$a['header'] =  $this->load->view('layout/header',$t, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('barang/add_barang',$t, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}


public function proses_add_barang(){

	//$kode = $this->input->get('kode_barang');

	//echo $kode ;

	//redirect(base_url().'home/add_barang');

	//include(APPPATH.'../Barcode39.php');

   $dt2 = $this->db->query("select * from tb_master_barang where kode_barang = '".$this->input->post('kode_barang')."'")->result_array();

	$this->db->query("insert into tb_inventory(kode_barang,thnbln,kode_barcode,generate_code)values('".$this->input->post('kode_barang')."','".$this->input->post('thnbln')."','".$this->input->post('kode_barcode')."','".$this->input->post('thnbln').$this->input->post('kode_barang').'000'.$dt2[0]['kode_barcode']."')");

	//$kode = $this->input->post('thnbln').'-'.$this->input->post('jenis_barang').'-'.$this->input->post('kode_barang').'-'.$this->input->post('stok');

	//$this->set_barcode('muhammad rifqi');

	$id = $this->db->insert_id();

	// $code = code39($data[0]['generate_code']);
	$copies = '^C'.$this->input->post('copy');
  $pages = '^P'.$this->input->post('page');

	$this->db->query("update tb_printer_code set string ='$copies' where id = '7'");
  $this->db->query("update tb_printer_code set string ='$pages' where id = '4'");

	$sql_printer = $this->db->query("select * from tb_printer_code where id = '17'")->result_array();

	$codb = explode(',',$sql_printer[0]['string']);
  $brg = $this->db->query("select * from tb_master_barang where kode_barang = '".$this->input->post('kode_barang')."'")->result_array();
	$co = '000'.$brg[0]['kode_barcode'];
  echo $co;
	$codb1 = $codb[0];
	$codb2 = $codb[1];
	$codb3 = $codb[2];
	$codb4 = $codb[3];

	$this->db->query("update tb_printer_code set string ='$codb1,$co,$codb3,$codb4' where id = '17'");

  //echo $co;

	$sql_printers = $this->db->query("select * from tb_printer_code where id = '18' ")->result_array();

	$kode_barang  = $this->input->post('thnbln').$this->input->post('kode_barang').'^C0';

	$codes = explode(',',$sql_printers[0]['string']);



	$code1 = $codes[0];
	$code2 = $codes[1];
	$code3 = $codes[2];
	$code4 = $codes[3];
	$code5 = $codes[4];
	$code6 = $codes[5];
	$code7 = $codes[6];
	$code8 = $codes[7];


	$this->db->query("update tb_printer_code set string ='$code1,$code2,$code3,$code4,$code5,$code6,$code7,$code8,$kode_barang' where id = '18' ");


  $dt = $this->db->query("select * from tb_master_barang where kode_barang = '".$this->input->post('kode_barang')."'")->result_array();

  $ss = $this->input->post('page');
  $ee = $dt[0]['kode_barcode'];
	$this->db->query("update tb_master_barang set kode_barcode =  $ee + $ss where kode_barang='".$this->input->post('kode_barang')."'");


	$file = realpath(APPPATH.'../cod.prn');
	$current = '';
	$data_printer = $this->db->query("select * from tb_printer_code")->result_array();
	$jumlah = count($data_printer);
	for($i=0;$i<$jumlah;$i++){
	$current .= $data_printer[$i]['string']."\n";
	}
	file_put_contents($file, $current);

	redirect(base_url().'print.php');

	// $data = $this->db->query("select * from tb_inventory where id_inventory = '".$id."'")->result_array();
	// $code = ($data[0]['generate_code']);
	// $bc = new Barcode39($code);
	// $bc->barcode_text_size = 10;
	// $bc->barcode_bar_thick = 4;
	// $bc->barcode_bar_thin = 2;
	// $bc->draw($data[0]['id_inventory'].".bmp");

	//$path =  'C:\\xampp\\htdocs\\inventory2\\test.bmp';



	 // $handle = printer_open("Godex EZ-1100 Plus");
	 // printer_set_option($handle,PRINTER_MODE, "RAW");
	 // printer_start_doc($handle, "My Code");
	 // printer_start_page($handle);
	 // printer_set_option($handle,PRINTER_COPIES,2);

	 // $font = printer_create_font("barcode font Regular", 100, 50, PRINTER_FW_THIN, false, false, false, 0);
	 // printer_select_font($handle, $font);
	 // printer_draw_text($handle, "".$data[0]['generate_code']."", 10, 20);
	 //printer_draw_bmp($handle, $path, 1, 1);
	 // printer_delete_font($font);

	 // printer_end_page($handle);
	 // printer_end_doc($handle);
	 // printer_close($handle);

	 // $this->db->query("update tb_barcode set autonumber = autonumber+1 where id_barcode='1'");

	// echo"<script>alert('Printing....');window.location='window.location='javascript:history.go(-1)'';</script>";



}



// public function cetak_barang(){

	// $t['info'] = $this->session->userdata('status');

	// $id = $this->uri->segment(3);

	// $this->load->model('Model_data','cetak_barang');

	// $barang = $this->cetak_barang->select_barang($id);

	// $this->set_barcode($barang[0]['kode_barang']);


// }


public function hapus_barang(){

	$id = $this->uri->segment(3);

	$this->load->model('Model_data','proses_hapus_barang');

	$this->proses_hapus_barang->proses_hapus_barang($id);

	redirect(base_url().'barang');



}



public function barang_keluar(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','brg');

	$t['barang'] = $this->brg->pilih_barang();

	 $a['header'] =  $this->load->view('layout/header',$t, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang_keluar/add_barang',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}


public function validasi_keluar(){

	$id = $this->uri->segment(3);
	$this->db->query("update tb_barang_keluar set status = 'Y' where id ='".$id."'");
	redirect(base_url().'barang_keluar_gud');

}


public function barang_keluar_gud(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','brg');

	$t['barang'] = $this->brg->pilih_barang();

	 $a['header'] =  $this->load->view('layout/header',$t, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang_keluar/content',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}


public function barang_keluar_sup(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','brg');

	$t['barang'] = $this->brg->pilih_barang();

	 $a['header'] =  $this->load->view('layout/header',$t, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang_keluar/content_sup',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}



public function barang_masuk(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','brg');

	$t['barang'] = $this->brg->barang_masuk();

	 $a['header'] =  $this->load->view('layout/header',$t, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang_masuk/add_barang',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}



public function barang_masuk_gud(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','brg');

	$t['barang'] = $this->brg->barang_masuk();

	 $a['header'] =  $this->load->view('layout/header',$t, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang_masuk/content',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}


public function barang_masuk_sup(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','brg');

	$t['barang'] = $this->brg->barang_masuk();

	 $a['header'] =  $this->load->view('layout/header',$t, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang_masuk/content_sup',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}




public function validasi_masuk(){

	$id = $this->uri->segment(3);
	$this->db->query("update tb_barang_masuk set status = 'Y' where id ='".$id."'");
	redirect(base_url().'barang_masuk_gud');

}


public function cari_barang_masuk(){



	$cari = $this->input->post('kode_barang');

	$this->load->model('Model_data','proses_search_barang');

	$data =  $this->proses_search_barang->proses_cari_barang_masuk($cari);



	 redirect(base_url().'barang_masuk');


}



public function cari_barang(){



	$cari = $this->input->post('kode_barang');

	$this->load->model('Model_data','proses_search_barang');

	$data =  $this->proses_search_barang->proses_cari_barang($cari);


	 redirect(base_url().'barang_keluar');


}


public function hapus_barang_keluar(){

	$id = $this->uri->segment(3);

	$this->load->model('Model_data','proses_hapus_barang');

	$this->proses_hapus_barang->proses_hapus_barang_keluar($id);

	redirect(base_url().'barang_keluar');



}

public function hapus_barang_masuk(){

	$id = $this->uri->segment(3);

	$this->load->model('Model_data','proses_hapus_barang');

	$this->proses_hapus_barang->proses_hapus_barang_masuk($id);

	redirect(base_url().'barang_masuk');



}



public function test(){

	$this->load->library("EscPos.php");

	try {
			// Enter the device file for your USB printer here
		  $connector = new Escpos\PrintConnectors\FilePrintConnector("Receipt Printer");

			/* Print a "Hello world" receipt" */
			$printer = new Escpos\Printer($connector);
			$printer -> text("Hello World!\n");
			$printer -> cut();

			/* Close printer */
			$printer -> close();
	} catch (Exception $e) {
		echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
	}



}



public function edit_master_barang(){

	$id = $this->uri->segment(3);

	$t['info'] = $this->session->userdata('username');

	$this->load->model('Model_data','data');

	$t['data'] = $this->data->select_barang($id);

	$t['jenis'] = $this->data->all_jenis();

	$a['header'] =  $this->load->view('layout/header',$t, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('master_barang/edit_barang',$t, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}


public function proses_edit_master_barang(){

	$this->load->model('Model_data','proses_edit_barang');

	$this->proses_edit_barang->proses_edit_master_barang();

	redirect(base_url().'home/master_barang');



}


public function cetak_invoice(){


	$this->load->model('Model_data','data_invoice');

	$t['data'] = $this->data_invoice->invoice();

	$t['hasil'] = $this->data_invoice->sum_invoice();

	$this->load->view('master_barang/invoice',$t);

}


	public function jenis_barang(){

	$t['info'] = $this->session->userdata('status');

	$this->load->model('Model_data','jenis_barang');

	$t['jenis'] = $this->jenis_barang->all_jenis();

	$a['header'] =  $this->load->view('layout/header',$t, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('jenis_barang/content',$t, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}



	public function add_jenis_barang(){

	$t['info'] = $this->session->userdata('status');

	$a['header'] =  $this->load->view('layout/header',$t, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('jenis_barang/add_barang',null, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}


public function proses_add_jenis_barang(){

	$this->load->model('Model_data','proses_jenis_barang');

	$this->proses_jenis_barang->proses_add_jenis_barang();

	redirect(base_url().'home/jenis_barang');



}

public function hapus_jenis_barang(){

	$id = $this->uri->segment(3);

	$this->load->model('Model_data','proses_hapus');

	$this->proses_hapus->hapus_jenis_barang($id);

	redirect(base_url().'home/jenis_barang');

}


public function surat_jalan(){


	$this->load->model('Model_data','data_invoice');

	$t['data'] = $this->data_invoice->invoice();

	$this->load->view('master_barang/surat_jalan',$t);

}


}
?>
