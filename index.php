<?php 
session_start();
include('db.php');

$msg = null;
if (!$conn) {
    echo "error : " . mysqli_errno($conn);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'])) {
        $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
        $sql = "INSERT INTO `tasks`(`title`) VALUES('$title')";
        $result = mysqli_query($conn , $sql);

        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['done'] = "Data added successfully";  // تخزين الرسالة في الجلسة
        }
    }
}

mysqli_close($conn);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form border p-2 my-5">
                    <?php if (isset($_SESSION['done'])): ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['done']; ?>
                        </div>
                        <?php unset($_SESSION['done']); ?>  <!-- إزالة الرسالة بعد عرضها -->
                    <?php endif ?>
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="Add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>New Task</td>
                            <td>
                                <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                <a href="#" class="btn btn-info"><i class="fa-solid fa-edit"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="main.js"></script>
</body>

</html>
