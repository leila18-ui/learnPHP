<?php
// session_start(); PHP te reconnecte d'une page à une autre grace à des cookies 
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello, world!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">

<?php include('message.php'); ?> 

    <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="card">
                    <div class="card-header">
                        <h4>modifier  </h4>
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </div>
                    <div class="card-body">
                        <?php
                        // Recuper id dans URL protégé par mysqli_real_escape_string 
                        if(isset($_GET['id'])){
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id= '$student_id'";

                            $query_run = mysqli_query($con, $query);
                            // mysqli_num_rows verifie que l'etudiant existe. 
                            if(mysqli_num_rows($query_run) >0){
                                $student = mysqli_fetch_array($query_run);
                                ?> 
                                <form action="code.php" method="post">
                                <input type="hidden" name="student_id" value="<?= $student['id']; ?>">

                        <div class="mb-3">
                            <label>Nom</label>
                            <input type="text" name="nom" value="<?=$student['nom'];?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input  type="email"  name="email" value="<?=$student['email'];?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Téléphone</label>
                            <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                        </div>   

                        <div class="mb-3">
                            <label>Cours </label>
                            <input type="text" name="course" value="<?=$student['cours'];?>" class="form-control">
                        </div>

                        <div>
                            <button type="submit" name="update_student" class="btn btn-primary"> Update Student </button>
                        </div>
                            
                        </form>
                                <?php  
                            }
                            else{
                                echo "<h4>No such Id Found</h4>";
                            }
                        }
                        ?> 
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>