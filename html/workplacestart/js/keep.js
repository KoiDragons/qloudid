/* Keep functionality */
$(document).ready(function(){
	const $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body),
		$keep = $('#keep'),
		$modal = $('#keep-modal'),
		$keep_fade = $('#keep_fade'),
		$keep_selected = $('#keep-selected');
	
	var templates = {};
	
	var keep_methods = {
		// TODO: EVERY action should reflect in settings to avoid generation on modal show/hide
		
		// INIT
		init: function(){
			
			// enable templates
			keep_methods.templates();
			
			
			// pin
			keep_methods.init_pin();
			
			
			// list block
			keep_methods.init_list_blocks();
				
			
			// meta
			keep_methods.init_meta();
			
			
			// actions
			keep_methods.init_actions();
			
			
			// modal
			keep_methods.init_modal();
			
			
			// selected
			keep_methods.init_selected();
		},
		
		
		
		// GENERATE SETTINGS
		generate_settings: function($block, type){
			var prev_settings = $block.data('settings'),
				settings = {};
			
			// Modal 
			if(type === 'modal'){
				settings = {
					id: prev_settings.id,
					pinned: $block.find('.keep-pin').hasClass('active'),
					background: { color: $block.find('.keep-colors .active').data('color') },
					images: [],
					title: $block.find('.keep-title').val(),
					list: [],
					completed: [],
					metas: []
				};
				
				// Images
				var $images = $block.find('.keep-images .keep-image img');
				if($images[0]){
					for(var i = 0, iL = $images.length; i < iL; i++){
						var $image = $images.eq(i);
						settings.images.push({
							id: $image.parent().attr('id'),
							src: $image.attr('src'),
							width: $image.attr('width'),
							height: $image.attr('height')
						});
					}
				}
				
				// List
				var $items = $block.find('.keep-list .keep-list-item');
				if($items[0]){
					for(var i = 0, iL = $items.length; i < iL; i++){
						var $item = $items.eq(i),
							$checkbox = $item.find('input[type=checkbox]'),
							list_title = $item.find('textarea').val().replace(/"/g, '');
						
						settings.list.push({
							id: $item.attr('id').replace('-modal', ''),
							checkbox: {
								id: $checkbox.attr('id').replace('-modal', ''),
								name: $checkbox.attr('name').replace('-modal', ''),
								checked: $checkbox.get(0).checked,	
							},
							content: list_title
						});
					}
				}
					
				// Completed
				var $completed = $block.find('.keep-completed .keep-list-item');
				if($completed[0]){
					for(var i = 0, iL = $completed.length; i < iL; i++){
						var $complete = $completed.eq(i),
							$checkbox = $complete.find('input[type=checkbox]'),
							list_title = $complete.find('textarea').val().replace(/"/g, '');
							
						settings.completed.push({
							id: $complete.attr('id').replace('-modal', ''),
							checkbox: {
								id: $checkbox.attr('id').replace('-modal', ''),
								name: $checkbox.attr('name').replace('-modal', ''),
								checked: $checkbox.get(0).checked,	
							},
							content: list_title
						});
					}
				}
				
				// Meta
				var $metas = $block.find('.keep-metas .keep-meta');
				if($metas[0]){
					for(var i = 0, iL = $metas.length; i < iL; i++){
						var $meta = $metas.eq(i),
							$meta_icon = $meta.find('.meta-icon');
						settings.metas.push({
							id: $meta.attr('id'),
							hidden: $meta.data('hidden') ? true : false,
							icon: $meta_icon[0] ? {src: $meta_icon.attr('src'), alt: $meta_icon.attr('alt')} : false,
							content: $meta.find('.meta-content').html()
						});
					}
				}
			}
			
			// Regular
			else{
				settings = {
					id: $block.attr('id'),
					pinned: $block.find('.keep-pin').hasClass('active'),
					background: { color: $block.find('.keep-colors .active').data('color') },
					images: [],
					title: $block.find('.keep-title').html(),
					list: [],
					completed: [],
					metas: []
				};
				
				// Images
				var $images = $block.find('.keep-images .keep-image img');
				if($images[0]){
					for(var i = 0, iL = $images.length; i < iL; i++){
						var $image = $images.eq(i);
						settings.images.push({
							id: $image.parent().attr('id'),
							src: $image.attr('src'),
							width: $image.attr('width'),
							height: $image.attr('height')
						});
					}
				}
				
				// List
				var $items = $block.find('.keep-list .keep-list-item');
				if($items[0]){
					for(var i = 0, iL = $items.length; i < iL; i++){
						var $item = $items.eq(i),
							$checkbox = $item.find('input[type=checkbox]'),
							$list_title = $item.find('.keep-list-title');
						
						settings.list.push({
							id: $item.attr('id'),
							checkbox: {
								id: $checkbox.attr('id'),
								name: $checkbox.attr('name'),
								checked: $checkbox.get(0).checked,	
							},
							content: $list_title.data('content') ? $list_title.data('content') : $list_title.html()
						});
					}
				}
					
				// Completed
				var $completed = $block.find('.keep-completed .keep-list-item');
				if($completed[0]){
					for(var i = 0, iL = $completed.length; i < iL; i++){
						var $complete = $completed.eq(i),
							$checkbox = $complete.find('input[type=checkbox]'),
							$list_title = $complete.find('.keep-list-title');
							
						settings.completed.push({
							id: $complete.attr('id'),
							checkbox: {
								id: $checkbox.attr('id'),
								name: $checkbox.attr('name'),
								checked: $checkbox.get(0).checked,	
							},
							content: $list_title.data('content') ? $list_title.data('content') : $list_title.html()
						});
					}
				}
					
				// Meta
				var $metas = $block.find('.keep-metas .keep-meta');
				if($metas[0]){
					for(var i = 0, iL = $metas.length; i < iL; i++){
						var $meta = $metas.eq(i),
							$meta_icon = $meta.find('.meta-icon');
						settings.metas.push({
							id: $meta.attr('id'),
							hidden: $meta.data('hidden') ? true : false,
							icon: $meta_icon[0] ? {src: $meta_icon.attr('src'), alt: $meta_icon.attr('alt')} : false,
							content: $meta.find('.meta-content').html()
						});
					}
				}
			
			}
			
			$block.data('settings', settings);
			return settings;
		},
		
		
		
		// TEMPLATES
		templates: function(){
			
			// general template (used for all versions)
			templates.general = {
				meta: {
					body: 	'<div class="keep-meta maxwi_100 minhei_24p dflex alit_c pos_rel marb6 marr6 xs-padr15 sm-padr15 brdrad2 bg_0_08" id="{id}">\
								<span class="maxwi_100 dflex alit_c opa1 opa0_ph padtb3 padrl5 txtdec_n">\
									{icon}<span class="meta-content maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">{content}</span>\
								</span>\
								<a href="#" class="wi_100 maxwi_100 minwi_0 hei_100 dflex alit_c opa0 opa1_ph pos_abs top0 left0 zi2 padtb3 padr12 padl5 txtdec_n txt_inh">\
									{icon}<span class="maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">{content}</span>\
								</a>\
								<a href="#" class="keep-meta-delete hei_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_abs zi3 top0 right0 pad3">\
									<img src="images/icons/icon-close.svg" width="14" height="14" class="opa54" alt="Delete">\
									<div class="opa0_nph opa80 xs-opa1 pos_abs zi1 bot100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2"><span class="dblock padrl8">Delete</span></div>\
								</a>\
							</div>',
					icon: '<img src="{src}" width="18" height="18" class="meta-icon opa54" alt="{alt}">',
				},
				meta_dialog: {
					title: '<h4>Label note</h4>',
					control: '<div class="keep-meta-control wi_100 pos_rel marb10 padtb5 padr10">\
								<textarea rows="1" cols="1" class="autosize wi_100 dblock pad0 nobrd bg_trans ff_inh fsz_inh txt_21" placeholder="Enter label name"></textarea>\
								<button type="button" class="dblock pos_abs zi2 top0 right-10p pad5 nobrd bg_trans curp"><img src="images/icons/search.svg" width="14" height="14" class="dblock" title="Filter"></button>\
							</div>',
					item: 	'<label class="keep-meta-item dblock pos_rel mar0 padtb5 txt_21 padl25 curp" id="{item-id}">\
								<input type="checkbox" class="default sr-only" data-id="{item-true-id}"{checked}>\
								<div class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc trans_opa1">\
									<div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>\
								</div>\
								<span class="keep-meta-item-title opa54_sibc txtdec_lt_sibc">{content}</span>\
							</label>',
				},
			}
			
			// regular block template
			templates.regular = {
				block: '<div class="keep-block pos_rel marb20 brdrad2 bg_f trans_bgc1" data-desktop-settings=\'{desktop_settings}\' data-modal-settings=\'{modal_settings}\' id="{id}">\
							<input type="checkbox" name="{id}-check" id="{id}-check" class="keep-checker default sr-only">\
							<label for="{id}-check" class="wi_26p hei_26p dblock opa0 xs-opa1 sm-opa1 opa1_ph opa1_sibc pos_abs zi5 top-8p left-8p bxsh_0111_001 brdrad50 bg_f bg_6f_sibc curp trans_all1">\
								<img src="images/icons/check.svg" width="18" height="18" class="dblock opa1 opa0_psibc pos_abs pos_cen trans_opa1" alt="Check">\
								<img src="images/icons/check-white.svg" width="18" height="18" class="dblock opa0 opa1_psibc pos_abs pos_cen trans_opa1" alt="Check">\
								<div class="opa0_nph opa80 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">\
									<span class="dblock padrl8">Select note</span>\
								</div>\
							</label>\
							<div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph bxsh_0004_6f_sibc brdrad2 trans_bxsh1"></div>\
							<a href="#" class="keep-pin dblock pos_abs zi5 top4p right4p pad5">\
								<img src="images/icons/pin.svg" width="18" height="18" class="dblock dnone_pa opa50 opa1_h trans_opa1" alt="Pin note">\
								<img src="images/icons/pin_active.svg" width="18" height="18" class="dnone dblock_pa" alt="Unpin note">\
								<div class="dblock dnone_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">\
									<span class="dblock padrl8">Pin note</span>\
								</div>\
								<div class="dnone dblock_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">\
									<span class="dblock padrl8">Unpin note</span>\
								</div>\
							</a>\
							<div class="minhei_60p pos_rel">\
								<a href="#" class="show_keep_modal wi_100 hei_100_15p dblock pos_abs zi1 top0 left0"></a>\
								<div class="keep-images dflex fxwrap_w alit_c"></div>\
								<div class="dnone dblock_siba"><img src="images/loader-line-2.gif" width="160" height="20" class="maxwi_100 hei_auto dblock marrla"></div>\
								<h4 class="keep-title wi_100-15p mar0 marb16 padt16 padr16 padb0 padl16 bold fsz17 txt_0_87"></h4>\
								<div class="keep-list padr16 padl16"></div>\
								<div class="keep-completed marb16 padr16 padl16"></div>\
								<div class="keep-metas dflex fxwrap_w alit_c padr16 padb10 padl16"></div>\
							</div>\
						</div>',
						
				image: '<div class="keep-image" id="{image-id}">\
							<img src="{src}" width="{width}" height="{height}" class="wi_100 hei_auto dblock">\
						</div>',
						
				list_block: '<div class="keep-list-item pos_rel padtb5 txt_21{select-class}" id="{item-id}">\
								<input type="checkbox" name="{check-name}" id="{check-id}" class="default sr-only{select-item}">\
								<label for="{check-id}" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1{select-item}">\
									<div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>\
								</label>\
								<span class="keep-list-title opa54_sibc txtdec_lt_sibc" data-content="{content}">{short-content}</span>\
							</div>',
			}
			
			// modal block template
			templates.modal = {
				image: '<div class="keep-image pos_rel" id="{image-id}">\
							<img src="{src}" width="{width}" height="{height}" class="wi_100 hei_auto dblock">\
							{remove}\
						</div>',
				image_remove: '<button class="keep-remove-image wi_30p hei_30p dblock opa0 xs-opa75 sm-opa75 opa75_ph opa1_h_i pos_abs zi2 bot5p right5p nobrd brdrad2 bg_0_8 bgir_norep bgip_c curp trans_opa1" style="background-image: url(images/icons/icon-trash.svg)">\
								<div class="opa0_nph opa80 pos_abs zi1 top100 right-5p mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2"><span class="dblock padrl8">Remove</span></div>\
							</button>',
				
				list_block: '<div class="keep-list-item pos_rel padtb5 txt_21{select-class}{remove-class}" id="{item-id}">\
								<input type="checkbox" name="{check-name}-modal" id="{check-id}-modal" class="default sr-only{select-item}">\
								<label for="{check-id}-modal" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1{select-item}">\
									<div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>\
								</label>\
								<textarea name="{check-name}-text-modal" rows="1" cols="1" class="autosize wi_100 dblock pad0 nobrd bg_trans ff_inh fsz_inh txtdec_lt_sibc txt_21">{content}</textarea>\
								{remove}\
							</div>',
				list_block_remove: '<a href="#" class="keep-list-delete dblock opa0 opa50_ph opa1_h_i pos_abs pos_cenY right0 trans_opa1">\
									<img src="images/icons/icon-close-filled.svg" width="18" height="18" class="dblock" alt="Delete">\
									<div class="opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2"><span class="dblock padrl8">Delete</span></div>\
								</a>',
			}
		
		},
		
		
		
		// BLOCK
		// - build block
		build_block: function( $old_block, settings ){
			var block_temp = templates.regular.block;
			block_temp = block_temp.split('{id}').join(settings.id);
			
			if( $old_block.attr('data-desktop-settings') ){
				block_temp = block_temp.split('{desktop_settings}').join( $old_block.attr('data-desktop-settings') );
			}
			else{
				block_temp = block_temp.split('{desktop_settings}').join( $old_block.attr('data-desktop-settings') );
			}
			
			const $block = $(block_temp);
			
			if( $old_block.data('desktop') ){
				$block.data( 'desktop', $old_block.data('desktop') )
			}
			else if( $old_block.attr('data-desktop-settings') ){
				$block.attr( 'data-desktop-settings', $old_block.attr('data-desktop-settings') );
			}
			
			if( $old_block.data('modal') ){
				$block.data( 'modal', $old_block.data('modal') )
			}
			else if( $old_block.attr('data-modal-settings') ){
				$block.attr( 'data-modal-settings', $old_block.attr('data-modal-settings') );
			}
			
			keep_methods.sync_regular(null, $block, settings);
			
			return $block;
		},
		
		// - delete block
		delete_block: function($block){
			keep_methods.hide_modal();
			
			if($block && $block[0]){
				$block.remove();
			}
		},
		
		// - copy block
		copy_block: function($block){
			const is_modal = keep_methods.is_modal($block),
				id = 'keep-' + (new Date()).getTime(),
				$source = is_modal ? $block.data('$block') : $block;
			var settings = keep_methods.generate_settings( $block, (is_modal ? 'modal' : '') );
			
			// id
			settings.id = id;
			
			// images
			if(settings.images && settings.images[0]){
				for(let i = 0, iL = settings.images.length; i < iL; i++){
					settings.images[i].id = id + '-image-' + i;
				}
			}
			
			// list
			if(settings.list && settings.list[0]){
				for(let i = 0, iL = settings.list.length; i < iL; i++){
					settings.list[i].id = id + '-item-' + i;
				}
			}
			
			//completed
			if(settings.completed && settings.completed[0]){
				let s = settings.list ? settings.list.length : 0;
				for(let i = 0, iL = settings.completed.length; i < iL; i++){
					settings.completed[i].id = id + '-item-' + s;
					s++;
				}
			}
			
			// metas
			if(settings.metas && settings.metas[0]){
				for(let i = 0, iL = settings.metas.length; i < iL; i++){
					settings.metas[i].id = id + '-meta-' + i;
				}
			}
			
			let $new_block = keep_methods.build_block( $source, settings );
			$keep.children('form').first().prepend($new_block);
			
			if(is_modal){
				keep_methods.hide_modal(true);
			}
		},
		
		// - change display settings
		change_block_display: function($block, props, $dialog){
			const is_modal = keep_methods.is_modal($block);
			
			var settings = $block.data('settings');
			if(!settings){ settings =  keep_methods.generate_settings( $block, (is_modal ? 'modal' : '') ); }
			
			let display_settings = {};
			if( is_modal ){
				if( $block.data('modal') ){
					display_settings = $block.data('modal');
				}
				else{
					display_settings = keep_methods.parse_display_settings( $block.data('$block'), 'modal-settings' );
					$block.data( 'modal', display_settings );
				}
			}
			else{
				if( $block.data('desktop-settings-parsed') ){
					display_settings = $block.data('desktop-settings-parsed');
				}
				else{
					display_settings = keep_methods.parse_display_settings( $block, 'desktop-settings' );
				}
			}
			
			let is_global_changed = false;
			for( let prop in props ){
				if( props.hasOwnProperty( prop ) ){
					for( let inner_prop in props[prop] ){
						if( props[prop].hasOwnProperty( inner_prop ) ){
							let val = props[prop][inner_prop];
							
							// list/completed
							if( prop === 'list' ){
								let is_changed = false,
									index = -1;
									
								if( display_settings[prop] ){
									index = display_settings[prop].indexOf(inner_prop);
								}
								else{
									display_settings[prop] = [];
								}
								
								if( val === 'show' ){
									if( index === -1 ){
										display_settings[prop].push( inner_prop );
										
										let $items = $block.find('.keep-list-item');
										$items
											.addClass( 'padl25' )
											.find( 'input[type=checkbox], label' )
												.removeClass( 'dnonei' );
												
										is_changed = true;
										is_global_changed = true;
									}
								}
								else{
									if( index != -1 ){
										display_settings[prop].splice( index, 1 );
										
										let $items = $block.find('.keep-list-item');
										$items
											.removeClass( 'padl25' )
											.find( 'input[type=checkbox], label' )
												.addClass( 'dnonei' );
										
										is_changed = true;
										is_global_changed = true;
									}
								}
								
								// we have changes, save them in corresponding blocks
								if( is_changed ){
									if( is_modal ){
										$block
											.data( 'modal', display_settings )
											.data('$block')
												.data( 'modal-settings-parsed', display_settings );
									}
									else{
										$block.data( 'desktop-settings-parsed', display_settings );
									}
									
								}
							}
						}
					}
				}
			}
			
			// we have global changes
			if( is_global_changed ){
				
				// rebuild keep more dialog if we have one opened
				if($dialog){
					keep_methods.process_keep_more_dialog($dialog);
				}
			}
		},
		
		
		
		// PIN
		init_pin: function(){
			$body.on('click', '.keep-block .keep-pin', function(){
				const $this = $(this);
					$block = $this.closest('.keep-block');
					
				$this.hasClass('active') ? keep_methods.unset_pin( $block, $this ) : keep_methods.set_pin( $block, $this );
				
				return false;
			});
		},
		
		// - pin
		set_pin: function( $block, $pin ){
			const $parent = $block.parent();
			var settings = $block.data('settings');
			if(!settings){ 
				const is_modal = keep_methods.is_modal($block);
				settings = keep_methods.generate_settings( $block, is_modal );
			}
			
			if( !$pin ){
				$pin = $block.find( '.keep-pin' );
			}
			
			$pin.addClass('active');
			settings.pinned = true;
			
			$block
				.data('settings', settings)
				.detach()
				.prependTo($parent);
		},
		
		// - unpin
		unset_pin: function( $block, $pin ){
			var settings = $block.data('settings');
			if(!settings){ 
				const is_modal = keep_methods.is_modal($block);
				settings = keep_methods.generate_settings( $block, is_modal );
			}
			
			if( !$pin ){
				$pin = $block.find( '.keep-pin' );
			}
			
			$pin.removeClass('active');
			settings.pinned = false;
			$block.data('settings', settings);
		},
		
		// - is pinned
		is_pinned: function( $blocks, type ){
			var is_pinned = false;
		},
		
		
		
		// IMAGE
		// - build image
		build_image: function(item, type, settings){
			var temp_type = (type === 'modal') ? templates.modal : templates.regular,
				temp = temp_type.image;
			temp = settings.indexOf('remove') > -1 ? temp.split('{remove}').join(temp_type.image_remove) : temp.split('{remove}').join('');
			temp = temp.split('{image-id}').join(item.id);
			temp = temp.split('{src}').join(item.src);
			temp = temp.split('{width}').join(item.width);
			temp = temp.split('{height}').join(item.height);
			
			
			return $(temp);
		},
		
		// - process images
		process_images: function($block){
			var settings = $block.data('settings'),
				$imgs = $block.find('.keep-image');
				
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
			if(settings.images.length){
				var block_width = $block.width(),
					img_index = 0;
				$imgs.removeAttr('style');
				for(var i = 0, iL = settings.images.length; i < iL; i += 3){
					var img_1 = settings.images[i],
						img_2 = settings.images[i+1],
						img_3 = settings.images[i+2],
						mh = 0;
					
					if(img_3){
						if(img_1.height > mh){ mh = img_1.height; }
						if(img_2.height > mh){ mh = img_2.height; }
						if(img_3.height > mh){ mh = img_3.height; }
						
						var img_1_p = mh / img_1.height,
							img_1_w = img_1.width * img_1_p,
							img_2_p = mh / img_2.height,
							img_2_w = img_2.width * img_2_p,
							img_3_p = mh / img_3.height,
							img_3_w = img_3.width * img_3_p,
							img_sum = img_1_w + img_2_w + img_3_w,
							img_1_wp = img_1_w / img_sum * 100,
							img_2_wp = img_2_w / img_sum * 100,
							img_3_wp = img_3_w / img_sum * 100;
						
						$imgs.filter('#' + settings.images[i].id).css('width', img_1_wp + '%');
						$imgs.filter('#' + settings.images[i+1].id).css('width', img_2_wp + '%');
						$imgs.filter('#' + settings.images[i+2].id).css('width', img_3_wp + '%');
					}
					else if(img_2){
						if(img_1.height > mh){ mh = img_1.height; }
						if(img_2.height > mh){ mh = img_2.height; }
						
						var img_1_p = mh / img_1.height,
							img_1_w = img_1.width * img_1_p,
							img_2_p = mh / img_2.height,
							img_2_w = img_2.width * img_2_p,
							img_sum = img_1_w + img_2_w,
							img_1_wp = img_1_w / img_sum * 100,
							img_2_wp = img_2_w / img_sum * 100;
						
						$imgs.filter('#' + settings.images[i].id).css('width', img_1_wp + '%');
						$imgs.filter('#' + settings.images[i+1].id).css('width', img_2_wp + '%');
					}
					else{
						$imgs.filter('#' + settings.images[i].id).css('width', '100%');
					}
				}
			}
		},
		
		// - add image
		add_image: function(input, type){
			var files = input.files;
			if(files.length > 0){
				var $block = $(input).closest('.keep-block'),
					settings = $block.data('settings'),
					$images = $block.find('.keep-images'),
					modal_settings = $block.data('modal');
				
				if(!settings){ settings = keep_methods.generate_settings($block); }
				
				$images.addClass('active');
				
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function() {
					var image = new Image();
					image.src = reader.result;
					image.onload = function(){
						var new_image = {
							id: $block.attr('id') + '-image-' + (new Date()).getTime(),
							src: reader.result,
							width: image.width,
							height: image.height
						}
						settings.images.push(new_image);
						$block.data('settings', settings);
						
						$images.append(keep_methods.build_image(new_image, type, modal_settings.images ? modal_settings.images : []));
						keep_methods.process_images($block);
						$images.removeClass('active');
					}
				}
				reader.onerror = function(error) {
					$images.removeClass('active');
				}
			}
		},
		
		// - remove image
		remove_image: function($image){
			var $block = $image.closest('.keep-block'),
				settings = $block.data('settings'),
				id = $image.attr('id');
				
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
			for(var i = 0, iL = settings.images.length; i < iL; i++){
				if(settings.images[i].id === id){
					settings.images.splice(i, 1);
					break;
				}
			}
			
			$block.data('settings', settings);
			$image.remove();
			keep_methods.process_images($block);
		},
		
		
		
		// LIST BLOCKS
		init_list_blocks: function(){
			
			// add
			$modal.on('change keyup', '.keep-block .keep-list-add-item input', function(){
				var $this = $(this);
				if($this.data('prevent') !== true){
					$this.data('prevent', true);
					keep_methods.add_list_block($this);
				}
				return false;
			});
			
			// delete
			$body.on('click', '.keep-block .keep-list-delete', function(){
				keep_methods.delete_list_block( $(this).closest('.keep-list-item') );
				return false;
			});
			
			// process images
			var $blocks = $keep.find('.keep-block');
			for(var i = 0, iL = $blocks.length; i < iL; i++){
				keep_methods.process_images($blocks.eq(i));
			}
			
			// move to list/completed
			$body.on('change', '.keep-block .keep-list-item input[type=checkbox]', function(){
				keep_methods.change_list_block_status(this);
				return false;
			});
		},
		
		// - add block
		add_list_block: function($input){
			var item_temp = templates.modal.list_block,
				$block = $input.closest('.keep-block'),
				settings = $block.data('settings'),
				modal_settings = $block.data('modal');
				
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
			var index = (new Date()).getTime(),
				new_item = {
					id: settings.id + '-item-' + index,
					checkbox: {
						id: settings.id + '-check-' + index,
						name: settings.id + '-check-' + index,
						checked: false
					},
					content: ''
				},
				$item_temp = keep_methods.build_list_item(new_item, 'modal', modal_settings.list ? modal_settings.list : []),
				$textarea = $item_temp.find('textarea');
				
			$item_temp.appendTo($block.find('.keep-list'));
			$textarea
				.trigger('focus')
				.val($input.val());
			
			new_item.content = $input.val();
			
			autosize($textarea);
			
			$input
				.val('')
				.data('prevent', false);
			
			settings.list.push(new_item);
			$block.data('settings', settings);
		},
		
		// - build list item
		build_list_item: function(item, type, settings){
			var temp_type = (type === 'modal') ? templates.modal : templates.regular,
				temp = temp_type.list_block;
			
			if(settings.indexOf('select') > -1){
				temp = temp.split('{select-item}').join('');
				temp = temp.split('{select-class}').join(' padl25');
			}
			else{
				temp = temp.split('{select-item}').join(' dnonei');
				temp = temp.split('{select-class}').join('');
			}
			
			if(settings.indexOf('remove') > -1){
				temp = temp.split('{remove}').join(temp_type.list_block_remove);
				temp = temp.split('{remove-class}').join(' padr25');
			}
			else{
				temp = temp.split('{remove}').join('');
				temp = temp.split('{remove-class}').join('');
			}
			temp = temp.split('{item-id}').join(item.id);
			temp = temp.split('{check-name}').join(item.checkbox.name);
			temp = temp.split('{check-id}').join(item.checkbox.id);
			temp = temp.split('{content}').join(item.content);
			
			if(type !== 'modal'){
				let content = item.content;
				if(content.length > 100){
					temp = temp.split('{short-content}').join(content.substr(0, 100));	
				}
				else{
					temp = temp.split('{short-content}').join(content);
				}
			}
			
			var $temp = $(temp);
			if(item.checkbox.checked){
				$temp.find('input[type=checkbox]').get(0).checked = true;	
			}
			return $temp;
		},
		
		// move to list/completed
		change_list_block_status: function(checkbox, $block, is_modal){
			const $item = $(checkbox).closest('.keep-list-item'),
				id = $item.attr('id');
				
			if(!$block){
				$block = $item.closest('.keep-block');
			}
			
			var settings = $block.data('settings');
			if(!settings){
				if( is_modal == undefined ){
					is_modal = keep_methods.is_modal($block);
				}
				settings = keep_methods.generate_settings( $block, (is_modal ? 'modal' : '') );
			}
			
			if(checkbox.checked){
				var $list = $block.find('.keep-completed'),
					source = 'list',
					destination = 'completed';
			}
			else{
				var $list = $block.find('.keep-list'),
					source = 'completed',
					destination = 'list';
			}
			
			for(var i = 0, iL = settings[source].length; i < iL; i++){
				if(settings[source][i].id === id){
					settings[destination].push(settings[source].splice(i, 1)[0]);
					break;
				}
			}
			
			$block.data('settings', settings);
			$list.append($item);
		},
		
		// - uncheck all checked blocks
		uncheck_all_blocks: function($block, $dialog){
			const $checked = $block.find('.keep-completed .keep-list-item input[type=checkbox]');
			if($checked[0]){
				const is_modal = keep_methods.is_modal($block);
				for(let i = 0, iL = $checked.length; i < iL; i++){
					let check = $checked.get(i);
					check.checked = false;
					keep_methods.change_list_block_status( check, $block, is_modal );
				}
				if($dialog){
					keep_methods.process_keep_more_dialog($dialog);
				}
			}
		},
		
		// - delete block
		delete_list_block: function($item, $block, is_modal, list_type){
			const id = $item.attr('id');
			
			if( !$block ){
				$block = $item.closest('.keep-block');
			}
			
			var settings = $block.data('settings');
			if( !settings ){
				if( is_modal == undefined ){
					is_modal = keep_methods.is_modal($block);
				}
				settings = keep_methods.generate_settings( $block, (is_modal ? 'modal' : '') );
			}
			
			if( !list_type ){
				list_type = $item.parent().hasClass('keep-completed') ? 'completed' : 'list';	
			}
			
			for(var i = 0, iL = settings[list_type].length; i < iL; i++){
				if(settings[list_type][i].id === id){
					settings[list_type].splice(i, 1);
					break;
				}
			}
			
			$block.data('settings', settings);
			$item.remove();
		},
		
		// - delete all checked blocks
		delete_all_blocks: function($block, $dialog){
			const $checked = $block.find('.keep-completed .keep-list-item');
			if($checked[0]){
				const is_modal = keep_methods.is_modal($block);
				for(let i = 0, iL = $checked.length; i < iL; i++){
					keep_methods.delete_list_block( $checked.eq(i), $block, is_modal, 'completed' );
				}
				if($dialog){
					keep_methods.process_keep_more_dialog($dialog);
				}
			}
		},
		
		
		
		// META
		init_meta: function(){
			
			
			$body
				
				// add new meta
				.on('click', '.keep-block .keep-meta-dialog .keep-meta-control button', function(){
					let $this = $(this);
					keep_methods.add_meta_item($this.closest('.keep-meta-control').find('textarea'), $this.closest('.keep-dialog'));
					return false;
				})
				.on('keydown', '.keep-block .keep-meta-dialog .keep-meta-control textarea', function(e){
					if(e.keyCode == 13 || e.which == 13 || e.key == 'Enter'){
						let $this = $(this);
						keep_methods.add_meta_item($this.closest('.keep-meta-control').find('textarea'), $this.closest('.keep-dialog'));
						return false;
					}
				})
				
				// change show/hide status
				.on('change', '.keep-meta-dialog input[type=checkbox]', function(){
					let $this = $(this);
					keep_methods.change_meta_item_state($this.closest('.keep-block'), $this.data('id'), this.checked);
					return false;
				})
				.on('click', '.keep-block .keep-meta-delete', function(){
					let $this = $(this);
					keep_methods.change_meta_item_state($this.closest('.keep-block'), $this.closest('.keep-meta').attr('id'), true);
					return false;
				})
			
			// delete meta
			/*
			$body.on('click', '.keep-block .keep-meta-delete', function(){
				keep_methods.hide_meta_item($(this));
				return false;
			});
			*/
		},
		
		// - show/hide meta item
		change_meta_item_state: function($block, id, is_hidden){
			const $meta = $block.find('#' + id);
			let settings = $block.data('settings');
			
			if(is_hidden){
				$meta
					.hide()
					.data('hidden', true);
			}
			else{
				$meta
					.show()
					.data('hidden', false);
			}
			
			for(let i = 0, iL = settings.metas.length; i < iL; i++){
				if(settings.metas[i].id === id){
					settings.metas[i].hidden = is_hidden ? true : false;
					break;
				}
			}
			
			$block.data('settings', settings);
		},
		
		// - add new meta item
		add_meta_item: function($input, $dialog, $blocks){
			const index = (new Date()).getTime(),
				val = $input.val();
				
			if( !$blocks ){
				$blocks = $input.closest('.keep-block');
			}
			
			var final_item = {};
			const is_array = $.isArray($blocks);
			
			for( let i = 0, iL = $blocks.length; i < iL; i++ ){
				let $block = is_array ? $blocks[i] : $blocks.eq(i);
				
				let is_modal = keep_methods.is_modal($block) ? 'modal' : '',
					settings = $block.data('settings');
					
				if(!settings){ settings = keep_methods.generate_settings($block, is_modal); }
				
				let new_item = {
					id: settings.id + '-meta-' + index,
					icon: false,
					hidden: false,
					content: val
				};
				
				settings.metas.push(new_item);
				
				$block
					.data('settings', settings)
					.find('.keep-metas')
						.append( $(keep_methods.build_meta_item(new_item)) );
					
				final_item = new_item;
			}
			
			if($dialog){
				$dialog.append( keep_methods.build_meta_dialog_item(new_item) );
			}
			
			$input.val('');
			autosize.update($input);
		},
		
		// - build meta item
		build_meta_item: function(item){
			let meta_temp = templates.general.meta.body;
			
			meta_temp = meta_temp.split('{id}').join(item.id);
			meta_temp = meta_temp.split('{content}').join(item.content);
			if(item.icon){
				var icon = templates.general.meta.icon;
				icon = icon.split('{src}').join(item.icon.src);
				icon = icon.split('{alt}').join(item.icon.alt);
				meta_temp = meta_temp.split('{icon}').join(icon);
			}
			else{
				meta_temp = meta_temp.split('{icon}').join('');
			}
			
			return meta_temp;
		},
		
		// - hide meta item (depricated)
		hide_meta_item: function($this){
			var $item = $this.closest('.keep-meta'),
				id = $item.attr('id'),
				$block = $this.closest('.keep-block'),
				settings = $block.data('settings');
				
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
			for(var i = 0, iL = settings.metas.length; i < iL; i++){
				if(settings.metas[i].id === id){
					settings.metas.splice(i, 1);
					break;
				}
			}
			
			$item.remove();
			$block.data('settings', settings);
		},
		
		
		
		// SYNCHRONIZATION
		// TODO: sync a particular block/module?
		
		// - sync regular to modal
		sync_modal: function($source){
			var settings = keep_methods.generate_settings($source),
				desktop_settings = $source.data('desktop-settings-parsed'),
				modal_settings = $source.data('modal-settings-parsed');
			
			// get settings
			if(!desktop_settings){
				desktop_settings = keep_methods.parse_display_settings( $source, 'desktop-settings' );
			}
			if(!modal_settings){
				modal_settings = keep_methods.parse_display_settings( $source, 'modal-settings' );
			}
			
			// - block
			var $block = $modal.find('.keep-block');
			$block.data({
				$block: $source,
				settings: settings,
				desktop: desktop_settings,
				modal: modal_settings
			});
			
			// - pin
			var $pin = $block.find('.keep-pin');
			if(settings.pinned){
				$pin.addClass('active');
			}
			else{
				$pin.removeClass('active');
			}
			
			// - background color
			var $colors = $block.find('.keep-colors a');
			$colors
				.removeClass('active')
				.filter('[data-color=' + settings.background.color + ']')
					.addClass('active');
			$block.css('background-color', settings.background.color);
			
			// - images
			var $images = $block.find('.keep-images');
			$images.empty();
			(modal_settings.images && modal_settings.images.indexOf('show') > -1) ? $images.show() : $images.hide();
			for(var i = 0, iL = settings.images.length; i < iL; i++){
				var $temp = keep_methods.build_image(settings.images[i], 'modal', modal_settings.images ? modal_settings.images : []);
				$images.append($temp);
			}
			keep_methods.process_images($block);
			
			// - title
			var $title = $block.find('.keep-title');
			$title.val(settings.title);
			autosize.update($title);
			
			// - list items
			var $list_items = $block.find('.keep-list');
			$list_items.empty();
			for(var i = 0, iL = settings.list.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.list[i], 'modal', modal_settings.list ? modal_settings.list : []);
				$list_items.append($item_temp);
				autosize($item_temp.find('textarea'));
			}
			
			// - comleted items
			var $completed_items = $block.find('.keep-completed');
			$completed_items.empty();
			for(var i = 0, iL = settings.completed.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.completed[i], 'modal', modal_settings.list ? modal_settings.list : []);
				$completed_items.append($item_temp);
				autosize($item_temp.find('textarea'));
			}
			
			// - meta
			var $metas = $block.find('.keep-metas');
			$metas.empty();
			for(var i = 0, iL = settings.metas.length; i < iL; i++){
				var meta = settings.metas[i],
					meta_temp = templates.general.meta.body;
				
				meta_temp = meta_temp.split('{id}').join(meta.id);
				meta_temp = meta_temp.split('{content}').join(meta.content);
				if(meta.icon){
					var icon = templates.general.meta.icon;
					icon = icon.split('{src}').join(meta.icon.src);
					icon = icon.split('{alt}').join(meta.icon.alt);
					meta_temp = meta_temp.split('{icon}').join(icon);
				}
				else{
					meta_temp = meta_temp.split('{icon}').join('');
				}
				
				let $meta = $(meta_temp);
				if(meta.hidden){
					$meta
						.data('hidden', true)
						.hide();
				}
				$metas.append($meta);
			}
			//$block.find('.keep-metas').html($source.find('.keep-metas').html());
		},
		
		// - sync modal to regular
		sync_regular: function($source, $block, settings){
			if(!settings){
				settings = keep_methods.generate_settings($source, 'modal');
			}
			if($source && !$block){
				$block = $source.data('$block');
			}
			
			var desktop_settings = $block.data('desktop-settings-parsed'),
				modal_settings = $block.data('modal-settings-parsed');
				
			// get settings
			if(!desktop_settings){
				desktop_settings = keep_methods.parse_display_settings( $block, 'desktop-settings' );
			}
			if(!modal_settings){
				modal_settings = keep_methods.parse_display_settings( $block, 'modal-settings' );
			}
			
			// - block
			$block.data('settings', settings);
		
			// - pin
			var $pin = $block.find('.keep-pin');
			if(settings.pinned){
				$pin.addClass('active');
			}
			else{
				$pin.removeClass('active');
			}
			
			// - background color
			var $colors = $block.find('.keep-colors a');
			$colors
				.removeClass('active')
				.filter('[data-color=' + settings.background.color + ']')
					.addClass('active');
			$block.css('background-color', settings.background.color);
			
			// - images
			var $images = $block.find('.keep-images');
			$images.empty();
			(desktop_settings.images && desktop_settings.images.indexOf('show') > -1) ? $images.removeAttr('style') : $images.css('display', 'none');
			for(var i = 0, iL = settings.images.length; i < iL; i++){
				var $temp = keep_methods.build_image(settings.images[i], 'desktop', desktop_settings.images ? desktop_settings.images : []);
				$images.append($temp);
			}
			keep_methods.process_images($block);
			
			// - title
			$block.find('.keep-title').html(settings.title);
			
			// - list items
			var $list_items = $block.find('.keep-list');
			$list_items.empty();
			for(var i = 0, iL = settings.list.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.list[i], 'desktop', desktop_settings.list ? desktop_settings.list : []);
				$list_items.append($item_temp);
			}
			
			// - completed items
			var $completed_items = $block.find('.keep-completed');
			$completed_items.empty();
			for(var i = 0, iL = settings.completed.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.completed[i], 'desktop', desktop_settings.list ? desktop_settings.list : []);
				$completed_items.append($item_temp);
			}
			
			// - meta
			var $metas = $block.find('.keep-metas');
			$metas.empty();
			for(var i = 0, iL = settings.metas.length; i < iL; i++){
				var meta = settings.metas[i],
					meta_temp = templates.general.meta.body;
				
				meta_temp = meta_temp.split('{id}').join(meta.id);
				meta_temp = meta_temp.split('{content}').join(meta.content);
				if(meta.icon){
					var icon = templates.general.meta.icon;
					icon = icon.split('{src}').join(meta.icon.src);
					icon = icon.split('{alt}').join(meta.icon.alt);
					meta_temp = meta_temp.split('{icon}').join(icon);
				}
				else{
					meta_temp = meta_temp.split('{icon}').join('');
				}
				let $meta = $(meta_temp);
				if(meta.hidden){
					$meta
						.data('hidden', true)
						.hide();
				}
				$metas.append($meta);
			}
		},
		
		// - parse display settings
		parse_display_settings: function($source, data){
			let display_settings = {};
			try{ display_settings = JSON.parse( JSON.stringify( $source.data(data) ) ); }
			catch(e){ display_settings = {}; }
			
			$source.data( data + '-parsed', display_settings );
			return display_settings;
		},
		
		
		
		// ACTIONS
		init_actions: function(){
			$body
				
				// global actions
				.on('click', function(event){
					let $opened_dialog = $(this).data('$opened_dialog');
					
					if($opened_dialog && $opened_dialog[0]){
						let $target = $(event.target);
						if(!$target.hasClass('keep-dialog')){
							$target = $target.closest('.keep-dialog');
						}
						
						if($opened_dialog.get(0) !== $target.get(0)){
							keep_methods.hide_action_dialog($opened_dialog.parent());
						}
					}
				})
				.on('mouseenter', '.keep-actions .keep-action-mouse', function(){
					keep_methods.show_action_dialog($(this));
					return false;
				})
				.on('mouseleave', '.keep-actions .keep-action-mouse', function(){
					keep_methods.hide_action_dialog($(this));
					return false;
				})
				.on('click', '.keep-actions .keep-action-click', function(){
					let $parent = $(this).parent();
					if($parent.hasClass('active')){
						keep_methods.hide_action_dialog($parent);
					}
					else{
						keep_methods.show_action_dialog($parent);
					}
					return false;
				})
				
				// local (block or modal block)
				.on('click', '.keep-block .keep-action .keep-colors a', function(){
					keep_methods.change_bg_color($(this));
					return false;
				})
				.on('change', '#keep .keep-action .keep-add-image input[type=file]', function(){
					keep_methods.add_image(this);
					return false;
				})
				.on('change', '#keep-modal .keep-action .keep-add-image input[type=file]', function(){
					keep_methods.add_image(this, 'modal');
					return false;
				})
				.on('click', '.keep-block .keep-remove-image', function(){
					keep_methods.remove_image($(this).closest('.keep-image'));
					return false;
				})
				.on('click', '.keep-block .keep-action-delete', function(){
					keep_methods.delete_block($(this).closest('.keep-block').data('$block'));
					return false;
				})
				.on('click', '.keep-block .keep-action-add-meta', function(){
					let $meta_dialog = $(this).closest('.keep-actions').find('.keep-meta-dialog');
					keep_methods.build_meta_dialog( $meta_dialog );
					keep_methods.show_action_dialog( $meta_dialog.parent() );
					return false;
				})
				.on('click', '.keep-block .keep-action-copy', function(){
					keep_methods.copy_block( $(this).closest('.keep-block') );
					return false;
				})
				.on('click', '.keep-block .keep-action-uncheck-all', function(){
					let $this = $(this);
					keep_methods.uncheck_all_blocks( $this.closest('.keep-block'), $this.closest('.keep-dialog') );
					return false;
				})
				.on('click', '.keep-block .keep-action-delete-checked', function(){
					let $this = $(this);
					keep_methods.delete_all_blocks( $this.closest('.keep-block'), $this.closest('.keep-dialog') );
					return false;
				})
				.on('click', '.keep-block .keep-action-display-checkboxes', function(){
					let $this = $(this),
						props = {
							'list': {
								'select': $this.data('status')
							}
						};
					keep_methods.change_block_display( $this.closest('.keep-block'), props, $this.closest('.keep-dialog') );
					return false;
				});
		},
		
		// - show action dialog
		show_action_dialog: function($action, is_selected){
			$action
				.addClass('active')
				.siblings('.keep-action.active')
					.removeClass('active');
			
			if( !is_selected ){
				let $dialog = $action.find('.keep-dialog');
				if($dialog[0]){
					$body.data('$opened_dialog', $dialog);
					
					if($dialog.hasClass('keep-more-dialog')){
						keep_methods.process_keep_more_dialog($dialog);
					}
				}
			}
		},
		
		// - hide action dialog
		hide_action_dialog: function($action){
			$action.removeClass('active');
			let $dialog = $action.find('.keep-dialog');
			if($dialog[0]){
				$body.removeData('$opened_dialog');
			}
		},
		
		// - change background color
		change_bg_color: function($link, $block, color){
			if( $link || $block ){
				if( !$block ){
					$block = $link.closest('.keep-block');
				}
				
				var settings = $block.data('settings');
				if(!settings){ 
					const is_modal = keep_methods.is_modal($block);
					settings = keep_methods.generate_settings( $block, (is_modal ? 'modal' : '') ); 
				}
				
				if( $link ){
					$link.siblings('.active').removeClass('active');
					$link.addClass('active');
					
					if(!color){
						color = $link.data('color');	
					}
				}
				
				settings.background.color = color;
				
				$block
					.css('background-color', color)
					.data('settings', settings);
			}
		},
		
		// - build meta dialog
		build_meta_dialog: function($meta_dialog, is_selected){
			const temp = templates.general.meta_dialog;
			let html = temp.title + temp.control;
			
			if( !is_selected ){
				const $block = $meta_dialog.closest('.keep-block'),
					is_modal = keep_methods.is_modal($block),
					type = is_modal ? 'modal' : '';
				
				let settings = $block.data('settings');
				if(!settings){
					keep_methods.generate_settings($block, type);
				}
				
				if(settings && settings.metas[0]){
					for(let i = 0, iL = settings.metas.length; i < iL; i++){
						html += keep_methods.build_meta_dialog_item(settings.metas[i]);
					}
				}
			}
			
			$meta_dialog.html(html);
			
			let $input = $meta_dialog.find('.autosize');
			$input.trigger('focus')
			autosize($input);
		},
		
		// - build a single meta item
		build_meta_dialog_item: function(item){
			let temp_item = templates.general.meta_dialog.item;
			temp_item = temp_item.split('{item-true-id}').join(item.id);
			temp_item = temp_item.split('{item-id}').join(item.id + '-editable');
			temp_item = temp_item.split('{content}').join(item.content);
			temp_item = temp_item.split('{checked}').join(item.hidden ? ' checked' : '');
			
			return temp_item;
		},
		
		// - process more dialog
		process_keep_more_dialog: function($dialog){
			const $block = $dialog.closest('.keep-block'),
				is_modal = keep_methods.is_modal($block),
				$source = is_modal ? $block.data('$block') : $block;
			
			// settings
			var settings = $block.data('settings');
			if(!settings){ settings = keep_methods.generate_settings( $block, (is_modal ? 'modal' : '') ); }
			
			// display settings
			var display_settings = {};
			if(is_modal){
				display_settings = $block.data('modal');
				if(!display_settings){
					try{ display_settings = JSON.parse( JSON.stringify( $source.data('modal-settings') ) ); }
					catch(e){ display_settings = {}; }
				}
			}
			else{
				display_settings = $block.data('desktop');
				if(!display_settings){
					try{ display_settings = JSON.parse( JSON.stringify( $source.data('desktop-settings') ) ); }
					catch(e){ display_settings = {}; }
				}
			}
			
			
			// change meta label
			const $add_meta = $dialog.find('.keep-action-add-meta');
			if($add_meta[0]){
				var has_meta = false;
				if(settings.metas){
					for(let i = 0, iL = settings.metas.length; i < iL; i++){
						if(settings.metas[i].hidden == false){
							has_meta = true;
							break;
						}
					}
				}
				$add_meta.html( $add_meta.data( has_meta ? 'change' : 'add' ) );
			}
			
			// show/hide uncheck all / delete checked
			const $uncheck_all = $dialog.find('.keep-action-uncheck-all'),
				$delete_checked = $dialog.find('.keep-action-delete-checked');
			if( $uncheck_all[0] || $delete_checked[0] ){
				if( settings.completed && settings.completed[0] ){
					$uncheck_all.show();
					$delete_checked.show();
				}
				else{
					$uncheck_all.hide();
					$delete_checked.hide();
				}
			}
			
			// change show/hide checkboxes text
			const $checkboxes_display = $dialog.find('.keep-action-display-checkboxes');
			if( display_settings.list && display_settings.list.indexOf('select') > -1 ){
				$checkboxes_display
					.html( $checkboxes_display.data('hide') )
					.data('status', 'hide');
			}
			else{
				$checkboxes_display
					.html( $checkboxes_display.data('show') )
					.data('status', 'show');
			}
			
		},
		
		
		
		// MODAL
		init_modal: function(){
			autosize($modal.find('.autosize'));
			
			// - show modal and sync with regular block
			$body.on('click', '.show_keep_modal', function(){
				const $block = $(this).closest('.keep-block');
				if( $keep_selected.hasClass('active') ){
					$block.find('.keep-checker').siblings('label').trigger('click');
				}
				else{
					keep_methods.show_modal($block, true);	
				}
				return false;
			});
			
			// - hide modal and sync to regular block
			$keep_fade.on('click', function(){
				keep_methods.hide_modal(true);
				return false;
			});
			$modal.on('submit', 'form', function(){
				keep_methods.hide_modal(true);
				return false;
			});
		},
		
		// - show modal
		show_modal: function($block, is_sync){
			$modal
				.addClass('active')
				.fadeIn();
			$keep_fade
				.addClass('active')
				.fadeIn();
			$body.addClass('ovfl_hid');
			
			// - close currently opened dialog
			let $opened_dialog = $body.data('$opened_dialog');
			if($opened_dialog && $opened_dialog[0]){
				keep_methods.hide_action_dialog($opened_dialog.parent());
			}
			
			// - sync
			if(is_sync){
				keep_methods.sync_modal($block);
			}
		},
		
		// - hide modal
		hide_modal: function(is_sync){
			$modal
				.removeClass('active')
				.fadeOut();
			$keep_fade
				.removeClass('active')
				.fadeOut();
			$body.removeClass('ovfl_hid');
			
			// - close currently opened dialog
			let $opened_dialog = $body.data('$opened_dialog');
			if($opened_dialog && $opened_dialog[0]){
				keep_methods.hide_action_dialog($opened_dialog.parent());
			}
			
			// - sync
			if(is_sync){
				keep_methods.sync_regular($modal.find('.keep-block'));
			}
		},
		
		// - check if block is in modal dialog
		is_modal: function($block){
			return $block.closest('#keep-modal')[0] ? true : false;
		},
		
		
		
		// SELECTED
		init_selected: function(){
			if($keep_selected[0]){
				
				// check/uncheck block
				// TODO: add/remove individual blocks instead of performing a fullcheck every time?
				$keep.on('change', '.keep-checker', function(){
					keep_methods.check_selected('fullcheck');
				});
				
				
				$keep_selected
					.on('click', '.keep-selected-clear', function(){
						keep_methods.check_selected('clear');
						return false;
					})
					.on('click', '.keep-action .keep-colors a', function(){
						const $this = $(this),
							color = $this.data('color'),
							$active = $this.siblings('.active'),
							$checked_blocks = $keep_selected.data('$checked_blocks');
						
						$active.removeClass('active');
						$this.addClass('active');
						
						for(let i = 0, iL = $checked_blocks.length; i < iL; i++){
							keep_methods.change_bg_color( null, $checked_blocks[i], color );
						}
						return false;
					})
					.on('click', '.keep-action-pin', function(){
						const $checked_blocks = $keep_selected.data('$checked_blocks');
						let all_pinned = true;
						
						for(let i = $checked_blocks.length - 1; i > -1; i--){
							if( !$checked_blocks[i].find('.keep-pin').hasClass('active') ){
								all_pinned = false;
							}
						}
						
						if( all_pinned ){
							for(let i = $checked_blocks.length - 1; i > -1; i--){
								keep_methods.unset_pin( $checked_blocks[i] );
							}
						}
						else{
							for(let i = $checked_blocks.length - 1; i > -1; i--){
								keep_methods.set_pin( $checked_blocks[i] );
							}
						}
						return false;
					})
					.on('click', '.keep-action-delete', function(){
						const $checked_blocks = $keep_selected.data('$checked_blocks');
						for(let i = 0, iL = $checked_blocks.length; i < iL; i++){
							keep_methods.delete_block( $checked_blocks[i] );
						}
						keep_methods.check_selected('clear');
						return false;
					})
					.on('click', '.keep-action-add-meta', function(){
						let $meta_dialog = $(this).closest('.keep-actions').find('.keep-meta-dialog');
						keep_methods.build_meta_dialog($meta_dialog, true);
						keep_methods.show_action_dialog($meta_dialog.parent());
						return false;
					})
					.on('click', '.keep-meta-dialog .keep-meta-control button', function(){
						let $this = $(this);
						//keep_methods.add_meta_item( $this.closest('.keep-meta-control').find('textarea'), $this.closest('.keep-dialog'), $keep_selected.data('$checked_blocks') );
						keep_methods.add_meta_item( $this.closest('.keep-meta-control').find('textarea'), null, $keep_selected.data('$checked_blocks') );
						return false;
					})
					.on('keydown', '.keep-meta-dialog .keep-meta-control textarea', function(e){
						if(e.keyCode == 13 || e.which == 13 || e.key == 'Enter'){
							let $this = $(this);
							//keep_methods.add_meta_item( $this, $this.closest('.keep-dialog'), $keep_selected.data('$checked_blocks') );
							keep_methods.add_meta_item( $this, null, $keep_selected.data('$checked_blocks') );
							return false;
						}
					})
					.on('click', '.keep-action-copy', function(){
						const $checked_blocks = $keep_selected.data('$checked_blocks');
						for(let i = $checked_blocks.length - 1; i > -1; i--){
							keep_methods.copy_block( $checked_blocks[i] );
						}
						return false;
					});
			}
		},
		
		// - check selected
		check_selected: function(action){
			const $counter = $keep_selected.find('#keep-selected-count');
			
			// check all blocks check status
			if( action === 'fullcheck' ){
				const $checkers = $keep.find('.keep-checker');
				let $checked_blocks = [],
					count = 0;
				for(let i = 0, iL = $checkers.length; i < iL; i++){
					let $checker = $checkers.eq(i);
					if($checker.get(0).checked){
						$checked_blocks.push( $checker.closest('.keep-block') );
						count++;
					}
				}
				if(count > 0){
					$keep_selected.addClass('active');
				}
				else{
					$keep_selected.removeClass('active');
				}
				$keep_selected.data('$checked_blocks', $checked_blocks);
				$counter.html(count);
			}
			
			// de-select all blocks
			else if( action === 'clear' ){
				const $checked_blocks = $keep_selected.data('$checked_blocks');
				if($checked_blocks && $checked_blocks[0]){
					for(let i = 0, iL = $checked_blocks.length; i < iL; i++){
						$checked_blocks[i].find('.keep-checker').get(0).checked = false;
					}
					$keep_selected
						.removeClass('active')
						.data('$checked_blocks', []);
					$counter.html(0);
				}
			}
		},
		
		// - check if element is in selected
		is_selected: function($el){
			return $el.closest('#keep-selected')[0] ? true : false;
		},
		
	}
	if($keep[0]){ keep_methods.init(); }
});