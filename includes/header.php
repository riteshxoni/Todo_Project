<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="/TODO_PROJECT/">
            MyTodo
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <?php
        session_start();
        if(isset($_SESSION['username'])): ?>
        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/TODO_PROJECT/">Welcome <?php echo $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TODO_PROJECT/auth/LogoutController.php">Logout</a>
                </li>
            </ul>
        </div>
        <?php else : ?>
        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/TODO_PROJECT/pages/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TODO_PROJECT/pages/register.php">Register</a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</nav>