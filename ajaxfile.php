<?php
include 'dbconnection.php';  

$db = new DatabaseConnection();

if(isset($_POST["action"]))  
{  
    if($_POST["action"] == "getData")  
    {  
        echo $db->get_data_in_table("SELECT * FROM `products` ORDER BY id DESC"); 
    } 
    elseif($_POST["action"] == "create")  
    {  
        $name = $db->sanitize_input($_POST['name']);
        $price = $db->sanitize_input($_POST['price']);
        $sql = "INSERT INTO products (product_name, price) VALUES ('$name', '$price')";

        if ($db->execute_query($sql)) {
            echo "<p>Product Created Successfully:</p>";
            echo "<p>Name: $name</p>";
            echo "<p>Price: $price</p>";
        } else {
            echo "Error creating product.";
        }
    } 
    elseif($_POST["action"] == "search")  
    {  
        $value = $db->sanitize_input($_POST['query']);
        $searchWords = explode(' ', $value);
        $conditions = [];

        foreach ($searchWords as $word) {
            $conditions[] = "product_name LIKE '%$word%'";
        }

        $conditionStr = implode(' AND ', $conditions);
        $query = "SELECT * FROM products WHERE $conditionStr";
        $searchResult = '';
        $exec = $db->execute_query($query);
        
        if (mysqli_num_rows($exec) > 0) {
            $searchResult .= '<table><tr><th width="10%">Product Name</th><th width="10%">Price</th></tr>'; 

            while ($row = mysqli_fetch_assoc($exec)) {
                $matchesAllWords = true;

                foreach ($searchWords as $word) {
                    if (stripos($row['product_name'], $word) === false) {
                        $matchesAllWords = false;
                        break;
                    }
                }

                if ($matchesAllWords) {
                    $searchResult .= '<tr><td>'.$row['product_name'].'</td> <td>'.$row['price'].'</td></tr>';
                }
            } 

            $searchResult .= '</table>';  
            echo $searchResult;
        } else {
            echo "No products found.";
        }
    }  
}
?>
