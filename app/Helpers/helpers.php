<?php

const HEADER_MENU_ACTIVE_CLASS = 'menu-link__active';

if(!function_exists('activeMainLink'))
{
    function activeMainLink()
    {
        if(request()->is('/'))
        {
            return HEADER_MENU_ACTIVE_CLASS;
        }

        return '';
    }
}

if(!function_exists('activeArticleLink'))
{
    function activeArticleLink()
    {
        if(Route::current()->getName() == 'article.index')
        {
            return HEADER_MENU_ACTIVE_CLASS;
        }

        return '';
    }
}
