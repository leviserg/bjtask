<?php if (empty($list)): ?>
	<p>Posts list empty</p>
<?php else: ?>
	<div class="row mt-3">
		<div class="col-md-12 text-center table-responsive mt-3">
			<table class='table table-bordered' style='width:100%;'>
				<thead>
					<tr>
						<th>
							<a class="desc" href="/main/index/changed/desc/1"></a>
								Changed at
							<a class="asc" href="/main/index/changed/asc/1"></a>
						</th>
						<th>
							<a class="desc" href="/main/index/name/desc/1"></a>
								Name
							<a class="asc" href="/main/index/name/asc/1"></a>
						</th>
						<th>
							<a class="desc" href="/main/index/email/desc/1"></a>
								E-mail
							<a class="asc" href="/main/index/email/asc/1"></a>
						</th>
						<th>Description</th>
						<th>Image</th>
						<th>
							<a class="desc" href="/main/index/completed/desc/1"></a>
								Status
							<a class="asc" href="/main/index/completed/asc/1"></a>
						</th>
						<th>More...</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list as $task): ?>
						<tr>
							<td><?php echo $task['changed']; ?></td>
							<td><?php echo $task['name']; ?></td>
							<td><?php echo $task['email']; ?></td>
							<td class="text-left"><?php echo substr($task['content'],0,40).'...'; ?></td>
							<td><?php echo ('<img src="/public/images/'.$task["pict"].'" class="img-thumbnail" width="35" height="35" />'); ?></td>
							<td>
								<?php if($task['completed'] == 1): ?>
									<span class="text-primary">completed</span>
								<?php else: ?>
									<span class="text-secondary">...</span>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<?php echo ('<button class="btn btn-info btn-sm btn-edit" id="'.$task["id"].'">Details</button>'); ?>
							</td>							
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 mt-3 ml-1 pager">
			<?php echo $pagination; ?>
		</div>
	</div>
<?php endif; ?>