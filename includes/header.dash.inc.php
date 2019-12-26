<?php 
    require_once '../includes/class-autoload.dash.inc.php';

    Session::checkSession();

    $license = new License();
    //$user = new User();

    $check_action = Session::get("status");
    $user_id = Session::get("user_id");

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_insert'])){
        $addLicense = $license->insertLicense();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])){
        $updateLicense = $license->updateLicense();
    }

    if(isset($_GET['del_id'])){
        $delLicense = $license->deleteLicense();
    }

    if(isset($_GET['logout'])){
        Session::destroy();
    }

    
    $getUserName= $license->getUserData($user_id)->fetch_assoc();
?>
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>License Manager</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        </head>
    <body>

    <header>
        <a href="http://localhost/licenseManager/dashboard/">License Manager</a>
        <nav>
            <ul class="nav_links">
                <a href="index.php">Welcome <?php echo ucfirst($getUserName['username']); ?></a>
                <button><a href="?logout">Logout</a></button>
            </ul>
        </nav>
    </header>