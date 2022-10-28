<?php

/*
 * This file is part of vlssu/flarum-cravatar.
 *
 * Copyright (c) 2018 - 2022 Vlssu.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Vlssu\Cravatar\Api\Controllers;

use Flarum\Http\Exception\RouteNotFoundException;
use Flarum\Settings\SettingsRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Vlssu\Cravatar\Exceptions\CravatarNotFoundException;
use Vlssu\Cravatar\Cravatar;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class GetCravatarImageController implements RequestHandlerInterface
{
    private Cravatar $cravatar;

    private SettingsRepositoryInterface $settings;

    public function __construct(Cravatar $cravatar, SettingsRepositoryInterface $settings)
    {
        $this->cravatar = $cravatar;
        $this->settings = $settings;
    }

    /**
     * Handle the request and return a response.
     *
     * @param ServerRequestInterface $request
     *
     * @throws \Flarum\User\Exception\PermissionDeniedException
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!(bool) $this->settings->get('vlssu-cravatar.proxy')) {
            throw new RouteNotFoundException();
        }

        $id = Arr::get($request->getQueryParams(), 'id');

        $cravatarurl = $this->cravatar->getRemote($id);

        $client = new Client();

        try {
            $res = $client->request('GET', $cravatarurl, [
                'headers' => [
                    'Accept' => 'image/*',
                ],
            ]);
        } catch (GuzzleException $e) {
            if ($e->getCode() > 0 && $e->getCode() < 500) {
                throw new CravatarNotFoundException();
            }

            throw $e;
        }

        $type = $res->getHeaderLine('Content-Type');
        $contents = $res->getBody();

        if (!Str::startsWith($type, 'image/') || !$contents->getSize()) {
            throw new CravatarNotFoundException();
        }

        return new Response(
            $res->getStatusCode(),
            [
                'Content-Type' => $res->getHeaderLine('Content-Type'),
            ],
            $contents
        );
    }
}
