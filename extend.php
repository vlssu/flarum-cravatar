<?php

/*
 * This file is part of vlssu/flarum-cravatar.
 *
 * Copyright (c) 2018 - 2022 Vlssu.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Vlssu\Cravatar;

use Flarum\Api\Serializer\BasicUserSerializer;
use Flarum\Extend;
use Vlssu\Cravatar\Provider\CravatarProvider;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/resources/less/admin.less'),

    (new Extend\Routes('api'))
        ->get(
            '/users/{id}/cravatar.jpg',
            'vlssu.cravatar.image',
            Api\Controllers\GetCravatarImageController::class
        ),

    new Extend\Locales(__DIR__.'/resources/locale'),

    (new Extend\ServiceProvider())
        ->register(CravatarProvider::class),

    (new Extend\ApiSerializer(BasicUserSerializer::class))
        ->attributes(Api\AddCravatar::class),

    (new Extend\Settings())
        ->default('vlssu-cravatar.default', 'mp')
        ->default('vlssu-cravatar.rating', 'g')
        ->default('vlssu-cravatar.proxy', false)
        ->default('vlssu-cravatar.force-default', false)
        ->default('vlssu-cravatar.replace-flarum-custom', false)
        ->default('vlssu-cravatar.allow-user-toggle', false)
        ->serializeToForum('vlssu-cravatar.allow-user-toggle', 'vlssu-cravatar.allow-user-toggle'),
];
