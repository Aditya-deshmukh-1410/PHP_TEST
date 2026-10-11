<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $btitle = $_POST['btitle'];
    $aname = $_POST['aname'];
    $isbn = $_POST['isbn'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql = $conn->prepare('insert into books(btitle,aname,isbn,category,price) values(?,?,?,?,?)');
    $sql->bind_param('ssisd',$btitle,$aname,$isbn,$category,$price);

    if ($sql->execute()) {
        header("Location: home.php");
    }else{
        echo "failed!!";
    }

}

$result = $conn->query('select * from books');

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
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#"></a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <h4>Hello <?php echo $_SESSION['uname']?></h4>
                            </li>
                            
                            
                        </ul>
                        <form class="d-flex my-2 my-lg-0 gap-4">
                            <a
                                name=""
                                id=""
                                class="btn btn-outline-success"
                                href="csv.php"
                                role="button"
                                >CSV</a
                            >

                            <a
                                name=""
                                id=""
                                class="btn btn-outline-success"
                                href="pdf.php"
                                role="button"
                                >PDF</a
                            >

                            <a
                                name=""
                                id=""
                                class="btn btn-outline-danger"
                                href="logout.php"
                                role="button"
                                >logout</a
                            >

                        </form>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>

        <h2 class="text-center mt-4">Add Books</h2>
            <div
                class="container border rounded shadow p-4 mt-4 col-6"
            >
                <form action="" method="post">

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="btitle"
                            id="formId1"
                            placeholder=""
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
                        />
                        <label for="formId1">Price</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Add Book
                    </button>
                </form>
            </div>
            


            <div
                class="container mt-4 "
            >
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-primary"
                    >
                        <thead>
                            <tr>
                                <th scope="col">bid</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author name</th>
                                <th scope="col">ISBN NO</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php while($row = $result->fetch_assoc()){?>
                            <tr class="">
                                <td scope="row"><?=$row['id']?></td>
                                <td scope="row"><?=$row['btitle']?></td>
                                <td scope="row"><?=$row['aname']?></td>
                                <td scope="row"><?=$row['isbn']?></td>
                                <td scope="row"><?=$row['category']?></td>
                                <td scope="row"><?=$row['price']?></td>
                                <td scope="row">
                                    <a
                                    name=""
                                    id=""
                                    class="btn btn-primary"
                                    href="edit.php?id=<?=$row['id']?>"
                                    role="button"
                                    >edit</a
                                >
                                </td>

                                <td>
                                <a
                                    name=""
                                    id=""
                                    class="btn btn-primary"
                                    href="delete.php?id=<?=$row['id']?>"
                                    role="button"
                                    >delete</a
                                >
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
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
