<h1 class="text-center"> กรอกมิเตอร์น้ำ </h1>

<br>

<form method="POST">

<?php echo csrf_field(); ?>

<div class="row">
    <div class="col-4 offset-4">
        <label for="BillingMonth">เดือน</label>
        <select name="BillingMonth" id="BillingMonth" class="form-control">
            <?php foreach($months as $key => $text): ?>
                <option value="<?php echo $key; ?>" <?php echo $currentMonth == $key ? "selected" : ""; ?>><?php echo $text; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="row mt-4">
    <div class="col-4 offset-4">
        <label for="BillingYear">ปี</label>
        <input
        type="number"
        name="BillingYear"
        id="BillingYear"
        class="form-control"
        value="<?php echo $currentYear; ?>"
        min="<?php echo $currentYear; ?>"
         />
    </div>
</div>

<div class="row mt-4">
  <div class="col-4 offset-4">
    <label for="BeforeB" class="col-form-label">ค่าน้ำก่อน</label>
    <input type="text" id="BeforeB" class="form-control" value="<?php echo $lastMonthMeterUnit; ?>" readonly="readonly">
  </div>
  <br>

</div>

<div class="row mt-4">
  <div class="col-4 offset-4">
    <label for="MeterUnit" class="col-form-label">ค่าน้ำหลัง</label>
    <input type="number" id="MeterUnit" name="MeterUnit" class="form-control" min="<?php echo $lastMonthMeterUnit; ?>" value="<?php echo $meterUnit; ?>">
  </div>
</div>



<div class="row mt-4">
  <div class="col-4 offset-4">
    <button type="submit" class="btn btn-primary btn-lg">ตกลง</button>
    <button style="margin-left:20px;" type="reset" class="btn btn-secondary btn-lg">ยกเลิก</button>
  </div>
</div>

</form>