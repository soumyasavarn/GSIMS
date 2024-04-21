<?php
$link = mysqli_connect("localhost", "root", "", "grocery");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetching and sanitizing input
$user = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$password2 = mysqli_real_escape_string($link, $_REQUEST['cpassword']);
$number = mysqli_real_escape_string($link, $_REQUEST['phonenumber']);

// Check if passwords match
if ($password === $password2) {
    // Start transaction
    mysqli_begin_transaction($link);

    try {
        // Using NULL for the auto-incremented ID and safer insertion using prepared statement
        $sql = "INSERT INTO customer (ID, user, password, phone_no, Time_of_join) VALUES (NULL, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($link, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $user, $password, $number);
            $executeResult = mysqli_stmt_execute($stmt);
            $customer_id = mysqli_insert_id($link); // Retrieve the ID of the inserted customer

            if ($executeResult) {
                // Delete all rows from curr_session
                $deleteSql = "DELETE FROM curr_session";
                if (mysqli_query($link, $deleteSql)) {
                    // Insert new entry into curr_session
                    $sessionSql = "INSERT INTO curr_session (id) VALUES (?)";
                    $sessionStmt = mysqli_prepare($link, $sessionSql);
                    if ($sessionStmt) {
                        mysqli_stmt_bind_param($sessionStmt, "i", $customer_id);
                        mysqli_stmt_execute($sessionStmt);
                        mysqli_stmt_close($sessionStmt);
                    } else {
                        throw new Exception("Failed to prepare session insert statement.");
                    }
                } else {
                    throw new Exception("Failed to clear curr_session table.");
                }

                // Commit transaction
                mysqli_commit($link);
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                header('Location: index.php');
                exit;
            } else {
                throw new Exception("Could not execute $sql. " . mysqli_error($link));
            }
        } else {
            throw new Exception("Could not prepare the customer insertion query: $sql. " . mysqli_error($link));
        }
    } catch (Exception $e) {
        mysqli_rollback($link); // Rollback transaction on error
        mysqli_close($link);
        die("Transaction failed: " . $e->getMessage());
    }
} else {
    // If passwords do not match, redirect back to the registration page with an error
    mysqli_close($link);
    header('Location: index1.html?error=passwordMismatch');
    exit;
}
?>
