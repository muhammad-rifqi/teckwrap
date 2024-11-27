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

		'username' => $data['log'][0]['username']

		

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

	

	$a['header'] =  $this->load->view('layout/header',null, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('layout/content',null, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}



public function barang(){


	$this->load->model('Model_data','master_barang');

	$t['barang'] = $this->master_barang->input_barang();

	 $a['header'] =  $this->load->view('layout/header',null, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang/content',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}


public function master_barang(){


	 $this->load->model('Model_data','master_barang');

	 $t['barang'] = $this->master_barang->master_barang();

	 $a['header'] =  $this->load->view('layout/header',null, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('master_barang/content',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


}




public function add_master_barang(){

	
	$a['header'] =  $this->load->view('layout/header',null, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('master_barang/add_barang',null, true);

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

	
	$this->load->model('Model_data','select_master_barang');
	
	$t['combo'] = $this->select_master_barang->input_barang();	
	
	$a['header'] =  $this->load->view('layout/header',null, true);

	$a['footer'] =  $this->load->view('layout/footer',null, true);

	$a['content'] =  $this->load->view('barang/add_barang',$t, true);

	$page = $this->load->view('dashboard',$a);

	return $page;


}


public function proses_add_barang(){ 	

	//$kode = $this->input->get('kode_barang');
	
	//echo $kode ;
	
	//redirect(base_url().'home/add_barang');
	
	
	$this->db->query("insert into input_barang(kode_barang,thnbln,jenis_barang,qty,tanggal,generate_code)values('".$this->input->post('kode_barang')."','".$this->input->post('thnbln')."','".$this->input->post('jenis_barang')."','".$this->input->post('qty')."','".date('Y-m-d')."','".$this->input->post('thnbln').'-'.$this->input->post('jenis_barang').'-'.$this->input->post('kode_barang')."')");
	
	$kode = $this->input->post('thnbln').'-'.$this->input->post('jenis_barang').'-'.$this->input->post('kode_barang').'-'.$this->input->post('stok');

	$this->set_barcode($kode);	
	
	
	
}


public function cetak_barang(){

	$id = $this->uri->segment(3);

	$this->load->model('Model_data','cetak_barang');	

	$barang = $this->cetak_barang->select_barang($id);

	$this->set_barcode($barang[0]['kode_barang']);


}


public function hapus_barang(){

	$id = $this->uri->segment(3);

	$this->load->model('Model_data','proses_hapus_barang');

	$this->proses_hapus_barang->proses_hapus_barang($id);

	redirect(base_url().'barang');



}



public function barang_keluar(){

	$this->load->model('Model_data','brg');

	$t['barang'] = $this->brg->pilih_barang();
	 
	
	 $a['header'] =  $this->load->view('layout/header',null, true);

	 $a['footer'] =  $this->load->view('layout/footer',null, true);

	 $a['content'] =  $this->load->view('barang_keluar/add_barang',$t, true);

	 $page = $this->load->view('dashboard',$a);

	 return $page;


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




}
?>