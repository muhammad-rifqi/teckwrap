<?php

class Model_data extends CI_Model{
	

public function __construct()
 {
  
  parent::__construct();
  
  $this->load->helper(array('form', 'url','file'));

 }


public function master_barang(){

	$sql = $this->db->query("select * from master_barang");

	$data = $sql->result_array();
	
	return $data;

}

public function login($username,$password){

	$sql = $this->db->query("select * from user where username='".$username."' and password='".$password."'");

	$data = $sql->result_array();

	return $data;	
}



public function proses_add_master_barang(){

$data = array(

'thnbln' => $this->input->post('thnbln'),

'jenis_barang' => $this->input->post('jenis_barang'),

'kode_barang' => $this->input->post('kode_barang'),

'nama_barang' => $this->input->post('nama_barang'),

'stok' => $this->input->post('stok'),

'tgl' => $this->input->post('tgl'),

'generate_code' => $this->input->post('thnbln').'-'.$this->input->post('jenis_barang').'-'.$this->input->post('kode_barang'),

);

$this->db->insert('master_barang',$data);


}


public function proses_hapus_master_barang($id){

	$sql = $this->db->query("delete from master_barang where id='".$id."'");
	
	return $sql;
}



public function input_barang(){

	$sql = $this->db->query("select * from master_barang");

	$data = $sql->result_array();
	
	return $data;

}


public function select_barang($id){

	$sql = $this->db->query("select * from input_barang where id_barang='".$id."'");

	$data = $sql->result_array();
	
	return $data;

}
 


public function proses_add_barang(){

$data = array(

'kode_barang' => $this->input->post('kode1').'-'.$this->input->post('kode2').'-'.$this->input->post('kode3'),

'nama_barang' => $this->input->post('nama_barang'),

'tanggal' => $this->input->post('tanggal'),

'deskripsi' => $this->input->post('deskripsi')

);

$this->db->insert('input_barang',$data);


}


public function proses_edit_barang(){

	$id = $this->input->post('id_barang');

	

	$data = array(

	'kode_barang' => $this->input->post('kode_barang'),		

	'nama_barang' => $this->input->post('nama_barang'),

	'tanggal' => $this->input->post('tanggal'),

	'deskripsi' => md5($this->input->post('deskripsi'))

	);

	$this->db->where('id_barang',$id);

	$this->db->update('input_barang',$data);	



}



public function proses_hapus_barang($id){

	$sql = $this->db->query("delete from input_barang where id_barang='".$id."'");
	
	return $sql;
}


public function proses_cari__barang($cari){

	$sql = $this->db->query("select * from input_barang where kode_barang='".$cari."' limit 1 ");

	$data = $sql->result_array();

	$cek = count($data[0]['kode_barang']);

	if($cek > 0){

	$arr = array(

	'kode_barang' => $data[0]['kode_barang'],

	'nama_barang' => $data[0]['nama_barang'],

	'tanggal' => $data[0]['tanggal'],

	'deskripsi' => $data[0]['deskripsi']

	);

	$this->db->insert('barang_keluar',$arr);

	}else{

	$arr = "Barang Kosong";

	}

	return $arr;	
	

}


public function proses_cari_barang($cari){

	$sql = $this->db->query("select * from master_barang where generate_code='".$cari."' limit 1 ");

	$data = $sql->result_array();

	$cek = count($data[0]['kode_barang']);

	if($cek > 0){
	
	$arr = array(

	'kode_barang' => $data[0]['kode_barang'],

	'nama_barang' => $data[0]['nama_barang'],

	'jenis_barang' => $data[0]['jenis_barang'],

	'stok' => $data[0]['stok'],
	
	'thnbln' => $data[0]['thnbln'],
	
	'tanggal' => date('Y-m-d')

	);

	$this->db->insert('barang_keluar',$arr);

	}else{

		$arr = "Barang Kosong";

	}

	return $arr;	

}

public function pilih_barang(){

	$sql = $this->db->query("select * from barang_keluar");

	$data = $sql->result_array();
	
	return $data;

}

public function proses_hapus_barang_keluar($id){

	$sql = $this->db->query("delete from barang_keluar where id_bar_kel='".$id."'");
	
	return $sql;
}



}
?>