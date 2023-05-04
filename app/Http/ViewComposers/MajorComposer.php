<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Major;

class MajorComposer
{
    protected $majors;

    public function __construct(Major $majors)
    {
        $this->majors = $majors;
    }
    public function compose(View $view)
    {
        // return $view->with('majors', $this->majors->all());
    }

}