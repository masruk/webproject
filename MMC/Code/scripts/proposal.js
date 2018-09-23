$(document).ready(function(){
    var i=5;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="medicine[]" placeholder="Medicine name" class="form-control name_list" /></td><td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td><td><input type="text" name="chemical[]" placeholder="Chemical name" class="form-control name_list" /></td><td><input type="text" name="company[]" placeholder="Company" class="form-control name_list" /></td><td><input type="text" name="quantity[]" placeholder="Piece" class="form-control name_list" /></td><td><input type="text" name="approxcost[]" placeholder="Cost(tk)" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });

    $('#submit').click(function(){
        $.ajax({
            url:"../process/save_proposal.php",
            method:"POST",
            data:$('#proposal').serialize(),
            success:function(data)
            {

                var result = JSON.parse(data);
                alert(result[0]);
                document.getElementById("pid").innerHTML ="PID-"+result[1];

                $('#proposal')[0].reset();
            }
        });
    });



});



