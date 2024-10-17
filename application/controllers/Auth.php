<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Suplier');
	}


public function login()
	{
		$this->load->view('template/auth/header');
		$this->load->view('auth/login');
		$this->load->view('template/auth/footer');
	}

public function p_login()
	{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$admin = $this->db->get_where('admin', ['email' => $email])->row_array();

			if ($admin) {

				if ($admin['is_active'] == 1) {
					
					if (password_verify($password, $admin['password'])) {

						$data =[
							'email' => $admin['email'],
								
						]; 
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Login Berhasil</center></div>');
						redirect('admin/dashboard');

					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Password yang anda masukan salah</center></div>');
						redirect('auth/login');
						}

				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Account belum active</center></div>');
					redirect('auth/login');
					}

			}else{

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Account belum terdaftar
				<hr>Mohon untuk registrasi terlebih dahulu</center></div>');
			redirect('auth/login');
				}
	}

public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|Valid_email|is_unique[admin.email]', ['is_unique' => 'Email ini sudah terdaftar']);
		$this->form_validation->set_rules('password1', 'Pasword', 'required|trim|min_length[2]|matches[password2]', ['matches' => 'Pasword tidak sama!', 'min_length' => 'Pasword terlalu pendek!']);
		$this->form_validation->set_rules('password2', 'Pasword', 'required|trim|matches[password1]');
		

		if( $this->form_validation->run() == false){
		$this->load->view('template/auth/header');
		$this->load->view('auth/registrasi');
		$this->load->view('template/auth/footer');
		}else{
			$data = [
				'nama' 			=> htmlspecialchars($this->input->post('nama', true)),
				'email' 		=> htmlspecialchars($this->input->post('email', true)),
				'password'	 	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active' 	=> 0,
				'date_created'	=> date('Y-m-h'),
				'image' 		=> 'default.jpg',
			];

			$this->db->insert('admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat !!! anda sudah buat <i>account</i>. Silahkan Login !!!</div>');
			redirect('auth/registrasi');
		}	
	}

public function logout()
	{
		$this->session->unset_userdata('email');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah <b>Keluar</b>!</div>');
		redirect('auth/login');
	}


public function user_login()
	{

		$data['title'] = "Katalog Kopi";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('auth/login_user', $data);
		$this->load->view('template/penjualan/footer', $data);
	}


public function puser_login()
	{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user) {
				// cek apakah sudah active
				if($user['is_active'] == 1 ){
					// cek password
					if (password_verify($password, $user['password'])) {

						$data =[
							'id_user' 	=> $user['id_user'],
							'email' 	=> $user['email'],
							'nama' 		=> $user['nama'],
								
						]; 
						$_SESSION['user'] = $data;

						$this->session->set_flashdata('massage', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Login Berhasil</center></div>');
						redirect('penjualan/katalog_kopi');

					}else{
						$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Password yang anda masukan salah</div>');
						redirect('auth/user_login');
						}
				}else{

					$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Email belum <i>active</i> mohon konfirmasi email anda !!!</div>');
					redirect('auth/user_login');
					}
			}else{

			$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Account belum terdaftar <br>Mohon untuk registrasi terlebih dahulu</div>');
			redirect('auth/user_login');
				}
	}
