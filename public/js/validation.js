
$(document).ready(function() {
    $('.just-numbers').on('input', function(e) {
        var numericValue = $(this).val().replace(/[^0-9]/g, '');

        $(this).val(numericValue);
    });
});

$(document).ready(function () {
    $('.just-letters').on('input', function (e) {
        var persianAndEnglishValue = $(this).val().replace(/[^a-zA-Zآ-ی ًٌٍَُِّ‌ ]/g, '');

        $(this).val(persianAndEnglishValue);
    });
});


$(document).ready(function() {
    $('.nonPersianletters').on('input', function(e) {
        var nonPersianValue = $(this).val().replace(/[آ-ی ًٌٍَُِّ‌]/g, '');

        $(this).val(nonPersianValue);
    });
});

$(document).ready(function() {
    $('.persianletters').on('input', function(e) {
        var persianValue = $(this).val().replace(/[^آ-ی ًٌٍَُِّ‌]/g, '');

        $(this).val(persianValue);
    });
});
