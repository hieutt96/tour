$(document).on('click','#add',function(){
	$("#form").append(`
			<div class="row col-lg-12 formData">
				<div class="form-group col-lg-4" style="margin-left: 60px;">
					<input type="text" name="name" required="true"  class="form-control" placeholder="Tên">
				</div>
				<div class="form-group col-lg-5">
					<textarea type="text" name="description" required="true" class="form-control" placeholder="Mô tả"></textarea>
				</div>
			</div>
		`);
});

$(document).on('click','#sub',function(){
	var n = $('.formData').length;
	// console.log(n);
	if(n>1){
		$(".formData:last").remove();
	}else{
		alert("form tối thiểu là 1");
	}
});


$(document).on('click','#submit',function(){
	var id = $("#id").val();
	var data = [];
	$(".formData").each(function(){
		var name = $(this).find('input').val();
		var description = $(this).find('textarea').val();
		data.push({
			'name':name,
			'description':description,
		});
	});	
	if(data.length){
		$.ajax({
			type:'get',
			dataType:'json',
			data:{'data':data},
			url:'/admin/addplace/'+id,
			success:function(data){
				alert(data);
			},
			error:function(){

			},
		});
	}
});
// $("#sub").click(function(){
// 	console.log($('.formData').length);
// });