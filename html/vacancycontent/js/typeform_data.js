var form_data = [{
	// statement
	id: 0,
	question : 'Please be as honest as you can be in the following questions',
	description: 'The answers you leave will have real impact.',
	
	type: 'statement',
},{
	// text
	id: 1,
	question : 'What is your name?',
	description: 'We would love to get to know you better!',
	
	type: 'text',
	attributes: {
		name: 'your-name',
		id: 'your-name-id',
		placeholder: 'Name',
		required: 'required',
		'data-required-type': 'alpha',
	},
	/*
	mask: {
		pattern: '00:00:00'
	}
	*/
},{
	// select
	id: 13,
	question : 'Which country are you from?',
	description: 'The world is your oyster',
	
	type: 'select',
	
	attributes: {
		name: 'your-select',
		required: 'required',
	},
	choices: [{
		'label': 'Sweden',
		'value': 'sweden',
	},{
		'label': 'Spain',
		'value': 'spain'
	},{
		'label': 'Catalunya',
		'value': 'catalunya',
	},{
		'label': 'USA',
		'value': 'usa'
	},{
		'label': 'Chile',
		'value': 'chile'
	}]
},{
	// number
	id: 2,
	question : 'How old is your oldest cat?',
	description: 'We want to know because... Science.',
	
	type: 'number',
	attributes: {
		name: 'your-number',
	},
},{
	// email
	id: 3,
	question : 'What is your email?',
	description: 'We will only spam you if you have green hair. ',
	
	type: 'email',
	attributes: {
		name: 'your-email',
	},
},{
	// phone
	id: 4,
	question : 'What is your phone?',
	description: '1 (234) 567-7890 format',
	
	type: 'tel',
	attributes: {
		name: 'your-phone',
		pattern: '[0-9] ([0-9]{3}) [0-9]{3}-[0-9]{4}'
	},
	mask: {
		pattern: '0 (000) 000-0000'
	},
},{
	// website
	id: 5,
	question : 'What is your website URL?',
	description: 'Make sure it is valid (it should start with "http://" or "https://")',
	
	type: 'url',
	attributes: {
		name: 'your-website',
		placeholder: 'http://',
	},
},{
	// textarea
	id: 6,
	question : 'What is the story of your life?',
	description: 'Please describe it within 50 characters',
	
	type: 'textarea',
	attributes: {
		rows: 1,
		name: 'your-textarea',
	},
},{
	// choices (single choice)
	/*
		choices alignment
		alignment: 'row', 'rows', 'column', 'column-full'
	*/
	id: 7,
	question : 'How do you normally get to work?',
	description: '(single)',
	type: 'choices',
	attributes: {
		name: 'your-single-choice',
		required: 'required',
	},
	choices: [{
		'label': 'Bicing',
		'value': 'bicing',
	},{
		'label': 'Car',
		'value': 'car'
	},{
		'label': 'Metro',
		'value': 'metro'
	},{
		'label': 'Bus',
		'value': 'bus'
	},{
		'label': 'Helicopter',
		'value': 'helicopter'
	},{
		'label': 'Private jet',
		'value': 'private-jet'
	}],
},{
	// choices (multiple choices)
	id: 8,
	question : 'How do you normally get to work?',
	description: '(multiple)',
	type: 'choices',
	multiple: true,
	attributes: {
		name: 'your-multiple-choice',
		required: 'required',
	},
	choices: [{
		'label': 'Bicing',
		'value': 'bicing',
		'selected': true
	},{
		'label': 'Car',
		'value': 'car'
	},{
		'label': 'Metro',
		'value': 'metro'
	},{
		'label': 'Bus',
		'value': 'bus'
	},{
		'label': 'Helicopter',
		'value': 'helicopter'
	},{
		'label': 'Private jet',
		'value': 'private-jet'
	}],
},{
	// dates (single choice)
	id: 9,
	question : 'Dates',
	type: 'choices',
	alignment: 'rows',
	styles:{ // will be inserted as styles="width: 50%;"
		width: '50%',
	},
	attributes: {
		name: 'your-dates',
	},
	choices: [{
		'label': 'jan-17 2017<br/>(07:30 PST)',
		'value': 'jan-17',
		'selected': true
	},{
		'label': 'jan-18 2017<br/>(07:30 PST)',
		'value': 'jan-18',
	},{
		'label': 'jan-19 2017<br/>(07:30 PST)',
		'value': 'jan-19',
	},{
		'label': 'jan-20 2017<br/>(07:30 PST)',
		'value': 'jan-20',
	},{
		'label': 'jan-21 2017<br/>(07:30 PST)',
		'value': 'jan-21',
	},{
		'label': 'jan-22 2017<br/>(07:30 PST)',
		'value': 'jan-22',
	}],
},{
	// image (basically a choice with image_url)
	id: 10,
	question : 'Which kitten is the cutest?',
	description: 'The winning kitten will be rewarded with fish-for-a-lifetime',
	type: 'choices',
	styles: {
		width: '33%',
	},
	attributes: {
		name: 'your-image-choice',
		required: 'required',
	},
	choices: [{
		'image_url': 'images/kitten_1.jpg',
		'label': 'Mittens',
		'value': 'kitten_1',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'Mjau',
		'value': 'kitten_2'
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'Furry',
		'value': 'kitten_3'
	}],
},{
	// rating
	id: 11,
	question : 'Rate us',
	description: 'Be honest, we wont judge...',
	
	type: 'rating',
	icon: {
		class: 'fa fa-star fsz75',
	},
	attributes: {
		name: 'your-rating',
	},
	choices: [{
		'label': 'Bad',
		'value': 'bad',
		'selected': true,
	},{
		'label': 'Not bad',
		'value': 'not-bad'
	},{
		'label': 'Regular',
		'value': 'regular'
	},{
		'label': 'Good',
		'value': 'good'
	},{
		'label': 'Perfect',
		'value': 'perfect'
	}],
},{
	// scale
	id: 12,
	question : 'What do you think of Typeform I/O?',
	
	type: 'scale',
	attributes: {
		name: 'your-scale',
	},
	choices: {
		start: 0,
		count: 11,
		selected: 5,
		labels: ['Forms suck', 'Who cares', 'I love you'],
	},
},{
	// tags
	id: 14,
	question : 'What is you favorite programming language?',
	description: 'May be not popular, but favorite nonetheless...',
	
	type: 'dropdown',
	tags: true,
	allowCustom: true, //allow to have custom tags, not from the list
	
	attributes: {
		name: 'your-tags',
		required: 'required',
	},
	choices: [{
		'label': 'ActionScript',
		'value': 'actionscript',
	},{
		'label': 'AppleScript',
		'value': 'applescript',
	},{
		'label': 'Asp',
		'value': 'asp',
	},{
		'label': 'BASIC',
		'value': 'basic',
	},{
		'label': 'C',
		'value': 'c',
	},{
		'label': 'C++',
		'value': 'c++',
	},{
		'label': 'Clojure',
		'value': 'clojure',
	},{
		'label': 'COBOL',
		'value': 'cobol',
	},{
		'label': 'ColdFusion',
		'value': 'coldfusion',
	},{
		'label': 'Erlang',
		'value': 'erlang',
	},{
		'label': 'Fortran',
		'value': 'fortran',
	},{
		'label': 'Groovy',
		'value': 'groovy',
	},{
		'label': 'Haskell',
		'value': 'haskell',
	},{
		'label': 'Java',
		'value': 'java',
	},{
		'label': 'JavaScript',
		'value': 'javascript',
	},{
		'label': 'Lisp',
		'value': 'lisp',
	},{
		'label': 'Perl',
		'value': 'perl',
	},{
		'label': 'PHP',
		'value': 'php',
	},{
		'label': 'Python',
		'value': 'python',
	},{
		'label': 'Ruby',
		'value': 'ruby',
	},{
		'label': 'Scala',
		'value': 'scala',
	},{
		'label': 'Scheme',
		'value': 'scheme',
	}],
},{
	// dropdown
	id: 15,
	question : 'What is you favorite programming language?',
	description: 'May be not popular, but favorite nonetheless...',
	
	type: 'dropdown',
	
	attributes: {
		name: 'your-dropdown',
		required: 'required',
	},
	choices: [{
		'image_url': 'images/kitten_1.jpg',
		'label': 'ActionScript',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'AppleScript',
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'Asp',
	},{
		'image_url': 'images/kitten_1.jpg',
		'label': 'BASIC',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'C',
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'C++',
	},{
		'image_url': 'images/kitten_1.jpg',
		'label': 'Clojure',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'COBOL',
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'ColdFusion',
	},{
		'image_url': 'images/kitten_1.jpg',
		'label': 'Erlang',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'Fortran',
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'Groovy',
	},{
		'image_url': 'images/kitten_1.jpg',
		'label': 'Haskell',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'Java',
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'JavaScript',
	},{
		'image_url': 'images/kitten_1.jpg',
		'label': 'Lisp',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'Perl',
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'PHP',
	},{
		'image_url': 'images/kitten_1.jpg',
		'label': 'Python',
	},{
		'image_url': 'images/kitten_2.jpg',
		'label': 'Ruby',
	},{
		'image_url': 'images/kitten_3.jpg',
		'label': 'Scala',
	},{
		'image_url': 'images/kitten_1.jpg',
		'label': 'Scheme',
	}],
	
}];