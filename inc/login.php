<?php 
session_start();
    if ( isset(  $_POST[login]) ) {
        include_once 'dbh.php';
        
        $email_address = mysqli_real_escape_string( $connection,  $_POST['email_address'] );
        $password = mysqli_real_escape_string( $connection, $_POST['password'] );
        echo $password;
        
        //Handle errors
        //Check if inputs are empty
        if ( empty( $email_address ) || empty( $password ) ) {
            header( "Location: ../login_page.php?login=error1" );
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE email_address = '$email_address'";
            $result = mysqli_query($connection, $sql);
            $result_check = mysqli_num_rows($result);
            if ( $result_check < 1 ) {
                header( "Location: ../login_page.php?login=error2" );
                exit();
            } else {
                if ( $row = mysqli_fetch_assoc( $result ) ) {
                    //De-hasing the user password
                    $hashed_password_check = password_verify( $password, $row['password'] );
                    if ( $hashed_password_check == false ) {
                        header( "Location: ../login_page.php?login=error3" );
                        exit();
                    } elseif ( $hashed_password_check == true ) {
                        //Log in the user
                        $_SESSION['logged_id'] = $row['login_id'];
                        $_SESSION['logged_first_name'] = $row['first_name'];
                        $_SESSION['logged_last_name'] = $row['last_name'];
                        $_SESSION['logged_email_address'] = $row['email_address'];
                        $_SESSION['logged_password'] = $row['password'];
                        header( "Location: ../login_page.php?login=success" );
                        exit();
                    }
                }
            }
        }
    } else {
        header( "Location: ../login_page.php?login=error4" );
        exit();
    }
?>