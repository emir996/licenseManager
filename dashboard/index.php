<?php 
require '../includes/header.dash.inc.php';

if($check_action == true){?><a href="addlicense.php"><button>Add new License</button></a><br><br><?php }?>



<table>

  <tr>
    <th>License Name</th>
    <th>License Creator</th>
    <th>License Type</th>
    <th>License Period</th>
    <th>License Actions</th>
  </tr>
  <?php 
    $getLicense = $license->getAll();
    if($getLicense){
    while($row = $getLicense->fetch_assoc()){
  ?>
  <tr>
    <td><?php echo $row['lic_name']; ?></td>
    <td><?php echo $row['lic_creator']; ?></td>
    <td>expire in <?php echo $row['lic_period']; ?> days</td>
    <td><?php echo $row['lic_type']; ?></td>

    <?php
    if($check_action == true){
    ?>

    <td><a style="color:black;" href="edit.php?id=<?php echo $row['lic_id']; ?>">edit</a>/<a style="color:black;" href="?del_id=<?php echo $row['lic_id']; ?>">delete</a></td>

    <?php } else { ?>

    <td>You are not allowed for this actions</td>

    <?php } ?>
  </tr>
    <?php }} else {echo 'Sorry we have no licenses';} ?>
</table><br>


<?php require '../includes/footer.dash.inc.php'; ?>