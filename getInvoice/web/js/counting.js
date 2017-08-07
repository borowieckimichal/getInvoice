$(document).ready(function () {

    $("div.row").change(function () {
        sum();
        multi();
        check();
        words();
    });
    $(":root").click(function () {
        sum();
        multi();
        check();
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
            $("#getinvoicebundle_invoice_positions_" + j + "_quantity").on("change", function () {
                $(this).val($(this).val().replace(/,/g, '.'));
            });
            var price = $("#getinvoicebundle_invoice_positions_" + j + "_priceNet").val();
            $("#getinvoicebundle_invoice_positions_" + j + "_priceNet").on("change", function () {
                $(this).val($(this).val().replace(/,/g, '.'));
            });

            var worth = parseFloat(quantity) * parseFloat(price);

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

            var vat = (rateVAT > 0 && !isNaN(rateVAT) ? ((parseFloat(valueNet) * parseFloat(rateVAT)) / 100) : 0);
            var gross = parseFloat(valueNet) + vat;


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

        var updatedRemain = 0;
        var paid = $("#getinvoicebundle_invoice_paid").val();
        if (paid == 0) {

            $("#getinvoicebundle_invoice_remainToPay").val(totalGross.toFixed(2));
        } else if (paid > 0) {
            updatedRemain = totalGross - paid;
            
            $("#getinvoicebundle_invoice_remainToPay").val(updatedRemain.toFixed(2));
        }
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

    function words() {

        var amount = $("#getinvoicebundle_invoice_remainToPay").val();
        var ones = ["", " jeden", " dwa", " trzy", " cztery", " pięć", " sześć", " siedem", " osiem", " dziewięć"];
        var num = ["", " jedenaście", " dwanaście", " trzynaście", " czternaście", " piętnaście", " szesnaście", " siedemnaście", " osiemnaście", " dziewietnaście"];
        var tens = ["", " dziesięć", " dwadzieścia", " trzydzieści", " czterdzieści", " pięćdziesiąt", " sześćdziesiąt", " siedemdziesiąt", " osiemdziesiąt", " dziewięćdziesiąt"];
        var hundreds = ["", " sto", " dwieście", " trzysta", " czterysta", " pięćset", " sześćset", " siedemset", " osiemset", " dziewięćset"];
        var groups = [   
            ["", "", ""],
            [" tysiąc", " tysiące", " tysięcy"],
            [" milion", " miliony", " milionów"],
            [" miliard", " miliardy", " miliardów"],
            [" bilion", " biliony", " bilionów"],
            [" biliard", " biliardy", " biliardów"],
            [" trylion", " tryliony", " trylionów"]];
        var cents = '';
        if ((amount - Math.floor(amount)) > 0) {
            var gr = (amount - Math.floor(amount));

            var dd = Math.floor((gr.toFixed(2) * 100) / 10);
            var jj = Math.floor((gr.toFixed(2) * 100) - dd * 10);

            cents = ' i ' + dd + jj + '/100';

        }

        if (!isNaN(amount)) {

            var output = '';
            var mark = '';
            if (amount == 0)
                output = "zero";
            if (amount < 0) {
                mark = "minus";
                amount = amount;
            }

            var g = 0;
            while (amount > 0) {
                var s = Math.floor((amount % 1000) / 100);
                var n = 0;
                var d = Math.floor((amount % 100) / 10);
                var j = Math.floor(amount % 10);
                if (d == 1 && j > 0) {
                    n = j;
                    d = 0;
                    j = 0;
                }

                var k = 2;
                if (j == 1 && s + d + n == 0)
                    k = 0;
                if (j == 2 || j == 3 || j == 4)
                    k = 1;          
                if (s + d + n + j > 0)
                    output = hundreds[s] + tens[d] + num[n] + ones[j] + groups[g][k] + output;

                g++;

                amount = Math.floor(amount / 1000);

            }
            var currency = $("#getinvoicebundle_invoice_currency").val();
            $("#getinvoicebundle_invoice_toPayInWords").val(mark + output+' '+currency + cents);
        } else {
            return false;
        }
        return false;
    }


});