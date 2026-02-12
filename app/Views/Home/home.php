<?php startSection('content'); ?>

<h1>Welcome <?= htmlspecialchars($user['name']) ?></h1>
<p>Email: <?= htmlspecialchars($user['email']) ?></p>
<p>Role: <?= htmlspecialchars($user['role']) ?></p>



<?php endSection(); ?>