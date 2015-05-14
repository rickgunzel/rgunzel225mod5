<!DOCTYPE html>
<html>
<head>
    <title>Task List Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="page">
    <div id="header">
        <h1>Task List Manager</h1>
    </div>
    <div id="main">

    <!-- part 1: the errors -->
    <?php if (count($errors) > 0) : ?>
    <h2>Errors</h2>
    <ul>
        <?php foreach($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <!-- part 2: the tasks -->
    <h2>Tasks</h2>
    <?php if (count($_SESSION['tasks']) == 0) : ?>
        <p>There are no tasks in the task list.</p>
    <?php else: ?>
        <ul>
        <?php foreach($_SESSION['tasks'] as $id => $task) : ?>
            <li><?php echo $id + 1 . '. ' . $task; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <br />

    <!-- part 3: the add form -->
    <h2>Add Task</h2>
    <form action="." method="post" >
        <?php foreach($_SESSION['tasks'] as $task) : ?>
          <input type="hidden" name="tasklist[]" value="<?php echo $task; ?>"/>
        <?php endforeach; ?>
        <input type="hidden" name="action" value="add"/>
        <label>Task:</label>
        <input type="text" name="newtask" id="newtask" /> <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add Task"/>
    </form>
    <br />


    <!-- part 4: the delete form -->
    <?php if (count($_SESSION['tasks']) > 0) : ?>
    <h2>Delete Task</h2>
    <form action="." method="post" >
        <?php foreach($_SESSION['tasks']as $task) : ?>
          <input type="hidden" name="tasklist[]" value="<?php echo $task; ?>"/>
        <?php endforeach; ?>
        <input type="hidden" name="action" value="delete"/>
        <label>Task:</label>
        <select name="taskid">
            <?php foreach($_SESSION['tasks'] as $id => $task) : ?>
                <option value="<?php echo $id; ?>">
                    <?php echo $task; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Delete Task"/>
    </form>
    <?php endif; ?>

    </div><!-- end main -->
    </div><!-- end page -->
</body>
</html>