<a href="/create" class="btn btn-primary">Add New Work</a>

<table class="table table-striped" style="margin-top: 20px;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Work Name</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($todoList as $todo) {
    ?>
        <tr>
            <th scope="row"><?php echo $todo['id'] ?></th>
            <td><?php echo $todo['work_name'] ?></td>
            <td><?php echo $todo['start_date'] ?></td>
            <td><?php echo $todo['end_date'] ?></td>
            <td><?php echo $todo['status'] ?></td>
            <td>
                <a href="/edit/<?php echo $todo['id'] ?>" class="btn btn-info">Edit</a>
                <a href="/delete/<?php echo $todo['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
