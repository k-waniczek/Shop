<?php

    echo $this->Html->css("form");

?>
<div id="main" class="addProductToDbForm">
    <h1><?=__("add_product_to_db")?></h1>
    <div id="productsForm">
        <?php
            echo $this->Form->create("addProductForm", array("url" => "#", "enctype" => "multipart/form-data"));
            echo $this->Form->input("name", array("type" => "text", "label" => "", "placeholder" => __("product_name")));
            echo $this->Form->input("description", array("type" => "text", "label" => "", "placeholder" => __("description")));
            echo $this->Form->input("specs", array("type" => "text", "label" => "", "placeholder" => __("specs")));
            echo $this->Form->input("price", array("type" => "number", "label" => "", "placeholder" => __("price")));
            echo $this->Form->input("image", array("type" => "file", "label" => __("image"), "accept" => "image/jpeg"));
            echo $this->Form->input("subCategoryId", array("options" => $subCategoriesIds, "label" => __("sub_category")));

            echo $this->Form->end(__("submit"));
        ?>
    </div>
</div>
<?php
if ($this->Session->read("sizeError") == true) {
    echo "<script>Swal.fire({icon: 'error',text: '".__("file_limit_alert")."',showConfirmButton: true,timer: 5000,timerProgressBar: true});</script>";
    $_SESSION["sizeError"] = false;
} else if ($this->Session->read("priceError") == true) {
    echo "<script>Swal.fire({icon: 'error',text: '".__("price_error_alert")."',showConfirmButton: true,timer: 5000,timerProgressBar: true});</script>";
    $_SESSION["priceError"] = false;
}
?>
