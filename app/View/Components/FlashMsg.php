<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FlashMsg extends Component
{
    public $msg;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param string $msg
     * @param string $type
     * @return void
     */
    public function __construct($msg, $type = 'success')
    {
        $this->msg = $msg;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.flash-msg');
    }
}
