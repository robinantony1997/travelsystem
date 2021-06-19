<?php
include "../user/header.php";
include '../connection.php';
?>

<?php 
    $car_1 = $_SESSION['car_1']??0;
    $car_2 = $_SESSION['car_2']??0;

    $car_1_name = "";
    $car_2_name = "";

    $car_1_model_name = "";
    $car_2_model_name = "";
    $car_2_ = $car_2_cartype =$car_2_mfyear =$car_2_price=$car_2_engtype=$car_2_displacement=$car_2_max_power=$car_2_max_torque=$car_2_no_cylinder=$car_2_geartype=$car_2_gearbox=$car_2_color="";

    if( $car_1 > 0 ){

        $result = mysqli_query ($con,"SELECT * FROM `entertainment` e JOIN variant v ON v.variant_id = e.varient_id JOIN capability cap ON cap.varient_id = v.variant_id JOIN carmodel c ON c.modelid = v.model_id JOIN convenience con ON con.varient_id = v.variant_id JOIN dimensions d ON d.varient_id =v.variant_id JOIN exterior ex ON ex.varient_id = v.variant_id JOIN interior i ON i.varient_id= v.variant_id JOIN safety s ON s.variant_id = v.variant_id JOIN suspension su ON su.varient_id = v.variant_id  WHERE v.variant_id=$car_1");
        $rows=mysqli_fetch_array($result);

        $car_1_name = "Car 1";
        $car_1_model_name = $rows['modelname'];
        $car_1_variant_name = $rows['variant_name'];
        $car_1_color =$rows['color'];
        $car_1_cartype =$rows['cartype'];
        $car_1_mfyear =$rows['mfyear'];
        $car_1_price=$rows['price'];
        $car_1_engtype=$rows['engtype'];
        $car_1_displacement=$rows['displacement'];
        $car_1_max_power=$rows['max_power'];
        $car_1_max_torque=$rows['max_torque'];
        $car_1_no_cylinder=$rows['no_cylinder'];
        $car_1_geartype=$rows['geartype'];
        $car_1_gearbox=$rows['gearbox'];
        $car_1_drivetype=$rows['drivetype'];
    }

    if( $car_2 > 0){

        $results = mysqli_query ($con,"SELECT * FROM `entertainment` e JOIN variant v ON v.variant_id = e.varient_id JOIN capability cap ON cap.varient_id = v.variant_id JOIN carmodel c ON c.modelid = v.model_id JOIN convenience con ON con.varient_id = v.variant_id JOIN dimensions d ON d.varient_id =v.variant_id JOIN exterior ex ON ex.varient_id = v.variant_id JOIN interior i ON i.varient_id= v.variant_id JOIN safety s ON s.variant_id = v.variant_id JOIN suspension su ON su.varient_id = v.variant_id  WHERE v.variant_id=$car_2");
        $row=mysqli_fetch_array($results);
        $car_2_name = " Car 2";
        $car_2_model_name = $row['modelname'];
        $car_2_variant_name = $row['variant_name'];
        $car_2_color =$row['color'];
        $car_2_cartype =$row['cartype'];
        $car_2_mfyear =$row['mfyear'];
        $car_2_price=$row['price'];
        $car_2_engtype=$row['engtype'];
        $car_2_displacement=$row['displacement'];
        $car_2_max_power=$row['max_power'];
        $car_2_max_torque=$row['max_torque'];
        $car_2_no_cylinder=$row['no_cylinder'];
        $car_2_geartype=$row['geartype'];
        $car_2_gearbox=$row['gearbox'];
        $car_2_drivetype=$row['drivetype'];


    }
    
        
    
?>
<div class="container py-5">
    <div class="">
        <br>
        <br>
        <div class="col-xs-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-stripped table-condensed">
                            <tr>
                                <td></td>
                                <td>
                                    <select name="car_1" id="car_1">
                                        <option value="1">Car 1</option>
                                        <option value="1">Car 2</option>
                                    </select>
                                </td>
                                
                                <td>
                                    <select name="car_2" id="car_2">
                                        <option value="1">Car 1</option>
                                        <option value="1">Car 2</option>
                                    </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>Car Name</td>
                                <td><?=$car_1_name?></td>
                                <td><?=$car_2_name?></td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td><?=$car_1_model_name?></td>
                                <td><?=$car_2_model_name?></td>
                            </tr><tr>
                                <td>Varient</td>
                                <td><?=$car_1_variant_name?></td>
                                <td><?=$car_2_variant_name?></td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td><?=$car_1_color?></td>
                                <td><?=$car_2_color?></td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td><?=$car_1_cartype?></td>
                                <td><?=$car_2_cartype?></td>
                            </tr>
                            <tr>
                                <td>Manfufactuer Date</td>
                                <td><?=$car_1_mfyear?></td>
                                <td><?=$car_2_mfyear?></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><?=$car_1_price?></td>
                                <td><?=$car_2_price?></td>
                            </tr>
                            <tr>
                                <td>Engine Type</td>
                                <td><?=$car_1_engtype?></td>
                                <td><?=$car_2_engtype?></td>
                            </tr>
                            <tr>
                                <td>Displacement</td>
                                <td><?=$car_1_displacement?></td>
                                <td><?=$car_2_displacement?></td>
                            </tr>
                            <tr>
                                <td>Power</td>
                                <td><?=$car_1_max_power?></td>
                                <td><?=$car_2_max_power?></td>
                            </tr>
                            <tr>
                                <td>Torque</td>
                                <td><?=$car_1_max_torque?></td>
                                <td><?=$car_2_max_torque?></td>
                            </tr>
                            <tr>
                                <td>Cylinder</td>
                                <td><?=$car_1_no_cylinder?></td>
                                <td><?=$car_2_no_cylinder?></td>
                            </tr>
                            <tr>
                                <td>Gear Type</td>
                                <td><?=$car_1_geartype?></td>
                                <td><?=$car_2_geartype?></td>
                            </tr>
                            <tr>
                                <td>Gear Box</td>
                                <td><?=$car_1_gearbox?></td>
                                <td><?=$car_2_gearbox?></td>
                            </tr>
                            <tr>
                                <td>Drive Type</td>
                                <td><?=$car_1_drivetype?></td>
                                <td><?=$car_2_drivetype?></td>
                            </tr>
                            
                        
                    </table>
                    <a href="../user/home.php">Add To Compire</a>
                </div>
            </div>
        </div>
    </div>
    <?php
include "../user/foo.php";

?>
<script>
    $("#remove_car").click(function(e){
        e.preventDefault();
        $.ajax(
            {
                type:"POST",
                url: "../user/remove_compare.php",
                data: {id: $(this).attr("data-session")},
                dataType: "json",
                success: function (data) {
                    if(data.status == 1){
                        alert(data.message);
                        window.location.reload();
                    }else{
                        alert(data.message);
                    }
                }
             
            }
        );
    });
</script>