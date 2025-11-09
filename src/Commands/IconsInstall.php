<?php

namespace Xylph\Icons\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class IconsInstall extends Command
{
    protected $signature = 'icons:install {library?} {--all}';

    protected $description = 'Install icon SVG files from vendor packages to project';

    public function handle()
    {
        $libraries = config('icons.libraries');

        if ($this->option('all')) {
            // 全ライブラリをインストール
            foreach (array_keys($libraries) as $library) {
                $this->installLibrary($library);
            }
        } elseif ($libraryName = $this->argument('library')) {
            // 指定されたライブラリのみ
            $this->installLibrary($libraryName);
        } else {
            // デフォルトライブラリのみ
            $defaultLibrary = config('icons.default_library');
            $this->installLibrary($defaultLibrary);
        }

        return Command::SUCCESS;
    }

    protected function installLibrary(string $libraryName): void
    {
        $libraries = config('icons.libraries');

        if (!isset($libraries[$libraryName])) {
            $this->error("Library '{$libraryName}' not found in config/icons.php");
            return;
        }

        $config = $libraries[$libraryName];
        $sourcePath = base_path($config['source']);
        $destPath = base_path($config['destination']);

        if (!File::exists($sourcePath)) {
            $this->error("Source path not found: {$sourcePath}");
            return;
        }

        $this->info("Installing {$libraryName} icons...");

        // 既存のディレクトリをクリア
        if (File::exists($destPath)) {
            File::deleteDirectory($destPath);
        }
        File::makeDirectory($destPath, 0755, true);

        // SVGファイルをコピー
        $files = File::glob($sourcePath . '/*.svg');
        $copied = 0;

        foreach ($files as $file) {
            $filename = basename($file);
            File::copy($file, $destPath . '/' . $filename);
            $copied++;
        }

        $this->info("✓ Copied {$copied} SVG files to {$config['destination']}");
        $this->info("✓ {$libraryName} icons installed successfully!");
    }
}
