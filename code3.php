<?php
    class Product
    {
        private $sku;
        private $name;
        private $price;
        private $type;
        private $weight;
        private $size;
        private $height;
        private $width;
        private $length;

        private $typeFieldsMap = [
            'Book' => ['weight'],
            'Disc' => ['size'],
            'Furniture' => ['height', 'width', 'length']
        ];

        public function __construct($sku, $name, $price, $type, $weight = null, $size = null, $height = null, $width = null, $length = null)
        {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
            $this->weight = $weight;
            $this->size = $size;
            $this->height = $height;
            $this->width = $width;
            $this->length = $length;
        }

        private function validateFields()
        {
            if (empty($this->sku) || empty($this->name) || empty($this->price)) {
                echo "<br>All form fields must be filled in.";
                return false;
            }

            $requiredFields = $this->typeFieldsMap[$this->type] ?? [];
            $requiredFields[] = 'price';
            foreach ($requiredFields as $field) {
                if ($this->$field === null || $this->$field <= 0) {
                    echo "<br>Field $field must be greater than zero.";
                    return false;
                }
            }

            return true;
        }


        public function saveToDatabase()
        {
            $connection = mysqli_connect("localhost", "id20811319_seiji", "Sobull&*1", "id20811319_products");
            if (!$connection) {
                echo "<br>Connection Error : " . mysqli_connect_error();
                return false;
            }

            $existingTables = ['books', 'discs', 'furniture'];

            foreach ($existingTables as $table) {
                $query = "SELECT COUNT(*) FROM $table WHERE SKU = '$this->sku'";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    echo "<br>Query Error : " . mysqli_error($connection);
                    return false;
                }

                $row = mysqli_fetch_array($result);

                if ($row[0] > 0) {
                    echo "<br> SKU already exist in table : $table";
                    return false;
                }
            }

            if (!$this->validateFields()) {
                return false;
            }

            $query = '';
            $params = [];

            switch ($this->type) {
                case 'Book':
                    $query = "INSERT INTO books (sku, name, price, weight) VALUES (?, ?, ?, ?)";
                    $params = [$this->sku, $this->name, $this->price, $this->weight];
                    break;
                case 'Disc':
                    $query = "INSERT INTO discs (sku, name, price, size) VALUES (?, ?, ?, ?)";
                    $params = [$this->sku, $this->name, $this->price, $this->size];
                    break;
                case 'Furniture':
                    $query = "INSERT INTO furniture (sku, name, price, height, width, length) VALUES (?, ?, ?, ?, ?, ?)";
                    $params = [$this->sku, $this->name, $this->price, $this->height, $this->width, $this->length];
                    break;
                default:
                    echo "<br>Select a product type.";
                    return false;
            }

            $statement = mysqli_prepare($connection, $query);
            if (!$statement) {
                echo "<br>Query Error : " . mysqli_error($connection);
                return false;
            }

            mysqli_stmt_bind_param($statement, str_repeat('s', count($params)), ...$params);

            $result = mysqli_stmt_execute($statement);
            if (!$result) {
                echo "<br>Query Error : " . mysqli_error($connection);
                return false;
            }

            mysqli_stmt_close($statement);
            mysqli_close($connection);

            return true;
        }
    }

    if (isset($_POST['SAVE'])) {
        $product = new Product($_POST['SKU'], $_POST['NAME'], $_POST['PRICE'], $_POST['Pswitch'], $_POST['Weight'], $_POST['Size'], $_POST['Height'], $_POST['Width'], $_POST['Length']);
        if ($product->saveToDatabase()) {
            echo "<br>The product has been added to the database.";
        } else {
            echo "<br>An error occurred while adding the product.";
        }
    }
?>