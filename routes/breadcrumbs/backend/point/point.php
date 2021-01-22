<?php

Breadcrumbs::for('admin.point.electricity.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.point.electricity.management'), route('admin.point.electricity.index'));
});
