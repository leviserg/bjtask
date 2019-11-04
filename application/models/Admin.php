<?php

	namespace application\models;
    use application\core\Model;
    

	class Admin extends Model
	{
        public $error;
        public function loginValidate($post) {
            $config = require 'application/config/admin.php';
            if ($config['login'] != $post['login'] or $config['password'] != $post['pwd']) {
                $this->error = 'Wrong login or password';
                return false;
            }
            return true;
        }
		
	}

?>