
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
        <h2>Product List</h2>
    </div>
    <form method='post' id='add'>
    <div class="nav-right">
        <button type="button" id="add-btn">ADD</button>
        <button id="delete-product-btn" name="delete">MASS DELETE</button>
        <button id="unselect" onclick="deselectAll()">UNSELECT</button>
    </div>
</nav>
<hr>
<main>
    <?php 
        include 'code1.php'; 
    ?>
    </form>
    <script>
        function deselectAll() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
      }
    </script>
    <script>
      document.getElementById("add-btn").addEventListener("click", function() {
      window.location.href = "add.php";
      });
    </script>
    <?php 
        include 'code2.php'; 
    ?>
</main>
<footer>
<hr>
<p>Scandiweb Test assignment</p>
</footer>
</body>
</html>