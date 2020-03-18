# Laravel Nova Switch Locale Tool

For [Astrotomic's Laravel Translatable](https://docs.astrotomic.info/laravel-translatable/)

This tool provides a nice header dropdown to quickly switch between locales. Locale is cached per user and sets the main app locale.

It also provides a `Language` field which gives you the status of the translation on a specific resource.

**NOTE** If you use *Spatie's Laravel Translatable* then use (Laravel Nova Locale Anywhere Tool)[https://github.com/slovenianGooner/locale-anywhere]

## Installation

```
composer require day4/switch-locale
```

## Usage

To begin using this, you must first register the tool in `NovaServiceProvider` under tools. The tool utilises [Astrotomic's Laravel Translatable](https://docs.astrotomic.info/laravel-translatable/) package.

```
public function tools()
{
    return [
        new SwitchLocale([
            "locales" => [
                "en" => "English",
                "de" => "German"
            ],
            "useFallback" => false,
            "customDetailToolbar" => false //optional
        ])
    ];
}
```

### Define the field

You can then define the field in the resource.

```
use Day4\SwitchLocale\Language;

    Language::make(__('Language'))
```

![](/screens/formField.png)
![](/screens/detailField.png)

### Dropdown

The package provides a switch for the languages that you have to insert into Nova's layout file. You can do that by overwriting the `layout.blade.php` file and insert it after the user dropdown.

```
…
<dropdown class="ml-auto h-9 flex items-center dropdown-right">
    @include('nova::partials.user')
</dropdown>

<switch-locale-dropdown class="ml-6"></switch-locale-dropdown>
…
```

![](/screens/dropdown.png)

### Delete translation toolbar button

The package provides a CustomDetailToolbar component that you can toggle via configuration. Optionally, you can also only grab the `<delete-toolbar-button>` from the package and paste it into your own custom detail toolbar.

![](/screens/toolbar.png)

