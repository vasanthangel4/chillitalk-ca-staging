
$(function () {
    var fromTextBox = $('#ContentPlaceHolderV2_ACTB1_TextBoxCountry');
    var toTextBox = $('#ContentPlaceHolderV2_ACTB2_TextBoxCountry');
    var refreshButton = $("#refreshButton");
    fromTextBox.keyup(function (event) {
        if (event.which == 13) { // if enter was pressed
            refresh($(this).val(), toTextBox.val());
        }
    });

    toTextBox.keyup(function (event) {
        if (event.which == 13) { // if enter was pressed
            refresh(fromTextBox.val(), $(this).val());
        }
    });

    refreshButton.click(function () {
        refresh(fromTextBox.val(), toTextBox.val());
    });
    /*
    if (getParameterByName("cid") != null && getParameterByName("cid").length > 0) {
    fromTextBox.val(getParameterByName("countryf"));
    toTextBox.val(getParameterByName("country"));

    showInputFlag('flagFrom', getParameterByName("cidf")); // display Flag
    showInputFlag('flagTo', getParameterByName("cid")); // display Flag
    }
    */
    fromTextBox.val('United Kingdom');
    toTextBox.val('');

    showInputFlag('flagFrom', '220'); // display Flag
    showInputFlag('flagTo', '0'); // display Flag

});

function refresh(fromText, toText) {
    var dropDownSuccess = setToDropDown(fromText, toText);
    if (dropDownSuccess != false) {
        // country from
        var ctryNameFrom = $("#ContentPlaceHolderV2_ddlCountryFrom").children("option").filter(":selected").text();
        var ctryValueFrom = $("#ContentPlaceHolderV2_ddlCountryFrom").children("option").filter(":selected").val();

        // country to
        var ctryName = $("#ContentPlaceHolderV2_ddlCountryTo").children("option").filter(":selected").text();
        var ctryValue = $("#ContentPlaceHolderV2_ddlCountryTo").children("option").filter(":selected").val();
        window.location = location.pathname + "?country=" + encodeURIComponent(ctryName) + '&cid=' + ctryValue + '&countryf=' + encodeURIComponent(ctryNameFrom) + '&cidf=' + ctryValueFrom;
        $('#worldchoice').hide();
    }

    return false;
}

function setToDropDown(fromText, toText) {
    // get dropdownList as jquery objects
    var fromDropDownList = $('#ContentPlaceHolderV2_ddlCountryFrom');
    var toDropDownList = $('#ContentPlaceHolderV2_ddlCountryTo');

    if (fromText != "") { // look for text in dropdownlist and select it
        if (fromText.toLowerCase() == "united states") { // first convert text to server version, if necessary
            fromText = "USA";
        }
        if (fromText.toLowerCase() == "us virgin islands") { // first convert text to server version, if necessary
            fromText = "US Virgin Islands";
        }

        $("#ContentPlaceHolderV2_ddlCountryFrom option").filter(function () {
            return $(this).text().toLowerCase() == fromText.toLowerCase();
        }).attr('selected', 'selected');
    }

    if (toText != "") { // look for text in dropdownlist and select it
        if (toText.toLowerCase() == "united states") { // first convert text to server version, if necessary
            toText = "USA";
        }
        if (toText.toLowerCase() == "us virgin islands") { // first convert text to server version, if necessary
            toText = "US Virgin Islands";
        }

        $("#ContentPlaceHolderV2_ddlCountryTo option").filter(function () {
            return $(this).text().toLowerCase() == toText.toLowerCase();
        }).attr('selected', 'selected');
    }

    if (fromText == "" && toText != "") {
        $("#rateError").html("* Please enter a country you are calling FROM");
        $("#rateError").show();
        $("#rsblank").show();
        $("#ContentPlaceHolderV2_pnlResults").hide();
        return false;
    } else
        if (fromText != "" && toText == "") {
            $("#rateError").html("* Please enter a country you are calling TO");
            $("#rateError").show();
            $("#rsblank").show();
            $("#ContentPlaceHolderV2_pnlResults").hide();

            return false;
        } else
            if (fromText == "" && toText == "") {
                $("#rateError").html("* Please enter both the country you are calling FROM and TO");
                $("#rateError").show();
                $("#rsblank").show();
                $("#ContentPlaceHolderV2_pnlResults").hide();
                return false;
            } else
                if (!isValidOption(toText)) {
                    $("#rateError").html("* The country you have entered is not recognized. Please retry.");
                    $("#rateError").show();
                    $("#rsblank").show();
                    $("#ContentPlaceHolderV2_pnlResults").hide();
                    return false;
                } else
                    if (!isValidOption(fromText)) {
                        $("#rateError").html("* The country you have entered is not recognized. Please retry.");
                        $("#rateError").show();
                        $("#rsblank").show();
                        $("#ContentPlaceHolderV2_pnlResults").hide();
                        return false;
                    }

}