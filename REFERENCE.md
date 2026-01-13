# xylph-icons Reference

SVG icon component for Laravel Blade. Supports multiple icon libraries and styles.

## Usage

```blade
{{-- Basic --}}
<x-i type="user" />

{{-- With style variant --}}
<x-i type="home" variant="outline" />

{{-- With Tailwind classes --}}
<x-i type="settings" class="w-6 h-6 text-primary" />

{{-- Different library --}}
<x-i type="arrow-right" library="heroicons" variant="solid" />
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| type | string | required | Icon name (e.g., 'user', 'home', 'settings') |
| variant | string | config default | Style variant (e.g., 'bold-duotone', 'outline') |
| library | string | config default | Icon library (e.g., 'solar', 'heroicons') |
| class | string | '' | CSS/Tailwind classes |

## Solar Icon Styles

Default library: **Solar Icons**

| Style | Description |
|-------|-------------|
| bold-duotone | Bold with two-tone colors (default) |
| bold | Solid bold icons |
| broken | Broken line style |
| line-duotone | Line with two-tone |
| linear | Simple line icons |
| outline | Outline style |

## Configuration

Publish config to customize:

```bash
php artisan vendor:publish --tag=xylph-icons-config
```

`config/icons.php`:

```php
return [
    'default_library' => 'solar',
    'default_style' => 'bold-duotone',

    'libraries' => [
        'solar' => [
            'path' => 'resources/icons/solar',
            'styles' => ['bold-duotone', 'bold', 'broken', 'line-duotone', 'linear', 'outline'],
            'pattern' => '{name}-{style}.svg',
        ],
    ],
];
```

## Installation

```bash
# Install icons to project
php artisan icons:install

# Install specific library
php artisan icons:install solar

# Install all libraries
php artisan icons:install --all
```

## Examples

```blade
{{-- Navigation icons --}}
<x-i type="home" class="w-5 h-5" />
<x-i type="user" class="w-5 h-5" />
<x-i type="settings" class="w-5 h-5" />

{{-- Action icons --}}
<x-i type="add" class="w-4 h-4" />
<x-i type="trash" class="w-4 h-4 text-error" />
<x-i type="pen" class="w-4 h-4" />

{{-- Status icons --}}
<x-i type="check-circle" class="w-5 h-5 text-success" />
<x-i type="info-circle" class="w-5 h-5 text-info" />
<x-i type="danger" class="w-5 h-5 text-warning" />

{{-- Arrows --}}
<x-i type="alt-arrow-left" class="w-4 h-4" />
<x-i type="alt-arrow-right" class="w-4 h-4" />
<x-i type="alt-arrow-up" class="w-4 h-4" />
<x-i type="alt-arrow-down" class="w-4 h-4" />
```

## Adding Custom Libraries

1. Add SVG files to `resources/icons/{library}/`
2. Update `config/icons.php`:

```php
'libraries' => [
    'custom' => [
        'path' => 'resources/icons/custom',
        'styles' => ['default'],
        'pattern' => '{name}.svg',
    ],
],
```

3. Use: `<x-i type="icon-name" library="custom" />`
