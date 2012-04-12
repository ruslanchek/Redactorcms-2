{if $main->module_mode == 'list'}
	<ul class="header_selections">
	    <li class="selected">
	        <span>
	            <a rel="1" class="dashed" href="javascript:void(0)">{$main->getText('sections', 'addition_menu_user_defined_sections')}</a>
	        </span>
	    </li>
	    <li>
	        <span>
	            <a rel="2" class="dashed" href="javascript:void(0)">{$main->getText('sections', 'addition_menu_embedded_sections')}</a>
	        </span>
	    </li>
	</ul>
{/if}