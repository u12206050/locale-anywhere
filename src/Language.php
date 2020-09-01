<?php

namespace Day4\SwitchLocale;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class Language extends Field
{
    public $component = "language";
    public $locale;

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->locale = app()->getLocale();
        $this->withMeta([
            "locales" => SwitchLocale::getLocales(),
            "current" => $this->locale
        ]);
    }

    public function fill(NovaRequest $request, $model)
    {
        return;
    }

    public function resolveAttribute($resource, $attribute)
    {
        return [
            "locale" => array_keys($resource->getTranslationsArray()),
            "isTranslated" => $resource->hasTranslation($this->locale)
        ];
    }
}
