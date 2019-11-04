function sortData(column, order){
	$.ajax({
		type:'GET',
		url:'/main/' + column + order,
		success: (data)=>{

            data = JSON.parse(data);
            $('tbody').empty();
            $('.pager').empty();
            var sTableContent = '';
            for(var id in data.list){
                sTableContent += '<tr>';
                sTableContent += '<td>' + data.list[id].changed + '</td>';
                sTableContent += '<td>' + data.list[id].name + '</td>';
                sTableContent += '<td>' + data.list[id].email + '</td>';
                sTableContent += '<td class="text-left">' + data.list[id].content.substring(0,40) + '...</td>';
                sTableContent += '<td><img src="/public/images/' + data.list[id].pict + '" class="img-thumbnail" width="35" height="35"/></td>';
                sTableContent += '<td>';
                if(data.list[id].completed == 1){
                    sTableContent += '<spanclass="text-primary">completed</span>';
                }
                else{
                    sTableContent += '<span class="text-secondary">...</span>';
                }
                sTableContent += '</td>';
                sTableContent += '<td class="text-center">';
                sTableContent += '<button class="btn btn-info btn-sm btn-edit" id="' + data.list[id].id+ '">Details</button>';
                sTableContent += '</td>';
                sTableContent += '</tr>';
                
            }
            $('tbody').append(sTableContent);
            $('.pager').append(data.pagination);
            $(".btn-edit").bind("click",(elem)=>{
				$target = $(elem.target);
				const id = $target.attr('id');
				showSelected(id);
			});
		},
		error: (err)=>{
			console.log(err);
		}
	});
}