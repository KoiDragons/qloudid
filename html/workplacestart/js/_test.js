function add_more_rows_published(link, id) {
    var id_val = parseInt($(link).attr('value')) + 1;
    var html1 = "";
    var send_data = {};
    send_data.id = parseInt($(link).attr('value'));
    $(link).attr('value', id_val);
    send_data.message = id;
    $.ajax({
        type: "POST",
        url: "../morePublishedDirectoryDetail/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09",
        data: send_data,
        dataType: "text",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        success: function(data1) {
            html1 = data1;
            var $tbody = $(link).closest('form').find('tbody'),
                html = html1;

            $tbody
                .append($(data1))
                .find('input.init')
                .iCheck({
                    checkboxClass: 'icheckbox_minimal-aero',
                    radioClass: 'iradio_minimal-aero',
                    increaseArea: '20%'
                });
        }
    });

}

function add_more_rows(link, id) {
    var id_val = parseInt($(link).attr('value')) + 1;
    var html1 = "";
    var send_data = {};
    send_data.id = parseInt($(link).attr('value'));
    $(link).attr('value', id_val);
    send_data.message = id;
    $.ajax({
        type: "POST",
        url: "../moreDirectoryDetail/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09",
        data: send_data,
        dataType: "text",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        success: function(data1) {
            html1 = data1;
            var $tbody = $(link).closest('form').find('tbody'),
                html = html1;

            $tbody
                .append($(data1))
                .find('input.init')
                .iCheck({
                    checkboxClass: 'icheckbox_minimal-aero',
                    radioClass: 'iradio_minimal-aero',
                    increaseArea: '20%'
                });
        }
    });

}

