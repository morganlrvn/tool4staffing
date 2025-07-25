
$(document).ready(function () {
    $(".set-client").on("click", function () {
        const cookie = $(this).data("cookie");
        const module = $(".dynamic-div").data("module");
        const script = $(".dynamic-div").data("script");
        const url = `customs/${cookie}/modules/${module}/${script}.php`;
        $(".dynamic-div").load(url);
    });
});

$(document).ready(function () {
    $(".set-client").on("click", function () {
        const cookie = $(this).data("cookie");
        document.cookie = `client=${cookie}`;
        const module = $(".dynamic-div").data("module");
        const script = $(".dynamic-div").data("script");

        const url = `customs/${cookie}/modules/${module}/${script}.php`;
        $(".dynamic-div").load(url);
    });
});

$(document).ready(function () {
    $(".dynamic-div").on("click", ".edit-car", function () {
        const id = $(this).data("id");
        const cookie = document.cookie.trim().split("=")[1];
        const module = $(".dynamic-div").data("module");
        const url = `edit.php?id=${id}&client=${cookie}&module=${module}`;
        $(".dynamic-div").load(url);
    })
});

$(document).ready(function () {
    $(".dynamic-div").on("click", ".back-to-list", function () {
        const module = $(".dynamic-div").data("module") || "cars";
        const client = document.cookie.trim().split("=")[1];
        const url = `customs/${client}/modules/${module}/ajax.php`;
        $(".dynamic-div").load(url);
    });
});
