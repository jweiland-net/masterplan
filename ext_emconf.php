<?php
$EM_CONF['masterplan'] = [
    'title' => 'Masterplan',
    'description' => 'Masterplan',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'version' => '3.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
            'maps2' => '9.3.0-0.0.0',
            'service_bw2' => '4.0.0-4.99.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
