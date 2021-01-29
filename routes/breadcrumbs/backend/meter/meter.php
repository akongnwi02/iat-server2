<?php

Breadcrumbs::for('admin.meter.electricity.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.meter.electricity.management'), route('admin.meter.electricity.index'));
});

Breadcrumbs::for('admin.meter.electricity.create', function ($trail) {
    $trail->parent('admin.meter.electricity.index');
    $trail->push(__('menus.backend.meter.electricity.create'), route('admin.meter.electricity.create'));
});

Breadcrumbs::for('admin.meter.electricity.unassigned', function ($trail) {
    $trail->parent('admin.meter.electricity.index');
    $trail->push(__('menus.backend.meter.electricity.unassigned'), route('admin.meter.electricity.unassigned'));
});

Breadcrumbs::for('admin.meter.electricity.deactivate.form', function ($trail, $id) {
    $trail->parent('admin.meter.electricity.index');
    $trail->push(__('menus.backend.meter.electricity.deactivate'), route('admin.meter.electricity.deactivate.form', $id));
});

Breadcrumbs::for('admin.meter.electricity.edit', function ($trail, $id) {
    $trail->parent('admin.meter.electricity.index');
    $trail->push(__('menus.backend.meter.electricity.edit'), route('admin.meter.electricity.edit', $id));
});

Breadcrumbs::for('admin.meter.electricity.clone', function ($trail, $id) {
    $trail->parent('admin.meter.electricity.index');
    $trail->push(__('menus.backend.meter.electricity.clone'), route('admin.meter.electricity.clone', $id));
});