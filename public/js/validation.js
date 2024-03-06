$(document).ready(function () {
    $(document.body).on("input", ".just-numbers", function (e) {
        var numericValue = $(this)
            .val()
            .replace(/[^0-9]/g, "");

        $(this).val(numericValue);
    });
    // $('.just-numbers').on('input', function(e) {
    //     var numericValue = $(this).val().replace(/[^0-9]/g, '');

    //     $(this).val(numericValue);
    // });
});

$(document).ready(function () {
    $(".just-letters").on("input", function (e) {
        var persianAndEnglishValue = $(this)
            .val()
            .replace(/[^a-zA-Zآ-ی ًٌٍَُِّ‌ ]/g, "");

        $(this).val(persianAndEnglishValue);
    });
});

$(document).ready(function () {
    $(".nonPersianletters").on("input", function (e) {
        var nonPersianValue = $(this)
            .val()
            .replace(/[آ-ی ًٌٍَُِّ‌]/g, "");
        $(this).val(nonPersianValue);
    });
});
$(document).ready(function () {
    $("site-slug").on("input", function (e) {
        var $input = $(this);
        var nonPersianValue = $input.val().replace(/[آ-ی ًٌٍَُِّ‌]/g, "");

        if (nonPersianValue !== $input.val()) {
            $input
                .attr("title", "فقط حروف انگلیسی و بدون فاصله")
                .tooltip("show");
            setTimeout(function () {
                $input.tooltip("hide");
            }, 2000);
        }
        $input.val(nonPersianValue.toLowerCase());
    });
});

$(document).ready(function () {
    $(".persianletters").on("input", function (e) {
        var persianValue = $(this)
            .val()
            .replace(/[^آ-ی ًٌٍَُِّ‌]/g, "");

        $(this).val(persianValue);
    });
});
$(document).ready(function () {
    $(".object-slug").on("change", function (e) {
        $(this).val($(this).val().trim().toLowerCase().replace(/\s+/g, "-"));
    });
});
// function makeSlug(string) {
//     return string.trim().toLowerCase().replace(/\s+/g, "-");
// }
