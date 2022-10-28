<?php

/*
 * This file is part of vlssu/flarum-cravatar.
 *
 * Copyright (c) 2018 - 2022 Vlssu.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Vlssu\Cravatar\Api;

use Flarum\Api\Serializer\BasicUserSerializer;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\User;
use Vlssu\Cravatar\Cravatar;

class AddCravatar
{
    public Cravatar $cravatar;

    public SettingsRepositoryInterface $settings;

    public function __construct(Cravatar $cravatar, SettingsRepositoryInterface $settings)
    {
        $this->cravatar = $cravatar;
        $this->settings = $settings;
    }

    public function __invoke(BasicUserSerializer $serializer, User $user, array $attributes)
    {
        if (empty($attributes['avatarUrl']) || (bool) $this->settings->get('vlssu-cravatar.replace-flarum-custom')) {
            $attributes['avatarUrl'] = $this->cravatar->getForUser($user->id);
            $attributes['cravatar'] = true;
        }

        return $attributes;
    }
}
