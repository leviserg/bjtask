<br/>
<div class="row mt-4 mr-auto ml-auto d-flex justify-content-center">
		<div style="width:400px;">
			<div class="card card-login">
				<div class="card-header">Login Form</div>
				<div class="card-body">
					<form action="/admin/login" method="post">
						<div class="form-group">
							<label for="name">Login</label>
							<input class="form-control text-center" type="text" name="login" id="name">
						</div>
						<div class="form-group">
							<label for="pwd">Password</label>
							<input class="form-control text-center" type="password" name="pwd" id="pwd">
						</div>
						<button type="submit" class="btn btn-primary btn-block">Go</button>
						<hr/>
					</form>
					<a class="btn btn-success btn-block" href="/">Back to Main</a>
				</div>
			</div>
		</div>
</div>