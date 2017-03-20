$(document).ready(function () {
    //for (var i = 0; i < 50; i++) {
    //   console.log(i);
    //sum();
    $("div.row").on("keyup", function () {
        sum();
        multi();
    });

//    $(".collection-action").click(function(){
//        $("*").on("keyup", function () {
//            sum();
//            console.log('test');
//        });
//
//    });

    // }

    function sum() {
        var netWorth = 0;
        for (var j = 0; j < 50; j++) {
            var quantity = $("#getinvoicebundle_invoice_positions_" + j + "_quantity").val();
            var price = $("#getinvoicebundle_invoice_positions_" + j + "_priceNet").val();

            var worth = parseInt(quantity) * parseInt(price);
            if (!isNaN(worth)) {
                netWorth = netWorth + worth;
            }
            console.log(netWorth);
            $("#getinvoicebundle_invoice_positions_" + j + "_valueNet").val(worth);

        }
        $("#getinvoicebundle_invoice_totalValueNet").val(netWorth);
    }

    function multi() {
        for (var k = 0; k < 50; k++) {
            var valueNet = $("#getinvoicebundle_invoice_positions_" + k + "_valueNet").val();
            var rateVAT = $("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val();
            var vat = ((parseInt(valueNet) * parseInt(rateVAT)) / 100);
            var gross = parseInt(valueNet) + parseFloat(vat);

            if (!isNaN(vat)) {
                $("#getinvoicebundle_invoice_positions_" + k + "_amountVAT").val(vat);
                $("#getinvoicebundle_invoice_positions_" + k + "_valueGross").val(gross);
            }

        }
    }


//    sumNet();
//
//    $('input[id*~="valueNet"]').on("keydown keyup", function () {
//        sumNet();
//    });
//
//    function sumNet() {
//
//        var arr = $('input[id~="valueNet"]');
//        var totalNet = 0;
//
//        for (var l = 0; l < arr.length; l++) {
//            if (parseInt(arr[l].value)) {
//                totalNet += parseInt(arr[l].value);
//            }
//        }
//        $("#getinvoicebundle_invoice_totalValueNet").val(totalNet);
//    }
});