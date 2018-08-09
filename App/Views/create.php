<div class="col-md-8 offset-md-3">
    <a href="/" class="btn btn-success">Back</a>
    <?php
    if (isset($status)) {
        if (!empty($status)) {
            ?>
            <div class="alert alert-success" role="alert" style="margin-top: 10px">
                Add new work is success!
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger" role="alert" style="margin-top: 10px">
                Oops, something was wrong!
            </div>
            <?php
        }
    }
    if (isset($message)) {
        ?>
        <div class="alert alert-warning" role="alert" style="margin-top: 10px">
            <?php echo $message; ?>
        </div>
        <?php
    }
    ?>
    <form action="/create" method="POST" class="needs-validation" novalidate style="margin-top: 20px">
        <div class="mb-3">
            <label>Work Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="country">Date Period</label>
                <div class="input-daterange input-group">
                    <input type="text" class="input-sm form-control datepicker" name="start" placeholder="Start Date" />
                    <span class="input-group-addon"> to </span>
                    <input type="text" class="input-sm form-control datepicker" name="end" placeholder="End Date" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Status</label>
                <select class="custom-select d-block w-100" id="status" name="statusId">
                    <option value="0">Chose..</option>
                    <option value="1">Planning</option>
                    <option value="2">Doing</option>
                    <option value="3">Completed</option>
                </select>
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add Work</button>
    </form>
</div>