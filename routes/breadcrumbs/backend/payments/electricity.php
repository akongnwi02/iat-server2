<?php

Breadcrumbs::for('admin.payments.electricity.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.payments.electricity.management'), route('admin.payments.electricity.index'));
});

Breadcrumbs::for('admin.payments.electricity.edit', function ($trail, $id) {
    $trail->parent('admin.payments.electricity.index');
    $trail->push(__('menus.backend.payments.electricity.edit'), route('admin.payments.electricity.edit', $id));
});

