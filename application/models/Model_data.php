<?php

class Model_data extends CI_Model{


public function __construct()
 {

  parent::__construct();

  $this->load->helper(array('form', 'url','file'));

 }


public function master_barang(){

	$sql = $this->db->query("select * from tb_master_barang");

	$data = $sql->result_array();

	return $data;

}

public function login($username,$password){

	$sql = $this->db->query("select * from tb_user where username='".$username."' and password='".$password."'");

	$data = $sql->result_array();

	return $data;
}



public function proses_add_master_barang(){

$data = array(

'kode_barang' => $this->input->post('kode_barang'),

'nama_barang' => $this->input->post('nama_barang'),

'harga' => $this->input->post('harga'),

'jenis_barang' => $this->input->post('jenis_barang'),

'qty' => $this->input->post('qty')

);

$this->db->insert('tb_master_barang',$data);


}


public function proses_hapus_master_barang($id){

	$sql = $this->db->query("delete from tb_master_barang where id_barang='".$id."'");

	return $sql;
}



public function input_barang(){

	$sql = $this->db->query("select * from tb_master_barang");

	$data = $sql->result_array();

	return $data;

}



public function select_barcode(){

	$sql = $this->db->query("select * from tb_barcode where id_barcode='1'");

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


public function proses_edit_master_barang(){

	$id = $this->input->post('id_barang');

	$data = array(

	'kode_barang' => $this->input->post('kode_barang'),

	'nama_barang' => $this->input->post('nama_barang'),

	'harga' => $this->input->post('harga'),

	'jenis_barang' => $this->input->post('jenis_barang'),

	'qty' => $this->input->post('qty')

	);

	$this->db->where('id_barang',$id);

	$this->db->update('tb_master_barang',$data);



}



public function proses_hapus_barang($id){

	$sql = $this->db->query("delete from input_barang where id_barang='".$id."'");

	return $sql;
}

public function proses_cari_barang($cari){


	$sql2 = $this->db->query("select * from tb_barang_keluar where kode_barcode='".$cari."' limit 1 ");

	$data2 = $sql2->result_array();

	$jumlah = count($data2);

	if($cari != $data[0]['generate_code']){

		$arr = "Data Kosong";

	}else{

	$sql = $this->db->query("select * from tb_inventory where generate_code='".$cari."' limit 1 ");

	$data = $sql->result_array();



		$arr = array(

		'kode_barang' => $data[0]['kode_barang'],

		'kode_barcode' => $data[0]['generate_code'],

		'thnbln' => $data[0]['thnbln'],

		'tanggal' => date('Y-m-d')

		);

		$this->db->insert('tb_barang_keluar',$arr);

}

}

public function pilih_barang(){

	$sql = $this->db->query("select * from tb_barang_keluar");

	$data = $sql->result_array();

	return $data;

}

public function proses_hapus_barang_keluar($id){

	$sql = $this->db->query("delete from tb_barang_keluar where id='".$id."'");

	return $sql;
}


public function barang_masuk(){

	$sql = $this->db->query("select * from tb_barang_masuk");

	$data = $sql->result_array();

	return $data;

}

public function proses_cari_barang_masuk($cari){


	$sql2 = $this->db->query("select * from tb_barang_masuk where kode_barcode='".$cari."' limit 1 ");

	$data2 = $sql2->result_array();

	$jumlah = count($data2);

	if($cari != $data[0]['generate_code']){

		$arr = "Data Kosong";

  }else{

	$sql = $this->db->query("select * from tb_inventory where generate_code='".$cari."' limit 1 ");

	$data = $sql->result_array();



		$arr = array(

		'kode_barang' => $data[0]['kode_barang'],

		'kode_barcode' => $data[0]['generate_code'],

		'thnbln' => $data[0]['thnbln'],

		'tanggal' => date('Y-m-d')

		);

		$this->db->insert('tb_barang_masuk',$arr);

}

}

public function proses_hapus_barang_masuk($id){

	$sql = $this->db->query("delete from tb_barang_masuk where id='".$id."'");

	return $sql;
}


public function select_barang($id){

	$sql = $this->db->query("select * from tb_master_barang where id_barang = '".$id."'");
	$data = $sql->result_array();
	return $data;

}

public function invoice(){

	$sql = $this->db->query("select * from tb_master_barang");
	$data = $sql->result_array();
	return $data;

}

public function sum_invoice(){

	$sql = $this->db->query("select sum(harga) as hasil from tb_master_barang");
	$data = $sql->result_array();
	return $data;

}



public function all_jenis(){

	$sql = $this->db->query("select * from tb_jenis_barang");

	$data = $sql->result_array();

	return $data;

}


public function proses_add_jenis_barang(){

	$arr = array(

	'jenis_barang' => $this->input->post('jenis_barang')

	);

	$this->db->insert('tb_jenis_barang',$arr);

}

public function hapus_jenis_barang($id){

	$sql = $this->db->query("delete from tb_jenis_barang where id='".$id."'");

	return $sql;
}



}
?>
