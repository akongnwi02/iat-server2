<?php

Breadcrumbs::for('admin.sales.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.sales.management'), route('admin.sales.index'));
});

Breadcrumbs::for('admin.sales.create', function ($trail) {
    $trail->parent('admin.sales.index');
    $trail->push(__('menus.backend.sales.create'), route('admin.sales.create'));
});
