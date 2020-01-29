<?php

$finder = PhpCsFixer\Finder::create()
    ->in(['src','tests'])
;

return PhpCsFixer\Config::create()
    ->setRules(
        [
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
        ]
    )
    ->setRules(
        [
            '@Symfony' => true,
            'full_opening_tag' => false,
        ]
    )
    ->setFinder($finder)
;