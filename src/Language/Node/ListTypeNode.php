<?php

namespace Digia\GraphQL\Language\Node;

use Digia\GraphQL\Language\Location;

class ListTypeNode extends AbstractNode implements TypeNodeInterface
{
    use TypeTrait;

    /**
     * FloatValueNode constructor.
     *
     * @param TypeNodeInterface $type
     * @param Location|null     $location
     */
    public function __construct(TypeNodeInterface $type, ?Location $location)
    {
        parent::__construct(NodeKindEnum::LIST_TYPE, $location);

        $this->type = $type;
    }

    /**
     * @inheritdoc
     */
    public function toAST(): array
    {
        return [
            'kind' => $this->kind,
            'type' => $this->getTypeAST(),
            'loc'  => $this->getLocationAST(),
        ];
    }
}
