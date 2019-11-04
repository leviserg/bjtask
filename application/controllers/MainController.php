<?php

namespace application\controllers;
use application\core\Controller;
use application\lib\Pagination;

	class MainController extends Controller {
		
		public function indexAction() {
			$column = 'changed';
			$order = 'desc';
			if(isset($this->route['column'])){
				$column = $this->route['column'];
			}
			if(isset($this->route['order'])){
				$order = $this->route['order'];
			}
			$pagination = new Pagination($this->route, $this->model->tasksCount());
			$vars = [
				'pagination' => $pagination->get(),
				'list' => $this->model->sorttasksList($this->route, $column, $order),
				//'list' => $this->model->tasksList($this->route)
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

