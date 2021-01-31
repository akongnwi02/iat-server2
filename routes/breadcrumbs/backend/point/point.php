<?php

Breadcrumbs::for('admin.point.electricity.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.point.electricity.management'), route('admin.point.electricity.index'));
});

Breadcrumbs::for('admin.point.electricity.map', function ($trail) {
    $trail->parent('admin.point.electricity.index');
    $trail->push(__('menus.backend.point.electricity.map'), route('admin.point.electricity.map'));
});

Breadcrumbs::for('admin.point.electricity.edit', function ($trail, $id) {
    $trail->parent('admin.point.electricity.index');
    $trail->push(__('menus.backend.point.electricity.edit'), route('admin.point.electricity.edit', $id));
});

Breadcrumbs::for('admin.point.electricity.singleMap', function ($trail, $id) {
    $trail->parent('admin.point.electricity.index');
    $trail->push(__('menus.backend.point.electricity.map'), route('admin.point.electricity.singleMap', $id));
});

Breadcrumbs::for('admin.point.electricity.editMap', function ($trail, $id) {
    $trail->parent('admin.point.electricity.index');
    $trail->push(__('menus.backend.point.electricity.editMap'), route('admin.point.electricity.editMap', $id));
});

Breadcrumbs::for('admin.point.electricity.clone', function ($trail, $id) {
    $trail->parent('admin.point.electricity.index');
    $trail->push(__('menus.backend.point.electricity.clone'), route('admin.point.electricity.clone', $id));
});

Breadcrumbs::for('admin.point.electricity.create', function ($trail) {
    $trail->parent('admin.point.electricity.index');
    $trail->push(__('menus.backend.point.electricity.create'), route('admin.point.electricity.create'));
});
