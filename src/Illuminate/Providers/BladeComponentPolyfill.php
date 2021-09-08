<?php

namespace Illuminate\Providers;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use ReflectionClass;
use ReflectionException;
use Spatie\BladeX\BladeXServiceProvider;
use Spatie\BladeX\Exceptions\CouldNotRegisterComponent;
use Spatie\BladeX\Facades\BladeX;
use Symfony\Component\Finder\Finder;

class BladeComponentPolyfill extends BladeXServiceProvider
{
    /**
     * @throws CouldNotRegisterComponent
     * @throws ReflectionException
     */
    public function boot()
    {
        parent::boot();

        BladeX::prefix('x');

        $finder = new Finder();
        $finder->files()->name('*.php')->in(base_path().'/app/View/Components');


        foreach ($finder as $file) {
            $className = $file->getBasename('.php');
            $classFullName = sprintf("%sView\\Components\\%s", $this->app->getNamespace(), $className);
            if (is_subclass_of($classFullName, Component::class)) {
                /** @var Component $component */
                $component = (new ReflectionClass($classFullName))->newInstanceWithoutConstructor();
                BladeX::component($component->render())
                    ->tag(Str::kebab($className))
                    ->viewModel($classFullName);
            }
        }
    }
}