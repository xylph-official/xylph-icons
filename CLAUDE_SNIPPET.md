
## xylph-icons

SVG icon component. Default: Solar Icons.

### Usage

```blade
<x-i type="icon-name" />
<x-i type="icon-name" variant="outline" class="w-5 h-5 text-primary" />
```

### Props

| Prop | Default | Description |
|------|---------|-------------|
| type | required | Icon name |
| variant | 'bold-duotone' | Style: bold-duotone, bold, broken, line-duotone, linear, outline |
| library | 'solar' | Icon library |
| class | '' | CSS classes |

### Common Icons

```blade
{{-- Navigation --}}
<x-i type="home" />
<x-i type="user" />
<x-i type="settings" />
<x-i type="menu-kebab" />

{{-- Actions --}}
<x-i type="add" />
<x-i type="pen" />
<x-i type="trash" />
<x-i type="upload" />
<x-i type="download" />

{{-- Arrows --}}
<x-i type="alt-arrow-left" />
<x-i type="alt-arrow-right" />
<x-i type="alt-arrow-up" />
<x-i type="alt-arrow-down" />

{{-- Status --}}
<x-i type="check-circle" />
<x-i type="close-circle" />
<x-i type="info-circle" />
<x-i type="danger-triangle" />
```
