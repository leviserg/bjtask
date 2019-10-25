<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<Title><?php echo $title; ?></Title>
		<link href="/public/styles/bootstrap.css" rel="stylesheet">
		<link href="/public/styles/mystyles.css" rel="stylesheet">
		<link href="/public/styles/favicon.ico" rel="shortcut icon">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row mt-4 text-center">
				<div class="col-md-1 clearfix"></div>
				<div class="col-md-2 px-4">
					<br/>
					<div class="card mt-2">
						<div class="card card-header text-center"><h5 class="text-success">Control Panel</h5></div>
						<div class="card card-body text-center">
							<button class="btn btn-success btn-block mt-2" id="addtask">Add Task</button>
							<?php if (!isset($_SESSION['admin'])): ?>
								<a class="btn btn-info btn-block mt-2" id="loginbtn" href="/admin/login">Login</a>
								<p id="session" style="display:none">0</p>
							<?php else: ?>
								<a class="btn btn-info btn-block mt-2" id="logoutnbtn" href="/admin/logout">Logout</a>
								<p id="session" style="display:none">1</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
		<div class="modal modal-fade mt-3" id="record" tabindex="2">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header mb-0 mt-0">
						<h5 class="modal-title" id="taskTitle"></h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container">
							<form enctype="multipart/form-data" method="post" enctype="multipart/form-data" id="addtask" action="">
								<div class="form-group">
									<label for="task_name" class="small">Responsible:</label>
									<input class="form-control" id="task_name" name="task_name" type="text">
								</div>
								<div class="form-group">
									<label for="task_email" class="small">E-mail:</label>
									<input class="form-control" id="task_email" name="task_email" type="email">
								</div>
								<div class="form-group">
									<label for="task_content" class="small">Task description:</label>
									<textarea class="form-control" rows="2" id="task_content" name="task_content"></textarea>
								</div>
								<div class="row rowImg"></div>
								<div class="form-group">
									<label for="img" class="mt-2 ml-2"> Select Image </label>
									<input type="file" name="img" id="img"/>
								</div>
								<div id="completed">
								</div>
								<hr/>
								<button class="btn btn-primary mt-2" style="width:45%" type="button" data-dismiss="modal" aria-label="Close">Back</button>
								<?php if (isset($_SESSION['admin'])): ?>
									<button class="btn btn-danger mt-2 ml-2 delbtn" type="button" style="width:22%">Delete</button>
								<?php endif; ?>
								<input class="btn btn-info mt-2 ml-2 savebtn" type="submit" style="width:22%" value="Save">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>&copy; Sergey Levitskiy. Specially for BeeJee</small>
				</div>
			</div>
        </footer>		
		<script src="/public/scripts/jquery.js"></script>
		<script src="/public/scripts/popper.js"></script>
		<script src="/public/scripts/bootstrap.js"></script>
		<script src="/public/scripts/sweetalert.js"></script>	
		<script src="/public/scripts/basescripts.js"></script>
		<script src="/public/scripts/sort.js"></script>
	</body>
</html>