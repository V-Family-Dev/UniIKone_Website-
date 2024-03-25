$seleat = "SELECT * FROM `itemsmaster`";
$result = $conn->query($seleat);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$rowdata = $row['idItems'];
$delete = "DELETE FROM `itemsmaster` WHERE `idItems`='$rowdata'";
$conn->query($delete);
}
} else {
echo "0 results";
}