jQuery(function($) {
    $("i.searchButton").click(function () {
        $(".searchField").toggle("slide", { direction: "right" }, 200);
        $('input#global-search').focus();
    });
});