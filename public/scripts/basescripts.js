var isAdmin = 0;

$(document).ready(function(){
	
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					swal(json.status, json.status + ' - ' + json.message, json.status)
						.then((value) => {
							$('.form-control').val('');
							window.location.reload();
						}
					);
				}			
			},
		});
	});

	isAdmin = parseInt($('#session').text());

});

$("#addtask").bind("click",(elem)=>{
	$('#taskTitle').text("New Task");
	$('.rowImg').empty();
	$('#completed').empty();
	$('#task_name').val('');
	$('#task_email').val('');
	$('#task_content').val('');
	$('.savebtn').css('display','inline-block');
	$('.savebtn').css('width','45%');
	$('.delbtn').css('display','none');
	$('form').attr('action', '/task/add');
	$('#record').modal("show");
});


$(".btn-edit").bind("click",(elem)=>{
	$target = $(elem.target);
	const id = $target.attr('id');
	showSelected(id);
});

function showSelected(id){
	$.ajax({
		type:'GET',
		url:'/task/' + id,
		success: (data)=>{
			data = JSON.parse(data);
			$('#task_name').val(data.name);
			$('#task_email').val(data.email);
			$('#task_content').val(data.content);
			$(".rowImg").empty();
			$('#completed').empty();
			var sImgApp = '<div class="col-sm-12 text-center mb-2" style="width:100%" id="curtaskpict">';
				sImgApp += '<img src="/public/images/'+data.pict+'"/>';
				sImgApp += '</div>';
			$(sImgApp).appendTo('.rowImg');
			$('#taskTitle').text(data.name);
			var sCompleted = '<div class="form-group"><div class="checkbox">';
			if(data.completed == 0){
				sCompleted += '<label><input type="checkbox" value="1" id="task_completed" name="task_completed"> Completed</label>';
			}
			else{
				sCompleted += '<label><input type="checkbox" value="1" id="task_completed" name="task_completed" checked> Completed</label>';
			}
			if(data.edited != 0){
				sCompleted += '<p>Edited by Admin</p>';
			}
			sCompleted += '</div></div>';
			$(sCompleted).appendTo('#completed');
			if(isAdmin != 0){
				$('form').attr('action', '/task/edit/' + id);
				$('.delbtn').css('display','inline-block');
				$('.savebtn').css('display','inline-block');
				$('.savebtn').css('width','24%');
				$('.delbtn').css('width','24%');
				$('.delbtn').attr('id', id);
				$('.delbtn').bind("click",(elem)=>{
					$target = $(elem.target);
					const id = $target.attr('id');
					swal({
						title: "Are you sure?",
						text: "Your task with ID=" + id + " will be deleted!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					  })
					  .then((willDelete) => {
						if (willDelete) {
							$.ajax({
								url:"/task/delete/" + id,
								method:"POST",
								data:{id:id},
								success:function(data){
									$('#record').modal("hide");
									window.location.href = '';
								}
							});
						} else {
						  swal("Your task is safe!")
						  .then(()=>{
							$('#record').modal("hide");
						  });
						}
					});
				});				
			}
			else{
				$('.delbtn').css('display','none');
				$('.savebtn').css('display','none');
			}
			$('#record').modal("show");
		},
		error: (err)=>{
			console.log(err);
		}
	});
}