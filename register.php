<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $uname = $_POST['username'];
    $pass = password_hash($_POST['password'],PASSWORD_BCRYPT);

    $sql = $conn->prepare('insert into users(name,number,username,password,email) values(?,?,?,?,?)');
    $sql->bind_param('sisss',$name,$number,$uname,$pass,$email);
    
    if ($sql->execute()) {
        header('Location: login.php');
    }else{
        echo"failed";
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
        </header>
        <main>

        <h2 class="text-center mt-4">Register with us</h2>

        <div
            class="container border rounded shadow p-4 mt-4 col-6"
        >

        <form action="" method="post">

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="formId1"
                    placeholder=""
                />
                <label for="formId1">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="formId1"
                    placeholder=""
                />
                <label for="formId1">email</label>
            </div>
            
            <div class="form-floating mb-3">
                <input
                    type="number"
                    class="form-control"
                    name="number"
                    id="formId1"
                    placeholder=""
                />
                <label for="formId1">number</label>
            </div>

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
                <label for="formId1">Password</label>
            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                register
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
