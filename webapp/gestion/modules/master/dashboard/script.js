$(function(){
	$(".tabs-container li:nth-child(1) a.nav-link").addClass('active')
	ele = $("#produits div.tab-pane:first").addClass('active')


    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".clients").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
})