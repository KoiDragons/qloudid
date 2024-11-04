var $window = $(window),
    $body = $(document.body),
    leadId,
    $extra_fields = [],
    $button_area = [];
var methods = {

    /* INIT */
    init : function(uid){
        console.log(uid);
        // if no base url or uid, then stop it
        if(!uid){
            console.log('uid is are not supplied!');
            return false;
        }

        //var modal_content = '<div class="form-group"><input type="text" class="form-control" name="name" placeholder="Full Name" required="required" /> </div><div class="form-group"><div class="wi_100 input-group"><input type="email" class="form-control" name="email" placeholder="Email Address" required="required" /> </div></div><div class="form-group"><input type="text" class="form-control" name="company" placeholder="Company name" required="required" /> </div><div id="extra-fields"></div><div id="button-area"><button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled">Submit</button></div>';

        /*$body
        .append('<div class="wp-modal" id="question-form"><div class="modal-wrap"><a href="#" class="modal-close glyphicon glyphicon-remove"></a><div class="modal-header"> <span>Schedule a Demo</span> </div><form method="POST" action="" id="form1"></form><br><br><br> </div></div><div id="wp-fade"></div>')
        .find('#form1').html(modal_content);
        */
        // form
        methods.form_init();

        // get events from API asap
        this.get_disabled_slots();
    },



    /* FORM */
    form_init : function(){
        var email_arr = ['gmail.com', 'mac.com', 'yahoo.com', 'hotmail.com', 'sbcglobal.net', 'earthlink.net', 'att.net', 'aol.com', 'comcast.com', 'comcast.net', 'me.com', 'ymail.com', 'googlemail.com', '163.com'];

        // Form 1
        var $form1 = $('#form1'),
        $extra_fields = $form1.find('#extra-fields');
        $button_area = $form1.find('#button-area');


        // - email check
        $form1.on('change', 'input[name=email], input[name=company]', function(){
            methods.form_email_check($(this), email_arr, $extra_fields, $button_area);
        });

        // - form submit
        $form1.on('submit', function(){
            var $this = $(this),
                $submit = $this.find('[type=submit]');

            // - close button
            if($submit.hasClass('close-modal')){
                methods.popup_hide($submit.closest('.wp-modal'));
            }

            // - email check
            else if($submit.hasClass('check-email')){
                $this.find('[name=email]').trigger('change');
            }

            // - extra fields check
            else if($submit.hasClass('extra-check')){
                methods.form_extra_check($submit, email_arr, $extra_fields, $button_area);
            }

            // - extra fields check
            else if($submit.hasClass('cal-check')){
                methods.form_get_calendar_data(undefined, $this, $button_area);
            }

            // - send appointment request
            else if($submit.hasClass('calendar-button')){
                methods.form_calendar_appointment($submit);
            }

            return false;
        });

        // // - choose time button
        // $form1.on('click', '.time-button', function(){
        // 	var $this = $(this);
        // 	$this
        // 		.addClass('active')
        // 		.closest('.form-group').siblings().find('.active').removeClass('active');
        // 	$this.closest('form').find('#button-area button')
        // 		.data({
        // 			'url' : $this.data('url'),
        // 			'date' : $this.data('date')
        // 		})
        // 		.removeAttr('disabled');
        // 	return false;
        // });


    },

    // - email check
    form_email_check : function($this, email_arr, $extra_fields, $button_area){
        var $form = $this.closest('form'),
            $fields = $form.find('input');

        if($form.data('loading') == true){
            return false;
        }

        // Email
        if($this.attr('name') === 'email'){
            var val = $this.val().split('@'),
                $icon = $this.siblings('.input-group-addon');

            if (val.length > 1 && email_arr.indexOf(val[1]) > -1){
                if ($icon[0]) {
                    $icon.html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
                } else {
                    $icon = $('<div class="input-group-addon"></div>');
                    $icon.html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>').insertAfter($this);
                }

                $form.data('loading', true);
                $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>');

                var data = {
                    email: $this.val()
                }

                $.ajax({
                    url: email_check_url,
                    type: 'POST',
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    data: JSON.stringify(data),
                })
                .done(function(data) {
                    console.log(data);
                    leadId = data.leadId;
                    $button_area.empty();
                    methods.form_email_callback(data, $form, $extra_fields, $button_area);
                    $icon.html('<span class="glyphicon glyphicon glyphicon-ok text-success"></span>');
                })
                .fail(function() {
                    $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled">Check</button>');
                    $icon.html('<span class="glyphicon glyphicon glyphicon-remove text-danger"></span>');
                })
                .always(function() {
                    $form.data('loading', false);
                });
            }
            else {
                var $company = $fields.filter('[name=company]');
                if ($company.val()) {
                    if ($icon[0]) {
                        $icon.html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
                    } else {
                        $icon = $('<div class="input-group-addon"></div>');
                        $icon.html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>').insertAfter($this);
                    }

                    $form.data('loading', true);
                    $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>');

                    var data = {
                        email: $this.val(),
                        company : $company.val()
                    }

                    $.ajax({
                        url: email_check_url,
                        type: 'POST',
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        data: JSON.stringify(data),
                    })
                    .done(function(data) {
                        console.log(data);
                        leadId = data.leadId;
                        $button_area.empty();
                        $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>');
                        methods.form_email_callback(data, $form, $extra_fields, $button_area);
                        $icon.html('<span class="glyphicon glyphicon glyphicon-ok text-success"></span>');
                    })
                    .fail(function() {
                        $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled">Check</button>');
                        $icon.html('<span class="glyphicon glyphicon glyphicon-remove text-danger"></span>');
                    })
                    .always(function() {
                        $form.data('loading', false);
                    });
                }
            }
        }

        // Company
        else if($this.attr('name') === 'company'){
            var $email = $fields.filter('[name=email]'),
                val = $email.val().split('@'),
                $icon = $email.siblings('.input-group-addon');

            if ((val.length < 0 || email_arr.indexOf(val[1]) < 0) && $this.val()){
                if ($icon[0]) {
                    $icon.html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
                } else {
                    $icon = $('<div class="input-group-addon"></div>');
                    $icon
                        .html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>')
                        .insertAfter($email);
                }

                $form.data('loading', true);
                $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>');

                var data = {
                        email: $email.val(),
                        company : $this.val()
                    }

                $.ajax({
                    url: email_check_url,
                    type: 'POST',
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    data: JSON.stringify(data),
                })
                .done(function(data) {
                    console.log(data);
                    leadId = data.leadId;
                    $button_area.empty();
                    methods.form_email_callback(data, $form, $extra_fields, $button_area);
                    $icon.html('<span class="glyphicon glyphicon glyphicon-ok text-success"></span>');
                })
                .fail(function() {
                    $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled">Check</button>');
                    $icon.html('<span class="glyphicon glyphicon glyphicon-remove text-danger"></span>');
                })
                .always(function() {
                    $form.data('loading', false);
                });
            }
        }
    },

    // - email check callback
    form_email_callback : function(data, $form, $extra_fields, $button_area){
        if (data){
            var html = '';

            // Submit
            if(data.submit){
                $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger close-modal">Submit</button>');
            }

            // Url
            else if(data.url){
                $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger check-email" disabled="disabled"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>');
                methods.form_get_calendar_data(data, $form, $button_area);
            }

            // Lead
            else if(data.leadId && data.fields){
                var req = '';
                for(var i = 0, iL = data.fields.length; i < iL; i++){
                    var cd = data.fields[i];
                    req = cd[3] ? ' required="required"' : '';
                    html += '<div class="form-group">\
                                <input type="' + cd[2] + '" class="form-control" name="' + cd[1] + '" placeholder="' + cd[0] + '" ' + req + '/>\
                            </div>';
                }

                $extra_fields
                    .html(html)
                    .animate({
                        opacity: 'show',
                    });

                $button_area.html('<button type="submit" class="wi_100 mart25 btn btn-danger extra-check" data-lead="' + data.leadId + '">Next</button>');
            }
        }
    },

    // - extra fields check
    form_extra_check : function($button, email_arr, $extra_fields, $button_area){
        var $form = $button.closest('form'),
            $fields = $form.find('input, textarea, select');

            $button
                .data('init-text', $button.html())
                .html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');

            var data = {};
            for(var i = 0, iL = $fields.length; i < iL; i++){
                var $cf = $fields.eq(i);
                data[$cf.attr('name')] = $cf.val();
            }
            data.leadId = $button.data('lead');

            $.ajax({
                url : email_check_url,
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                data: JSON.stringify(data),
            })
            .done(function(data){
                console.log(data);
                methods.form_email_callback(data, $form, $extra_fields, $button_area);
            })
            .fail(function(){

            })
            .always(function(){
                $button.html($button.data('init-text'));
            });
    },

    // - get calendar data
    form_get_calendar_data : function(data, $form){
        // var $build = $(document.createElement('DIV')),
        // 	data = data ? data : $form.data('data'),
        // 	url = data.url;
        // $.ajax({
        // 	url: url,
        // 	type: 'GET',
        // 	contentType: 'application/json; charset=utf-8',
        // 	dataType: 'json',
        // })
        // .done(function(data){
        // 	console.log(data);

        // 	// build calendar
        // 	methods.form_calendar_build(data, $form, url);
        // })
        // .fail(function() {
        // 	$button_area
        // 		.data('data', data)
        // 		.html('<button type="submit" class="wi_100 mart25 btn btn-danger cal-check">Submit</button>');
        // })
        // .always(function() {});

        methods.form_calendar_build(undefined, $form, undefined);

    },

    get_disabled_slots: function ()
    {

        $.ajax({
            url: 'http://localhost:5000/getEvents/' + uid,
            success: $.proxy(this.on_get_disabled_slots_success, this),
            error: $.proxy(this.on_get_disabled_slots_error, this)
        });

    },

    on_get_disabled_slots_success: function (resp) {
        console.log(resp);
        var self = this;
        console.log(self);
        this.dayStart = resp.dayStart;
        this.dayEnd = resp.dayEnd;
        this.callDuration = resp.callDuration;
        this.weekend = resp.weekend;
        debugger;
        this.busyDates = resp.forEach(function (value, key, collection){

            collection[key] = {
                from: moment(value.start.dateTime || value.start.date).toDate(),
                to: moment(moment(value.end.dateTime).subtract(self.callDuration, 'minutes') || value.start.date).toDate()
            };

        });




    },

    on_get_disabled_slots_error: function (resp) {

    },

    // - build calendar
    form_calendar_build : function(data, $form, url){
        var $cbuild = $('<div class="datepicker-container"><input id="datepicker" type="text"></div>'),
            $tbuild = $('<div class="timepicker-container"><input id="timepicker" type="text"></div>'),
            $babuild = $('<div id="button-area"><div class="form-group"><input type="number" class="form-control" name="phone" placeholder="Phone Number" required="required" /></div><button type="submit" class="wi_100 btn btn-danger calendar-button" disabled="disabled">Confirm Appointment</button></div>');

        var $datepicker = $cbuild.find('#datepicker').pickadate({
            today: '',
            clear: '',
            close: '',
            klass: {
                navPrev: 'picker__nav--prev glyphicon glyphicon-menu-left',
                navNext: 'picker__nav--next glyphicon glyphicon-menu-right',
            },
            min: moment.now(),
            disable: this.weekend,
            onSet: $.proxy(this.onDateChange, this)
        });

        var $timepicker = $tbuild.find('#timepicker').pickatime({
            clear: '',
            interval: this.callDuration,
            min: this.dayStart,
            max: this.dayEnd,
            onSet: $.proxy(this.onTimeChange, this)
        });

        this.datepicker = $datepicker.pickadate('picker');
        this.timepicker = $timepicker.pickatime('picker');

        this.datepicker.open();
        this.timepicker.open();

        this.set_disabed_time_slot( this.datepicker.get('highlight').pick )

        // replace form content
        $form
            .stop()
            .animate({
                opacity: 'hide'
            }, 'fast', function(){
                var $cal_wrap = $('<div class="cal-wrap"></div>');
                $cal_wrap
                    .append($cbuild)
                    .append($tbuild);

                $form
                    .empty()
                    .addClass('calendar-form')
                    .append($cal_wrap)
                    .append($babuild)
                    .animate({
                        opacity: 'show'
                    }, function(){
                        $form.addClass('init');
                    });
            });
    },

    onDateChange: function (date)
    {

        console.log(date)
        this.set_disabed_time_slot(date.select || this.datepicker.get('highlight').pick);



    },

    set_disabed_time_slot: function (datetime)
    {

        var busyToday = _.filter(this.busyDates, function (o){
            return moment(o.from).isSame(moment(datetime), 'day') && moment(o.to).isSame(moment(datetime), 'day');
        });


        this.timepicker.set('enable', true);
        this.timepicker.set('disable', busyToday);


    },

    onTimeChange: function (time)
    {

        console.log('time change', arguments);

        if (time.select)
        {
            $('.btn')
            .attr('disabled', false)
            .off()
            .on('click', $.proxy(this.createEvent, this));
        }

    },

    createEvent: function (e)
    {

        e.preventDefault();

        var slot = moment(this.datepicker.get() + ' ' + this.timepicker.get(), 'DD MMMM, YYYY HH:mm a');

        $.ajax({
            url: 'http://localhost:5000/createEvent/' + uid + '/' + leadId,
            data: {
                start: slot.format(),
                end: slot.add(this.callDuration, 'm').format()
            },
            success: $.proxy(this.on_create_event_success, this),
            error: $.proxy(this.on_create_event_error, this)
        });

    },

    on_create_event_success: function (){

        // var $form = $button.closest('form');
        // if($form.data('loading') == true){
        // 	return false;
        // }
        // $form.data('loading', true);

        // var $icon = $('<div class="input-group-addon"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span></div>');
        // $button
        // 	.data('init', $button.html())
        // 	.attr('disabled', 'disabled')
        // 	.html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');


        // // replace form content
        // $form
        // .stop()
        // .animate({
        // 	opacity: 'hide'
        // }, 'fast', function(){
        // 	var $cal_wrap = $('<div class="cal-wrap"></div>');
        // 	$cal_wrap
        // 		.append($cbuild)
        // 		.append($tbuild);

        // 	$form
        // 		.empty()
        // 		.addClass('calendar-form')
        // 		.append($cal_wrap)
        // 		.append($babuild)
        // 		.animate({
        // 			opacity: 'show'
        // 		}, function(){
        // 			$form.addClass('init');
        // 		});
        // });

    },

    on_create_event_error: function (){

    },

    // - build time table
    form_timetable_build : function($timetable, selected_date, url){
        var formated_data = $timetable.data('formated_data'),
            $tcont = $timetable.find('.timetable-content'),
            times = formated_data[selected_date];

        if(times){
            var html = '';
            for(var i = 0, iL = times.length; i < iL; i++){
                html += '<div class="form-group">\
                        <button type="button" class="wi_100 btn btn-secondary text-center time-button" data-url="' + url + '" data-date="' + times[i].original + '">' + times[i].label + '</button>\
                    </div>';
            }

            $tcont
                .stop()
                .animate({
                    opacity: 'hide'
                }, function(){
                    $tcont
                        .html(html)
                        .animate({
                            opacity: 'show'
                        });
                });
        }
        else{
            $tcont.empty();
        }
    },

    // - send appointment request
    form_calendar_appointment : function($button){
        var $form = $button.closest('form');
        if($form.data('loading') == true){
            return false;
        }
        $form.data('loading', true);

        var $icon = $('<div class="input-group-addon"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span></div>');
        $button
            .data('init', $button.html())
            .attr('disabled', 'disabled')
            .html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');

        var data = {
            callTime : $button.data('date'),
            phone : $form.find('[name=phone]').val()
        }
        $.ajax({
            url: $button.data('url'),
            type: 'POST',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            data: JSON.stringify(data),
        })
        .done(function(data){
            console.log(data);
            methods.popup_hide($button.closest('.wp-modal'));
        })
        .fail(function() {

        })
        .always(function() {
            $button
                .removeAttr('disabled')
                .html($button.data('init'));
            $form.data('loading', false);
        });
    }
}