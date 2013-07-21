//Fields editor class
function FieldsEditor(messages){
    this.messages = messages;
    this.loadIndex = 0;
    
    //Fieldset editor coloring
	this.bindItemToolsHoverEffects = function(){
	    $('.form_editor_items li').hover(function(){
	        $(this).addClass('hovered');
	    },function(){
	        $(this).removeClass('hovered');
	    });
	};
	
	this.deleteInstance = function(id, i0, type){
		var custom_options = $('#options_custom_'+id).val();
		var iterations = explode(';', custom_options);
		var parsed_custom_options = '';
		
		for(var i=0; i<iterations.length; i++){
			iter = explode('=', iterations[i]);
			if(iter[0] == i0){
				delete(iterations[i]);
			};
		};
		
		var result = '';
		
		var i1 = 0;

		for(var i=0; i<iterations.length; i++){
			iter = explode('=', iterations[i]);
			if(iter != null){
				i1++;
				result += i1+'='+iter[1]+';';
			};
		};
		
		result = result.substr(0, result.length-1);
		
		$('#options_custom_'+id).val(result);

		this.createOptions(id, type);
	};

	this.addInstance = function(id, obj, current_iteration, type){
        this.type = type;
        
	    var regexp = new RegExp("[=;'\"<>]", "g");

		var value = obj.prev().val().replace(regexp, '');
	
		if(value){
			var custom_options = $('#options_custom_'+id).val();

			if(custom_options){
				custom_options += ';'+current_iteration+'='+value;
			}else{
				custom_options += current_iteration+'='+value;
			};

			$('#options_custom_'+id).val(custom_options);
            
			this.createOptions(id, null, type);
		}else{
			return false;	
		};
	};

	this.checkDefaultOption = function(default_item, iter){
		if(default_item == iter){
			return ' selected="selected"';
		};
	};

    this.checkDefaultMultiOption = function(default_item, iter){
        if(default_item){
            var def_array = explode(',', default_item);

            if(in_array(iter, def_array)){
                return ' selected="selected"';
            };
        };
	};
	
	this.createOptions = function(id, default_item, type){
		var custom_options = $('#options_custom_'+id).val();
		
		$('#options_custom_parsed_'+id).empty();

		var parsed_custom_options = '';
		var parsed_defaults = '';
		var current_iteration = 1;

		if(custom_options.length > 0){
			var iterations = explode(';', custom_options);

			for(var i=0; i<iterations.length; i++){
				var iter = explode('=', iterations[i]);
				
				if(this.type == 'select'){
					parsed_custom_options += '<div class="custom_option_item selectable_coi"><em class="option_count">'+iter[0]+'.</em> '+iter[1]+'<a class="icon_action icon_delete_instance" href="javascript:void(0)" onClick="fieldsEditor.deleteInstance(\''+id+'\', \''+iter[0]+'\', \''+this.type+'\')"></a></div>';
					parsed_defaults += '<option value="'+iter[0]+'"'+this.checkDefaultOption(default_item, iter[0])+'>'+iter[0]+'. '+iter[1]+'</option>';
                }else if(this.type == 'multiselect'){
					parsed_custom_options += '<div class="custom_option_item selectable_coi"><em class="option_count">'+iter[0]+'.</em> '+iter[1]+'<a class="icon_action icon_delete_instance" href="javascript:void(0)" onClick="fieldsEditor.deleteInstance(\''+id+'\', \''+iter[0]+'\', \''+this.type+'\')"></a></div>';
					parsed_defaults += '<option value="'+iter[0]+'"'+this.checkDefaultMultiOption(default_item, iter[0])+'>'+iter[0]+'. '+iter[1]+'</option>';
				}else if(this.type == 'file'){
					parsed_custom_options += '<div class="custom_option_item"><em class="option_count">'+iter[0]+'.</em> '+iter[1]+'<a class="icon_action icon_delete_instance" href="javascript:void(0)" onClick="fieldsEditor.deleteInstance(\''+id+'\', \''+iter[0]+'\', \''+this.type+'\')"></a></div>';
				};
				
				current_iteration++;
			};
		};

		var default_file_extension = '';

		if(this.type == 'select'){
			var prefix = '<em class="option_count">'+current_iteration+'.</em>';

        }else if(this.type == 'multiselect'){
			var prefix = '<em class="option_count">'+current_iteration+'.</em>';

		}else if(this.type == 'file'){
			var prefix = '<em class="option_count">*.</em>';
		};

		parsed_custom_options += '<div class="custom_option_item"> <input type="text" class="add_instance_input"><a class="icon_action icon_add_instance" href="javascript:void(0)" onclick="fieldsEditor.addInstance(\''+id+'\', $(this), \''+current_iteration+'\', \''+this.type+'\')"></a></div>';

		$('#options_custom_parsed_'+id).html(parsed_custom_options);
		$('#default_'+id).find('option:not(.default_null_selection)').remove();

		if(this.type == 'select' || this.type == 'multiselect'){
			$('#default_'+id).append(parsed_defaults);
		};
	};
	
	this.selectItemInit = function(id, option, default_item, type){
		this.type = type;

		id = id.substr(7);
		
		if(option == '1'){
			$('tr#table_'+id).css('display', 'table-row');
		}else if(option == '2'){
			$('tr#system_'+id).css('display', 'table-row');
		}else{
			$('tr#custom_'+id).css('display', 'table-row');
			$('tr#defaults_'+id).css('display', 'table-row');
		};
						
		$('#item_'+id+' .options_source').click(function(){
			var c_opt = $(this).val();
			var c_id = $(this).parent().parent().attr('id').substr(5);
			
			if(c_opt == '1'){
				$('tr#table_'+id).fadeIn(250);
				$('tr#custom_'+id).css('display', 'none');
				$('tr#defaults_'+id).css('display', 'none');
				$('tr#system_'+id).css('display', 'none');

			}else if(c_opt == '2'){
				$('tr#table_'+id).css('display', 'none');
				$('tr#custom_'+id).css('display', 'none');
				$('tr#defaults_'+id).css('display', 'none');
				$('tr#system_'+id).fadeIn(250);

			}else{
				$('tr#table_'+id).css('display', 'none');
				$('tr#custom_'+id).fadeIn(250);
				$('tr#defaults_'+id).fadeIn(250);
				$('tr#system_'+id).css('display', 'none');
				
			};
		});
		
		this.createOptions(id, default_item, type);
	};
    
    this.openCloseItemTools = function(obj){
        var type = obj.parent().attr('rel');

		if(obj.next('.collapsable_fieldlist_item_tools').css('display') == 'none'){
            obj.removeClass('expand').addClass('collapse');
            obj.next('.collapsable_fieldlist_item_tools').slideDown(100);
            obj.parent().addClass('expanded_item');

            if(type == 'map'){
                var map_id = obj.parent().find('.map_relation').attr('rel');
                var data = gmaps.getData(map_id);

                google.maps.event.trigger(gmaps.map[map_id].map, 'resize');
                gmaps.map[map_id].map.setCenter(new google.maps.LatLng(data[0], data[1]));
            };
        }else{
            obj.removeClass('collapse').addClass('expand');
            obj.next('.collapsable_fieldlist_item_tools').slideUp(100);
            obj.parent().removeClass('expanded_item');
        };
    };

    this.loadItemTools = function(type, obj){
        this.loadIndex++;
        var that = this;
 
        $.ajax({
            url: '/admin/?ajax=true&option=sections&suboption=edit&action=load_field_item_tools&item_name='+type+'&new=new_'+this.loadIndex,
            success: function(data){
                obj.find('.tool_loading').remove();
                obj.append(data);
                obj.attr('id', 'field_new_'+that.loadIndex);
                that.setSortingIndexes();

                if(type == 'map'){
                    $('.map_holder').mouseenter(function(){
                        $("#sortable").sortable('disable');
                    });

                    $('.map_holder').mouseleave(function(){
                        $("#sortable").sortable('enable');
                    });
                };
            }
        });
    };

    this.endSorting = function(obj){
    	var type = obj.attr('rel');
		obj.append('<span class="tool_loading"></span>');
        this.loadItemTools(type, obj);
    	this.bindItemToolsHoverEffects();
    };
    
    this.setSortingIndexes = function(){
        var i = 0;
        $('.form_editor_items li').each(function(){
            i++;
            $(this).find('.collapsable_fieldlist_item_tools fieldset input[rel=sort]').val(i);
        });
    };

    this.deleteField = function(id, message, section_id){
        if(confirm(message)){
            if(section_id != 0){
                $.ajax({
                    url: '/admin/?ajax=true&option=sections&suboption=edit&action=delete_file_item&section_id='+section_id+'&id='+id,
                    success: function(data){
                        $('#field_'+id).hide(300, function(){
                            $(this).remove();
                        });
                    }
                });
            }else{
                $('#field_'+id).hide(300, function(){
                    $(this).remove();
                });
            };
        }
    };

    this.init = function(){
        var that = this;
        var mouseinamap = false;
        
        //Set item sort field
        this.setSortingIndexes();
                        
        //Hover coloring sections list
        $('.sections_list .section_item_container').hover(function(){
            $(this).addClass('section_hovered');
        },function(){
            $(this).removeClass('section_hovered');
        });
        
        //Toolbox item hover
        $('.toolbox li').hover(function(){
            $(this).addClass('tool_hovered');
        },function(){
            $(this).removeClass('tool_hovered');
        });

        $('.map_holder').mouseenter(function(){
            mouseinamap = true;
            $("#sortable").sortable('disable');
        });

        $('.map_holder').mouseleave(function(){
            mouseinamap = false;
            $("#sortable").sortable('enable');
        });

        //Sort items
        $("#sortable").sortable({
            opacity: 0.7,
            items: 'li:not(.expanded_item)',
            helper: 'original',
            forceHelperSize: true,
            placeholder: 'highlight',
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            start: function(event, ui){

            },
            stop: function(event, ui){
                if(!mouseinamap){
                     if(!ui.item.find('.collapsable_fieldlist_item_tools').length){
                        that.endSorting(ui.item);
                    };
                    that.setSortingIndexes();
                    ui.item.removeClass('hovered');
                };
            }
        });

        var toolbox_item_resized_width = $('#sortable').parent().width()-40;

        $(window).bind('resize', function(){
             toolbox_item_resized_width = $('#sortable').parent().width()-40;
        });
        
        //Drag the toolbox item
        $(".toolbox li").draggable({
            revert: false,
            helper: 'clone',
            connectToSortable: '#sortable',
            opacity: 0.7,
            zIndex: 100,
            start: function(event, ui){
                ui.helper.stop().animate({
                     width: toolbox_item_resized_width
                }, 200);
            },
            stop: function(event, ui){
                that.setSortingIndexes();
            }
        });
        
        this.bindItemToolsHoverEffects();
    };

	this.textfieldTypeSelect = function(id, val){
		var e = $('#email_hidden_'+id);
		var n = $('#number_hidden_'+id);

		if(val == 3){
			e.val('1');
			n.val('0');
		}else if(val == 2){
			e.val('0');
			n.val('1');
		}else{
			e.val('0');
			n.val('0');
		};
	};
};

