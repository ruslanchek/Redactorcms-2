;(function($) {

	$.extend($.fn, {
		swapClass: function(c1, c2) {
			var c1Elements = this.filter('.' + c1);
			this.filter('.' + c2).removeClass(c2).addClass(c1);
			c1Elements.removeClass(c1).addClass(c2);
			return this;
		},
		replaceClass: function(c1, c2) {
			return this.filter('.' + c1).removeClass(c1).addClass(c2).end();
		},
		hoverClass: function(className) {
			className = className || "hover";
			return this.hover(function() {
				$(this).addClass(className);
			}, function() {
				$(this).removeClass(className);
			});
		},
		heightToggle: function(animated, callback) {
			animated ?
				this.animate({ height: "toggle" }, animated, callback) :
				this.each(function(){
					jQuery(this)[ jQuery(this).is(":hidden") ? "show" : "hide" ]();
					if(callback)
						callback.apply(this, arguments);
				});
		},
		heightHide: function(animated, callback) {
			if (animated) {
				this.animate({ height: "hide" }, animated, callback);
			} else {
				this.hide();
				if (callback)
					this.each(callback);				
			}
		},
		prepareBranches: function(settings) {
			if (!settings.prerendered) {
				// mark last tree items
				this.filter(":last-child:not(ul)").addClass(CLASSES.last);
				// collapse whole tree, or only those marked as closed, anyway except those marked as open
				this.filter((settings.collapsed ? "" : "." + CLASSES.closed) + ":not(." + CLASSES.open + ")").find(">ul").hide();
			}
			// return all items with sublists
			return this.filter(":has(>ul)");
		},
		applyClasses: function(settings, toggler) {
			this.filter(":has(>ul):not(:has(>a))").find(">span").unbind("click.treeview").bind("click.treeview", function(event) {
				// don't handle click events on children, eg. checkboxes
				if ( this == event.target )
					toggler.apply($(this).next());
			}).add( $("a", this) ).hoverClass();
			
			if (!settings.prerendered) {
				
				// handle closed ones first
				this.filter(":has(>ul:hidden)")
						.addClass(CLASSES.expandable)
						.replaceClass(CLASSES.last, CLASSES.lastExpandable);
						
				// handle open ones
				this.not(":has(>ul:hidden)")
						.addClass(CLASSES.collapsable)
						.replaceClass(CLASSES.last, CLASSES.lastCollapsable);
						
	            // create hitarea if not present
				var hitarea = this.find("div." + CLASSES.hitarea);
				if(!hitarea.length){
					hitarea = this.prepend("<div class=\"" + CLASSES.hitarea + "\"/>").find("div." + CLASSES.hitarea);

				    hitarea.removeClass().addClass(CLASSES.hitarea).each(function() {
					    var classes = "";
					    $.each($(this).parent().attr("class").split(" "), function() {
						    classes += this + "-hitarea ";
					    });
					    $(this).addClass( classes );
				    });
                };
			}
			
			// apply event to hitarea
			this.find("div." + CLASSES.hitarea).click( toggler );
		},
		treeview: function(settings) {
			
			settings = $.extend({
				cookieId: "treeview",
				cookieOptions: {path: '/', expires: 365}
			}, settings);
			
			if ( settings.toggle ) {
				var callback = settings.toggle;
				settings.toggle = function() {
					return callback.apply($(this).parent()[0], arguments);
				};
			}
		
			// factory for treecontroller
			function treeController(tree, control) {
				// factory for click handlers
				function handler(filter) {
					return function() {
						// reuse toggle event handler, applying the elements to toggle
						// start searching for all hitareas
						toggler.apply( $("div." + CLASSES.hitarea, tree).filter(function() {
							// for plain toggle, no filter is provided, otherwise we need to check the parent element
							return filter ? $(this).parent("." + filter).length : true;
						}) );
						return false;
					};
				}
				// click on first element to collapse tree
				$("a:eq(0)", control).click( handler(CLASSES.collapsable) );
				// click on second to expand tree
				$("a:eq(1)", control).click( handler(CLASSES.expandable) );
				// click on third to toggle tree
				$("a:eq(2)", control).click( handler() ); 
			}
		
			// handle toggle event
			function toggler() {
				$(this)
					.parent()
					// swap classes for hitarea
					.find(">.hitarea")
						.swapClass( CLASSES.collapsableHitarea, CLASSES.expandableHitarea )
						.swapClass( CLASSES.lastCollapsableHitarea, CLASSES.lastExpandableHitarea )
					.end()
					// swap classes for parent li
					.swapClass( CLASSES.collapsable, CLASSES.expandable )
					.swapClass( CLASSES.lastCollapsable, CLASSES.lastExpandable )
					// find child lists
					.find( ">ul" )
					// toggle them
					.heightToggle( settings.animated, settings.toggle );
				if ( settings.unique ) {
					$(this).parent()
						.siblings()
						// swap classes for hitarea
						.find(">.hitarea")
							.replaceClass( CLASSES.collapsableHitarea, CLASSES.expandableHitarea )
							.replaceClass( CLASSES.lastCollapsableHitarea, CLASSES.lastExpandableHitarea )
						.end()
						.replaceClass( CLASSES.collapsable, CLASSES.expandable )
						.replaceClass( CLASSES.lastCollapsable, CLASSES.lastExpandable )
						.find( ">ul" )
						.heightHide( settings.animated, settings.toggle );
				}
			}
			this.data("toggler", toggler);
			
			function serialize() {
				function binary(arg) {
					return arg ? 1 : 0;
				}
				var data = [];
				branches.each(function(i, e) {
					data[i] = $(e).is(":has(>ul:visible)") ? 1 : 0;
				});
				$.cookie(settings.cookieId, data.join(""), settings.cookieOptions );
			}
			
			function deserialize() {
				var stored = $.cookie(settings.cookieId);
				if ( stored ) {
					var data = stored.split("");
					branches.each(function(i, e) {
						$(e).find(">ul")[ parseInt(data[i]) ? "show" : "hide" ]();
					});
				}
			}
			
			// add treeview class to activate styles
			this.addClass("treeview");
			
			// prepare branches and find all tree items with child lists
			var branches = this.find("li").prepareBranches(settings);
			
			switch(settings.persist) {
			case "cookie":
				var toggleCallback = settings.toggle;
				settings.toggle = function() {
					serialize();
					if (toggleCallback) {
						toggleCallback.apply(this, arguments);
					}
				};
				deserialize();
				break;
			case "location":
				var current = this.find("a").filter(function() { return this.href.toLowerCase() == location.href.toLowerCase(); });
				if ( current.length ) {
					current.addClass("selected").parents("ul, li").add( current.next() ).show();
				}
				break;
			}
			
			branches.applyClasses(settings, toggler);
				
			// if control option is set, create the treecontroller and show it
			if ( settings.control ) {
				treeController(this, settings.control);
				$(settings.control).show();
			}
			
			return this;
		}
	});
	
	// classes used by the plugin
	// need to be styled via external stylesheet, see first example
	$.treeview = {};
	var CLASSES = ($.treeview.classes = {
		open: "open",
		closed: "closed",
		expandable: "expandable",
		expandableHitarea: "expandable-hitarea",
		lastExpandableHitarea: "lastExpandable-hitarea",
		collapsable: "collapsable",
		collapsableHitarea: "collapsable-hitarea",
		lastCollapsableHitarea: "lastCollapsable-hitarea",
		lastCollapsable: "lastCollapsable",
		lastExpandable: "lastExpandable",
		last: "last",
		hitarea: "hitarea"
	});
	
	// provide backwards compability
	$.fn.Treeview = $.fn.treeview;
	
})(jQuery);


