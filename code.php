<?php
session_start(); 
require 'dbcon.php';


function supp(string $message)
{
    $_SESSION['message'] = $message;
    header("Location: index.php ");
    exit(0);
}

if (isset($_POST['delete_student'])){
    $student_id =mysqli_real_escape_string($con, $_POST['delete_student']); 
    $query = "DELETE FROM students WHERE id = '$student_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        supp("Etudiant supprimé avec succes ");
    } else {
        supp("Etudiant non supprimé");
    }
}




// PART MODIFIER
function sorti(string $message)
{
    $_SESSION['message'] = $message;
    header("Location: index.php ");
    exit(0);
}

if(isset($_POST['update_student'])){

// var_dump($_POST); //var_dump fonction qui affiche le type et la valeur d'une variable 
// exit;
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $cours = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET nom='$nom', email='$email', phone='$phone', cours='$cours' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        sorti("Etudiant modifié avec succes ");
    } else {
        sorti("Etudiant non modifié");
    }
}


    
// PART SAVE_STUDENT 
function sortie(string $message)
{
    $_SESSION['message'] = $message;
    header("Location: student-create.php ");
    exit(0);
}

// isset verifie qu'une variable exist et n'est pas nulle 
if (isset($_POST['save_student'])) {
    //    protège une chaine avant de l inserer dans une requete sql 
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $cours = mysqli_real_escape_string($con, $_POST['course']);

    // INSERT INTO por la table et les colonnes à remplir 
    // VALUES les valeurs dans les memes ordre que les colonnes 
    $query = "INSERT INTO students (nom,email,phone,cours) VALUES 
            ('$nom','$email','$phone','$cours')";

    // Excecute la requete stockée dans query et garde le resultat dans une variable

    try {
        $query_run = mysqli_query($con, $query);
    } catch (mysqli_sql_exception $e) {
        sortie("Etudiant avec cet email exist dèjà ");
    }

    if ($query_run) {
        sortie("Etudiant crée avec succes ");
    } else {
        sortie("Etudiant non crée");
    }
}
