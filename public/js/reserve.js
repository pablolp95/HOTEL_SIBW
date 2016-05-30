$(document).ready(function(){
    var total = 0;
    var total_individual = 0;
    var total_doble = 0;
    var total_triple = 0;
    var total_familiar = 0;

    $("#select_Individual").change(function(){
        $price = Number($("#price_Individual").text());
        $number = Number($("#select_Individual").val());
        total_individual = $price*$number;
    });
    $("#select_Doble").change(function(){
        $price = Number($("#price_Doble").text());
        $number = Number($("#select_Doble").val());
        total_doble = $price*$number;
    });
    $("#select_Triple").change(function(){
        $price = Number($("#price_Triple").text());
        $number = Number($("#select_Triple").val());
        total_triple = $price*$number;
    });
    $("#select_Familiar").change(function(){
        $price = Number($("#price_Familiar").text());
        $number = Number($("#select_Familiar").val());
        total_familiar = $price*$number;
    });
    total = total_individual + total_doble + total_triple+ total_familiar;
    $("#total_amount").text(total.toString());


});

$(document).ready(function(){
    $("#select_Doble").change(function(){
        $total = Number($("#total_amount").text());
        $price = Number($("#price_Doble").text());
        $number = Number($("#select_Doble").val());
        $total = $price*$number;
        $("#total_amount").text($total.toString());
    });
});
