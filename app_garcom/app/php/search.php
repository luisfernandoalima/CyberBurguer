<?php
include_once (__DIR__ .'/conn.php');

if(isset($_POST['query'])){
    $searchText = $_POST['query'];
    $tableId = $_POST['table'];

    // Utilizando declaração preparada para prevenir injeção de SQL
    $sqlQuery = "SELECT * FROM {$tableId} WHERE nome LIKE ?";
    $stmt = $sql->prepare($sqlQuery);
    $stmt->bind_param("s", $searchText);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td style='width: 20%;'>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['nome']) . "</td>
                    <td><a href='#'><i class='fa-solid fa-check' style='color: #ffffff;'></i></a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum resultado encontrado.</td></tr>";
    }
}
?>
