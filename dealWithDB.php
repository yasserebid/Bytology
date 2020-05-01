<?php 

class dealWithDB
{
    private $conection;
    private $result;
    private $content = '';

    public function __construct()
    {
        $db_connection_instace = DBConnection::getInstance();
        $this->connection = $db_connection_instace->getConnection();
    }


    public function insertRow($width, $height, $average, $area, $area_square)
    {
        $insert_query = "INSERT INTO all_data (width,height,average,area,area_square) VALUES ($width,$height,$average,$area,$area_square)";

        if (!mysqli_query($this->connection, $insert_query)) {
            echo "Not Enserted"."\n";
            die;
        }

        echo "Inserted Successfully"."\n";
    }

    public function getRows()
    {
        $select_sql = "SELECT * FROM all_data Order By id desc limit 0,5";
        $this->result = $this->connection->query($select_sql);
        if ($this->result->num_rows > 0) {
            // output data of each row
            while ($row = $this->result->fetch_assoc()) {
                $this->content .= '<tr>
            <td>' . $row["width"] . '</td>
            <td>' . $row["height"] . '</td>
            <td>' . $row["average"] . '</td>
            <td>' . $row["area"] . '</td>
            <td>' . $row["area_square"] . '</td>
        </tr>';
                echo "id: " . $row["id"] . " - width: " . $row["width"] . " - Height: " . $row["height"] . " - Average: " . $row["average"] . " - Area: " . $row["area"] . " - Area Squared: " . $row["area_square"]  . "\n";
            }
        } else {
            echo "0 results"."\n";
        }
    }

    public function generateHtmlFile()
    {
        $content = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Width</th>
                <th>Height</th>
                <th>Average</th>
                <th>Area</th>
                <th>Area Square</th>
            </tr>' . $this->content . '</table>
    </body>
    </html>';
        $handle = fopen('data.html', 'w+');
        fwrite($handle, $content);
        fclose($handle);
    }
}
