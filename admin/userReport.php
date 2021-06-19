<?php
include '../connection.php';
include "../admin/header.php";

    $carResult=mysqli_query ($con,"SELECT *FROM userregistration");
	$rowcount=mysqli_num_rows($carResult);
	if($rowcount >0){
?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Users</h5>
        </div>
        <div class="card-body">
            <div id="print">
                <table class="table table-responsive table-hover" id="myTable">

                <thead>
                    <tr align="center">
                        <th> Name </th>
                        <th>  DOB </th>
                        <th> Aadhar Number </th>
                        <th> Phone Number </th>
                        <th> Pin Code </th>
                        <th>  Email </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($carResult))
                        {
                            ?>
                            <tr align="center">
                                <td><?= $row['first_name'] ?> <?= $row['last_name'] ?></td> 
                                <td><?= $row['dob'] ?></td> 
                                <td><?= $row['aadhar_number'] ?></td>   
                                <td><?= $row['phone_number'] ?></td>
                                <td><?= $row['pin_code'] ?></td>
                                <td><?= $row['email'] ?></td>
                                
                            <?php 
                                echo "</tr>";
                                
                        }

                        ?>
                </tbody>
            </table>
            </div>
            <div class="col-xs-12 text-center">
                <input type="button" class="btn btn-secondary" value="Print" onclick="codespeedy()">
            </div>
            <br>
        </div>
                    </div>

</div>
<?php
	}   

?>

<?php
include "../admin/footer.php";
?>

<script type="text/javascript">
        
        function codespeedy(){
          var print_div = document.getElementById("print");
    var print_area = window.open();
    print_area.document.write(print_div.innerHTML);
    print_area.document.close();
    print_area.focus();
    print_area.print();
    print_area.close();
    // This is the code print a particular div element
        }
</script>