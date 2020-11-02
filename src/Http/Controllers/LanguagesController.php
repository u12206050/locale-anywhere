<?php

namespace Day4\SwitchLocale\Http\Controllers;

use Illuminate\Routing\Controller;
use Day4\SwitchLocale\SwitchLocale;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Controllers\DeletesFields;
use Laravel\Nova\Nova;
use Laravel\Nova\Actions\ActionEvent;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Support\Facades\Cache;
use DB;

class LanguagesController extends Controller
{
    use DeletesFields;

    public function languages()
    {
        $locales = SwitchLocale::getLocales();
        return response()->json([
            'locales' => $locales,
            'allowed' => optional(auth()->user())->allowedAllLocale() ? $locales : optional(auth()->user())->locale
        ]);
    }

    public function cacheLocale(Request $request)
    {
        $locale = $request->input("locale");
        $prefix = optional(auth()->user())->id;

        Cache::forever($prefix.".locale", $locale);
        app()->setLocale($locale);
        return $locale;
    }

    public function delete(Request $request)
    {
        $locale = Cache::has("locale") ? Cache::get("locale") : app()->getLocale();

        $resourceClass = Nova::resourceForKey($request->get("resourceName"));
        if (!$resourceClass) {
            abort(403, "Missing resource class");
        }

        $modelClass = $resourceClass::$model;
        $resource = $modelClass::find($request->get("resourceId"));
        if (!$resource) {
            abort(404, "Missing resource");
        }

        if (! $resource->hasTranslation($locale)) {
            return response()->json(["status" => false, "message" => "Resource not translated"]);
        }

        $translationsCount = $resource->translations()->count();

        // If translations count === 1 then forget the model completely
        if ($translationsCount > 1 && $resource->deleteTranslations($locale)) {
            return response()->json(["status" => true]);
        } elseif ($translationsCount === 1) {
            if (in_array(Actionable::class, class_uses_recursive($resource))) {
                $resource->actions()->delete();
            }

            $resource->delete();

            DB::table('action_events')->insert(
                ActionEvent::forResourceDelete($request->user(), collect([$resource]))
                    ->map->getAttributes()->all()
            );

            return response()->json(["status" => true]);
        }

        abort("Error saving");
    }
}
