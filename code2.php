<?php
class ProductDeleter
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function deleteFromTable($table, $selectedProducts)
    {
        if (is_array($selectedProducts)) {
            foreach ($selectedProducts as $selectedProduct) {
                $query = "DELETE FROM $table WHERE Pkey = $selectedProduct";
                $result = mysqli_query($this->connection, $query);
                if ($result === false) {
                    echo "Error : " . mysqli_error($this->connection);
                }
            }
        } else {
            $query = "DELETE FROM $table WHERE Pkey = $selectedProducts";
            $result = mysqli_query($this->connection, $query);
            if ($result === false) {
                echo "Error : " . mysqli_error($this->connection);
            }
        }
    }
}

$connection = mysqli_connect("localhost", "id20811319_seiji", "Sobull&*1", "id20811319_products");
if (isset($_POST['delete'])) {
    $productDeleter = new ProductDeleter($connection);

    if (isset($_POST['books'])) {
        $selectedProducts = $_POST['books'];
        $productDeleter->deleteFromTable('books', $selectedProducts);
    }

    if (isset($_POST['discs'])) {
        $selectedProducts = $_POST['discs'];
        $productDeleter->deleteFromTable('discs', $selectedProducts);
    }

    if (isset($_POST['furniture'])) {
        $selectedProducts = $_POST['furniture'];
        $productDeleter->deleteFromTable('furniture', $selectedProducts);
    }

    echo '<script>window.location.href = "index.php";</script>';
}
?>