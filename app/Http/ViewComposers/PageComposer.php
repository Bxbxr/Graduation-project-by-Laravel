<?php
namespace App\Http\ViewComposers;

use App\Models\Page;
use Illuminate\View\View;
use Psy\CodeCleaner\ReturnTypePass;

class PageComposer
{
    protected $pages;

    public function __construct(Page $page)
    {
        $this->pages = $page;
    }
    public function compose(View $view)
    {
        return $view->with('pages' , $this->pages->all());
    }
}