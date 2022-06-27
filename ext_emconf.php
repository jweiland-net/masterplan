<?php
$EM_CONF['masterplan'] = [
    'title' => 'Masterplan',
    'description' => 'Masterplan',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'version' => '4.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.29-11.5.99',
            'maps2' => '9.3.0-0.0.0',
            'service_bw2' => '5.0.0-0.0.0'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
