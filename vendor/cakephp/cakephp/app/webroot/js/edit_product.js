$(function() {
	//Generating inputs for all correct fields
    function generateInputs(p_id, product) {
        let html = '';
        let { id, shop_id, tax, image, product_count, ...rest } = product;
        console.log(rest);
        for (const value in rest) {
            html += `${value}: <input type="text" value="${rest[value]}"/>`;
        }
        html += '<button id="editProduct">'+lang.save+'</button>';
        $("div#inputs").html(html);
    }
    generateInputs($("#productSelect").val(), $("#productSelect").find(":selected").data("product"));
    $("#productSelect").change(function() {
        generateInputs($(this).val(), $(this).find(":selected").data("product"));
    });

	//Handling editing the specific product
    $("#editProduct").click(function() {
        const inputs = $("#inputs input");
        $.ajax({
            type: "GET",
            url: `http://localhost/Shop/vendor/cakephp/cakephp/edit-product?
            id=${$("#productSelect").val()}&
            name=${inputs[0].value}&
            description=${inputs[1].value}&
            specs=${inputs[2].value}&
            price=${inputs[3].value}&
            discount_value=${inputs[4].value}&
            sub_category_id=${inputs[5].value}`,
            success: function(data) {
                console.log(data);
            }
        });
    });

});
