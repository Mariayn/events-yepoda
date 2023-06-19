<!DOCTYPE html>
<html>
<head>
    <title>Error Page</title>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Error Page</h1>

    <?php if (!empty($errors)) : ?>
        <div class="error-message">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</body>
</html>
