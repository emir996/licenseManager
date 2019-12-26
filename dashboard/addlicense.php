<?php require '../includes/header.dash.inc.php';

    $control = ($check_action == false ? header('location: index.php') : true); 
?>


<div class="add-container">
    <form method="POST" action="">

        <label>Name license:</label>
        <input type="text" name="lic_name"/><br><br>
        <label>Creator license:</label>
        <input type="text" name="lic_creator"><br><br>
        <label>Type license:</label>
        <select name="lic_type">
            <option>Select Type</option>
            <option value="Montly">Montly</option>
            <option value="Yearly">Yearly</option>
        </select><br><br>
        <label>Period license:</label>
        <input type="number" name="lic_period">days<br><br>

        <input type="submit" name="btn_insert" value="insert new licence" />
        <button><a href="index.php">Back to lists</a></button>

    </form>
    <?php if(isset($addLicense)){echo $addLicense;} ?>
</div>

<?php require '../includes/footer.dash.inc.php'; ?>
