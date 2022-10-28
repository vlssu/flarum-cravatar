<?php

/*
 * This file is part of vlssu/flarum-cravatar.
 *
 * Copyright (c) 2018 - 2022 Vlssu.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Vlssu\Cravatar\Provider;

use Flarum\Foundation\AbstractServiceProvider;
use Vlssu\Cravatar\Cravatar;

class CravatarProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->container->singleton('cravatar', Cravatar::class);
    }
}
