<?php
$r['status'] = 'ok';
$r['message'] = [
	'type' => 'user-data',

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
        ], [
            'type' => 'large',
            'status' => 'success',
            'label' => 'Family name',
            'text' => 'Jonsson',
        ], [
            'type' => 'large',
            'status' => 'success',
            'label' => 'Given names',
            'text' => 'David',
        ], [
            'type' => 'large',
            'status' => 'success',
            'label' => 'Address',
            'text' => 'Mjölnerbacken 61',
        ], [
            'type' => 'small',
            'status' => 'success',
            'label' => 'Date of birth',
            'text' => '03/08/1976',
        ], [
            'type' => 'small',
            'status' => 'success',
            'label' => 'Sex',
            'text' => 'T',
        ], [
            'type' => 'small',
            'status' => 'fail',
            'label' => 'Endorsements',
            'text' => '',
        ], [
            'type' => 'small',
            'status' => 'fail',
            'label' => 'Date of Exp',
            'text' => '',
        ], [
            'type' => 'small',
            'status' => 'fail',
            'label' => 'Restrictions',
            'text' => '',
        ], [
            'type' => 'small',
            'status' => 'success',
            'label' => 'Classification',
            'text' => 'B',
        ], [
            'type' => 'small',
            'status' => 'success',
            'label' => 'Date of issue',
            'text' => '01/13/2016',
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
];
exit(json_encode($r));
?>
