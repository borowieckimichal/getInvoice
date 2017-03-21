$(document).ready(function () {
    //for (var i = 0; i < 50; i++) {
    //   console.log(i);
    //sum();
    $("div.row").on("keyup", function () {
        sum();
        multi();
    });


    function sum() {
        var netWorth = 0;
        for (var j = 0; j < 50; j++) {
            var quantity = $("#getinvoicebundle_invoice_positions_" + j + "_quantity").val();
            var price = $("#getinvoicebundle_invoice_positions_" + j + "_priceNet").val();

            var worth = parseInt(quantity) * parseInt(price);
            if (!isNaN(worth)) {
                netWorth = netWorth + worth;
                $("#getinvoicebundle_invoice_positions_" + j + "_valueNet").val(worth.toFixed(2));
            }


        }
        $("#getinvoicebundle_invoice_totalValueNet").val(netWorth.toFixed(2));
    }

    function multi() {
        var totalVat = 0;
        var totalGross = 0;
        for (var k = 0; k < 50; k++) {
            var valueNet = $("#getinvoicebundle_invoice_positions_" + k + "_valueNet").val();
            var rateVAT = $("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val();
            var vat = ((parseInt(valueNet) * parseInt(rateVAT)) / 100);
            var gross = parseInt(valueNet) + parseFloat(vat);

            if (!isNaN(vat)) {
                totalVat = totalVat + vat;
                totalGross = totalGross + gross;
                $("#getinvoicebundle_invoice_positions_" + k + "_amountVAT").val(vat.toFixed(2));
                $("#getinvoicebundle_invoice_positions_" + k + "_valueGross").val(gross.toFixed(2));
            }

        }
        $("#getinvoicebundle_invoice_totalAmountVAT").val(totalVat.toFixed(2));
        $("#getinvoicebundle_invoice_totalValueGross").val(totalGross.toFixed(2));
    }

});