<!-- Screenshot -->
<p align="center">
    <img src="resources/example.png" alt="Code example">
</p>

<!-- Badges -->
<p align="center">
  <img src="resources/build.svg" alt="Build">
  <img src="resources/coverage.svg" alt="Coverage">
  <img src="resources/version.svg" alt="Version">
  <img src="resources/license.svg" alt="License">
</p>

# Elevate

This package provides a library of macro functions for various Laravel components. Use them to augment the existing functionality offered by the likes of Blade, Collections, Stringable, and so on.

Initially, only a handful of macros are available. That said, the library has been designed so that it can handle dozens or even hundreds of macros being added over time. Each individual macro may also be disabled, thus ensuring that Laravel isn't spending precious time registering macros you are not using.

## Installation

Pull in the package using composer

```bash
composer require mattkingshott/elevate
```

## Configuration

If you wish to make all of the macros available to your application, then you can skip this section. Otherwise, you should publish the configuration file using Artisan:

```bash
php artisan vendor:publish --provider="Elevate\ServiceProvider"
```

You may wish to disable a particular macro for one of the following reasons:

1. **Performance** - if you aren't using the macro, or even the class itself, then disabling it will net a tiny performance boost.
2. **Conflicts** - if you already have a macro for a class, or wish to create one with the same name, you should disable the Elevate macro to prevent conflicts.

To prevent a macro being registered, simply set its value to `false`:

```php
'Blade' => [
    'Blank'  => true,
    'Filled' => false,
];
```

## Available macros

The following macros are currently available:

| Macro          | Class      | Description
| -------------- | ---------- | ----------------------------------------------------------------------------------------------------------------------------------------------------
| filled         | Blade      | Enables the use of @filled() and @endfilled. Uses the filled() global helper under the hood. You may also use @else e.g. @filled() @else @endfilled
| blank          | Blade      | Enables the use of @blank() and @endblank. Uses the blank() global helper under the hood. You may also use @else e.g. @blank() @else @endblank
| get            | Stringable | Adds a more friendly helper to access a fluent string's content e.g. Str::of('test')->get()
| after          | Collection | Get the next item from the collection
| at             | Collection | Retrieve an item at an index
| second         | Collection | Retrieve item at the second index
| third          | Collection | Retrieve item at the third index
| fourth         | Collection | Retrieve item at the fourth index
| fifth          | Collection | Retrieve item at the fifth index
| sixth          | Collection | Retrieve item at the sixth index
| seventh        | Collection | Retrieve item at the seventh index
| eighth         | Collection | Retrieve item at the eighth index
| ninth          | Collection | Retrieve item at the ninth index
| tenth          | Collection | Retrieve item at the tenth index
| before         | Collection | Get the previous item from the collection
| carbonize      | Collection | Convert all collection items into instances of CarbonImmutable
| chunkBy        | Collection | Chunks the values from a collection into groups as long the given callback is true
| collectBy      | Collection | Get an item at a given key, and collect it
| eachCons       | Collection | Get the following consecutive neighbours in a collection from a given chunk size
| extract        | Collection | Extract keys from a collection
| filterMap      | Collection | Map a collection and remove falsy values in one go
| firstOrFail    | Collection | Get the first item or throw an exception
| fromPairs      | Collection | Transform a collection into an associative array form collection item
| glob           | Collection | Returns a collection of a `glob()` result
| groupByModel   | Collection | Similar to `groupBy`, but groups the collection by an Eloquent model
| head           | Collection | Retrieves first item from the collection
| ifAny          | Collection | Executes the passed callable if the collection isn't empty
| ifEmpty        | Collection | Executes the passed callable if the collection is empty
| none           | Collection | Checks whether a collection doesn't contain any occurrences of a given item, key-value pair, or passing truth test
| paginate       | Collection | Create a `LengthAwarePaginator` instance for the items in the collection
| parallelMap    | Collection | Identical to `map` but each item in the collection will be processed in parallel
| pluckToArray   | Collection | Returns array of values of a given key
| prioritize     | Collection | Move elements to the start of the collection
| rotate         | Collection | Rotate the items in the collection with given offset
| sectionBy      | Collection | Splits a collection into sections grouped by a given key
| simplePaginate | Collection | Create a `Paginator` instance for the items in the collection
| sliceBefore    | Collection | Slice the values out from a collection before the given callback is true
| tail           | Collection | Extract the tail from a collection (everything except the first element)
| toPairs        | Collection | Transform a collection into an array with pairs
| transformKeys  | Collection | Performs a transform operation, but on the collection's keys instead of its values
| transpose      | Collection | Rotate a multidimensional array, turning the rows into columns and the columns into rows
| trim           | Collection | Maps over each item in the collection and calls PHP's trim() method on it
| validate       | Collection | Returns true if the given callback returns true for every item
| withSize       | Collection | Create a new collection with the specified amount of items

## Contributing

Thank you for considering a contribution to Elevate. You are welcome to submit a PR containing a new macro or improvements to existing ones, however please also be sure to include a test or tests where appropriate.

## Support the project

If you'd like to support the development of Elevate, then please consider [sponsoring me](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YBEHLHPF3GUVY&source=url). Thanks so much!

## Credits

The library includes macros obtained from the following open-source packages:

* [Laravel Collection Macros](https://github.com/spatie/laravel-collection-macros) by [Spatie](https://spatie.be)
* [Laravel Helpers](https://github.com/sebastiaanluca/laravel-helpers) by [sebastiaanluca](https://github.com/sebastiaanluca)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.