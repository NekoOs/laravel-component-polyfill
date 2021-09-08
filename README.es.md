# Laravel Component Polyfill
Soporte para Laravel 5.8 o menor

Lenguajes: [English](README.md) | Español

# Beneficios
- Puede usar componentes como si estuviera en la version Laravel 8.x desde su vieja version 
  5.8, en situaciones donde la migración de su proyecto es imposible.
- Puede sentirse seguro de realizar una migración posteriormente con solo remover esta librería y adoptando la nueva 
  version del Framework.

# Historia de fondo

Hace un tiempo [Laravel Blade-X](https://spatie.be/docs/laravel-blade-x/v2/introduction) nos presentaba una propuesta de 
componentes con esteroides y luego de Laravel 7 la adoptó de manera oficial dentro del Framework
como [Blade Components](https://laravel.com/docs/8.x/blade#components), sin embargo, esto causo que SPATIE retirará el
soporte y además los espacios de nombres de SPATIE difieren a los de Laravel. 

Por lo tanto, me encargué de crear este polyfill para asegurarme de que las interfaces sean coincidentes y aprovechar la 
potencia de `Blade-X`.

## Instalación

### Requerimientos
- PHP >= 7.0

Usted puede instalar el paquete via Composer:

```bash
composer require nekoos/laravel-components-polyfill
```
Este paquete se registrará automáticamente.

## Documentación

Vea [Laravel Blade Components](https://laravel.com/docs/8.x/blade#components) para obtener información del uso de
componentes:   

```php
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    
    public $message;
    
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render()
    {
        return 'components.alert';
    }
}
```

```php
<x-alert type="error" :message="$message"/>
```

Notará que hay único cambio significativo al momento es el retorno del método `render`, en Laravel este método retorna 
una instancia de `View` y no el nombre del fichero `blade`, sin embargo usted puede sobreescribir la función `view()`
para que a futuro se facilite la migración a la versión actualizada del Framework instalando este pequeño plugin que 
hace el truco 

## License

Licencia MIT (MIT). Por favor veá [Archivo de licencia](LICENSE.md) para más información.