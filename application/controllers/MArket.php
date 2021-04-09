<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MArtket extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function alldata()
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
			$data=[];
			foreach ($AllData->AttributMaker as $key=>$wals){
				$data[$wals->TheKey]=$wals;
			};

			foreach ($AllData->ClassMaker as $key=>$wals){
				foreach ($AllData->AttributMaker as $key2=>$item) {
					if ($item->Class==$wals->NameClass){
						$data[$wals->NameClass][$item->TheKey]=$item;
					}
				}
			};
		return $data;
		}

	}
	public function index()
	{
		$data=$this->alldata();
		$this->load->view('welcome_message',$data);
	}
}