//Images
var i_images = {
    getDimensionsClass: function(mode){
        var dc_class = new String();
        
        switch(parseInt(mode)){
            case 1 : dc_class = 'icon_dimensions_xy'; break;
            case 2 : dc_class = 'icon_dimensions_x'; break;
            case 3 : dc_class = 'icon_dimensions_y'; break;
            case 4 : dc_class = 'icon_dimensions_sq'; break;
        };

        return dc_class;
    },
    
	getItemsFromString: function(id){
		var values = new Array();
		var field = $('#thumbs_'+id);
		var grid = $('#images_copies_table_'+id);
		
		grid.find('tr.image_item_row').remove();
		
		if(field.val()){
			var r1 = explode(';', field.val());
			var result = new String();
			
			for(var i = 0, l = r1.length; i < l; i++){
				var r2 = explode(',', r1[i]);
				values.push(r2);

				result += '<tr class="image_item_row">';
				result += '<td><input type="text" value="'+r2[0]+'"></td>';
				result += '<td><input type="text" value="'+r2[1]+'"></td>';
				result += '<td><input type="text" value="'+r2[2]+'"></td>';
                result +=   '<td><input autocomplete="off" type="hidden" value="'+r2[3]+'">' +
                            '<span class="icon_action '+this.getDimensionsClass(r2[3])+'"></span></td>';
				result += '<td><a class="icon_action icon_delete_instance" href="javascript:void(0)" onclick="i_images.deleteItem(\''+r2[0]+','+r2[1]+','+r2[2]+','+r2[3]+'\', \''+id+'\')"></a></td>';
				result += '</tr>';
			};
			
			grid.find('tr.adder').after(result);
		};
	},

    changeDimensionControl: function(instance, id){
        var grid = $('#images_copies_table_'+id);
        
        if(instance == 'new'){
            var mode = parseInt(grid.find('.adder_d').val());

            if(mode < 4){
                mode++;
            }else{
                mode = 1;
            };

            grid.find('.adder_d')
                .val(mode)
                .next()
                .removeClass('icon_dimensions_sq')
                .removeClass('icon_dimensions_xy')
                .removeClass('icon_dimensions_x')
                .removeClass('icon_dimensions_y')
                .addClass(this.getDimensionsClass(mode));
        }else{
            
        };
    },
	
	deleteItem: function(instance, id){
		var str = $('#thumbs_'+id).val();
		
		str = str.replace(instance, '');
		
		if(str.substring(0, 1) == ';'){
			str = str.substring(1, str.length);
			
		}else if(str.substring(str.length-1, str.length) == ';'){
			str = str.substring(0, str.length-1);
			
		}else if(str == ';'){
			str = '';
		};
		
		$('#thumbs_'+id).val((str));
		
		this.getItemsFromString(id);
	},
	
	addItem: function(id){
		var str = $('#thumbs_'+id).val();
		var grid = $('#images_copies_table_'+id);
		var w = parseInt(grid.find('.adder_w').val());
		var h = parseInt(grid.find('.adder_h').val());
		var p = grid.find('.adder_p').val();
        var d = parseInt(grid.find('.adder_d').val()); //1 - xy, 2 - x, 3 - y
		var status = true;
		var r1 = explode(';', str);
		
		if(w && h && p && !in_array(p, r1)){
			var n = w+','+h+','+p+','+d;
			
			if(str){
				n += ';';
			};
			
			$('#thumbs_'+id).val(n + str);
			
			this.getItemsFromString(id);
			
			grid.find('.adder_w, .adder_h, .adder_p').val('');
		};
	}
};

