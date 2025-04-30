<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($u, $e, $p) = explode("|", $user);
        if ($u == $username && $p == $password) {
            $_SESSION["username"] = $username;
            header("Location: welcome.php");
            exit;
        }
    }
    echo "Invalid username or password.";
}
?>





<div style="max-width: 400px; margin: 30px auto; padding: 25px; background: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); font-family: Arial, sans-serif;">
    <h2 style="text-align: center; margin: 0 0 25px 0; color: #2d3748; font-size: 24px;">Login</h2>
    
    <form method="post" style="margin-bottom: 20px;">
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 6px; color: #4a5568; font-weight: 500;">Username:</label>
            <input name="username" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; box-sizing: border-box; font-size: 16px;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; color: #4a5568; font-weight: 500;">Password:</label>
            <input name="password" type="password" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; box-sizing: border-box; font-size: 16px;">
        </div>
        
        <button type="submit" style="width: 100%; padding: 12px; background: #4299e1; color: white; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.2s;">Login</button>
    </form>
    
    <div style="text-align: center;">
        <a href="recover.php" style="color: #4299e1; text-decoration: none; font-size: 14px; transition: color 0.2s;">Forgot Password?</a>
    </div>
</div>