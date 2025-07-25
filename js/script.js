$(document).ready(function () {
    $(".set-client").on("click", function () {
        const cookie = $(this).data("cookie");
        const module = $(".dynamic-div").data("module");
        const script = $(".dynamic-div").data("script");
        const url = `customs/${cookie}/modules/${module}/${script}.php`;
        $(".dynamic-div").load(url);
    });
});
