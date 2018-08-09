<div class="col-md-8 offset-md-3">
    <a href="/" class="btn btn-success">Back</a>
    <?php
    if (isset($message)) {
        ?>
        <div class="alert alert-info" role="alert" style="margin-top: 10px">
            <?php echo $message; ?>
        </div>
        <?php
    }
    ?>
    <form action="/edit/<?php echo $row['id']; ?>" method="POST" class="needs-validation" novalidate style="margin-top: 20px">
        <div class="mb-3">
            <label>Work Name</label>
            <input type="text" class="form-control" value="<?php echo $row['work_name']; ?>" name="name" required placeholder="Fill in work name">
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="country">Date Period</label>
                <div class="input-daterange input-group">
                    <input type="text" class="input-sm form-control datepicker" value="<?php echo $row['start_date']; ?>" name="start" placeholder="Start Date" />
                    <span class="input-group-addon"> to </span>
                    <input type="text" class="input-sm form-control datepicker" value="<?php echo $row['end_date']; ?>" name="end" placeholder="End Date" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Status</label>
                <select class="custom-select d-block w-100" id="status" required name="statusId">
                    <option value="1" <?php ($row['status'] == 1)?'selected':''; ?>>Planning</option>
                    <option value="2" <?php ($row['status'] == 2)?'selected':''; ?>>Doing</option>
                    <option value="3" <?php ($row['status'] == 3)?'selected':''; ?>>Completed</option>
                </select>
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update Work</button>
    </form>
</div>