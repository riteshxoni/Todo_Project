<?php
require '../config/db.php';

if(isset($_GET['id']))
{
    try 
    {
        $id = $_GET['id'];
        $sql = "SELECT id, todoname, tododate FROM todo where id=?";
        $stmt = $conn->prepare($sql);
        // Execute with values
        $stmt->execute([$id]);
        // Execute the SQL query
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row)
        {
            header("Location: ../index.php?result=Please provide correct todo id.");
            exit;
        }
    } 
    catch (PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
}
else
{
    header("Location: ../index.php?result=Please provide todo id.");
    exit;
}



?>

<!doctype html>
<html lang="en">

<head>
    <title>Todo Update</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="container">
    <header class="mt-4">
        <div class="d-flex align-items-center justify-content-evenly">
            <div class="d-flex align-items-center justify-content-center">
                <h1 class=" me-2">Todo Update </h1>
                <div style="height: 35px;"><img src="../assets/img/logo.png" class="h-100 rounded-5" alt=""></div>
            </div>
            <div class=" ">
                <!-- <i class="bi bi-sun-fill"></i>
                    <i class="bi bi-moon-fill"></i> -->
                <button id="themeToggle">🌙 Dark Mode</button>
            </div>
        </div>
    </header>
    <main>
        <form action="../controller/UpdateTodo.php" method="post">
            <div class="row justify-content-center my-3">
                <div class="col-md-10 col-lg-6 text-center">
                    <div class="row g-2 g-lg-1">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="col-sm-5">
                            <input type="text" name="todoname" class="myinput border-bottom shadow-lg rounded p-2" required value="<?php echo $row['todoname']; ?>">
                        </div>
                        <div class="col-sm-5">
                            <input type="date" name="tododate" class="myinput border-bottom shadow-lg rounded p-2" required value="<?php echo $row['tododate']; ?>">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-secondary"><span class="d-sm-none">Update Todo </span><i class="bi bi-arrow-repeat"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="../assets/js/script.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>