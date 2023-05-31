<!DOCTYPE html>
<html lang="eng">
<head>
        <meta charset="utf-8">
        <meta name="author" content="Sebastian Sobol">
		<title>Sebastian Soból JuniorTest</title>
		<link rel="stylesheet" href="styl.css">
</head>
<body>
    <nav>
        <div class="nav-left">
            <h2>Product Add</h2>
        </div>
    <form method="post" id="product_form">
        <div class="nav-right">
            <button name="SAVE">Save</button>
            <button type='button' id="cancel-btn">Cancel</button>
        </div>
    </nav>
        <hr>
        <main>
            <label for="sku">SKU :</label>
            <input type='text' name="SKU" id="sku"><br>
            <label for="name">Name :</label>
            <input type='text' name="NAME" id="name"><br>
            <label for="price">Price($) :</label>
            <input type='number' name="PRICE" id="price"><br>
            <select name='Pswitch' id='productType' onchange="Change()">
                <option value="notselected">Type Switcher</option>
                <option value="Disc">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
            <div id="book-fields" style="display: none">
                <label for="Weight">Weight:</label>
                <input type="number" name="Weight" id="weight">
                <p>enter the book weight (KG)</p>
            </div>
            <div id="disc-fields" style="display: none">
                <label for="Size">Size:</label>
                <input type="number" name="Size" id="size">
                <p>enter the DVD size in MB</p>
            </div>
            <div id="furniture-fields" style="display: none">
                <label for="Height">Height:</label>
                <input type="number" name="Height" id="height">
                <br>
                <label for="Width">Width:</label>
                <input type="number" name="Width" id="width">
                <br>
                <label for="Length">Length:</label>
                <input type="number" name="Length" id="length">
                <p>Please provide dimensions in HxWxL format</p>
            </div>
            <?php
                include 'code3.php';
            ?>
        </main>
    </form>
    <script>
      document.getElementById("cancel-btn").addEventListener("click", function() {
      window.location.href = "index.php";
      });
    </script>
    <script>
    function Change() {
        var select = document.getElementById("productType");
        var bookFields = document.getElementById("book-fields");
        var discFields = document.getElementById("disc-fields");
        var furnitureFields = document.getElementById("furniture-fields");

        bookFields.style.display = "none";
        discFields.style.display = "none";
        furnitureFields.style.display = "none";

        if (select.value === "Book") {
            bookFields.style.display = "block";
        } else if (select.value === "Disc") {
            discFields.style.display = "block";
        } else if (select.value === "Furniture") {
            furnitureFields.style.display = "block";
        }
    }
</script>
</main>
<footer>
<hr>
<p>Scandiweb Test assignment</p>
</footer>
</body>
</html>
