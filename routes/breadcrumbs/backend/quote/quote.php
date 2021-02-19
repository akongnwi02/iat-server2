<?php

Breadcrumbs::for('admin.quotes.inventory.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.quote.inventory.management'), route('admin.quotes.inventory.index'));
});

Breadcrumbs::for('admin.quotes.inventory.edit', function ($trail, $id) {
    $trail->parent('admin.quotes.inventory.index');
    $trail->push(__('menus.backend.quote.inventory.edit'), route('admin.quotes.inventory.edit', $id));
});

Breadcrumbs::for('admin.quotes.inventory.create', function ($trail) {
    $trail->parent('admin.quotes.inventory.index');
    $trail->push(__('menus.backend.quote.inventory.create'), route('admin.quotes.inventory.create'));
});
