$(function() {

    $(".order").each(function() {
        var ids = JSON.parse($(this).find("input[type=hidden]").val());
        var html = "";
        for (var i = 0; i < ids.length; i++) {
            html += `<img src="app/webroot/img/${checkImage(ids[i])}.jpg"/>`;
        }
        $(this).find("span.images").append(html);
        $(this).find(".fa-search").each(function() {
            $(this).click(function() {
                var fields = $(this).parent().parent().find(".fields").val();
                Swal.fire({
                    text: fields,
                    showConfirmButton: true
                });
            });
        });
    });

    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var newUrl;

    $("select#sortHistory").find("[value='" + urlParams.get("sort_by") + "']").attr("selected", true);

    $("select#sortHistory").change(function() {
        newUrl = queryString.replace("&sort_by="+urlParams.get("sort_by"), "&sort_by=" + $(this).val());
        console.log(queryString);
        // location.replace("http://localhost/Shop/vendor/cakephp/cakephp/order-history"+newUrl);
    });

    $("button#filter").click(function() {
        location.replace(`${window.location.origin}${window.location.pathname}?priceMin=${$("input#priceMin").val()}&priceMax=${$("input#priceMax").val()}&dateMin=${$("input#dateMin").val()}&dateMax=${$("input#dateMax").val()}&payment=${$("select#paymentMethod").val()}&currency=${$("select#currency").val()}`);
    });

    function checkImage(id) {
        var img = new Image();
        img.src = `http://localhost/Shop/vendor/cakephp/cakephp/app/webroot/img/${id}.jpg`;
        return (img.height != 0) ? id : 'noimg';
    }

});