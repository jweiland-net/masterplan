<?php
$EM_CONF['masterplan'] = [
    'title' => 'Masterplan',
    'description' => 'Masterplan',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'version' => '6.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'maps2' => '12.0.0-0.0.0',
            'service_bw2' => '8.0.0-0.0.0'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
