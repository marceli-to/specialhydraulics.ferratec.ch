<?php
namespace App\View\Components;
use Illuminate\View\Component;

class ButtonSubmit extends Component
{
  /**
   * Name
   *
   * @var string
   */
  public $name;

  /**
   * Label
   *
   * @var string
   */
  public $label;

  /**
   * Create a new component instance.
   *
   * @param $name
   * @param $label
   * @param $class
   * @param $type
   * @return void
   */
  public function __construct($name, $label)
  {
    $this->name     = $name;
    $this->label    = $label;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('web.components.form.button-submit');
  }
}
