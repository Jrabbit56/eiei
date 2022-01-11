<div class="container"> 
    <div class="row">
        <?php foreach($rooms as $row):?>
            <div class="col-4">
                <a href="<?php echo '/waterbill/room/' . $row['RoomID']; ?>" class="room-link">
                    <h1 class="text-center"> <span class="badge Jocolor"><?php echo $row["RoomNumber"]?></span></h1>
                </a>
            </div>
        <?php endforeach;?>
    </div>
</div>