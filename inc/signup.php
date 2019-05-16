<?php
if ( isset( $_POST['submit'] ) ) {
    include_once 'dbh.php';
    
    $first_name      = mysqli_real_escape_string( $connection, $_POST['first_name'] );
    $last_name       = mysqli_real_escape_string( $connection, $_POST['last_name'] );
    $email_address   = $_POST['email_address'];
    $password         = $_POST['password'];
    $login_id         = $_POST['login_id'];
    
    //Check for error
    if ( empty( $first_name ) || empty( $last_name ) || empty( $email_address ) || empty( $password ) || empty( $login_id ) ) {
        header("Location: ../index.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if ( ! preg_match( "/^[a-zA-Z]*$/", $first_name ) || ! preg_match( "/^[a-zA-Z]*$/", $last_name ) ) {
            header("Location: ../index.php?signup=invalid");
            exit();
        } else {
            //Check if input characters are valid
            if ( ! filter_var( $email_address, FILTER_VALIDATE_EMAIL ) ) {
                header("Location: ../index.php?signup=invalid_email");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE login_id = '$login_id'";
                $result = mysqli_query($connection, $sql);
                $result_check = mysqli_num_rows($result);
                
                if ( $result_check > 0 ) {
                    header("Location: ../index.php?signup=userTaken");
                    exit();
                } else {
                    //Hashing the password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (first_name, last_name, email_address, login_id, password) values ('$first_name', '$last_name', '$email_address', '$login_id', '$hashed_password' );";
                    mysqli_query($connection, $sql);
                    header("Location: ../index.php?signup=userTaken");
                    exit();
                }
            }
    }
} 
}
?>