public function user_registrasi()
	{
		$data['title'] = "Registrasi";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$get_user = $this->M_Suplier->getuser();
		$data['user'] = $this->db->get_where('user')->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|Valid_email|is_unique[user.email]', ['is_unique' => 'Email ini sudah terdaftar']);
		$this->form_validation->set_rules('password1', 'Pasword', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Pasword tidak sama!', 'min_length' => 'Pasword terlalu pendek!']);
		$this->form_validation->set_rules('password2', 'Pasword', 'required|trim|matches[password1]');
		

		if( $this->form_validation->run() == false){
		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('auth/user_registrasi', $data);
		$this->load->view('template/penjualan/footer', $data);
		}else{

			
			$data = [
				'id_user'		=> $get_user,
				'nama' 			=> htmlspecialchars($this->input->post('nama', true)),
				'email' 		=> htmlspecialchars($this->input->post('email', true)),
				'password'	 	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active' 	=> 0,
				'date_created'	=> date('Y-m-h'),
				'image' 		=> 'default.jpg',
			];

			$data2 = [
				'id_user'		=> $get_user,
				'telepon'		=>	0,
				'alamat'		=> 'belum di isi',
				'desa'			=> 'belum di isi',
				'kecamatan'		=> 'belum di isi',
				'kota'			=> 0,
				'provinsi'		=> 0,
				'kode_pos'		=> 0,
			];

			$this->db->insert('user', $data);
			$this->db->insert('k_user', $data2);

			$url = base_url("auth/verifikasi/$data[email]");
			$info = array(
				'subjek' => 'Verifikasi Email', 
				'email' => $_POST['email'],
				'pesan' => "klik di sini untuk verifikasi :<a href='$url'>oke</a>"
			);
			$this->sendEmail($info);

			$this->session->set_flashdata('registrasi', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Selamat !!! anda sudah buat <i>account</i>. Silahkan Login !!!</div>');
			redirect('auth/user_registrasi');
		}	
	}

public function sendEmail($info = NULL)
    {
      // var_dump($info);
      // exit();

      $data = $this->input->post('email');
      $pesan = 'hay';

		$this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'argogiri2@gmail.com';
        $mail->Password = 'Tubagusridwan123';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('argogiri2@gmail.com', 'argoindustri Girimekar');
        $mail->addAddress($info['email']);
        // $mail->Subject = 'Konfirmasi Verifikasi Email';
        $mail->Subject = $info['subjek'];
        $mail->isHTML(true);

        // Email body content / isi
        // $mail->Body = '<h1>Account verifikasi</h1>
        // <p>klik di sini untuk verifikasi :<a href="'.base_url('auth/verifikasi/'.$this->input->post('email')).'">oke</a></p>';
        // Email body content / isi
        $mail->Body = $info['pesan'];

        // var_dump($mail);
        // exit();

        // Send email
        if(!$mail->send()){
            $this->session->set_flashdata('message', '
              <div   class="alert alert-success" role="alert">
                  Gagal melakukan pengiriman email, cek baik baik email anda !!!
              </div>');
              redirect('auth/user_login');
            // echo "aws";
        }else{
            $this->session->set_flashdata('message', '
              <div   class="alert alert-success" role="alert">
                  Sukses mengirim email ke '.$data.' cek email anda sekarang.
              </div>');
            redirect('auth/user_login');
        }

      }

public function verifikasi($email)
	{
    $data = [
    
        'is_active' => 1,
    ];

    $this->db->where('email', $email);
    $this->db->update('user', $data);
    
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda berhasill melakukan aktivasi<br>
        silahkan Login</div>');
    redirect('auth/user_login');
       
	}

public function lupaPassword()
	{
			$data['title'] = "Lupa pasword";
			$data['dashboard'] = $this->db->get_where('dashboard')->row_array();

			$this->load->view('template/penjualan/header', $data);
			$this->load->view('template/penjualan/topbar', $data);
			$this->load->view('auth/lupa_password', $data);
			$this->load->view('template/penjualan/footer', $data);
	}

public function p_lupa_password()
	{
		$mail = $_POST['email'];
		$url = base_url("auth/verifikasi_pasword/$mail");
		$info = array(
			'subjek' => 'Lupa password', 
			'email' => $_POST['email'],
			'pesan' => "Verifikasi Rubah Kata Sandi <a href='$url'>oke</a>",
		);
		$this->sendEmail($info);
	}

public function verifikasi_pasword()
	{
			$data['title'] = "Verifikasi password";
			$data['dashboard'] = $this->db->get_where('dashboard')->row_array();

			$this->load->view('template/penjualan/header', $data);
			$this->load->view('template/penjualan/topbar', $data);
			$this->load->view('auth/verifikasi_pasword', $data);
			$this->load->view('template/penjualan/footer', $data);
	}

public function p_verifikasi_pasword()
	{
		$this->form_validation->set_rules('password1', 'Pasword', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Pasword tidak sama!', 'min_length' => 'Pasword terlalu pendek!']);
		$this->form_validation->set_rules('password2', 'Pasword', 'required|trim|matches[password1]');

		$email = $_POST['mail'];

		$password_baru = [
			'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
		];
		$this->db->where('email', $email);
		$this->db->update('user', $password_baru);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Berhasil merubah kata sandi</b>.</div>');
		redirect('auth/user_login');
	}

public function user_logout()
	{
		session_destroy();

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Anda sudah <b>Keluart</b>.</div>');
		redirect('auth/user_login');
	}

public function error()
	{
		$this->load->view('error/error');
	}

public function error_admin()
	{
		$this->load->view('error/error_admin');
	}

public function login_gudang()
	{
		$this->load->view('template/gudang/header_gudang');
		$this->load->view('auth/login_gudang');
		$this->load->view('template/gudang/footer_gudang');
	}

public function p_login_gudang()
	{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$admin_gudang = $this->db->get_where('admin_gudang', ['email' => $email])->row_array();

			if ($admin_gudang) {

					if (password_verify($password, $admin_gudang['password'])) {

						$data =[
							'email' => $admin_gudang['email'],
								
						]; 
						$_SESSION['admin_gudang'] = $data;
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Login Berhasil</center></div>');
						redirect('gudang/transaksi');

					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Password yang anda masukan salah</center></div>');
						redirect('auth/login_gudang');
						}

			}else{

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Account belum terdaftar
				<hr>Mohon untuk registrasi terlebih dahulu</center></div>');
			redirect('auth/login_gudang');
			}
	}

public function gudang_logout()
	{
		session_destroy();

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Anda sudah <b>Keluart</b>.</div>');
		redirect('auth/login_gudang');
	}

 }
