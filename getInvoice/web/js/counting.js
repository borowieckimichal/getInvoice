$(document).ready(function () {

    $("div.row").change(function() {
        sum();
        multi();
        check();
    });
    $(":root").click(function() {
        sum();
        multi();
        check();
        console.log("licznik uruchomień");
    });

    function sum() {
        var netWorth = 0;
        var subTotalSum = 0;
        var secondSum = 0;
        var thirdSum = 0;
        var fourthSum = 0;
        var fifthSum = 0;
        var sixthSum = 0;
        for (var j = 0; j < 50; j++) {
            var quantity = $("#getinvoicebundle_invoice_positions_" + j + "_quantity").val();
            var price = $("#getinvoicebundle_invoice_positions_" + j + "_priceNet").val();

            var worth = parseInt(quantity) * parseInt(price);
            if (!isNaN(worth)) {
                netWorth += worth;
                $("#getinvoicebundle_invoice_positions_" + j + "_valueNet").val(worth.toFixed(2));
            }
            if (!isNaN(worth) && ($("#getinvoicebundle_invoice_positions_" + j + "_rateVAT").val() == 23)) {
                subTotalSum += worth;
            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoice_positions_" + j + "_rateVAT").val() == 8)) {
                secondSum += worth;
                
            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoice_positions_" + j + "_rateVAT").val() == 5)) {
                thirdSum += worth;
                
            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoice_positions_" + j + "_rateVAT").val() == 0)) {
                fourthSum += worth;
                
            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoice_positions_" + j + "_rateVAT").val() == -1)) {
                fifthSum += worth;
                
            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoice_positions_" + j + "_rateVAT").val() == -2)) {
                sixthSum += worth;
                
            }

        }
        $("#invoiceSummary0-netValueSummaryForTaxRate").val(subTotalSum.toFixed(2));
        $("#invoiceSummary1-netValueSummaryForTaxRate").val(secondSum.toFixed(2));
        $("#invoiceSummary2-netValueSummaryForTaxRate").val(thirdSum.toFixed(2));
        $("#invoiceSummary3-netValueSummaryForTaxRate").val(fourthSum.toFixed(2));
        $("#invoiceSummary4-netValueSummaryForTaxRate").val(fifthSum.toFixed(2));
        $("#invoiceSummary5-netValueSummaryForTaxRate").val(sixthSum.toFixed(2));
        $("#getinvoicebundle_invoice_totalValueNet").val(netWorth.toFixed(2));
     
    }

    function multi() {
        var totalVat = 0;
        var subTotalVat = 0;
        var secondTotalVat = 0;
        var thirdTotalVat = 0;
        var fourthTotalVat = 0;
        var fifthTotalVat = 0;
        var sixthTotalVat = 0;
        var totalGross = 0;
        var subTotalGross = 0;
        var secondTotalGross = 0;
        var thirdTotalGross = 0;
        var fourthTotalGross = 0;
        var fifthTotalGross = 0;
        var sixthTotalGross = 0;
        for (var k = 0; k < 50; k++) {
            var valueNet = $("#getinvoicebundle_invoice_positions_" + k + "_valueNet").val();
            var rateVAT = $("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val();
          
            var vat = (rateVAT > 0 && !isNaN(rateVAT) ? ((parseInt(valueNet) * parseInt(rateVAT)) / 100) : 0);
            var gross = parseInt(valueNet) + vat;


            if (!isNaN(vat)) {
                totalVat = totalVat + vat;
                totalGross = subTotalGross + secondTotalGross + thirdTotalGross + fourthTotalGross +
                        fifthTotalGross + sixthTotalGross;
                $("#getinvoicebundle_invoice_positions_" + k + "_amountVAT").val(vat.toFixed(2));
                $("#getinvoicebundle_invoice_positions_" + k + "_valueGross").val(gross.toFixed(2));
            }
            if (!isNaN(vat) && ($("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val() == 23)) {
                subTotalVat += vat;
                $("#invoiceSummary0-taxAmountSummaryForTaxRate").val(subTotalVat.toFixed(2));
                subTotalGross += gross;
                $("#invoiceSummary0-valueSummaryForTaxRate").val(subTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val() == 8)) {
                secondTotalVat += vat;
                $("#invoiceSummary1-taxAmountSummaryForTaxRate").val(secondTotalVat.toFixed(2));
                secondTotalGross += gross;
                $("#invoiceSummary1-valueSummaryForTaxRate").val(secondTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val() == 5)) {
                thirdTotalVat += vat;
                $("#invoiceSummary2-taxAmountSummaryForTaxRate").val(thirdTotalVat.toFixed(2));
                thirdTotalGross += gross;
                $("#invoiceSummary2-valueSummaryForTaxRate").val(thirdTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val() == 0)) {
                fourthTotalVat += vat;
                $("#invoiceSummary3-taxAmountSummaryForTaxRate").val(fourthTotalVat.toFixed(2));
                fourthTotalGross += gross;
                $("#invoiceSummary3-valueSummaryForTaxRate").val(fourthTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val() == -1)) {
                fifthTotalVat = 0;
                $("#invoiceSummary4-taxAmountSummaryForTaxRate").val(fifthTotalVat.toFixed(2));
                fifthTotalGross += gross;
                $("#invoiceSummary4-valueSummaryForTaxRate").val(fifthTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoice_positions_" + k + "_rateVAT").val() == -2)) {
                sixthTotalVat = 0;
                $("#invoiceSummary5-taxAmountSummaryForTaxRate").val(sixthTotalVat.toFixed(2));
                sixthTotalGross += gross;
                $("#invoiceSummary5-valueSummaryForTaxRate").val(sixthTotalGross.toFixed(2));
            }
        }

        $("#getinvoicebundle_invoice_totalAmountVAT").val(totalVat.toFixed(2));
        $("#getinvoicebundle_invoice_totalValueGross").val(totalGross.toFixed(2));
    }
    function check() {
        for (var i = 0; i < 6; i++) {
            if ($("#invoiceSummary" + i + "-netValueSummaryForTaxRate").val() > 0) {
                
                $("#vat" + i).show();
            } else {
                $("#vat" + i).hide();
            }
        }
    }

});