$(document).ready(function() {
    var $window = $(window),
        $body = $(document.body),
        $company_popup = $('.company-popup'),
        $company_popup_content = $company_popup.find('.popup-content'),
        $employee_popup = $('.employee-popup'),
        $employee_popup_content = $employee_popup.find('.popup-content');
		
    $popups = $('.crm-popup'),
        $profile_popup = $popups.filter('.profile-popup'),
        $profile_popup_content = $profile_popup.find('.popup-content');
    // Show / close popups
    var show_crm_popup = function($popup) {
        clearTimeout($popup.data('tm'));
        $popup.css('display', 'block');
        requestAnimationFrame(function() {
            $popup.addClass('active');
        });
    }
    var close_crm_popup = function($popup) {
        if ($popup.is(':visible')) {
            $popup
                .removeClass('active')
                .data('tm', setTimeout(function() {
                    $popup.css('display', 'none');
                }, 200));

            if ($popup.data('keep') == true) {
                $popup.data('keep', false);
                show_crm_popup($popup.data('$pop'));
            }
        }
    }

    // Populate popup with company info
    var populate_company = function(data, $container) {
        var html = '<h2 class="marb10 padrl20 padtb10 fsz18 white_txt' + (data.label_class ? ' ' + data.label_class : '') + '">' + data.label + '</h2>';
        if (data.tabs) {
            for (var tb = 0, tbL = data.tabs.length; tb < tbL; tb++) {
                var tab = data.tabs[tb];
                html += '<div class="padrbl20">';
                html += '<div class="marrl5 padb10 brdb fsz13">';
                html += '<a href="#' + tab.id + '" class="expander-toggler' + ((tab.state && tab.state === 'active') ? ' target_shown' : '') + '"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up"></span> ' + tab.label + '</a>';
                if (tab.postfix) {
                    html += tab.postfix;
                }
                html += '</div>';
                html += '<div id="' + tab.id + '" class="' + ((tab.state && tab.state === 'active') ? '' : 'dnone ') + 'padt15"><div class="wi_100 dflex fxwrap_w">';

                if (tab.fields) {
                    for (var f = 0, fL = tab.fields.length; f < fL; f++) {
                        var field = tab.fields[f];

                        html += '<div class="' + field.classes + ' bs_bb padrl5 padb15">';

                        if (field.type === 'line') {
                            html += '</div>';
                        } else {
                            html += '<label class="dblock marb5 fsz11">' + field.label + '</label><div class="wi_100 dflex alit_c">';

                            if (field.prefix) {
                                html += field.prefix;
                            }

                            if (field.type === 'select') {

                                if (field.name === 'job_family') {

                                    html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_family1(this.value);">';
                                } else if (field.name === 'job_function') {
                                    html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_function1(this.value);">';
                                } else {
                                    html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13">';
                                }

                                var field_val = field.value;

                                if (field.options) {
                                    if (typeof field.options === 'string') {
                                        try {
                                            var options = eval(field.options);
                                            if (field_val) {
                                                html += options.replace('value="' + field_val + '"', 'value="' + field_val + '" selected');
                                            } else {
                                                html += options;
                                            }

                                        } catch (e) {}
                                    } else if (typeof field.options === 'object') {
                                        for (var o = 0, oL = field.options.length; o < oL; o++) {
                                            var option = field.options[o];
                                            html += '<option value="' + option.value + '"' + (field_val == option.value ? ' selected' : '') + '>' + option.label + '</option>';
                                        }
                                    }
                                }

                                html += '</select>';
                            } else if (field.type === 'textarea') {
                                html += '<textarea name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" class="wi_100 bs_bb pad5 brd fsz13">' + (field.value ? field.value : '') + '</textarea>';
                            } else {
                                html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class="wi_100 hei_30p bs_bb pad5 brd fsz13" />';
                            }

                            if (field.postfix) {
                                html += field.postfix;
                            }

                            html += '</div></div>';
                        }
                    }
                }

                if (tab.thead || tab.tbody) {
                    html += '<div class="wi_100 padl5"><table width="100%" border="0" cellpadding="0" cellspacing="0">';

                    if (tab.thead) {
                        html += '<thead class="fsz11"><tr>';
                        for (var t = 0, tL = tab.thead.length; t < tL; t++) {
                            html += '<th align="left" class="' + (tab.thead[t].class ? tab.thead[t].class : '') + '"><div class="padtb10">' + tab.thead[t].text + '</div></th>';
                        }
                        html += '</tr></thead>';
                    }
                    if (tab.tbody) {
                        html += '<tbody class="fsz13"><tr>';
                        for (var t = 0, tL = tab.tbody.length; t < tL; t++) {
                            var trs = tab.tbody[t];
                            html += '<tr>';
                            for (var d = 0, dL = trs.length; d < dL; d++) {
                                html += '<td class="brdb"><div class="padtb10">' + trs[d] + '</div></td>';
                            }
                            html += '</tr>';
                        }
                        html += '</tr></tbody>';
                    }

                    html += '</table></div>';
                }

                html += '</div></div></div>';
            }
        }

        if (data.buttons) {
            html += '<div class="container padrl20 tall">';
            for (var b = 0, bL = data.buttons.length; b < bL; b++) {
                html += data.buttons[b];
            }
            html += '</div>';
        }
        //alert(html);
        $container
            .removeClass('active')
            .html(html);
    }


    $body.on('click', '.get-company-info', function() {
        var $this = $(this);


        $company_popup_content.addClass('active');

        $.ajax({
                url: 'DropBox/addEmployee',
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': $this.data('id'),
                },
            })
            .done(function(data) {

                // Success
                if (data.status == 'ok') {
                    populate_company(data.message, $company_popup_content);
                }

                // Error
                else {
                    $company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
                }
            })
            .fail(function() {
                $company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
            })
            .always(function() {
                $company_popup_content.removeClass('active');
            });

        if (!$company_popup.hasClass('active')) {
            show_crm_popup($company_popup);
        }
        return false;
    });


    // Populate popup with company info
    var populate_profile = function(data, $container) {
        var html = '<div><h2 class="xxs-dnone mar0 padrl20 padtb10 lgn_hight_20 fsz18 white_txt frmlblue_bg">' + data.user.name + '</h2>';
        html += '<div class="pad10 padb80 xxs-pad0 xxs-padb80">';

        // Top info
        html += '<div class="xxs-mar0 pad20 xxs-pad0 bxsh_016_577376_035 xxs-bxsh_none bg_f"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035">';
        html += '<div class="hei_125p dnone xxs-dblock padt20 bg_31932c">';
        html += '<div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="popup-close wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a>';
        html += '<div class="minwi_0 flex_1 talc">';
        if (data.job.description) {
            html += '<div class="ovfl_hid ws_now txtovfl_el fsz18">' + data.job.description + '</div>';
        }
        if (data.job.match) {
            html += '<div class="fsz16">' + data.job.match + '</div>';
        }
        html += '</div>';
        html += '<div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div>';
        if (data.job.best_match) {
            html += '<div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>' + data.job.best_match + '</div>';
        }
        html += '</div>';

        if (data.user.avatar) {
            html += '<div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50 padr15 xxs-pad0 xxs-marb5"><img src="' + data.user.avatar + '" width="100" height="100" class="dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brdrad100" title="' + data.user.name + '" alt="' + data.user.name + '"></div>';
        }

        html += '<div class="flex_1 xxs-dflex xxs-fxdir_col xxs-padrl20 xxs-talc">';
        html += '<div class="dflex xxs-dblock xxs-order_1 alit_fs justc_sb padb10 xxs-pad0"><h3 class="mar0 marb10 xxs-mar0 pad0 bold fsz22">' + data.user.name + '</h3>';
        if (data.user.rate) {
            html += '<div class="xxs-dnone marb10 fsz22">' + data.user.rate.amount + ' /' + data.user.rate.period + '</div>';
        }
        html += '</div>';

        if (data.user.description) {
            html += '<div class="xxs-order_3 marb10 xxs-marb5 lgn_hight_24 xxs-bold fsz15 xxs-fsz26">' + data.user.description + '</div>';
        }
        if (data.user.rising_talent) {
            html += '<div class="dnone xxs-dblock xxs-order_4 marb15 uppercase txt_14bff5"><span class="fa fa-star"></span> ' + data.user.rising_talent + '</div>';
        }
        if (data.user.rate) {
            html += '<div class="dnone xxs-dblock xxs-order_5 txt_8e"><span class="bold fsz26 txt_37a000">' + data.user.rate.amount + '</span> /' + data.user.rate.period + '</div>';
        }
        if (data.user.location || data.user.time) {
            html += '<div class="xxs-order_2 marb10 xxs-marb15 xxs-fsz18 xxs-txt_8e">';
            html += '<span class="fa fa-map-marker xxs-dnone"></span> <span class="xxs-dnone">' + data.user.location + ' - ' + data.user.time.full + '</span>';
            html += '<span class="dnone xxs-dblock">' + data.user.location + ', ' + data.user.time.short + '</span>';
            html += '</div>';
        }

        if (data.user.skills) {
            html += '<div class="xxs-dnone marl-5 fsz12">';
            var inline_skills = data.user.skills.inline,
                inline_more_skills = data.user.skills.inlne_more;
            if (inline_skills) {
                for (var s = 0, sL = inline_skills.length; s < sL; s++) {
                    html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_skills[s] + '</span>';
                }
            }
            if (inline_more_skills) {
                for (var s = 0, sL = inline_more_skills.length; s < sL; s++) {
                    html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_more_skills[s] + '</span>';
                }
                html += '<a href="#" class="class-toggler diblock dnone_pa marbl10 bold fsz13 txt_37a000" data-target="parent" data-classes="active">See more</a>';
            }
            html += '</div>';
        }

        if (data.user.jobs || data.user.hours) {
            html += '<div class="dnone xxs-dblock xxs-order_6 mart20 padtb15 brdt txt_8e">';
            if (data.user.jobs) {
                html += '<span class="marrl5"><span class="bold txt_0">' + data.user.jobs + '</span> jobs</span>';
            }
            if (data.user.hours) {
                html += '<span class="marrl5"><span class="bold txt_0">' + data.user.hours + '</span> hours</span>';
            }
            html += '</div>';
        }

        html += '</div></div>';

        if (data.sections) {
            var overview;

            for (var s = 0, sL = data.sections.length; s < sL; s++) {
                var section = data.sections[s];
                if (section.tag === 'overview') {
                    overview = section;
                    break;
                }
            }

            if (overview) {
                html += '<div class="xxs-dnone mart10 padt20 brdt"><h3 class="mar0 marb20 pad0 bold fsz22">' + overview.label + '</h3>';
                if (overview.content) {
                    if (overview.content.html) {
                        html += overview.content.html;
                    }
                    if (overview.content.more) {
                        html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
                    }
                }
                html += '</div>';
            }
        }

        html += '</div>';


        // Sections
        if (data.sections) {
            for (var s = 0, sL = data.sections.length; s < sL; s++) {
                var section = data.sections[s];
                html += '<div class="mart20 xxs-mart15 xxs-marrl10 bxsh_016_577376_035 bg_f' + (section.class ? ' ' + section.class : '') + '">';
                html += '<h3 class="mar0 pad20 xxs-padt10 xxs-padb15 brdb xxs-nobrd xxs-talc bold xxs-fntwei_n fsz22 xxs-txt_8e">' + section.label + '</h3>';

                // - section content
                if (section.content) {
                    html += '<div class="pad20 xxs-pad15 xxs-padt0">';

                    if (section.content.html) {
                        html += section.content.html;
                    }

                    if (section.content.more) {
                        html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
                    }

                    var inline_content = section.content.inline;
                    if (inline_content) {
                        for (var i = 0, iL = inline_content.length; i < iL; i++) {
                            html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content[i] + '</span>';
                        }
                    }

                    var inline_content_more = section.content.inline_more;
                    if (inline_content_more) {
                        for (var i = 0, iL = inline_content_more.length; i < iL; i++) {
                            html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content_more[i] + '</span>';
                        }
                        html += '<a href="#" class="class-toggler wi_100 dblock dnone_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See more</a><a href="#" class="class-toggler wi_100 dnone dblock_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See less</a>';
                    }
                    html += '</div>';
                }


                //  - timeline
                if (section.timeline) {
                    html += '<div class="padt20 xxs-padt0 xxs-padrl15 padb5"><div class="career_timeline xs-mar0 xs-padrl20 xs-nobrd xxs-fsz16"><span class="trend_start xs-dnone"></span>';
                    for (var t = 0, tL = section.timeline.length; t < tL; t++) {
                        var timeline = section.timeline[t];
                        html += '<div class="career_year_exp pos_rel marb15 padb15 xs-brdb">';

                        if (timeline.year) {
                            html += '<span class="year_trend xs-pos_stai xs-marb5"><span>' + timeline.year + '</span></span>';
                        }
                        if (timeline.title) {
                            html += '<div class="padb5 fsz18 xxs-fsz17 txt_0">' + timeline.title + '</div>';
                        }
                        if (timeline.short_description) {
                            html += '<p>' + timeline.short_description + '</p>';
                        }
                        if (timeline.description) {
                            html += '<div>' + timeline.description + '</div>';
                        }

                        html += '</div>';
                    }
                    html += '</div></div>';
                }
                html += '</div>';
            }
        }

        html += '</div><div class="wi_720p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot0 right0 bs_bb pad10 bg_f"><div class="dflex talc bold"><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Message</a></div><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Hire</a></div></div></div></div>';
        $container
            .removeClass('active')
            .html(html);
    }



    // Show company popup and call population function
    /*$body.on('click', '.get-company-info', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($employee_popup);
					$company_popup_content.addClass('active');

					$.ajax({
						url: '../../profileInfo',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){

						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $company_popup_content);
						}

						// Error
						else{
							$company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$company_popup_content.removeClass('active');
					});

					if (!$company_popup.hasClass('active')) {
						show_crm_popup($company_popup);
					}
					return false;
				}
			});
*/
    
	// Show new company popup
    $body.on('click', '#new-business-btn a', function() {
        var $this = $(this);
        if ($window.width() > 991) {
            close_crm_popup($employee_popup);
            $company_popup_content.addClass('active');

            $.ajax({
                    url: 'new_company_info.php',
                    type: 'POST',
                    dataType: 'json',
                })
                .done(function(data) {

                    // Success
                    if (data.status == 'ok') {
                        populate_company(data.message, $company_popup_content);
                    }

                    // Error
                    else {
                        $company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
                    }
                })
                .fail(function() {
                    $company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
                })
                .always(function() {
                    $company_popup_content.removeClass('active');
                });

            if (!$company_popup.hasClass('active')) {
                show_crm_popup($company_popup);
            }
            return false;
        }
    });

    // Show employee popup and call population function
    $body.on('click', '.get-employee-info', function() {
        var $this = $(this);
        if ($window.width() > 991) {
            close_crm_popup($company_popup);
            $employee_popup.data({
                'keep': $this.data('keep'),
                '$pop': $company_popup
            });
            $employee_popup_content.addClass('active');

            $.ajax({
                    url: 'employee_info.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': $this.data('id'),
                    },
                })
                .done(function(data) {

                    // Success
                    if (data.status == 'ok') {
                        populate_employees(data.message, $employee_popup_content);
                    }

                    // Error
                    else {
                        $employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
                    }
                })
                .fail(function() {
                    $employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
                })
                .always(function() {
                    $employee_popup_content.removeClass('active');
                });

            if (!$employee_popup.hasClass('active')) {
                show_crm_popup($employee_popup);
            }
            return false;
        }
    });

    // Show new employee popup
    $body.on('click', '#new-employee-btn a', function() {
        var $this = $(this);
        if ($window.width() > 991) {
            close_crm_popup($company_popup);
            $employee_popup.data({
                'keep': $this.data('keep'),
                '$pop': $company_popup
            });
            $employee_popup_content.addClass('active');

            $.ajax({
                    url: 'new_employee_info.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': $this.data('id'),
                    },
                })
                .done(function(data) {

                    // Success
                    if (data.status == 'ok') {
                        populate_employees(data.message, $employee_popup_content);
                    }

                    // Error
                    else {
                        $employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
                    }
                })
                .fail(function() {
                    $employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
                })
                .always(function() {
                    $employee_popup_content.removeClass('active');
                });

            if (!$employee_popup.hasClass('active')) {
                show_crm_popup($employee_popup);
            }
            return false;
        }
    });

    // Show new person popup
    $body.on('click', '#new-person-btn a', function() {
        var $this = $(this);
        console.log($this);
        if ($window.width() > 991) {
            close_crm_popup($company_popup);
            $employee_popup.data({
                'keep': $this.data('keep'),
                '$pop': $company_popup
            });
            $employee_popup_content.addClass('active');

            $.ajax({
                    url: 'new_person_info.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': $this.data('id'),
                    },
                })
                .done(function(data) {

                    // Success
                    if (data.status == 'ok') {
                        populate_employees(data.message, $employee_popup_content);
                    }

                    // Error
                    else {
                        $employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
                    }
                })
                .fail(function() {
                    $employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
                })
                .always(function() {
                    $employee_popup_content.removeClass('active');
                });

            if (!$employee_popup.hasClass('active')) {
                show_crm_popup($employee_popup);
            }
            return false;
        }
    });

    // Show new company person popup
    $body.on('click', '.get-new-employee', function() {
        var $this = $(this);
        if ($window.width() > 991) {
            close_crm_popup($company_popup);
            $employee_popup.data({
                'keep': $this.data('keep'),
                '$pop': $company_popup
            });
            $employee_popup_content.addClass('active');

            $.ajax({
                    url: 'new_company_person_info.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': $this.data('id'),
                    },
                })
                .done(function(data) {

                    // Success
                    if (data.status == 'ok') {
                        populate_employees(data.message, $employee_popup_content);
                    }

                    // Error
                    else {
                        $employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
                    }
                })
                .fail(function() {
                    $employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
                })
                .always(function() {
                    $employee_popup_content.removeClass('active');
                });

            if (!$employee_popup.hasClass('active')) {
                show_crm_popup($employee_popup);
            }
            return false;
        }
    });

    // Close popup
    $body.on('click', '.crm-popup .popup-close', function() {
        close_crm_popup($(this).closest('.crm-popup'));
        return false;
    });




    // Count selected
    $body.on('ifChecked ifUnchecked', 'input[type=checkbox].toggle-visited', function(event) {
        var $this = $(this),
            $form = $this.closest('form'),
            $count_target = $form.data('$count_target'),
            $inputs = $form.find('input[type=checkbox].toggle-visited:checked');
        //alert($count_target);
        if (!$count_target) {
            $count_target = $($form.data('count-target'));
            $form.data('$count_target', $count_target);
        }
        if ($count_target[0]) {
            if (header_id == 1) {
                if ($(this).closest('tr').hasClass("active")) {
                    var id_val = $("#hidden_data").val();
                    var id_val1 = $(this).closest('tr').attr('id') + ',';
                    id_val = id_val.replace(id_val1, "");
                    $("#hidden_data").val(id_val);
                } else {
                    var id_val = $("#hidden_data").val();
                    var id_val1 = $(this).closest('tr').attr('id') + ',';
                    id_val = id_val + id_val1;
                    $("#hidden_data").val(id_val);
                }
            } else {
                if ($(this).closest('tr').hasClass("active")) {
                    var id_val = $("#hidden_data1").val();
                    var id_val1 = $(this).closest('tr').attr('id') + ',';
                    id_val = id_val.replace(id_val1, "");
                    $("#hidden_data1").val(id_val);
                } else {
                    var id_val = $("#hidden_data1").val();
                    var id_val1 = $(this).closest('tr').attr('id') + ',';
                    id_val = id_val + id_val1;
                    $("#hidden_data1").val(id_val);
                }
            }

            $count_target.html($inputs.length);
        }
    });

});