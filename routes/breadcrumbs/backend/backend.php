<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
require __DIR__.'/company.php';
require __DIR__.'/service.php';
require __DIR__.'/account.php';
require __DIR__.'/sales.php';
require __DIR__.'/orders.php';
require __DIR__.'/accounting.php';
require __DIR__.'/administration.php';
require __DIR__.'/meter.php';
require __DIR__.'/point.php';
