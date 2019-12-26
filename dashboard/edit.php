<?php
require '../includes/header.dash.inc.php';

if(!isset($_GET['id'])){
    header('location: index.php');
} else {
$id = $_GET['id'];
}

$getSingle = $license->getSingleLicense($id)->fetch_assoc();

$control = ($check_action == false ? header('location: index.php') : true); 


?>
<div class="edit-container">
    <form method="POST" action="">

        <label>Name license:</label>
        <input type="text" name="lic_name" value="<?php echo $getSingle['lic_name']; ?>"/><br><br>
        <label>Creator license:</label>
        <input type="text" name="lic_creator" value="<?php echo $getSingle['lic_creator']; ?>"><br><br>
        <label>Type license:</label>
        <select name="lic_type">
            <option><?php echo $getSingle['lic_type']; ?></option>
            <option value="Montly">Montly</option>
            <option value="Yearly">Yearly</option>
        </select><br><br>
        <label>Period license:</label>
        <input type="number" name="lic_period" value="<?php echo $getSingle['lic_period']; ?>">days<br><br>

        <input type="submit" name="btn_update" value="update license" />
        <button><a href="index.php">Back to lists</a></button>
        <input type="hidden" name="lic_id" value="<?php echo $getSingle['lic_id']; ?>"/>

        <?php if(isset($updateLicense)){echo $updateLicense;} ?>

    </form>
</div>



<?php require '../includes/footer.dash.inc.php'; ?>
