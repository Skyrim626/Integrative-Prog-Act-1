

<?php
session_start();    
include("connect.php");


// Check if the value is regiser
if(isset($_POST['toRegister'])) {

    // Get the values from the user
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    $check_email_query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $email_result = mysqli_query($conn,$check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];


    if($email_count > 0){
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: ../signUp.php");
        exit();
    }

    
    if ($password !== $repassword){
        $_SESSION['status'] = "Password does not match";
        $_SESSION['status_code'] = "error";
        header("Location: ../signUp.php");
        exit();
    }

    $query = "INSERT INTO `users`(`email`, `password`, `firstName`, `middleName`, `lastName`) VALUES ('$email','$password','$firstName','$middleName','$lastName')";
    $query_result = mysqli_query( $conn, $query );

    if($query_result){
        $_SESSION['status'] = "Welcome " . $firstName;
        $_SESSION['status_code'] = "success";
        $_SESSION['firstName'] = $firstName;
        header("Location: ../dashboard.php");
        exit();
    }

}

else if(isset($_POST['toLogin'])) {

    // Get the email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT `user_id`, `firstName`, `middleName`, `lastName`, `email`, `password` FROM `users` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1 ";
    $login_result = mysqli_query($conn, $login_query);

    if($login_result) {
        if (mysqli_num_rows($login_result) > 0) {
            $data = mysqli_fetch_assoc($login_result);
            
            $user_id = $data['user_id'];
            $user_email = $data['email'];
            $user_full_name = $data['firstName'] . '' . $data['middleName'] . '' . $data['lastName'];

            $_SESSION['auth'] = true;

            $_SESSION['auth_user'] = [
                'user_id' => $user_id,
                'user_name' => $user_full_name,
                'user_email' => $user_email,
            ];

            echo "23131241512";
            $_SESSION['status'] = "Welcome $user_full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ../index.php");
            exit();

        } else{
            echo "error12313123";
            $_SESSION['status'] = "Invalid Username/Password";
            $_SESSION['status_code'] = "error";
            header("Location: ../index.php");
            exit();
        }
    }

    else{
        $_SESSION['status'] = "Error executing the login query" . mysqli_error( $con );
       $_SESSION['status_code'] = "success";
       header("Location: ../index.php");
       exit();
}


}

else if(isset($_POST['insertNew'])) {

    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $year = $_POST['schoolYear'];
    $section = $_POST['section'];

    $insertQuery = "INSERT INTO `students` (`student_id`, `firstName`, `middleName`, `lastName`, `year`, `section`, `user_id`) VALUES ('$id', '$firstName', '$middleName', '$lastName', '$year', '$section','2');";

    $query_result = mysqli_query( $conn, $insertQuery );

    if($query_result){
        $_SESSION['status'] = "Inserted Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: ../dashboard.php");
        exit();
    }

}