<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CreateApp extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-app {nameApp}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle() : void
    {
        /**
         * Create new app module
         */
        $nameApp = $this->argument('nameApp');
        if(file_exists(base_path() . '/apps/' . $nameApp )) {
            $this->components->error('App ' . $nameApp . ' already exists.');
            return;
        }
        $namespace = "Apps\\" . $nameApp . "\\Controllers";
        @mkdir(base_path('apps/' . $nameApp));
        @mkdir(base_path('apps/' . $nameApp . '/Controllers'));
        @mkdir(base_path('apps/' . $nameApp . '/Models'));
        @mkdir(base_path('apps/' . $nameApp . '/routes'));
        @mkdir(base_path('apps/' . $nameApp . '/views'));
        @mkdir(base_path('apps/' . $nameApp . '/src/Components'), 0777, true);

        $fileStubBaseController = $this->getReplaceData(['{{ namespace }}'], [$namespace], 'base_controller');
        $this->saveFile($nameApp . '/Controllers/Controller.php', $fileStubBaseController);

        $fileStubRoute = $this->getReplaceData(['{{ nameapp }}'], [$nameApp], 'route');
        $this->saveFile($nameApp . '/routes/' . $nameApp . '.php', $fileStubRoute);

        $fileStub = $this->getReplaceData(
            ['{{ namespace }}', '{{ nameclass }}', '{{ nameapp }}'],
            [$namespace, $nameApp, $nameApp],
            'controller'
        );
        $this->saveFile($nameApp . '/Controllers/' . $nameApp . 'Controller.php', $fileStub);

        $fileStubHomeComponent = $this->getReplaceData([], [], 'vue/home');
        $this->saveFile($nameApp . '/src/Components/Home.vue', $fileStubHomeComponent);

        $fileStubAboutComponent = $this->getReplaceData(['{{ nameapp }}'], [$nameApp], 'vue/about');
        $this->saveFile($nameApp . '/src/Components/About.vue', $fileStubAboutComponent);

        $fileStubRouterVue = $this->getReplaceData(['{{ nameapp }}'], [$nameApp], 'vue/router');
        $this->saveFile($nameApp . '/src/router.js', $fileStubRouterVue);

        $fileStubMainVue = $this->getReplaceData([], [], 'vue/main');
        $this->saveFile($nameApp . '/src/main.js', $fileStubMainVue);

        $fileStubIndexTemplate = $this->getReplaceData(['{{ nameapp }}'], [$nameApp], 'index.blade');
        $this->saveFile($nameApp . '/views/index.blade.php', $fileStubIndexTemplate);

        $this->components->info('App ' . $nameApp . ' created successfully.');
    }

    protected function getStub() : string
    {
        return base_path() . '/resources/stubs/controller.stub';
    }

    private function getContentStub($name): string {
        return file_get_contents(
            base_path() . '/resources/stubs/' . $name . '.stub'
        );
    }

    private function getReplaceData($search, $values, $stub): string {
        return str_replace(
            $search,
            $values,
            $this->getContentStub($stub)
        );
    }
    private function saveFile($path, $content): void {
        file_put_contents(
            base_path() . '/apps/' . $path,
            $content
        );
    }
}
