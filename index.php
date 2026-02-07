<?php
require './config/db.php';

try 
{
    $sql = "SELECT id, todoname, tododate FROM todo";
    // Execute the SQL query
    $result = $conn->query($sql);
} 
catch (PDOException $e) 
{
    echo "Error: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Todo Project</title>
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
    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="container">
    <header class="mt-4">
        <div class="d-flex align-items-center justify-content-evenly">
            <div class="d-flex align-items-center justify-content-center">
                <h1 class=" me-2">Todo List </h1>
                <div style="height: 35px;"><img src="./assets/img/logo.png" class="h-100 rounded-5" alt=""></div>
            </div>
            <div class=" ">
                <!-- <i class="bi bi-sun-fill"></i>
                    <i class="bi bi-moon-fill"></i> -->
                <button id="themeToggle">🌙 Dark Mode</button>
            </div>
        </div>
    </header>
    <main>
        <?php if (isset($_GET['result'])): ?>
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-lg-6 text-center alert alert-secondary my-3"><?php echo $_GET['result']; ?></div>
            </div>
        <?php endif; ?>

        <form action="./controller/AddTodo.php" method="post">
            <div class="row justify-content-center my-3">
                <div class="col-md-10 col-lg-6 text-center">
                    <div class="row row g-2 g-lg-1">
                        <div class="col-sm-5">
                            <input type="text" name="todoname" class="myinput border-bottom shadow-lg rounded p-2" required placeholder="Enter Todo Name">
                        </div>
                        <div class="col-sm-5">
                            <input type="date" name="tododate" class="myinput border-bottom shadow-lg rounded p-2" required>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-secondary"><span class="d-sm-none">Add Todo </span><i class="bi bi-plus-square"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="row justify-content-center my-3">
            <div class="col-10 col-md-10 col-lg-6 text-center text-secondary my-3">
                You Have <span class="text-primary"> <?php echo $result->rowCount();  ?> </span> tasks to complete
            </div>
        </div>
        <?php if ($result->rowCount() > 0): ?>
            <?php while ($row = $result->fetch()): ?>
                <div class="row justify-content-center text-center border g-3">
                    <div class="col-12 col-md-6 shadow-lg rounded">
                        <?php echo $row['todoname'] ?>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <div class="row justify-content-center g-2">
                            <div class="col-7"><input type="date" class="myinput2 rounded shadow p-2" readonly value="<?php echo $row['tododate'] ?>"></div>
                            <div class="col-2"><a href="./pages/updatetodo.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></div>
                            <div class="col-2"><a href="./controller/DeleteTodo.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this todo?');"><i class="bi bi-trash3-fill"></i></a></div>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>
            <?php unset($result); ?>
        <?php else: ?>
            <div class="row justify-content-center text-center border g-3">
                <div class="col-12 col-md-6 shadow-lg rounded">
                    No todo records found.
                </div>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="./assets/js/script.js"></script>
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