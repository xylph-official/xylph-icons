@props(['type', 'variant' => null, 'library' => null])

@php
    // 優先順位: props > config default
    $iconLibrary = $library ?? config('icons.default_library', 'solar');
    $iconVariant = $variant ?? config('icons.default_style', 'bold-duotone');

    // ライブラリ設定からパスを取得
    $libraryConfig = config('icons.libraries.' . $iconLibrary);
    $libraryPath = $libraryConfig['path'] ?? 'vendor/xylph-official/xylph-icons/resources/icons/' . $iconLibrary;

    // SVGファイルパスを構築
    $svgPath = base_path($libraryPath . '/' . $type . '-' . $iconVariant . '.svg');

    if (!file_exists($svgPath)) {
        $svg = '<!-- Icon not found: ' . $iconLibrary . '/' . $type . '-' . $iconVariant . ' -->';
    } else {
        $svg = file_get_contents($svgPath);

        // SVGタグに属性をマージ
        $svg = preg_replace(
            '/<svg/',
            '<svg ' . $attributes->except(['type', 'variant', 'library']),
            $svg,
            1
        );
    }
@endphp

{!! $svg !!}
