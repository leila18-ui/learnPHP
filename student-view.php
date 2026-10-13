<?php

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


    <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="card">
                    <div class="card-header">
                        <h4>Student View Details </h4>
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
                            
                                    

                        <div class="mb-3">
                            <label>Nom</label>
                            <p class="form-control"> 
                                <?=$student['nom'];?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <p class="form-control"> 
                                <?=$student['email'];?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Téléphone</label>
                            <p class="form-control"> 
                                <?=$student['phone'];?>
                            </p>
                        </div>   

                        <div class="mb-3">
                            <label>Cours </label>
                            <p class="form-control"> 
                                <?=$student['cours'];?>
                            </p>
                        </div>

                        
                            
                        
                                <?php  
                            }
                            else{
                                echo "<h4>NO such Id Found</h4>";
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