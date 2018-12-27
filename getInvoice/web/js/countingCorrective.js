$(document).ready(function () {

    $("div.row").mousemove(function () {
        sum();
        multi();
        check();
        words();
    });
    $(":root").mousemove(function () {
        sum();
        multi();
        check();
        ordinals();
    });

    $(":root").click(function () {
        ordinals();
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
            var quantity = $("#getinvoicebundle_invoicecorrective_positions_" + j + "_quantity").val();
            $("#getinvoicebundle_invoicecorrective_positions_" + j + "_quantity").on("change", function () {
                $(this).val($(this).val().replace(/,/g, '.'));
            });
            var price = $("#getinvoicebundle_invoicecorrective_positions_" + j + "_priceNet").val();
            $("#getinvoicebundle_invoicecorrective_positions_" + j + "_priceNet").on("change", function () {
                $(this).val($(this).val().replace(/,/g, '.'));
            });

            var worth = parseFloat(quantity) * parseFloat(price);

            if (!isNaN(worth)) {
                netWorth += worth;
                $("#getinvoicebundle_invoicecorrective_positions_" + j + "_valueNet").val(worth.toFixed(2));
            }
            if (!isNaN(worth) && ($("#getinvoicebundle_invoicecorrective_positions_" + j + "_rateVAT").val() == 23)) {
                subTotalSum += worth;
            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoicecorrective_positions_" + j + "_rateVAT").val() == 8)) {
                secondSum += worth;

            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoicecorrective_positions_" + j + "_rateVAT").val() == 5)) {
                thirdSum += worth;

            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoicecorrective_positions_" + j + "_rateVAT").val() == 0)) {
                fourthSum += worth;

            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoicecorrective_positions_" + j + "_rateVAT").val() == -1)) {
                fifthSum += worth;

            } else if (!isNaN(worth) && ($("#getinvoicebundle_invoicecorrective_positions_" + j + "_rateVAT").val() == -2)) {
                sixthSum += worth;

            }

        }  
        $("#invoiceCorrectiveSummary0-netValueSummaryForTaxRate").val(subTotalSum.toFixed(2));
        $("#invoiceCorrectiveSummary1-netValueSummaryForTaxRate").val(secondSum.toFixed(2));
        $("#invoiceCorrectiveSummary2-netValueSummaryForTaxRate").val(thirdSum.toFixed(2));
        $("#invoiceCorrectiveSummary3-netValueSummaryForTaxRate").val(fourthSum.toFixed(2));
        $("#invoiceCorrectiveSummary4-netValueSummaryForTaxRate").val(fifthSum.toFixed(2));
        $("#invoiceCorrectiveSummary5-netValueSummaryForTaxRate").val(sixthSum.toFixed(2));



        var invoiceNetSummary = 0;
        for (var x = 0; x < 6; x++) {
            var sub = $("#invoiceSummary" + x + "-netValueSummaryForTaxRate").val();
            invoiceNetSummary += parseFloat(sub);
        }
        var correctiveNetSummary = netWorth - invoiceNetSummary;
        $("#getinvoicebundle_invoicecorrective_totalValueNet").val(correctiveNetSummary.toFixed(2));


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
            var valueNet = $("#getinvoicebundle_invoicecorrective_positions_" + k + "_valueNet").val();
            var rateVAT = $("#getinvoicebundle_invoicecorrective_positions_" + k + "_rateVAT").val();

            var vat = (rateVAT > 0 && !isNaN(rateVAT) ? ((parseFloat(valueNet) * parseFloat(rateVAT)) / 100) : 0);
            var gross = parseFloat(valueNet) + vat;


            if (!isNaN(vat)) {
                totalVat = totalVat + vat;
                totalGross = subTotalGross + secondTotalGross + thirdTotalGross + fourthTotalGross +
                        fifthTotalGross + sixthTotalGross;
                $("#getinvoicebundle_invoicecorrective_positions_" + k + "_amountVAT").val(vat.toFixed(2));
                $("#getinvoicebundle_invoicecorrective_positions_" + k + "_valueGross").val(gross.toFixed(2));
            }
            if (!isNaN(vat) && ($("#getinvoicebundle_invoicecorrective_positions_" + k + "_rateVAT").val() == 23)) {
                subTotalVat += vat;
                $("#invoiceCorrectiveSummary0-taxAmountSummaryForTaxRate").val(subTotalVat.toFixed(2));
                subTotalGross += gross;
                $("#invoiceCorrectiveSummary0-valueSummaryForTaxRate").val(subTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoicecorrective_positions_" + k + "_rateVAT").val() == 8)) {
                secondTotalVat += vat;
                $("#invoiceCorrectiveSummary1-taxAmountSummaryForTaxRate").val(secondTotalVat.toFixed(2));
                secondTotalGross += gross;
                $("#invoiceCorrectiveSummary1-valueSummaryForTaxRate").val(secondTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoicecorrective_positions_" + k + "_rateVAT").val() == 5)) {
                thirdTotalVat += vat;
                $("#invoiceCorrectiveSummary2-taxAmountSummaryForTaxRate").val(thirdTotalVat.toFixed(2));
                thirdTotalGross += gross;
                $("#invoiceCorrectiveSummary2-valueSummaryForTaxRate").val(thirdTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoicecorrective_positions_" + k + "_rateVAT").val() == 0)) {
                fourthTotalVat += vat;
                $("#invoiceCorrectiveSummary3-taxAmountSummaryForTaxRate").val(fourthTotalVat.toFixed(2));
                fourthTotalGross += gross;
                $("#invoiceCorrectiveSummary3-valueSummaryForTaxRate").val(fourthTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoicecorrective_positions_" + k + "_rateVAT").val() == -1)) {
                fifthTotalVat = 0;
                $("#invoiceCorrectiveSummary4-taxAmountSummaryForTaxRate").val(fifthTotalVat.toFixed(2));
                fifthTotalGross += gross;
                $("#invoiceCorrectiveSummary4-valueSummaryForTaxRate").val(fifthTotalGross.toFixed(2));
            } else if (!isNaN(vat) && ($("#getinvoicebundle_invoicecorrective_positions_" + k + "_rateVAT").val() == -2)) {
                sixthTotalVat = 0;
                $("#invoiceCorrectiveSummary5-taxAmountSummaryForTaxRate").val(sixthTotalVat.toFixed(2));
                sixthTotalGross += gross;
                $("#invoiceCorrectiveSummary5-valueSummaryForTaxRate").val(sixthTotalGross.toFixed(2));
            }   
        }
        
        $("#getinvoicebundle_invoicecorrective_totalAmountVAT").val(totalVat.toFixed(2));
        $("#getinvoicebundle_invoicecorrective_totalValueGross").val(totalGross.toFixed(2));

        var correctiveVatSummary = totalVat - invoiceVatSummary;
        var correctiveGrossSummary = totalGross - invoiceGrossSummary;
        
        $("#getinvoicebundle_invoicecorrective_totalAmountVAT").val(correctiveVatSummary.toFixed(2));
        $("#getinvoicebundle_invoicecorrective_totalValueGross").val(correctiveGrossSummary.toFixed(2));
        

        var invoiceVatSummary = 0;
        var invoiceGrossSummary = 0;
       for (var y = 0; y < 6; y++) {

            var sub1 = $("#invoiceSummary" + y + "-taxAmountSummaryForTaxRate").val();
            var sub2 = $("#invoiceSummary" + y + "-valueSummaryForTaxRate").val();

            invoiceVatSummary += parseFloat(sub1);
            invoiceGrossSummary += parseFloat(sub2);

        }

        var correctiveVatSummary = totalVat - invoiceVatSummary;
        var correctiveGrossSummary = totalGross - invoiceGrossSummary;
        $("#getinvoicebundle_invoicecorrective_totalAmountVAT").val(correctiveVatSummary.toFixed(2));
        $("#getinvoicebundle_invoicecorrective_totalValueGross").val(correctiveGrossSummary.toFixed(2));

        var updatedRemain = 0;
        var paid = $("#getinvoicebundle_invoicecorrective_paid").val();
        if (paid == 0) {

            $("#getinvoicebundle_invoicecorrective_remainToPay").val(correctiveGrossSummary.toFixed(2));
        } else if (paid > 0 && correctiveGrossSummary < 0) {
            updatedRemain = -correctiveGrossSummary - paid;

            $("#getinvoicebundle_invoicecorrective_remainToPay").val(-updatedRemain.toFixed(2));
        } else if (paid > 0) {
            updatedRemain = correctiveGrossSummary - paid;

            $("#getinvoicebundle_invoicecorrective_remainToPay").val(updatedRemain.toFixed(2));            
        }
               
        
        
    }

    function check() {
        for (var i = 0; i < 6; i++) {
            if ($("#invoiceCorrectiveSummary" + i + "-netValueSummaryForTaxRate").val() > 0) {

                $("#vatCorrective" + i).show();
            } else {
                $("#vatCorrective" + i).hide();
            }
        }
    }

    function words() {

        var amount = $("#getinvoicebundle_invoicecorrective_remainToPay").val();
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
        if (amount < 0 && !isNaN(-amount - Math.floor(-amount))) {
            var gr = (-amount - Math.floor(-amount));
            console.log(gr);    
            var dd = Math.floor((gr.toFixed(2) * 100) / 10);
            var jj = Math.floor((gr.toFixed(2) * 100) - dd * 10);

            cents = ' i ' + dd + jj + '/100';

        } else {
            var gr = (amount - Math.floor(amount));
            console.log(gr);    
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
                amount = -amount;
            }

            var g = 0;
            while (amount > 0 ) {
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
            console.log(output);
            console.log(amount);
            var currency = $("#getinvoicebundle_invoicecorrective_currency").val();
            $("#getinvoicebundle_invoicecorrective_toPayInWords").val(mark + output + ' ' + currency + cents);
        } else {
            return false;
        }
        return false;
    }
    function ordinals() {
        for (var w = 0; w < 50; w++) {
            $("#getinvoicebundle_invoicecorrective_positions_" + w + "_ordinal").val(w + 1);
            $("#getinvoicebundle_invoicecorrective_positions_" + w + "_ordinal").prop('readonly', true);
        }
    }

    $("#getinvoicebundle_invoicecorrective_dateIssue").on("change", function () {
        var saleDate = $("#getinvoicebundle_invoicecorrective_dateIssue").val();
        var issueDate = new Date($("#getinvoicebundle_invoicecorrective_dateIssue").val());

        if (!isNaN(issueDate.getTime())) {
            issueDate.setDate(issueDate.getDate() + 14);

            $("#getinvoicebundle_invoicecorrective_dateSale").val(saleDate);
            $("#getinvoicebundle_invoicecorrective_datePayment").val(issueDate.toInputFormat());
        }
    });

    Date.prototype.toInputFormat = function () {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth() + 1).toString();
        var dd = this.getDate().toString();
        return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
    };
});

