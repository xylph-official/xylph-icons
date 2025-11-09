# Icon System

Unified icon system for Laravel supporting multiple icon libraries with easy switching between variants.

## Features

- 🎨 **7,404 Solar Icons** (1,234 icons × 6 variants)
- ⚡ **Direct SVG Loading** - High performance, single-step rendering
- 🔧 **Simple API** - Clean, intuitive component syntax
- 🎯 **Type-safe** - Explicit type and variant parameters
- 📦 **Zero Configuration** - Works out of the box
- 🔌 **Extensible** - Support for multiple icon libraries

## Installation

```bash
composer require akihikotakai/icon-system
```

## Usage

### Basic Usage

```blade
<x-i type="home" class="w-8 h-8" />
```

### With Variant

```blade
<x-i type="heart" variant="linear" class="w-6 h-6" />
<x-i type="star" variant="bold" class="w-8 h-8 text-yellow-500" />
```

### Available Variants

- `bold-duotone` (default)
- `bold`
- `broken`
- `line-duotone`
- `linear`
- `outline`

### Configuration

Publish the config file (optional):

```bash
php artisan vendor:publish --tag=icon-system-config
```

Set default variant in `.env`:

```env
ICON_DEFAULT_LIBRARY=solar
ICON_DEFAULT_STYLE=bold-duotone
```

## API Reference

### Component Parameters

| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|
| `type` | string | ✅ | - | Icon type (home, heart, etc.) |
| `variant` | string | ❌ | bold-duotone | Style variant |
| `library` | string | ❌ | solar | Icon library |
| `class` | string | ❌ | - | CSS classes |

## Examples

```blade
<!-- Different variants -->
<x-i type="home" variant="bold-duotone" class="w-8 h-8" />
<x-i type="home" variant="bold" class="w-8 h-8" />
<x-i type="home" variant="linear" class="w-8 h-8" />

<!-- With Tailwind classes -->
<x-i type="heart" class="w-6 h-6 text-red-500" />
<x-i type="star" class="w-4 h-4 text-yellow-400" />

<!-- Default variant -->
<x-i type="user" class="w-10 h-10" />
```

## License

MIT

## Credits

- Solar Icons by [Solar Icons](https://github.com/480-Design/Solar-Icon-Set) (MIT License)
- Package by Akihiko Takai
