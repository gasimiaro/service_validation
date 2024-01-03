<!-- application/views/upload_success.php -->
<h3>Your file was successfully uploaded!</h3>

<ul>
    <?php foreach ($upload_data as $item => $value): ?>
        <li><?= $item; ?>: <?= $value; ?></li>
    <?php endforeach; ?>
</ul>
