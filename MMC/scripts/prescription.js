$(document).ready(function(){
	var i=3;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="medicine[]" placeholder="Enter medicine" class="form-control name_list" /></td><td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td><td><input type="text" name="morning[]" placeholder="" class="form-control name_list" /></td><td><input type="text" name="noon[]" placeholder="" class="form-control name_list" /></td><td><input type="text" name="night[]" placeholder="" class="form-control name_list" /></td><td><input type="text" name="day[]" placeholder="Days" class="form-control name_list" /></td><td><input type="text" name="description[]" placeholder="Description" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"../process/save_prescription.php",
			method:"POST",
			data:$('#prescription').serialize(),
			success:function(data)
			{
				alert(data);
				$('#prescription')[0].reset();
			}
		});
	});
	
	
	
});

