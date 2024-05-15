<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "products");

class DatabaseConnection
{
    private $connect;

    public function __construct()
    {
        $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connect->connect_error) {
            die("Connection failed: " . $this->connect->connect_error);
        }
    }

    public function execute_query($query)
    {
        return $this->connect->query($query);
    }

    public function get_data_in_table($query)
    {
        $table = '<table>';
        $result = $this->execute_query($query);

        if ($result->num_rows > 0) {
            $table .= '<tr><th width="10%">Product Name</th><th width="10%">Price</th></tr>';

            while ($row = $result->fetch_assoc()) {
                $table .= '<tr>';
                $table .= '<td>' . htmlspecialchars($row['product_name']) . '</td>';
                $table .= '<td>' . htmlspecialchars($row['price']) . '</td>';
                $table .= '</tr>';
            }
        } else {
            $table .= '<tr><td colspan="2">No products found</td></tr>';
        }

        $table .= '</table>';
        return $table;
    }

    public function sanitize_input($input)
    {
      return mysqli_real_escape_string($this->connect, $input);
    }
}
?>
