<?php
include "../admin/header.php";
include '../connection.php';

if(isset($_GET["id"]))
{
	$id=$_GET["id"];
    mysqli_query($con,"delete from variant where variant_id=$id ");
    //header ("location:variantView.php");
    echo '<script>window.location="../admin/variantView.php"</script>';

}

?>
<div class="container jumbotron p-3 my-3 ">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Model</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                        <label for="getModel" class="control-label " >Modal Name </label>
                            <select required class="form-control" id="getModel" name="modelName">
                                <option value="0">Select One</option>
                                    <?php
                                    $result=mysqli_query($con,"SELECT *FROM carmodel");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                                <option value="<?php echo $row['modelid'];?>" >
                                    <?php echo $row['modelname']; ?> 
                                </option>
                                    <?php
                                    }
                                    ?>
                            </select>
            </div>
        </div>
    </div>
</div>

<div id="holder"></div>
  


<div class="col-xs-12 text-center">
    <input type="button" class="btn btn-secondary" value="Print" onclick="codespeedy()">
</div>
<?php
include "../admin/footer.php";
?>

<script>

$("#getModel").change(function(e){ 
    e.preventDefault();
    var model = $("#getModel").val();
    $.ajax(
            {
                type:"POST",
                url: "getVariant.php",
                data: {model_id:model},
                dataType: "html",
                success: function (data) {
                  $("#holder").html(data);
                },
                error:function(er){
                  console.log(er);
                }
             
            }
        );

  });

</script>

<script type="text/javascript">
        
        function codespeedy(){
          var print_div = document.getElementById("holder");
    var print_area = window.open();
    print_area.document.write(print_div.innerHTML);
    print_area.document.close();
    print_area.focus();
    print_area.print();
    print_area.close();
    // This is the code print a particular div element
        }
</script>