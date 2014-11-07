Laravel Flash Notifications
===========================

Flash Notifications Helper for Laravel 5

## Install

### Install via composer

Add dependency to your `composer.json` file and run `composer update`.

```
require: {
    "szykra/notifications": "0.3.*@dev"
}
```

### Configure Laravel

Add ServiceProvider and Alias _(Facade)_ to your `config/app.php` file:

```php
'Szykra\Notifications\NotificationServiceProvider'
```

```php
'Flash' => 'Szykra\Notifications\Flash'
```

### Include default alert view to your layout

Package default provides _bootstrap ready_ alert view. Just include `notifications::flash` file to your main layout in blade:

```php
@include('notifications::flash')
````

You can create own container for flash notifications with own custom styles. See _Custom alert view_ section.

## Usage

You can push flash message ever you need by facade `Flash`. It provides 4 alert types:

* success
* error
* warning
* info

```php
Flash::info('Your alert message here!');
```

~~Method `push()` exists because you can push more than one alert at the same time. _See below_.~~

Every alert method takes 1 or 2 arguments. If you give one parameter it will be _message_. If you provide two parameters, first will be _title_ and second will be _message_.

```php
Flash::success('User has been updated successfully.');
Flash::error('Oh snap!', 'Something went wrong. Please try again for a few seconds.');
```

## Custom alert view

Package default provides _bootstrap ready_ view for alerts. You can define own style for it. 
Just create new _blade_ template file!

```php
@if(Session::has('flash.alerts'))
    @foreach(Session::get('flash.alerts') as $alert)

        <div class='alert alert-{{ $alert['level'] }}'>
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>

            @if( ! empty($alert['title']))
                <div><strong>{{ $alert['title'] }}</strong></div>
            @endif

            {{ $alert['message'] }}
        </div>

    @endforeach
@endif
```

All alerts will be in `flash.alerts` session variable. Single alert looks like:

```php
[
  'title' => 'Title',
  'message' => 'Example message',
  'level' => 'success'
]
```

_Level_ for all alerts are following:

* `Flash::success` has level _success_
* `Flash::error` has level _danger_
* `Flash::warning` has level _warning_
* `Flash::info` has level _info_

## License

The MIT License. Copyright (c) 2014 Szymon Krajewski.
