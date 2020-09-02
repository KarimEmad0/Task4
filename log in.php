<?php
session_start();
require_once ('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['email']) && isset($_POST['password']))
    {
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

        if (strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1)
        {
            $_SESSION['error'] = "Email and password are required";
            header("location:index.php");
            return;
        }

        else if (strpos($_POST['email'], "@") === false)
        {
            $_SESSION['error'] = "Email must have an at-sign (@)";
            header('location:index.php');
            return;
        }

        $sql = "select * from user where email=:email AND password=:password";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ));

        $count = $stmt->rowCount();
        if ($count > 0)
        {
            $_SESSION["email"] = $_POST["email"];
            header('location:second page.php');
        }
        else
        {
            $_SESSION["error"] = "Email or password are incorrect";
            header('location:index.php');
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
