<?php

namespace application\controllers;
use application\core\Controller;
use application\lib\Pagination;

	class MainController extends Controller {
		
		public function indexAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->tasksList($this->route)
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function dateascAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'changed', 'asc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function datedescAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'changed', 'desc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function nameascAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'name', 'asc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function namedescAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'name', 'desc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function emailascAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'email', 'asc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function emaildescAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'email', 'desc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function stsascAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'completed', 'asc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function stsdescAction() {
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, 'completed', 'desc')
			];
			$this->view->render('BJ Tasks', $vars);
		}

		public function addAction() {
			if(!empty($_POST)){
				if(!$this->model->taskValidate($_POST, 'add')){
					$this->view->message('error',$this->model->error);
				}
				else{
					$id = $this->model->taskAdd($_POST);
					if(!$id){
						$this->view->message('error','Error on request handling');
					}
					else{
						$this->model->taskUploadImage($_FILES['img']['tmp_name'], $id);
						$this->view->message('success','OK. Task with ID='.$id.' added.');
					}
				}
			}
		}

		public function gettaskAction() {
			$data = $this->model->taskData($this->route['id'])[0];
			die(json_encode($data));
		}

		public function editAction() {
			if(!empty($_POST)){
				if(!$this->model->taskValidate($_POST, 'edit')){
					$this->view->message('error',$this->model->error);
				}
				else{
					$this->model->taskEdit($_POST, $this->route['id']);
					if($_FILES['img']['tmp_name']){
						$this->model->taskUploadImage($_FILES['img']['tmp_name'], $this->route['id']);
					}
					$this->view->message('success','Task has been updated');
				}
			}
		}

		public function deleteAction() {
			$this->model->taskDelete($this->route['id']);
			$this->view->message('success','Task has been deleted');
		}

	}

?>

