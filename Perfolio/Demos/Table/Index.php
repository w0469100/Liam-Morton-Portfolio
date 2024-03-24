<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "tabledb";
function getColumnNames($conn, $tableName) {
    $colNames = array();

    $sql = 'SHOW COLUMNS FROM '. $tableName;
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $colNames[]=$data->Field;
        }
    }
    return $colNames;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h3>Enter Program</h3>
        <label for="programCode">Code</label>
        <input type="text" name="programCode" id="program-code">
        <label for="programTitle">Title</label>
        <input type="text" name="programTitle" id="program-title">
        <button type="submit" name="add">add</button>
    </form>

    <?php
    if(isset($_POST["add"])) {

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO tables (Code, `Name`) VALUES (?, ?)");
        $stmt->bind_param("ss", $code, $program);

        // set parameters and execute
        $code = $_POST["programCode"];
        $program = $_POST["programTitle"];
        $stmt->execute();      
        $conn->close();
    }




    $programs = array();
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    $cols = getColumnNames($conn,"tables");

    $sql = 'SELECT * FROM tabledb.tables';
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            array_push($programs,$data);
        }
        $conn->close();
    }

    // cols: ProgramId, Code, Title
    echo "<table border='1'><tr><th>".$cols[0]."</th><th>".$cols[1]."</th><th>".$cols[2]."</th><th>Edit</th><th>delete</th></tr>";
    foreach ($programs as $c) {
        echo "<tr><td>$c->ID</td><td>$c->Code</td><td>".$c->Name."</td>
        <td>
            <form method='post'>
                <input type='hidden' name='id' value='$c->ID'>
                <input type='hidden' name='Code' value='$c->Code'>
                <input type='hidden' name='Name' value='$c->Name'>
                <button type='submit' name='edit'>edit</button>
            </form>
        </td>
        <td>
        <form method='post'>
            <input type='hidden' name='id' value='$c->ID'>
            <button style='background-color:red; color:white' type='submit' name='delete'>delete</button>
        </form>
        </td>";
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // prepare and bind
        $stmt = $conn->prepare("DELETE FROM tabledb.tables WHERE `ID` LIKE '$id'");

        // set parameters and execute
        $stmt->execute();      
        $conn->close();
    }
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Code = $_POST['Code'];
?>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Title</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                    <h3>Edit Program</h3>
                    <form method="post">
                        <input type='hidden' name='id' value='<?php echo $id ?>'>
                        <label for="programCode">Code</label>
                        <input type="text" name="Code" placeholder="<?php echo $Code ?>" id="program-code">
                        <label for="programTitle">Title</label>
                        <input type="text" name="Name" placeholder="<?php echo $Name ?>" id="program-title">
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="change" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#myModal').modal('show');
            });
        </script>
<?php }
    if(isset($_POST["change"])) {
        $id = $_POST['id'];
        $Name = $_POST['Name'];
        $Code = $_POST['Code'];
        
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // prepare and bind
        $stmt = $conn->prepare("UPDATE tables SET Code='$Code', `Name`='$Name' WHERE ID LIKE '$id'");

        // set parameters and execute
        $stmt->execute();      
        $conn->close();
    }
    ?>
    <script>
        const progCode = document.getElementById("program-code");
        progCode.addEventListener("focusout", function(evt) {
            evt.target.value = evt.target.value.toUpperCase();
            checkCode(evt.target.value);
        });

        function checkCode(val) {
            if (/[A-Z]{4}/.test(val)) {
                console.log("Looks good!");
                progCode.classList.remove("is-invalid");
            } else {
                console.log("Wrong length!");
                progCode.classList.add("is-invalid");
            }
        }
    </script>

</body>