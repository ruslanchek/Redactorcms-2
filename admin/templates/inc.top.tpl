<div class="top overall_padding">
    <a href="/admin/" title="{$main->getText('top', 'logo_title')}" class="logo"></a>
    <div class="arrow a1"></div>
    <div class="options">
        <a class="site" href="/" title="{$main->getText('top', 'top_domain')}">{$main->domain}</a>
        
        <div class="arrow a2"></div>

        {if $login->userdata.ip != '0'}
            <span class="secure" title="{$main->getText('top', 'ip_attached')}: {$login->userdata.ip_conv}"></span>
        {/if}

        <span class="item">
            {if $main->module_name == 'personal' && $main->module_mode == 'settings'}
                <b>{$login->userdata.name}</b> ({$login->userdata.login})
            {else}
                <a href="/admin/?option=personal&suboption=settings" title="{$main->getText('top', 'profile_config')}">{$login->userdata.name}</a> ({$login->userdata.login})
            {/if}
        </span>

        <span class="item">
            {if $main->module_name == 'personal' && $main->module_mode == 'password_change'}
                <b>{$main->getText('top', 'password_change_text')}</b>
            {else}
                <a href="/admin/?option=personal&suboption=password_change" title="{$main->getText('top', 'password_change_title')}">{$main->getText('top', 'password_change_text')}</a>
            {/if}
        </span>
    </div>
    <div class="options_r">
        <span class="item">
            <a class="exit" href="javascript:void(0)" onclick="confirmMessage('{$main->getText('top', 'exit_confirm_text')}', '/admin/?action=exit')">{$main->getText('top', 'exit_text')}</a>
        </span>
    </div>
</div>