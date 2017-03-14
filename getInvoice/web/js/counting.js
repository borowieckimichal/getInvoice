$(document).ready(function () {
    sum();
    $("#getinvoicebundle_invoice_positions_0_quantity, \n\
    #getinvoicebundle_invoice_positions_0_priceNet").on("keydown keyup", function () {
        sum();

        multi();
        $("#getinvoicebundle_invoice_positions_0_valueNet, \n\
    #getinvoicebundle_invoice_positions_0_rateVAT").on("keydown keyup", function () {
            multi();




        });



    });

    function sum() {
        var quantity = document.getElementById('getinvoicebundle_invoice_positions_0_quantity').value;
        var price = document.getElementById('getinvoicebundle_invoice_positions_0_priceNet').value;
        var worth = parseInt(quantity) * parseInt(price);

        if (!isNaN(worth)) {
            document.getElementById('getinvoicebundle_invoice_positions_0_valueNet').value = worth;
        }

    }
    function multi() {
        var valueNet = document.getElementById('getinvoicebundle_invoice_positions_0_valueNet').value;
        var rateVAT = document.getElementById('getinvoicebundle_invoice_positions_0_rateVAT').value;
        var gross = parseInt(valueNet) * parseInt(rateVAT);

        if (!isNaN(gross)) {
            document.getElementById('getinvoicebundle_invoice_positions_0_valueGross').value = gross;
        }

    }

});