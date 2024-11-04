<?php
	$collaborators = [[
		'id' => '1',
		'first-name' => 'Serge',
		'last-name' => 'Yugov',
		'email' => 'sacred.soul.samf@gmail.com',
		'image' => 'http://www.newryspud.com/wp-content/uploads/2017/05/businessman-portrait.jpg',
		'label' => 'Serge Yugov 1 <sacred.soul.samf@gmail.com>',
	],[
		'id' => '2',
		'first-name' => 'John',
		'last-name' => 'Smith',
		'email' => 'john.smith@gmail.com',
		'label' => 'John Smith <john.smith@gmail.com>',
	],[
		'id' => '3',
		'first-name' => 'Alex',
		'last-name' => 'Forth',
		'email' => 'forth1983@gmail.com',
		'label' => 'Alex Forth <forth1983@gmail.com>',
	],[
		'id' => '4',
		'first-name' => 'Larisa',
		'last-name' => 'Dolina',
		'email' => 'lara@mail.com',
		'label' => 'Larisa Dolina <lara@mail.com>',
	],[
		'id' => '5',
		'first-name' => 'Anna',
		'last-name' => 'Hodorkova',
		'email' => 'annochka@mail.com',
		'label' => 'Anna Hodorkova <annochka@mail.com>',
	],[
		'id' => '6',
		'first-name' => 'Emmanuel',
		'last-name' => 'Acevedo',
		'email' => 'ace-of-m@mail.com',
		'label' => 'Emmanuel Acevedo <ace-of-m@mail.com>',
	]];
	
	
    $filter = $_GET['filter'];
    $output = array();
    foreach ($collaborators as $collaborator) {
        if(substr_count($collaborator['label'], $filter) > 0){
            $output[] = $collaborator;
        }
    }
	exit(json_encode($output));
?>
