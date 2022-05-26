$(".tags-hidden").inputTags({
    max: 10,
    maxLength: 255,
    autocomplete: {
        values: [
            "php",
            "laravel",
            "ionic",
            "android",
            "vueJs",
            "bootstrap",
            "pwa",
            "typescript",
            "hybird",
            "livewire",
            "alpinejs",
            "ecommerce",
            "tailwindcss",
            "hasApi",
        ],
    },
    errors: {
        max: "max tags count is 10",
        exists: "this tag exists",
    }
});

$(".inputTags-field").keydown(function (e) {
    var key = e.which;
    if (key == 13) {
        // the enter key code
        return false;
    }

    if (key === 39) {
        // the right arrow key code
        var val = $(".inputTags-autocomplete-list li[style!=\"display: none;\"]").text();
        // console.log($(this).val(), val);
        $(this).val(val);
    }
});

$(".inputTags-field").blur(function (ev) {
    // console.log($(this).val(), $(".tags-hidden").val());
    // $("[name=" + $(this).id + "]").val(
    //     JSON.parse($(this).val())
    //         .map((x) => x.value)
    //         .join()
    // );
});
