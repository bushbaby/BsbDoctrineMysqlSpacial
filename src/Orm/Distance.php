<?php

namespace BsbDoctrineMysqlSpacial\Orm;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\Parser;

/**
 * DQL function for calculating distances between two points
 *
 * Example: DISTANCE(foo.point, POINT_STR(:param))
 */
class Distance extends FunctionNode
{

    /**
     * @var mixed parsed value holder
     */
    private $firstArg;

    /**
     * @var mixed parsed value holder
     */
    private $secondArg;

    /**
     * {@inheritdoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        // Need to do this hacky linestring length thing because despite what MySQL manual claims, DISTANCE
        // isn't actually implemented...
        return sprintf(
            'GLength(LineString(%s, %s))',
            $this->firstArg->dispatch($sqlWalker),
            $this->secondArg->dispatch($sqlWalker)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->firstArg = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->secondArg = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
