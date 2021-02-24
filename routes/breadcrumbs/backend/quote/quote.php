<?php

Breadcrumbs::for('admin.quotes.quote.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.quote.quote.management'), route('admin.quotes.quote.index'));
});

Breadcrumbs::for('admin.quotes.quote.edit', function ($trail, $id) {
    $trail->parent('admin.quotes.quote.index');
    $trail->push(__('menus.backend.quote.quote.edit'), route('admin.quotes.quote.edit', $id));
});

Breadcrumbs::for('admin.quotes.quote.create', function ($trail) {
    $trail->parent('admin.quotes.quote.index');
    $trail->push(__('menus.backend.quote.quote.create'), route('admin.quotes.quote.create'));
});
