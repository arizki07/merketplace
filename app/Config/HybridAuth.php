<?php

namespace Config;

class HybridAuth extends \Hybridauth\Hybridauth
{
    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->providers = [
            'Google' => [
                'enabled' => true,
                'keys'    => [
                    'id'     => '26584391220-sacp7mudlviacrn21rcg5hmu4pvs4cgu.apps.googleusercontent.com',
                    'secret' => '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',
                ],
            ],
        ];
    }
}
