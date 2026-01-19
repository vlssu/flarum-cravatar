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
        $allowUserToggle = (bool) $this->settings->get('vlssu-cravatar.allow-user-toggle');
        $replaceFlarumCustom = (bool) $this->settings->get('vlssu-cravatar.replace-flarum-custom');

        // When user toggling is allowed, prefer the user's choice; otherwise fall back to the legacy behavior.
        $useCravatar = $allowUserToggle
            ? (bool) $user->getPreference('vlssu-cravatar.use', true)
            : (empty($attributes['avatarUrl']) || $replaceFlarumCustom);

        if ($useCravatar) {
            $attributes['avatarUrl'] = $this->cravatar->getForUser($user->id);
            $attributes['cravatar'] = true;
        } else {
            $attributes['cravatar'] = false;
        }

        return $attributes;
    }
}