/*********************************/

function parseTree(ul){
	var tags = [];
	ul.children("li").each(function(){
		var subtree =	$(this).children("ul");
		if(subtree.size() > 0)
			tags.push([$(this).attr("id"), parseTree(subtree)]);
		else
			tags.push($(this).attr("id"));
	});
	return tags;
}

function callItemTools(obj){
	var id = obj.parent('li').attr('id').substr(5);

    var url = obj.parent('li').data('url');

	if(obj.parent('li').hasClass('root')){
		$('#item_tools #turnUpItem, #item_tools #turnDownItem, #item_tools #delItem').hide();
	}else{
		$('#item_tools #turnUpItem, #item_tools #turnDownItem, #item_tools #delItem').show();
	};

	var tools = $('#tools_container').children('#item_tools');
	tools.find('a').attr('rel', id);
	
	if(obj.parent('li').hasClass('hided')){
		$('#item_tools #publishItem').show();
	}else{
		$('#item_tools #hideItem').show();
	};
	
	obj.children('.item_container_inner').append(tools);

    var c_count = 0;
    obj.parent('li').parent('ul').find('li').each(function(){
        c_count++;
    });

    $('#item_tools').find('.path-link').attr('href', url);

    obj.parent('li').parent('ul').find('li').find('#turnUpItemUnactive').hide();
    obj.parent('li').parent('ul').find('li').find('#turnDownItemUnactive').hide();

    if(c_count > 1){
        obj.parent('li').parent('ul').find('li').first().find('#turnUpItem').hide();
        obj.parent('li').parent('ul').find('li').first().find('#turnUpItemUnactive').show();
        obj.parent('li').parent('ul').find('li').first().find('#turnDownItem').show();
        obj.parent('li').parent('ul').find('li').first().find('#turnDownItemUnactive').hide();

        obj.parent('li').parent('ul').find('li').last().find('#turnDownItem').hide();
        obj.parent('li').parent('ul').find('li').last().find('#turnDownItemUnactive').show();
        obj.parent('li').parent('ul').find('li').last().find('#turnUpItem').show();
        obj.parent('li').parent('ul').find('li').last().find('#turnUpItemUnactive').hide();
    }else{
        obj.parent('li').parent('ul').find('li').find('#turnUpItemUnactive').show();
        obj.parent('li').parent('ul').find('li').find('#turnDownItemUnactive').show();
        obj.parent('li').parent('ul').find('li').last().find('#turnDownItem').hide();
        obj.parent('li').parent('ul').find('li').last().find('#turnUpItem').hide();
    };

    if(obj.parent('li').hasClass('root')){
        obj.parent('li').parent('ul').find('li').find('#turnUpItemUnactive, #turnDownItemUnactive, #turnDownItem, #turnUpItem').hide();
    };

    $('#item_tools').show();
};

