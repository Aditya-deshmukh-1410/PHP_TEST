<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $conn->prepare('select * from books where id = ?');
    $sql->bind_param('i',$id);
    $sql->execute();

    $books = $sql->get_result()->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $id = $_POST['id'];
    $btitle = $_POST['btitle'];
    $aname = $_POST['aname'];
    $isbn = $_POST['isbn'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql = $conn->prepare('update books set btitle=?,aname=?,isbn=?,category=?,price=? where id=?');
    $sql->bind_param('ssisdi',$btitle,$aname,$isbn,$category,$price,$id);

    if ($sql->execute()) {
        header("Location: home.php");
    }else{
        echo "failed!!!";
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
            <h2 class="text-center mt-4">Edit form</h2>

            <div
                class="container border rounded shadow p-4 mt-4 col-6"
            >
                <form action="" method="post">

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="id"
                            id="formId1"
                            placeholder=""
                            value= "<?=$books['id']?>"
                        />
                        <label for="formId1">id</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="btitle"
                            id="formId1"
                            placeholder=""
                            value= "<?=$books['btitle']?>"
                        />
                        <label for="formId1">Book Title</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="aname"
                            id="formId1"
                            placeholder=""
                            value= "<?=$books['aname']?>"

                        />
                        <label for="formId1">Author Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="isbn"
                            id="formId1"
                            placeholder=""
                            value= "<?=$books['isbn']?>"

                        />
                        <label for="formId1">ISBN No</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="category"
                            id="formId1"
                            placeholder=""
                            value= "<?=$books['category']?>"

                        />
                        <label for="formId1">Category</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="price"
                            id="formId1"
                            placeholder=""
                            value= "<?=$books['price']?>"

                        />
                        <label for="formId1">Price</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        edit
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
