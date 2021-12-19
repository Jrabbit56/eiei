<div class="container"> 
    <?php foreach($buildings as $row):?>

        <div class="row">
          <div class="col-4">
    
          </div>
          <div class="col-4">
            <a href="<?php echo '/waterbill/building/' . $row['BuildingID']; ?>" class="">
              <h1 class="text-center"> <span class="badge Jocolor">ตึก <?php echo $row['BuildingName']; ?></span></h1>
            </a>
          </div>
          <div class="col-4">
    
          </div>
        </div>
    <?php endforeach;?>




</div>