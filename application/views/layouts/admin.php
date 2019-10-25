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
		<div class="container container-fluid">
			<p><?php echo $content; ?></p>
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