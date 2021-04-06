<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminControler extends CI_Controller {

	public function index()
	{
		$this->AllData();

	}
	public function AllData()
	{
		$AllData['ClassMaker'] = $this->db->get('ClassMaker')->result_array();
		$AllData['AttributMaker']= array_reverse($this->db->get('AttributMaker')->result_array());
		echo json_encode($AllData);
	}

	public function json_get()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => base_url("/Readme"),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"NISN\"\r\n\r\n11231231\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"nama\"\r\n\r\naromaaromaaroma\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Nip\"\r\n\r\n11287128\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Alamat\"\r\n\r\nTajur denpasar\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Kelas\"\r\n\r\nX\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Jurusan\"\r\n\r\nRekasaya Perangkat Lunak\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Other_Info\"\r\n\r\nnone\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
				"postman-token: 0ba2fd25-793e-bf86-872d-13d7619234b2"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$AllData=json_decode($response);
			return $AllData;
		}

	}

	public function AdminControll()
	{
		$data= $this->json_get();
		$this->load->view("Admin/Admin",$data);

	}

	public function Create()
	{
		if (!empty($_POST)){
			$this->db->set($_POST);
			$this->db->insert('AttributMaker');
		}
			$data= $this->json_get();
		if (!empty($_GET["sic"])){$data["SIC"]="SUCCESS";}
			$this->load->view('Admin/NewItem',$data);
	}

	public function ClassAdd()
	{
		if (!empty($_POST)){
			$this->db->set($_POST);
			$this->db->insert('ClassMaker');
			redirect("/Admin/Creat");
		}
		$data= $this->json_get();
		$this->load->view('Admin/NewClass',$data);


	}
	public function more()
	{

		$data= $this->json_get();
		$datapas["ClassMaker"]=$data->ClassMaker;
		$datapas["AttributMaker"] = $this->db->get_where('AttributMaker',array('id' => $_GET['id']))->result_array();
		$this->load->view('Admin/more',$datapas);

	}

	public function del()
	{
		$this->db->where('id', $_GET['id']);
		$this->db->delete('AttributMaker');
		redirect("/Admin");
	}
	public function updateAdmin()
	{

		$id=$_POST['id'];
		unset($_POST['id']);
		$this->db->set($_POST);
		$this->db->where('id', $id);
		$this->db->update('AttributMaker');
		redirect("/Admin");

	}
}
?>
