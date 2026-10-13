<?php 
session_start();
require 'dbcon.php'
?>

<?php include('includes/header.php')  ?>

    <div class="container">
    <?php include('message.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
              <h4>Students Details</h4>
              <a href="student-create.php" class="btn btn-primary float-end"> Add Students</a>
              </div> 
              <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $query = "SELECT * FROM students";
                      // Envoie la requete et le resultat est rangé dans query_run
                      $query_run = mysqli_query($con, $query);  
                      // Sert à compter le nombre de ligne renvoyer par un SELECT le 0 s'il y a au moins une ligne 
                      if(mysqli_num_rows($query_run) > 0 ) {
                        foreach($query_run as $student)
                          {
                            // echo
                            ?>
                          
                          <tr>
                          <td><?= $student['id']; ?></td>
                          <td><?= $student['nom']; ?></td>
                          <td><?= $student['email']; ?></td>
                          <td><?= $student['phone']; ?></td>
                          <td><?= $student['cours']; ?></td>
                          <td>
                            
                            <a href="student-view.php?id=<?= $student['id']; ?> " class="btn btn-info btn-sm">view </a>
                            <a href="student-edit.php?id=<?= $student['id']; ?> " class="btn btn-success btn-sm">Edit </a>
                            <form action="code.php" method="POST" class="d-inline">
                            <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm"> Delete</button>
                            </form>
                          </td>

                          </tr>
                            <?php
                          }
                      }
                      else{
                        echo "<h5>No record found </h5>"; 
                      }
                  ?>
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include('includes/footer.php')  ?>


