<?php
namespace App\Http\ViewComposers;

use App\Models\PlatformPgae;
use Illuminate\View\View;
use Psy\CodeCleaner\ReturnTypePass;

class PlatformPageComposer
{
    protected $allpages;

    public function __construct(PlatformPgae $allpage)
    {
        $this->allpages = $allpage;
    }
    public function compose(View $view)
    {
        return $view->with('allpages' , $this->allpages->all());
    }
}