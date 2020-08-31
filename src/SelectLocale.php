<?php

namespace Day4\SwitchLocale;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class SelectLocale extends Field
{
    public $component = "select-locale";

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->locale = app()->getLocale();
        $this->withMeta([
            "locales" => SwitchLocale::getLocales(),
            "locale" => $this->locale
        ]);
    }
}
