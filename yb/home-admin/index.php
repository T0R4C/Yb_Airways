<?php
include '../config.php';

$sql = "SELECT code, plane, from_a, to_b, take_off FROM penerbangan"; // Query untuk mengambil data
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-Panel</title>
    <link rel="stylesheet" href="home.css"/>
</head>
<body>
    <div class="header">
        <div class="profile">
         <img alt="Profile icon" height="40" src="https://storage.googleapis.com/a1aa/image/besFdAH3YlWoVKaORKtLM1lOz7AWV9srb406FkH6xfslfpxnA.jpg" width="40"/>
         <span>
          Admin
         </span>
        </div>
        <div class="search-bar">
         <input placeholder="Search" type="text"/>
        </div>
        <button class="logout">
         Log Out
        </button>
       </div>
       <div class="main-content">
        <h1>
         YB AIRWAYS
        </h1>
        <a href="add_item.php"><button class="add-button">
         + Add
        </button></a>
        <div class="table-container">
         <table>
          <thead>
           <tr>
            <th>
             No.
            </th>
            <th>
             Code
            </th>
            <th>
             Plane
            </th>
            <th>
             From
            </th>
            <th>
             To
            </th>
            <th>
             Take Off
            </th>
            <th>
            </th>
           </tr>
          </thead>
          <tbody>
            <?php
            $counter=1;
          if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $counter++ . "</td>";
                  echo "<td>" . $row['code'] . "</td>";
                  echo "<td>" . $row['plane'] . "</td>";
                  echo "<td>" . $row['from_a'] . "</td>";
                  echo "<td>" . $row['to_b'] . "</td>";
                  echo "<td>" . $row['take_off'] . "</td>";
                  echo '<td><button class="edit-button">Edit</button></td>';
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='7'>No data found</td></tr>";
          }
          
          $conn->close(); // Menutup koneksi
          ?>
          </tbody>
         </table>
        </div>
       </div>
       <div class="background-image"><img src="accen1.png"/></div>
</body>
</html>