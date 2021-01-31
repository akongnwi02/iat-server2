<?php


Breadcrumbs::for('admin.services.price.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.services.price.management'), route('admin.services.price.index'));
});

Breadcrumbs::for('admin.services.price.edit', function ($trail, $id) {
    $trail->parent('admin.services.price.index');
    $trail->push(__('menus.backend.services.price.edit'), route('admin.services.price.edit', $id));
});

Breadcrumbs::for('admin.services.price.create', function ($trail) {
    $trail->parent('admin.services.price.create');
    $trail->push(__('menus.backend.services.price.create'), route('admin.services.price.create'));
});
