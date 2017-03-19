$(document).ready(function () {
    for (var i = 0; i < 50; i++) {

        sum();
        $("#getinvoicebundle_invoice_positions_" + i + "_quantity, \n\
    #getinvoicebundle_invoice_positions_" + i + "_priceNet").on("keydown keyup", function () {
            sum();

            multi();
            $("#getinvoicebundle_invoice_positions_" + i + "_valueNet, \n\
    #getinvoicebundle_invoice_positions_" + i + "_rateVAT").on("keydown keyup", function () {
                multi();

            });

        });
    }

    function sum() {
        for (var j = 0; j < 50; j++) {
            var quantity = $("#getinvoicebundle_invoice_positions_" + j + "_quantity").val();
            var price = $("#getinvoicebundle_invoice_positions_" + j + "_priceNet").val();

            var worth = parseInt(quantity) * parseInt(price);

            if (!isNaN(worth)) {
                $("#getinvoicebundle_invoice_positions_" + j + "_valueNet").val(worth);
            }
        }
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


    sumNet();

    $('input[id*~="valueNet"]').on("keydown keyup", function () {
        sumNet();
    });

    function sumNet() {

        var arr = $('input[id~="valueNet"]');
        var totalNet = 0;

        for (var l = 0; l < arr.length; l++) {
            if (parseInt(arr[l].value)) {
                totalNet += parseInt(arr[l].value);
            }
        }
        $("#getinvoicebundle_invoice_totalValueNet").val(totalNet);
    }
});