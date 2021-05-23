<?php

Breadcrumbs::for('admin.account.point.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.accounts.point.management'), route('admin.account.point.index'));
});

Breadcrumbs::for('admin.account.point.show', function ($trail, $id) {
    $trail->parent('admin.account.point.index');
    $trail->push(__('menus.backend.accounts.point.view'), route('admin.account.point.show', $id));
});
