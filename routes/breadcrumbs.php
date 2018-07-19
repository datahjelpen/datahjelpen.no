<?php

Breadcrumbs::for('privacy', function ($trail) {
    $trail->push('Personvern', route('privacy'));
});

Breadcrumbs::for('privacy.policy', function ($trail) {
    $trail->parent('privacy');
    $trail->push('Personvern', route('privacy.policy'));
});

// User start
Breadcrumbs::for('user', function ($trail) {
    $trail->push('Konto', route('user'));
});

Breadcrumbs::for('user.settings', function ($trail) {
    $trail->parent('user');
    $trail->push('Innstillinger', route('user.settings'));
});

Breadcrumbs::for('user.settings.security', function ($trail) {
    $trail->parent('user.settings');
    $trail->push('Sikkerhet', route('user.settings.security'));
});

Breadcrumbs::for('user.setup_2fa', function ($trail) {
    $trail->parent('user.settings.security');
    $trail->push('2fa oppsett', route('user.setup_2fa'));
});

Breadcrumbs::for('user.disable_2fa', function ($trail) {
    $trail->parent('user.settings.security');
    $trail->push('Skru av 2fa', route('user.setup_2fa'));
});
// User end