function dropItemTools(obj){
    $('#item_tools').hide();
	var tools = obj.find('.item_container_inner').find('#item_tools');
	tools.find('a').removeAttr('rel');
	$('#tools_container').append(tools);
	$('#item_tools #publishItem, #item_tools #hideItem').hide();
};

var tree;
var drag_item;

$(function(){
	$("#tag_tree").treeview({
		animated: 100,
		collapsed: true,
		unique: false,
		persist: "cookie"
	});

    $('#tag_tree .hitarea').hover(function(){
        $(this).addClass('hovered');
    }, function(){
        $(this).removeClass('hovered');
    });
	
	$("#tag_tree li div.item_container").droppable({
		tolerance		: "pointer",
		hoverClass		: "tree_hover",
		drop			: function(event, ui){
            var dropped = ui.draggable;

            if(dropped.parent().parent().attr('id') != $(this).parent().attr('id')){
                if(confirm(messages.move_item)){
                    $('#tag_tree li div.item_container').removeClass('item_container_hovered');
                    dropItemTools($('#tag_tree li div.item_container'));

                    dropped.css({top: 0, left: 0});
                    var me = $(this).parent();
                    if(me == dropped)
                        return;
                    var subbranch = $(me).children("ul");
                    if(subbranch.size() == 0) {
                        me.find("div").after("<ul></ul>");
                        subbranch = me.find("ul");
                    }
                    var oldParent = dropped.parent();
                    subbranch.eq(0).append(dropped);
                    var oldBranches = $("li", oldParent);
                    if(oldBranches.size() == 0){
                        $(oldParent).remove();
                    }

                    moveItem($(this));
                };
            };
		}
	});

	$("#tag_tree li.tree_item").not('li.root').draggable({
		opacity: 0.7,
		revert: true,
		start: function(event, ui) {
			drag_item = $(this).attr('id').substr(5);
		}
	});
	
	$("#tag_tree li div.item_container").hover(function(){
		$(this).addClass('item_container_hovered');
		$(this).find('span.item_full_path').show();
		callItemTools($(this));

	},function(){
		$(this).removeClass('item_container_hovered');
		$(this).find('span.item_full_path').hide();
		dropItemTools($(this));
	});
});

function treeAjax(id, action, pid, data, no_reload){
	$.ajax({
		type: 'GET',
		url: '/admin/?option=structure&ajax=true&action='+action+'&'+'id='+id+'&pid='+pid+'&data='+data,
		success: function(data){
            if(!no_reload){
			    document.location.href = '/admin/?option=structure';
            };
		}
	});
};

function createOrderLine(item){
    var container = item.parent();
    var i = 0;
    var line = '';

    container.find('li').each(function(){
        i++;
        line += $(this).attr('id').substr(5, $(this).attr('id').length)+'='+i+';';
    });

    return line.substr(0, line.length-1);
}

function turnUpItem(obj){
    var item = obj.parent().parent().parent().parent().parent();
    var id = item.attr('id').substr(5, item.attr('id').length);

    item.insertBefore(item.prev());
    item.find('.item_container').removeClass('item_container_hovered');

    dropItemTools(item);

	treeAjax(id, 'up', false, createOrderLine(item), true);
};

function turnDownItem(obj){
    var item = obj.parent().parent().parent().parent().parent();
    var id = item.attr('id').substr(5, item.attr('id').length);
    
    item.insertAfter(item.next());
    item.find('.item_container').removeClass('item_container_hovered');

    dropItemTools(item);

    treeAjax(id, 'down', false, createOrderLine(item), true);
};

function publishItem(obj){
	var id = obj.rel;
    $('#hideItem').show();
    $('#publishItem').hide();
    $('#item_'+id).removeClass('hided').addClass('active');
	treeAjax(id, 'publish', false, false, true);
};

function dublicateItem(obj){
    var id = obj.rel;

    if(confirm('Создать копию?')){
        treeAjax(id, 'dublicate');
    };
};

function hideItem(obj){
	var id = obj.rel;
    $('#hideItem').hide();
    $('#publishItem').show();
    $('#item_'+id).removeClass('active').addClass('hided');
	treeAjax(id, 'hide', false, false, true);
};

function delItem(obj, message){
	var id = obj.rel;
	if(confirm(message)){
		treeAjax(id, 'delete');
	};
};

function addChildItem(obj){
	var id = obj.rel;
	treeAjax(id, 'addchild');
};

function moveItem(obj){
	var pid = obj.parent().attr('id').substr(5);
	treeAjax(drag_item, 'move', pid, false, false);
};