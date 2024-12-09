<?php
require '../config.php';

$code ="";
$plane = "";
$from_a = "";
$to_b = "";
$take_off ="";
$status = "";

if(isset($_POST['create'])){

$code = $_POST['code'];
$plane = $_POST['plane'];
$from_a = $_POST['from_a'];
$to_b = $_POST['to_b'];
$take_off=$_POST['take_off'];
if($code && $plane && $from_a && $to_b && $take_off){
$sql = "INSERT INTO penerbangan(code, plane, from_a, to_b, take_off) VALUES ('$code', '$plane', '$from_a', '$to_b', '$take_off')";
$s1 = mysqli_query($conn, $sql);
    if($s1){
        $status = "NOTICE:  Data Berhasil Ditambahkan!";
    } else {
        $status = "NOTICE:  Terjadi kesalahan!";
    }
} else {
    $status = "NOTICE:  Isi semua kolom!";
}
} else if(isset($_POST['cancel'])){
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Create</title>
    <link rel="stylesheet" href="add_item.css"/>
</head>
<body>
    <div class="container">
        <h3>Add / Create</h3>
    </div>
    <form action="" method="post">
    <div class="container">
        <label for="code">Code      : </label>
        <input type="text" name="code" <?php echo $code?>  /><br/>
        <label for="plane">Plane    : </label>
        <select class="opsi" id="plane" name="plane"  >
            <option value="">-- Choose --</option>
            <option value="Air Asia" <?php if ($plane == 'Air Asia')
                    echo "selected" ?>>AirAsia</option>
                    <option value="Airfast" <?php if ($plane == 'AirFast')
                    echo "selected" ?>>AirFast</option>
                    <option value="Batik Air" <?php if ($plane == 'Batik Air')
                    echo "selected" ?>>Batik Air</option>
                    <option value="Garuda Indonesia" <?php if ($plane == 'Garuda Indonesia')
                    echo "selected" ?>>Garuda Indonesia
                    </option>
                    <option value="Lion Air" <?php if ($plane == 'Lion Air')
                    echo "selected" ?>>Lion Air</option>
                    <option value="Nam Air" <?php if ($plane == 'Nam Air')
                    echo "selected" ?>>Nam Air</option>
                    <option value="Sriwijaya Air" <?php if ($plane == 'Sriwijaya Air')
                    echo "selected" ?>>Sriwijaya Air</option>
            </select><br />
            <label for="from_a">From : </label>
            <input type="text" id="from_a" name="from_a" <?php echo $from_a?>   />
            <label for="to_b"> To : </label>
            <input type="text" id="to_b" name="to_b" <?php echo $to_b?>   /><br />
            <label for="take_off">Take Off <b>(dd/mm/yyyy hh:mm)</b> : </label>
            <input type="text" id="take_off" name="take_off" <?php echo $take_off?>   /><br />
            <div class="status"><center><b><?php echo $status?></b></center></div>
            <div class="button">
                <input type="submit" name="create" value="Create" class="btn-create" />
                <input type="submit" name="cancel" value="Cancel" class="btn-cancel" />
            </div>
    </form>
    </div>
</body>
</html>