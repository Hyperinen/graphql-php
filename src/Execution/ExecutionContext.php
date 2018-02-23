<?php

namespace Digia\GraphQL\Execution;

use Digia\GraphQL\Error\GraphQLError;
use Digia\GraphQL\Language\AST\Node\FragmentDefinitionNode;
use Digia\GraphQL\Language\AST\Node\OperationDefinitionNode;
use Digia\GraphQL\Type\Schema\Schema;

class ExecutionContext
{
    /**
     * @var Schema
     */
    protected $schema;

    /**
     * @var FragmentDefinitionNode[]
     */
    protected $fragments;

    /**
     * @var mixed
     */
    protected $rootValue;

    /**
     * @var mixed
     */
    protected $contextValue;

    /**
     * @var []
     */
    protected $variableValues;

    /**
     * @var mixed
     */
    protected $fieldResolver;

    /**
     * @var OperationDefinitionNode
     */
    protected $operation;

    /**
     * @var GraphQLError[]
     */
    protected $errors;

    /**
     * ExecutionContext constructor.
     * @param Schema $schema
     * @param array $fragments
     * @param $rootValue
     * @param $contextValue
     * @param $variableValues
     * @param $fieldResolver
     * @param OperationDefinitionNode $operatgion
     * @param array $errors
     */
    public function __construct(
        Schema $schema,
        array $fragments,
        $rootValue,
        $contextValue,
        $variableValues,
        $fieldResolver,
        OperationDefinitionNode $operation,
        array $errors)
    {
        $this->schema         = $schema;
        $this->fragments      = $fragments;
        $this->rootValue      = $rootValue;
        $this->contextValue   = $contextValue;
        $this->variableValues = $variableValues;
        $this->fieldResolver  = $fieldResolver;
        $this->operation      = $operation;
        $this->errors         = $errors;
    }


    /**
     * @return OperationDefinitionNode
     */
    public function getOperation(): OperationDefinitionNode
    {
        return $this->operation;
    }

    /**
     * @return Schema
     */
    public function getSchema(): Schema
    {
        return $this->schema;
    }

    /**
     * @param GraphQLError $error
     * @return ExecutionContext
     */
    public function addError(GraphQLError $error)
    {
        $this->errors[] = $error;
        return $this;
    }
}