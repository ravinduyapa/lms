<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Teachers</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>View Teachers</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachers as $teacher): ?>
                <tr>
                    <td><?= $teacher['id'] ?></td>
                    <td><?= $teacher['name'] ?></td>
                    <td><?= $teacher['email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="/public/js/bootstrap.min.js"></script>
</body>
</html>
