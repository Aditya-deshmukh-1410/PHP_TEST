<?php

include 'db.php';


if ($_SERVER['REQUEST_METHOD']==='POST') {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $sql = $conn->prepare('select password from users where username = ?');
    $sql->bind_param('s',$uname);
    $sql->execute();
    $sql->bind_result($password);
    $sql->fetch();

    if (password_verify($pass,$password)) {
        $_SESSION['uname'] = $uname;
        header("Location: home.php");
    }else {
        echo "<script>alert('pass doesnt match')</script>";
    }
}
?>


<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

            <h2 class="text-center mt-4">Login with us </h2>

            <div
                class="container rounded border shadow mt-4 p-4 col-6"
            >
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="username"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="password"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">password</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        login
                    </button>
                </form>
            </div>
            

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
