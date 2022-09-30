<?php

namespace Schreft\Conship;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CommandConshipGenerator extends Command
{
    protected $signature = 'consts:generate
                            {path=./resources/js/consts.js : Path to the generated JavaScript file.}';

    protected $description = 'Generate a JavaScript file containing Constants from your php files.';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $path = $this->argument('path');
        $generatedRoutes = $this->generate();

        $this->makeDirectory($path);
        $this->files->put(base_path($path), $generatedRoutes);

        $this->info('File generated!');
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory(dirname(base_path($path)))) {
            $this->files->makeDirectory(dirname(base_path($path)), 0755, true, true);
        }

        return $path;
    }

    private function generate()
    {
        $conststojs = (new Conststojs());

        $output = config('conststojs.output', File::class);

        return (string) new $output($conststojs);
    }
}
