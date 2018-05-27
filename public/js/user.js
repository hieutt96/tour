$(document).on('click','.join',function(){
	// console.log(1);
	var temp = $(this).val();
	var tour_id = $(this).parent().siblings('input').val();
	// console.log(tour_id);
	if(temp == 1){
		$(this).val('0');
		$(this).text('Tham Gia');
		$.ajax({
			type:'get',
			dataType:'json',
			data:{'tour_id':tour_id},
			url:'/user/cancel/tour/'+tour_id,
			success:function(){
			},
			error:function(){

			}
		});
	}
	if(temp == 0){
		$(this).val('1');
		$(this).text('Hủy Tham Gia');
		$.ajax({
			type:'get',
			dataType:'json',
			data:{'tour_id':tour_id},
			url:'/user/join/tour/'+tour_id,
			success:function(){
				console.log(2);
			},
			error:function(){

			}
		});
	}
});