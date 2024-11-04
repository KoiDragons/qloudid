/* Keep functionality */
$(document).ready(function(){
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body)
		templates = {},
		$keep = $('#keep'),
		$modal = $('#keep-modal');
	
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
				
			
			// delete meta
			keep_methods.delete_meta();
			
			
			// actions
			keep_methods.init_actions();
			
			
			// modal
			keep_methods.init_modal();
			
			
			// selected
			keep_methods.init_selected();
		},
		
		
		
		// GENERATE SETTINGS
		generate_settings: function($block, type){
			var settings = {};
			
			// Modal 
			if(type === 'modal'){
				var prev_settings = $block.data('settings');
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
							$checkbox = $item.find('input[type=checkbox]');
						
						settings.list.push({
							id: $item.attr('id').replace('-modal', ''),
							checkbox: {
								id: $checkbox.attr('id').replace('-modal', ''),
								name: $checkbox.attr('name').replace('-modal', ''),
								checked: $checkbox.get(0).checked,	
							},
							content: $item.find('textarea').val()
						});
					}
				}
					
				// Completed
				var $completed = $block.find('.keep-completed .keep-list-item');
				if($completed[0]){
					for(var i = 0, iL = $completed.length; i < iL; i++){
						var $complete = $completed.eq(i),
							$checkbox = $complete.find('input[type=checkbox]');
						settings.completed.push({
							id: $complete.attr('id').replace('-modal', ''),
							checkbox: {
								id: $checkbox.attr('id').replace('-modal', ''),
								name: $checkbox.attr('name').replace('-modal', ''),
								checked: $checkbox.get(0).checked,	
							},
							content: $complete.find('textarea').val()
						});
					}
				}
				
				// Meta
				settings.metas = prev_settings.metas;
				
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
							$checkbox = $item.find('input[type=checkbox]');
						
						settings.list.push({
							id: $item.attr('id'),
							checkbox: {
								id: $checkbox.attr('id'),
								name: $checkbox.attr('name'),
								checked: $checkbox.get(0).checked,	
							},
							content: $item.find('.keep-list-title').html()
						});
					}
				}
					
				// Completed
				var $completed = $block.find('.keep-completed .keep-list-item');
				if($completed[0]){
					for(var i = 0, iL = $completed.length; i < iL; i++){
						var $complete = $completed.eq(i),
							$checkbox = $complete.find('input[type=checkbox]');
						settings.completed.push({
							id: $complete.attr('id'),
							checkbox: {
								id: $checkbox.attr('id'),
								name: $checkbox.attr('name'),
								checked: $checkbox.get(0).checked,	
							},
							content: $complete.find('.keep-list-title').html()
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
					body: 	'<div class="keep-meta maxwi_100 minhei_24p dflex alit_c pos_rel marb6 marr6 xs-padr15 sm-padr15 brdrad2 bg_0_08">\
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
			}
			
			// regular block template
			templates.regular = {
				image: '<div class="keep-image" id="{image-id}"><img src="{src}" width="{width}" height="{height}" class="wi_100 hei_auto dblock"></div>',
				list_block: '<div class="keep-list-item pos_rel padtb5 padl25 txt_21" id="{item-id}">\
								<input type="checkbox" name="{check-name}" id="{check-id}" class="default sr-only">\
								<label for="{check-id}" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">\
									<div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>\
								</label>\
								<span class="keep-list-title opa54_sibc txtdec_lt_sibc">{content}</span>\
							</div>',
			}
			
			// modal block template
			templates.modal = {
				image: '<div class="keep-image pos_rel" id="{image-id}">\
							<img src="{src}" width="{width}" height="{height}" class="wi_100 hei_auto dblock">\
							<button class="keep-remove-image wi_30p hei_30p dblock opa0 xs-opa75 sm-opa75 opa75_ph opa1_h_i pos_abs zi2 bot5p right5p nobrd brdrad2 bg_0_8 bgir_norep bgip_c curp trans_opa1" style="background-image: url(images/icons/icon-trash.svg)">\
								<div class="opa0_nph opa80 pos_abs zi1 top100 right-5p mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2"><span class="dblock padrl8">Remove</span></div>\
							</button>\
						</div>',
				list_block: '<div class="keep-list-item pos_rel padtb5 padrl25 txt_21" id="{item-id}">\
								<input type="checkbox" name="{check-name}-modal" id="{check-id}-modal" class="default sr-only">\
								<label for="{check-id}-modal" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">\
									<div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>\
								</label>\
								<textarea name="{check-name}-text-modal" rows="1" cols="1" class="autosize  keep-title wi_100 dblock pad0 nobrd bg_trans txtdec_lt_sibc ff_inh fsz_inh txt_21">{content}</textarea>\
								<a href="#" class="keep-list-delete dblock opa0 opa50_ph opa1_h_i pos_abs pos_cenY right0 trans_opa1">\
									<img src="images/icons/icon-close-filled.svg" width="18" height="18" class="dblock" alt="Delete">\
									<div class="opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2"><span class="dblock padrl8">Delete</span></div>\
								</a>\
							</div>',
			}
		},
		
		
		
		// PIN
		init_pin: function(){
			$body.on('click', '.keep-block .keep-pin', function(){
				var $this = $(this),
					$block = $this.closest('.keep-block'),
					settings = $block.data('settings');
					
				if(!settings){ settings = keep_methods.generate_settings($block); }
				
				// Un-pin
				if($this.hasClass('active')){
					$this.removeClass('active');
					var v=$this.closest("a").attr('id');
					console.log(v);
					var file_id=$this.attr('id');
					var send_data={
							id: file_id,
							act: 0
						}
					$.ajax({
								type:"POST",
								url:"../inactivateFileName",
							   
								dataType:"text",
								data: send_data,
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
					
									
									
										}
									});
									
		$block.css('background-color', "#ffff8d");
		$(".green_col").removeClass('active');
		$(".yellow_col").addClass('active');
					settings.pinned = false;
				}
				
				// Pin
				else{
					$this.addClass('active');
					var v=$this.closest("a").attr('id');
					console.log(v);
					var file_id=$this.attr('id');
					var send_data={
							id: file_id,
							act: 1
						}
					$.ajax({
								type:"POST",
								url:"../inactivateFileName",
							   
								dataType:"text",
								data: send_data,
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
					
									
									
					}
					});
					$block
				.css('background-color', "#ccff90");
				$(".yellow_col").removeClass('active');
				$(".green_col").addClass('active');
					settings.pinned = true;
				}
				
				$block.data('settings', settings);
				return false;
			});
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
				keep_methods.delete_list_block($(this));
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
				settings = $block.data('settings');
				
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
				$item_temp = $(keep_methods.build_list_item(new_item, 'modal')),
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
		
		// - delete block
		delete_list_block: function($link){
			var $item = $link.closest('.keep-list-item'),
				id = $item.attr('id'),
				$block = $item.closest('.keep-block'),
				settings = $block.data('settings'),
				list_type = $item.parent().hasClass('keep-completed') ? 'completed' : 'list';
			
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
			for(var i = 0, iL = settings[list_type].length; i < iL; i++){
				if(settings[list_type][i].id === id){
					settings[list_type].splice(i, 1);
					break;
				}
			}
			
			$block.data('settings', settings);
			$item.remove();
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
		
		
		// move to list/completed
		change_list_block_status: function(checkbox){
			var $item = $(checkbox).closest('.keep-list-item'),
				id = $item.attr('id'),
				$block = $item.closest('.keep-block'),
				settings = $block.data('settings');
			
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
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
		
		
		
		// DELETE meta
		delete_meta: function(){
			$body.on('click', '.keep-block .keep-meta-delete', function(){
				var $this = $(this),
					$item = $this.closest('.keep-meta'),
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
				
				return false;
			});
		},
		
		
		
		// SYNCHRONIZATION
		// TODO: sync a particular block/module?
		
		// - sync regular to modal
		sync_modal: function($source){
			var settings = keep_methods.generate_settings($source);
			
			// - block
			var $block = $modal.find('.keep-block');
			$block.data({
				$block: $source,
				settings: settings
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
			for(var i = 0, iL = settings.images.length; i < iL; i++){
				var $temp = keep_methods.build_image(settings.images[i], 'modal');
				$images.append($temp);
			}
			keep_methods.process_images($block);
			
			// - title
			var $title = $block.find('.keep-title');
			//alert("hi");
			$title.val(settings.title);
			autosize.update($title);
			
			// - list items
			var $list_items = $block.find('.keep-list');
			$list_items.empty();
			for(var i = 0, iL = settings.list.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.list[i], 'modal');
				$list_items.append($item_temp);
				autosize($item_temp.find('textarea'));
			}
			
			// - comleted items
			var $completed_items = $block.find('.keep-completed');
			$completed_items.empty();
			for(var i = 0, iL = settings.completed.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.completed[i], 'modal');
				$completed_items.append($item_temp);
				autosize($item_temp.find('textarea'));
			}
			
			// - meta
			/* - since metas do not change, we can just copy the entire html
			var $metas = $block.find('.keep-metas');
			$metas.empty();
			for(var i = 0, iL = settings.metas.length; i < iL; i++){
				var meta = settings.metas[i],
					meta_temp = templates.general.meta.body;
				
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
				$metas.append(meta_temp);
			}
			*/
			$block.find('.keep-metas').html($source.find('.keep-metas').html());
		},
		
		// - sync modal to regular
		sync_regular: function($source){
			var settings = keep_methods.generate_settings($source, 'modal'),
				$block = $source.data('$block');
			
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
			//alert($block.attr('id'));
			// - images
			var $images = $block.find('.keep-images');
			$images.empty();
			for(var i = 0, iL = settings.images.length; i < iL; i++){
				var $temp = keep_methods.build_image(settings.images[i]);
				$images.append($temp);
			}
			keep_methods.process_images($block);
			
			// - title
			$block.find('.keep-title').html(settings.title);
			var result=($block.attr('id')).split('-');
			/*var send_data={
							id: result['1'],
							title_new: settings.title,
							
						}
						$.ajax({
								type:"POST",
								url:"../updateFileName/"+cid,
							   
								dataType:"text",
								data: send_data,
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
					
									
									
										}
									});*/
			var $list_items = $block.find('.keep-list');
			$list_items.empty();
			for(var i = 0, iL = settings.list.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.list[i]);
				var send_data={
							id: result['1'],
							title_new: $item_temp.find('.keep-list-title').html(),
							
						}
						$.ajax({
								type:"POST",
								url:"../updateFileName/"+cid,
							   
								dataType:"text",
								data: send_data,
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
					
									
									
										}
									});
				$list_items.append($item_temp);
			}
			
			// - completed items
			var $completed_items = $block.find('.keep-completed');
			$completed_items.empty();
			for(var i = 0, iL = settings.completed.length; i < iL; i++){
				var $item_temp = keep_methods.build_list_item(settings.completed[i]);
				$completed_items.append($item_temp);
			}
			
			// - meta
			/*
			var $metas = $block.find('.keep-metas');
			$metas.empty();
			for(var i = 0, iL = settings.metas.length; i < iL; i++){
				var meta = settings.metas[i],
					meta_temp = templates.general.meta.body;
				
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
				$metas.append(meta_temp);
			}
			*/
			$block.find('.keep-metas').html($source.find('.keep-metas').html());
		},
		
		// - build image
		build_image: function(item, type){
			var temp = (type === 'modal') ? templates.modal.image : templates.regular.image;
			temp = temp.split('{image-id}').join(item.id);
			temp = temp.split('{src}').join(item.src);
			temp = temp.split('{width}').join(item.width);
			temp = temp.split('{height}').join(item.height);
			return $(temp);
		},
		
		// - build list item
		build_list_item: function(item, type){
			var temp = (type === 'modal') ? templates.modal.list_block : templates.regular.list_block;
			temp = temp.split('{item-id}').join(item.id);
			temp = temp.split('{check-name}').join(item.checkbox.name);
			temp = temp.split('{check-id}').join(item.checkbox.id);
			temp = temp.split('{content}').join(item.content);
			
			var $temp = $(temp);
			if(item.checkbox.checked){
				$temp.find('input[type=checkbox]').get(0).checked = true;
			}
			return $temp;
		},
		
		
		
		// ACTIONS
		init_actions: function(){
			$body
				.on('click', '.keep-block .keep-action .keep-show-color', function(){
					return false;
				})
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
				});
		},
		
		// - change background color
		change_bg_color: function($link){
			var $block = $link.closest('.keep-block'),
				settings = $block.data('settings'),
				$active = $link.siblings('.active'),
				color = $link.data('color');
			
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
			$active.removeClass('active');
			$link.addClass('active');
			settings.background.color = color;
			
			$block
				.css('background-color', color)
				.data('settings', settings);
		},
		
		// - add image
		add_image: function(input, type){
			var files = input.files;
			if(files.length > 0){
				var $block = $(input).closest('.keep-block'),
					settings = $block.data('settings'),
					$images = $block.find('.keep-images');
					
				if(!settings){ settings = keep_methods.generate_settings($block); }
				
				$images.addClass('active');
				
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				//console.log(files[0]);
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
						//console.log($block.attr('id'));
						var result=($block.attr('id')).split('-');
						var send_data={
							id: result['1'],
							src: reader.result,
							width: image.width,
							height: image.height
						}
						$.ajax({
								type:"POST",
								url:"../getFileName",
							   
								dataType:"text",
								data: send_data,
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
					
									
									
										}
									});
						settings.images.push(new_image);
						$block.data('settings', settings);
						
						$images.append(keep_methods.build_image(new_image, type));
						keep_methods.process_images($block);
						$images.removeClass('active');
					}
				}
				reader.onerror = function(error) {
					//console.log('Error: ', error);
					$images.removeClass('active');
				}
			}
		},
		
		// - remove image
		remove_image: function($image){
			var $block = $image.closest('.keep-block'),
				settings = $block.data('settings'),
				id = $image.attr('id');
				var result=id.split('-');
				var send_data={
							id: result['3']
							
						}
				$.ajax({
								type:"POST",
								url:"../deleteImage",
							   
								dataType:"text",
								data: send_data,
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
					
									
									
										}
									});
			if(!settings){ settings = keep_methods.generate_settings($block); }
			
			for(var i = 0, iL = settings.images.length; i < iL; i++){
				if(settings.images[i].id === id){
					//console.log(settings.images[i].id);
					settings.images.splice(i, 1);
					break;
				}
			}
			
			$block.data('settings', settings);
			$image.remove();
			keep_methods.process_images($block);
		},
		
		
		
		// MODAL
		init_modal: function(){
			var $keep_fade = $('#keep_fade');
			autosize($modal.find('.autosize'));
			
			// - show modal and sync with regular block
			$body.on('click', '.show_keep_modal', function(){
				$modal
					.addClass('active')
					.fadeIn();
				$keep_fade
					.addClass('active')
					.fadeIn();
					
				keep_methods.sync_modal($(this).closest('.keep-block'));
				return false;
			});
			
			// - hide modal and sync to regular block
			$keep_fade.on('click', function(){
				$modal
					.removeClass('active')
					.fadeOut();
				$keep_fade
					.removeClass('active')
					.fadeOut();
				
				keep_methods.sync_regular($modal.find('.keep-block'));
				return false;
			});
			$modal.on('submit', 'form', function(){
				$modal
					.removeClass('active')
					.fadeOut();
				$keep_fade
					.removeClass('active')
					.fadeOut();
				
				keep_methods.sync_regular($modal.find('.keep-block'));
				return false;
			});
		},
		
		
		
		// SELECTED
		init_selected: function(){
			var $selected = $('#keep-selected'),
				$counter = $selected.find('#keep-selected-count');
				
			if($selected[0]){
				$keep.on('change', '.keep-checker', function(){
					var $checkers = $keep.find('.keep-checker'),
						count = 0;
					for(var i = 0, iL = $checkers.length; i < iL; i++){
						if($checkers.eq(i).get(0).checked){
							count++;
						}
					}
					if(count > 0){
						$selected.addClass('active');
					}
					else{
						$selected.removeClass('active');
					}
					$counter.html(count);
				});
				
				$selected
					.on('click', '.keep-selected-clear', function(){
						var $checkers = $keep.find('.keep-checker');
						for(var i = 0, iL = $checkers.length; i < iL; i++){
							$checkers.eq(i).get(0).checked = false;
						}
						$checkers.first().trigger('change');
						return false;
					})
					.on('click', '.keep-action .keep-show-color', function(){
						return false;
					})
					.on('click', '.keep-action .keep-colors a', function(){
						var $this = $(this),
							color = $this.data('color'),
							$active = $this.siblings('.active'),
							$checkers = $keep.find('.keep-checker');
						
						$active.removeClass('active');
						$this.addClass('active');
						
						for(var i = 0, iL = $checkers.length; i < iL; i++){
							var $checker = $checkers.eq(i);
							if($checker.get(0).checked){
								keep_methods.change_bg_color($checker.closest('.keep-block').find('.keep-colors a[data-color=' + color + ']'));
							}
						}
						return false;
					});
			}
		},
	
	}
	if($keep[0]){ keep_methods.init(); }
});




