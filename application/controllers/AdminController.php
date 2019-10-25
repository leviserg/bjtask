<?php

namespace application\controllers;
use application\core\Controller;

class AdminController extends Controller {

	public function __construct($route){
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	public function loginAction() {
		if(isset($_SESSION['admin'])){
			$this->view->redirect('main/index/1');
		}
		if(!empty($_POST)){
			if(!$this->model->loginValidate($_POST)){
				$this->view->message('error',$this->model->error);
			}
			else{
				$_SESSION['admin'] = 1;
				$this->view->message('success','Click OK to enter');
				sleep(1);
				$this->view->redirect('main/index/1');
				exit();
			}
		}
		if(isset($_SESSION['admin'])){
			$this->view->redirect('main/index/1');
		}else{
			$this->view->render('Login Page');
		}
	}

	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('main/index/1');
	}

}