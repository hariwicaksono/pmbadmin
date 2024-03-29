<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfilPTModel;
use App\Models\TahunModel;

class Auth extends BaseController
{
	public function index()
	{
		$this->ProfilPTModel = new ProfilPTModel();
		$this->TahunModel = new TahunModel();

		$data = [
				'title' => 'Login',
				'profil' => $this->ProfilPTModel->first(),
				'tahunpmb' => $this->TahunModel->getThaPmb()
		];
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'NAMA' => 'required|min_length[4]|max_length[50]',
				'PASS' => 'required|min_length[4]|max_length[255]|validateUser[NAMA,PASS]',
			];

			$errors = [
				'PASS' => [
					'validateUser' => 'Pengguna or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
				$session = session();
				$session->setFlashdata('error', 'Pengguna or Password don\'t match');
			}else{
				$model = new UserModel();
				$user = $model->where('NAMA', $this->request->getVar('NAMA'))
											->first();
				$this->setUserSession($user);
				$session = session();
				$session->setFlashdata('success', 'Login Successful');
				if($user['STATUS']=='1'){			
					return redirect()->to('dashboard1');
				}elseif($user['STATUS']=='2'){	
					return redirect()->to('dashboard');
				}elseif($user['STATUS']=='10'){
					return redirect()->to('dashboard3');
				}elseif($user['STATUS']=='3'){
					return redirect()->to('dashboard4');
				}else{
					
				}	
				

			}
		}

		//echo view('layout/header', $data);
		echo view('login', $data);
		//echo view('layout/footer');
	}

	private function setUserSession($user){
		$data = [
			'NAMA' => $user['NAMA'],
			'STATUS' => $user['STATUS'],
			'KD_JUR' => $user['KD_JUR'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
		}


		echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer');
	}

	public function profile(){
		
		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[8]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{

				$newData = [
					'id' => session()->get('id'),
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					];
					if($this->request->getPost('password') != ''){
						$newData['password'] = $this->request->getPost('password');
					}
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/profile');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
		echo view('templates/header', $data);
		echo view('profile');
		echo view('templates/footer');
	}

	public function logout(){
		$session = session();
		$session->destroy();
		return redirect()->to('/');
		
	}

	//--------------------------------------------------------------------

}
