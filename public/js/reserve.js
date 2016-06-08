    $("#roomstype").on("change",".selectType",function(){
        $table = document.getElementById("availables");
        $list = [];
        //Obtengo los tipos de habitaciones presentes actualmente y los almaceno
        for (var i = 1, row; row = $table.rows[i]; i++) {
            for (var j = 0, col; col = row.cells[j]; j+=3) {
                $list.push(row.cells[j].innerHTML);
            }
        }
        //Convierto la lista a JSON para enviarlo al servidor
        $jsonlist = JSON.stringify($list);
        $.ajax({
                type: "POST",
                url: "/?page=reserve&action=getprices",
                data: { data: $jsonlist }
            })
            .done(function( jsonResult ) {
                var obj = JSON.parse(jsonResult);
                jQuery.each(obj, function(type, price) {
                    $("#price_"+type).text(price.toString());
                });
                calculateTotal();
            });
    });

    function calculateTotal() {
        $day = 86400000;//milisegundos
        $start = new Date($("#starting_date").val());
        $end = new Date($("#ending_date").val());
        $diff = new Date($end - $start);
        $days = $diff/$day;
        $total = 0;

        if($("#price_Individual").length > 0 && $("#select_Individual").length > 0){
            $price_Individual = Number($("#price_Individual").text());
            $number_Individual = Number($("#select_Individual").val());
            $total += $price_Individual * $number_Individual;
        }
        if($("#price_Doble").length > 0 && $("#select_Doble").length > 0){
            $price_Doble = Number($("#price_Doble").text());
            $number_Doble = Number($("#select_Doble").val());
            $total += $price_Doble * $number_Doble;
        }
        if($("#price_Triple").length > 0 && $("#select_Triple").length > 0){
            $price_Triple = Number($("#price_Triple").text());
            $number_Triple = Number($("#select_Triple").val());
            $total += $price_Triple * $number_Triple;
        }
        if($("#price_Familiar").length > 0 && $("#select_Familiar").length > 0){
            $price_Familiar = Number($("#price_Familiar").text());
            $number_Familiar = Number($("#select_Familiar").val());
            $total += $price_Familiar * $number_Familiar;
        }

        $total *= $days;
        $("#total_amount").text($total.toString());
        $("input[name=total_amount_submit]").val($total.toString());
    }

    function refreshTooltipped() {
        $('.tooltipped').tooltip({delay: 50});
    }

    var original = document.getElementById("reserveslist").innerHTML;
    function showReserves(str) {

        if (str.length == 0) {
            document.getElementById("reserveslist").innerHTML = original;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("reserveslist").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","?page=intranet&action=findreserve&query="+str,true);
            xmlhttp.send();
        }
        refreshTooltipped();
    }

    function loadDoc(start,end,adult) {
       if(start!="" && end!="" && adult!=0) {
           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onreadystatechange = function () {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                   document.getElementById("roomstype").innerHTML = xmlhttp.responseText;

               }
           };
           xmlhttp.open("GET", "?page=reserve&action=roomstype&starting_date=" + start + "&ending_date=" + end + "&adults_number=" + adult, true);
           xmlhttp.send();
       }
    }