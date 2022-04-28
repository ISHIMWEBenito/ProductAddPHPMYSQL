<?php
include_once "header.php";
?>

<div class="container">
    <header>
        <div class="pt-3 mt-4">

            <nav class="nav">
                    <h2 class="nav__left">Product Add</h2>
                    <div class="nav__right">
                        <input class="nav__right-button btn btn-outline-primary active" id="secondarySave" type="button" value="Save">
                        <input class="nav__right-button btn btn-outline-primary" type="button" id="secondaryCancel"  value="Cancel"/>
                    </div>
            </nav>
        </div>
    </header>
    <hr>
</div>
    <div class="container">
    <main class="main">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <form action="addition.php" id="product_form" method="POST">
                        <div class="form-group">
                            <input id="primarySave" type="submit" name="save" value="Save" hidden>
                            <input id="primaryCancel" type="submit" value="Cancel" name="cancel" hidden>
                        </div>
                        <div class="form-group row">
                            <label for="sku" class="col-lg-2">SKU</label>
                            <input type="text" name="sku" class="form-control" id="sku" >
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-lg-2">Name</label>
                            <input type="text" name="name" class="form-control" id="name" >
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-lg-2">Price</label>
                            <input type="text" name="price" class="form-control" id="price" >
                        </div>
                        <div class="form-group row">
                            <label for="productType" class="col-lg-2">Type switcher</label>
                            <select class="form-control" id="productType">
                                <option selected disabled value=''></option>
                                <option value="DVD">DVD</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Book">Book</option>
                            </select>
                        </div>

                        <div class="form-group row selectable" name="DVD" id="DVD" style="display: none;">
                            <label for="size" class="col-lg-2">Size</label>
                            <input type="text" name="size" class="form-control" id="size">
                            <small class="description">*Please provide size in MB format.</small>
                        </div>

                        <div class="form-group selectable" name="Furniture" id="Furniture" style="display: none;">
                        <div class= "dimension row">
                            <label for="height" class="col-lg-2">Height</label>
                            <input type="text" name="height" class="form-control" id="height">
                        </div>
                        <div class= "dimension row">
                            <label for="width" class="col-lg-2">Width</label>
                            <input type="text" name="width" class="form-control" id="width">
                        </div>
                        <div class= "dimension row">
                            <label for="length" class="col-lg-2">Length</label>
                            <input type="text" name="length" class="form-control" id="length">
                        </div>
                            <small class="description">*Please provide dimensions in HxWxL format.</small>
                        </div>

                        <div class="form-group row selectable" name="Book" id="Book" style="display: none;">
                            <label for="weight" class="col-lg-2">Weight</label>
                            <input type="text" name="weight" class="form-control" id="weight">
                            <small class="description">*Please provide weight in Kg format.</small>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
include_once "footer.php";
?>

<script>
    $("#productType").on("change", function() {
        $(".selectable").hide();
        const b = $("#" + $(this).val()).show();
        console.log(b);
    })

    $('#secondaryCancel').click(function(){
    $("#primaryCancel").click();
    })

    $('#secondarySave').click(function(){
        $("#primarySave").click();
    })

</script>
</body>
</html>
