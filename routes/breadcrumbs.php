<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Hjem', route('home'));
});

Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Kontrollpanel', route('dashboard'));
});

Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->push('Konto', route('user'));
});

Breadcrumbs::register('user.settings', function ($breadcrumbs) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push('Innstillinger', route('user.settings'));
});

Breadcrumbs::register('user.settings.security', function ($breadcrumbs) {
    $breadcrumbs->parent('user.settings');
    $breadcrumbs->push('Sikkerhet', route('user.settings.security'));
});

Breadcrumbs::register('user.setup_2fa', function ($breadcrumbs) {
    $breadcrumbs->parent('user.settings.security');
    $breadcrumbs->push('2fa oppsett', route('user.setup_2fa'));
});

Breadcrumbs::register('user.disable_2fa', function ($breadcrumbs) {
    $breadcrumbs->parent('user.settings.security');
    $breadcrumbs->push('Skru av 2fa', route('user.setup_2fa'));
});
