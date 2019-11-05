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
	    <nav class="navbar navbar-expand-sm navbar-dark bg-success">
	        <a class="navbar-brand" href="/">Home</a>
	         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarContent">
	            <ul class="navbar-nav mr-auto">
	                <li class="nav-item active text-center">
	                	<a class="nav-link" id="addtask" data-toggle="tooltip" title="Add Task">Add Task</a>
	                </li>
	            </ul>
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item active text-center">
	                	<?php if (!isset($_SESSION['admin'])): ?>
					<a class="nav-link" id="loginbtn" data-toggle="tooltip" title="System Login" href="/admin/login">Login</a>
					<p id="session" style="display:none">0</p>
				<?php else: ?>
					<a class="nav-link" id="logoutnbtn" data-toggle="tooltip" title="System Logout" href="/admin/logout">Logout</a>
					<p id="session" style="display:none">1</p>
				<?php endif; ?>
	                </li>
	            </ul>
	        </div>
	    </nav>
		<div class="container container-fluid">
			<div class="row mt-4 text-center">
				<div class="col-md-12">
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
