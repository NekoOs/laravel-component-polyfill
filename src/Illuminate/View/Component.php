<?php

namespace Illuminate\View;

use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use Spatie\BladeX\Exceptions\CouldNotRegisterComponent;
use Spatie\BladeX\ViewModel;

abstract class Component extends ViewModel
{

    /**
     * @throws CouldNotRegisterComponent
     * @throws ReflectionException
     */
    public static function declare(): \Spatie\BladeX\Component
    {
        /** @var Component $component */
        $component = (new ReflectionClass(static::class))->newInstanceWithoutConstructor();
        $component = new \Spatie\BladeX\Component($component->render(), Str::snake(static::class));
        return $component->viewModel(static::class);
    }

    abstract public function render();

    protected function ignoredMethods(): array
    {
        return array_merge(
            parent::ignoredMethods(),
            ['render'],
            $this->ignore
        );
    }
}