//Maps
var gmaps = {
    data: null,
    map: new Array(),
    locations: new Array(
        {
            name: 'Moscow',
            lat: 10,
            lng: 10
        }
    ),
    init: function(id){
        this.id = id;
        this.createMap();
    },
    setData: function(map){
        var dom_id = $(map.getDiv()).attr('id');
        var id = dom_id.substr(4, dom_id.length);
        var data = {
            lat: map.getCenter().lat(),
            lng: map.getCenter().lng(),
            zoom: map.getZoom(),
            type: map.getMapTypeId()
        };
        var result = data.lat + ';' +data.lng + ';' + data.zoom + ';' + data.type;
        $('#default_'+id).val(result);
    },
    setInfoData: function(map){
        var dom_id = $(map.getDiv()).attr('id');
        var id = dom_id.substr(4, dom_id.length);

        $('#map_lat_'+id).val(map.getCenter().lat());
        $('#map_lng_'+id).val(map.getCenter().lng());
        $('#map_zoom_'+id).val(map.getZoom());
    },
    getData: function(id){
        var str = $('#default_'+id).val();

        if(!str){
            str = '-34.397;150.644;8;roadmap';
        };

        var a = explode(';', str);
        a[0] = parseFloat(a[0]);
        a[1] = parseFloat(a[1]);
        a[2] = parseInt(a[2]);

        switch(a[3]){
            case 'hybrid' : a[3] = google.maps.MapTypeId.HYBRID; break;
            case 'roadmap' : a[3] = google.maps.MapTypeId.ROADMAP; break;
            case 'sattelite' : a[3] = google.maps.MapTypeId.SATELLITE; break;
            case 'terrain' : a[3] = google.maps.MapTypeId.TERRAIN; break;
        };
        
        return a;
    },
    refreshData: function(id){
        var map = this.map[id].map;
        var lat = parseFloat($('#map_lat_'+id).val());
        var lng = parseFloat($('#map_lng_'+id).val());
        var zoom = parseInt($('#map_zoom_'+id).val());
        map.setCenter(new google.maps.LatLng(lat, lng));
        map.setZoom(zoom);
        this.setData(map);
    },
    createMap: function(){
        var id = this.id;
        var data = gmaps.getData(id);

        this.map[id] = {
            map: new google.maps.Map(document.getElementById('map_' + id), {
                center: new google.maps.LatLng(data[0], data[1]),
                zoom: data[2],
                mapTypeId: data[3]
            })
        };

        gmaps.setInfoData(this.map[id].map);
        gmaps.setData(this.map[id].map);

        google.maps.event.addListener(this.map[id].map, 'click', function() {
            gmaps.setData(this);
            gmaps.setInfoData(this);
        });
        google.maps.event.addListener(this.map[id].map, 'dblclick', function() {
            gmaps.setData(this);
            gmaps.setInfoData(this);
        });
        google.maps.event.addListener(this.map[id].map, 'dragend', function() {
            gmaps.setData(this);
            gmaps.setInfoData(this);
        });
        google.maps.event.addListener(this.map[id].map, 'zoom_changed', function() {
            gmaps.setData(this);
            gmaps.setInfoData(this);
        });
        google.maps.event.addListener(this.map[id].map, 'maptypeid_changed', function() {
            gmaps.setData(this);
            gmaps.setInfoData(this);
        });
        google.maps.event.addListener(this.map[id].map, 'drag', function() {
            gmaps.setData(this);
            gmaps.setInfoData(this);
        });
    }
}

