<?php

class ProductViewer
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function fetchProducts()
    {
        $query = "(SELECT Pkey, SKU, Name, Price, null as Size , Weight, null as Height, null as Width, null as Length, 'books' AS category FROM books)
          UNION
          (SELECT Pkey, SKU, Name, Price, Size, null as Weight, null as Height, null as Width, null as Length, 'discs' AS category FROM discs)
          UNION
          (SELECT Pkey, SKU, Name, Price, null as Size, null as Weight, Height, Width, Length, 'furniture' AS category FROM furniture)
          ORDER BY Pkey DESC";
        $results = mysqli_query($this->connection, $query);
        if ($results === false) {
            echo "<br>Query Error : " . mysqli_error($this->connection);
            return;
        }

        $i = 0;
        if (mysqli_num_rows($results) > 0) {
            echo '<div class="row">';
            while ($row = mysqli_fetch_assoc($results)) {
                $productData = $this->parseProductData($row);
                if ($productData === null) {
                    continue;
                }

                $this->displayProduct($productData);
                $i++;
                if ($i == 4) {
                    echo '</div>';
                    $i = 0;
                }
            }
        }
        mysqli_close($this->connection);
    }

    private function parseProductData($row)
    {
        $category = $row['category'];
        $productData = [
            'Pkey' => $row['Pkey'],
            'SKU' => $row['SKU'],
            'Name' => $row['Name'],
            'Price' => $row['Price'],
            'Category' => $category
        ];

        switch ($category) {
            case 'books':
                $productData['Weight'] = $row['Weight'];
                break;
                case 'discs':
                    $productData['Size'] = $row['Size'];
                    break;
                case 'furniture':
                    $productData['Height'] = $row['Height'];
                    $productData['Width'] = $row['Width'];
                    $productData['Length'] = $row['Length'];
                    break;
                default:
                    return null;
            }
    
            return $productData;
        }
    
        private function displayProduct($productData)
        {
            echo '<div class="product">';
            echo '<input type="checkbox" class="delete-checkbox" name="' . $productData['Category'] . '[]" value="' . $productData['Pkey'] . '">';
            echo '<p>' . $productData['SKU'] . '</p>';
            echo '<p>' . $productData['Name'] . '</p>';
            echo '<p>' . $productData['Price'] . '.00 $</p>';
    
            switch ($productData['Category']) {
                case 'books':
                    echo '<p>Weight : ' . $productData['Weight'] . 'KG</p>';
                    break;
                case 'discs':
                    echo '<p>Size: ' . $productData['Size'] . ' MB</p>';
                    break;
                case 'furniture':
                    echo '<p>Dimension: ' . $productData['Height'] . 'x' . $productData['Width'] . 'x' . $productData['Length'] . '</p>';
                    break;
            }
    
            echo '</div>';
        }
    }
    
    $connection = mysqli_connect("localhost", "id20811319_seiji", "Sobull&*1", "id20811319_products");
    if (!$connection) {
        echo "<br>Connection Error : " . mysqli_connect_error();
        return;
    }
    
    $productViewer = new ProductViewer($connection);
    $productViewer->fetchProducts();
    
    ?>