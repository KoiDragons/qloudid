<?php
$r['status'] = 'ok';
$r['message'] = [
	'type' => 'login-data',

    'user_content' => [
        'company' => [
            'name' => 'Cloud ID Business',
        ],
        'user' => [
            'id' => '3',
            'name' => 'User',
            'image' => [
                'src' => 'images/kg.png',
                'alt' => 'User',
                'title' => 'User',
            ],
        ],
        'fields' => [[
            'type' => 'large',
            'status' => 'success',
            'label' => 'Social Security Number',
            'text' => '19760308-0718',
        ]],
        'country' => [
            'image' => [
                'src' => 'images/flag.png',
                'alt' => 'Sweden',
                'title' => 'Sweden',
            ],
        ],
        'score' => [
            'image' => [
                'src' => 'images/score.png',
                'alt' => '100/70',
            ],
            'text' => '100/70',
        ]
    ],

    'form_content' => [
        'id' => 'login-form',
        'method' => 'post',
        'action' => 'user-data.php',

        'fields' => [[
            'id' => '1',
            'type' => 'email',
            'name' => 'email',
            'label' => 'Email',
        ], [
            'id' => '2',
            'type' => 'password',
            'name' => 'password',
            'label' => 'Password',
        ]],
        'button' => [
            'type' => 'submit',
            'label' => 'Sign up',
        ],
    ]
];
exit(json_encode($r));
?>
