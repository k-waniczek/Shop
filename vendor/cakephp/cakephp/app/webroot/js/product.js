$(function (){

    $("#productAmount").on("input", function() {
        if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
            $(this).val($(this).attr("max"));
        } 
    });
        
    $("#addToCartBtn").click(function() {
        updateCart($("input#productAmount").val(), $("#productId").val(), $("#productName").text(), $("#productTaxPrice").text());
    });

    $("#buyNowBtn").click(function() {
        var amount = $("input#productAmount").val();    
        var item = [{
            id: $("#productId").val(),
            name: $("#productName").text(),
            price: $("#productTaxPrice").text(),
            count: parseInt(amount)
        }];
        localStorage.setItem("buyNow", JSON.stringify(item));
        location.replace("http://localhost/Shop/vendor/cakephp/cakephp/order");
    });

    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var page = parseInt((urlParams.get("p") != null) ? urlParams.get("p") : 1);
    var newUrl;

    $("select#sort").find("[value='" + urlParams.get("sort_by") + "']").attr("selected", true);
    //console.log(urlParams.get("sort_by"));

    $("button.page-change").click(function() {
        newUrl = queryString.replace(/&p=\d{1,}/, "") + "&p=" + (((page + parseInt($(this).data("page-change"))) > 0) ? (page + parseInt($(this).data("page-change"))) : 1);
        if ($(".product").length == $(".productsShown").val() && parseInt($(this).data("page-change")) == 1 || parseInt($(this).data("page-change")) == -1) {
            location.replace("http://localhost/Shop/vendor/cakephp/cakephp/products-list"+newUrl);
        } 
    });

    $("select#sort").change(function() {
        newUrl = queryString.replace("&sort_by="+urlParams.get("sort_by"), "&sort_by=" + $(this).val());
        location.replace("http://localhost/Shop/vendor/cakephp/cakephp/products-list"+newUrl);
    });

    if ($("#productName").length > 0) {
        $("div#productImg").append(`<img src='http://localhost/Shop/vendor/cakephp/cakephp/app/webroot/img/${checkImage($("#productId").val())}.jpg'/>`)
    }

    function checkImage(id) {
        var img = new Image();
        img.src = `http://localhost/Shop/vendor/cakephp/cakephp/app/webroot/img/${id}.jpg`;
        return (img.height != 0) ? id : 'noimg';
    }

    displayAmount(items);
    displayItemsInCartGUI(items);
});

var items = (JSON.parse(localStorage.getItem("cart")) == null) ? [] : JSON.parse(localStorage.getItem("cart"));

function updateCart(amount, id, name, price, add = true, modal = true) {
    if (amount.match(/^[1-9][0-9]{0,}$|^[1-9][0-9]{0,}$/gm)) {
        var existsInCart;
        if (JSON.parse(localStorage.getItem("cart")) == null) {
            localStorage.setItem("cart", JSON.stringify([]));
        }
        if (items.length == 0) {
            items.push({
                    id: id,
                    name: name,
                    price: price,
                    count: parseInt(amount)
                }
            );
        } else {
            for (var i = 0; i < items.length; i++) {
                if (id == items[i].id) {
                    existsInCart = true;
                    if (!add && items[items.findIndex(x => x.id == id)].count <= 1) {
                        removeFromCart(id);
                        return;
                    }
                    items[items.findIndex(x => x.id == id)].count += (add) ? parseInt(amount) : -1 * parseInt(amount);
                    break;
                } else {
                    existsInCart = false;
                }
            }
            if (!existsInCart) {
                items.push({
                        id: id,
                        name: name,
                        price: price,
                        count: parseInt(amount)
                    }
                );
            }
        }
        if (modal) {
            Swal.fire({
                icon: "success",
                text: "This item has been successfully added to your cart: " + name,
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true
            });
        }
        localStorage.setItem("cart", JSON.stringify(items));
        displayAmount(items);
        displayItemsInCartGUI(items);
    } else {
        Swal.fire({
            icon: "error",
            text: "Products amount can't have letters, be empty or be equal or less than 0!",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        });
    }
}

function removeFromCart(id) {
    var cart = (JSON.parse(localStorage.getItem("cart")) == null) ? [] : JSON.parse(localStorage.getItem("cart"));
    var itemIndex = cart.findIndex(x => x.id == id);
    cart.splice(itemIndex, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    displayAmount(cart);
    displayItemsInCartGUI(cart);
    location.reload();
}

function displayAmount(cart) {
    var amount = 0;
    for (var i = 0; i < cart.length; i++) {
        amount += cart[i].count;
    }
    $("#cartProductsAmount").text(amount);
}

function displayItemsInCartGUI(cart) {
    $(".cartModal").text("");
    var sum = 0;
    if (cart.length > 0 || cart != null) {
        for (var i = 0; i < cart.length; i++) {
            sum += parseInt(cart[i].count) * parseFloat(cart[i].price); 
            $(".cartModal").append("<div><a title='"+cart[i].name+"' href='product?product_id="+cart[i].id+"'>"+cart[i].name+"</a><br/><div class='grid'><span class='amount'>"+cart[i].count+"</span><i class='fas fa-minus substractProduct'></i><i class='fas fa-plus addProduct'></i><span class='price'>"+cart[i].price+"USD</span><i class='fas fa-trash-alt deleteProduct' data-product-id='" + cart[i].id + "'></i></div></div>");
        }
        $(".cartModal").append("<span>Total: "+(Math.round((sum + Number.EPSILON) * 100) / 100)+"USD</span>");
    }

    $(".deleteProduct").each(function () {
        $(this).click(function () {
            removeFromCart($(this).data("product-id"));
            $(this).parent().remove();
            location.reload();
        });
    });

    $(".addProduct").each(function () {
        $(this).click(function () {
            var children = $(this).parent().parent();
            var price = children.find('span.price').text().replaceAll('USD', '');
            var name = children.find('a').attr('title');
            var id = children.find('a').attr('href').replaceAll('product?product_id=', '');
            updateCart('1', id, name, price, true, false);
        });
    });

    $(".substractProduct").each(function () {
        $(this).click(function () {
            var children = $(this).parent().parent();
            var price = children.find('span.price').text().replaceAll('USD', '');
            var name = children.find('a').attr('title');
            var id = children.find('a').attr('href').replaceAll('product?product_id=', '');
            updateCart('1', id, name, price, false, false);
        });
    });
}

displayItemsInCartGUI(items);
displayAmount(items);