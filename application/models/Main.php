<?php

	namespace application\models;
	use application\core\Model;

	class Main extends Model
	{
		public function tasksCount() {
			return $this->db->column("SELECT COUNT('id') FROM `tasks`");
		}

		public function lastId() {
			return $this->db->column("SELECT MAX(id) FROM `tasks`");
		}
	
		public function tasksList($route) {
			$config = require 'application/config/db.php';
			$max = $config['maxperpage'];
			$params = [
				'max' => $max,
				'start' => (($route['page'] ?? 1) - 1) * $max
			];
			return $this->db->row('SELECT * FROM tasks ORDER BY changed DESC LIMIT :start, :max', $params);
		}

		public function sorttasksList($route, $column, $order) {
			$config = require 'application/config/db.php';
			$max = $config['maxperpage'];	
			$params = [
				'max' => $max,
				'start' => (($route['page'] ?? 1) - 1) * $max
			];
			return $this->db->row('SELECT * FROM tasks ORDER BY '.$column.' '.$order.' LIMIT :start, :max', $params);
		}

		public function taskValidate($task, $type) {
			$nameLen = iconv_strlen($task['task_name']);
			$textLen = iconv_strlen($task['task_content']);
			if ($nameLen < 3 or $nameLen > 40) {
				$this->error = 'Enter title from 3 to 40 chars';
				return false;
			} elseif (!filter_var($task['task_email'], FILTER_VALIDATE_EMAIL)) {
    				$this->error = 'Enter valid E-mail';
				return false;				
			} elseif ($textLen < 3 or $textLen > 5000) {
				$this->error = 'Enter text from 3 to 5000 chars';
				return false;
			}
			if (empty($_FILES['img']['tmp_name']) && $type === 'add') {
				$this->error = 'Image is not selected';
				return false;
			}
			elseif(!empty($_FILES['img']['tmp_name']) && $type === 'add'){
				$allowed_image_extension = array(
					"png",
					"jpg",
					"jpeg",
					"gif"
				);
				$file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);		
				if (! in_array($file_extension, $allowed_image_extension)) {
					$this->error = "Selected file isn't an image file";
					return false;
				}
				else if (($_FILES["img"]["size"] > 2000000)) {
					$this->error = "Image has more than 2 MB";
					return false;
				} 
			}
			return true;
		}
	
		public function taskAdd($task) {
			$curid = (int)$this->lastId() + 1;
			$params = [
				'id' => $curid,
				'name' => $task['task_name'],
				'email' => $task['task_email'],
				'content' => $task['task_content'],
				'pict' => 'task_'.$curid.'.jpg',
				'changed' => date("Y-m-d H:i:s"),
				'completed' => 0,
                		'edited' => 0
			];
			$this->db->query('INSERT INTO tasks VALUES (:id, :name, :email, :content, :pict, :changed, :completed, :edited)', $params);
			return $curid;
		}

		public function taskUploadImage($path, $id) {
			$resizedDestination = 'public/images/task_'.$id.'.jpg';
			copy($path, $resizedDestination);
			$imageSize = getImageSize($path);
			$imageWidth = $imageSize[0];
			$imageHeight = $imageSize[1];
			$config = require 'application/config/db.php';
			$setWIDTH = $config['imageWidth'];
			$setHEIGHT = $config['imageHeight'];

			$cropWidth = $this->setSize($imageWidth, $imageHeight, $setWIDTH, $setHEIGHT)[0];
			$cropHeight = $this->setSize($imageWidth, $imageHeight, $setWIDTH, $setHEIGHT)[1];

			switch ($imageSize['mime']) {
				case "image/gif":
					$originalImage = imagecreatefromgif($path);
				   break;
				case "image/jpg":
				case "image/jpeg":
					$originalImage = imagecreatefromjpeg($path);
				   break;
				case "image/png":
					$originalImage = imagecreatefrompng($path);
				   break;
			}
			$resizedImage = imageCreateTrueColor($cropWidth, $cropHeight);
			imageCopyResampled($resizedImage, $originalImage, 0, 0, 0, 0, $cropWidth+1, $cropHeight+1, $imageWidth, $imageHeight);
			imageJPEG($resizedImage, $resizedDestination);
			imageDestroy($originalImage);
			imageDestroy($resizedImage);
		}
	
		public function taskDelete($id) {
			$params = [
				'id' => $id,
			];
			$this->db->query('DELETE FROM tasks WHERE id = :id', $params);
			unlink('public/images/task_'.$id.'.jpg');
		}
	
		public function taskData($id) {
			$params = [
				'id' => $id,
			];
			return $this->db->row('SELECT * FROM tasks WHERE id = :id', $params);
		}

		public function taskEdit($post, $id) {
			$completed = isset($post['task_completed']) && $post['task_completed'] ? 1 : 0;
			$params = [
				'id' => $id,
				'name' => $post['task_name'],
				'email' => $post['task_email'],
				'content' => $post['task_content'],
				'changed' => date("Y-m-d H:i:s"),
				'completed' => $completed,
                		'edited' => 1
			];
			$this->db->query('UPDATE tasks SET name = :name, email = :email, content = :content, changed = :changed, completed = :completed, edited = :edited WHERE id = :id', $params);
		}

		private function setSize($width, $height, $setwidth, $setheight){
			$newheight = 0;
			$newwidth = 0;
			if($width > $setwidth){
				$newheight = round(($setwidth * $height) / $width);
				$newwidth = $setwidth;
				if($newheight > $setheight){
					$newwidth = round(($setheight * $newwidth) / $newheight);
					$newheight = $setheight;
				}
			}
			elseif($height > $setheight){
					$newwidth = round(($setheight * $width) / $height);
					$newheight = $setheight;
			}
			else{
				$newwidth = $width;
				$newheight = $height;
			}
			return [$newwidth, $newheight];
		}
		
	}

?>
