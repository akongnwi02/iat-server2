<?php


Breadcrumbs::for('admin.administration.cycle.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.administration.cycle.management'), route('admin.administration.cycle.index'));
});

Breadcrumbs::for('admin.administration.cycle.create', function ($trail) {
    $trail->parent('admin.administration.cycle.index');
    $trail->push(__('menus.backend.administration.cycle.create'), route('admin.administration.cycle.create'));
});

Breadcrumbs::for('admin.administration.cycle.edit', function ($trail, $id) {
    $trail->parent('admin.administration.cycle.index');
    $trail->push(__('menus.backend.administration.cycle.edit'), route('admin.administration.cycle.edit', $id));
});
