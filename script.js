

$(function(){
    $('#vehicle-table').on('click', '.edit', function(event){
        let values = []
        $(this).parents("tr").find("td").each(function(){
            values.push($(this).html());
        });


        $("#p-id").text("Editar vehículo");

        $(".add-bg").fadeIn();
        $("#owner-id").val(values[1]);
        $("#carPlate-id").val(values[2]);
        $("#year-id").val(values[3]);
        $("#element-id").val(values[0]);
        $("#action-id").val("upd");
    });

    $('#vehicle-table').on('click', '.delete', function(event){
        let values = []
        $(this).parents("tr").find("td").each(function(){
            values.push($(this).html());
        });

        $.post('/vehicles/deleteVehicle.php', { id: values[0]}, function(result) {
            location.reload();
        });

    });
    $(".add-bg").hide();
    $("#add-Element").click(function(){
        $("#p-id").text("Nuevo vehículo");
	    $("#owner-id").val("");
        $("#carPlate-id").val("");
        $("#year-id").val("");
        $("#element-id").val("-1");
        $("#action-id").val("add");
        console.log("hola");
        $(".add-bg").fadeIn();
        
    });
    $(".exit-btn").click(function(){
        $(".add-bg").hide();
    });

});