//SQL-preview
var sql_preview = {
    window: null,
    section_id: null,
    
    getSql: function(){
        var items = $('#sortable li');
        var result = new String();

        result += "SELECT\n";
        result += "\t`id`,\n";
        result += "\t`sort`,\n";
        
        items.each(function(){
            var item = $(this);
            
            if(item.attr('rel') != 'separator'){
                if(item.hasClass('item_embed')){
                    if(item.attr('rel') == 'checkbox'){
                        result += "\t`publish`,\n";
                    }else if(item.attr('rel') == 'text'){
                        result += "\t`name`,\n";
                    };
                }else{
                    result += "\t`" + item.attr('colname') + "` AS `" + item.find('.fielditem_name').text() + "`,\n";
                };
            };
        });

        result = result.substr(0, result.length-2)+"\n";

        result += "FROM\n";
        result += "\t`section_" + this.section_id + "`\n";
        result += "WHERE\n";
        result += "\t`publish` = 1\n";
        result += "ORDER BY\n";
        result += "\t`sort`\n";
        result += "ASC";

        return result;
    },

    show: function(header, section_id){
        this.section_id = section_id;
        var html =  '<pre><code class="sql_preview_code">' + this.getSql() + '</code></pre>';

        this.window = new Window();
        this.window.createModal(header, html, 500);
        $('.sql_preview_code').each(function(i, e){
            hljs.highlightBlock(e, '    ')
        });
    }
};

//Startup bindings
 $(function(){
    //Disable text selection in a toolbox picker
    $(".toolbox").parent().disableTextSelect();
});