<?php if (isset($redirect)) {
    unset($_POST); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Redirect</title>
    </head>

    <body>
        <script>
            (async () => {
                if (window.history.replaceState) {
                    await window.history.replaceState(null, null, window.location.href);
                    window.location = location.protocol + '//' + location.host + '<?= $redirect ?>';
                    window.location.reload()
                }
            })()
        </script>
    </body>

    </html>
<?php die();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Cuisine Compass</title>
    @vite('resources/js/admin.js')
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <script src="/scripts/admin.js"></script>
</head>

<body>
    
</body>

</html>