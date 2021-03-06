<?php

namespace Digia\GraphQL\Validation;

use League\Container\ServiceProvider\AbstractServiceProvider;

class ValidationProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        ValidatorInterface::class,
    ];

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->container->share(ValidatorInterface::class, Validator::class);
    }
}
