<?php

namespace BsbDoctrineMysqlSpacial\Orm;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\Parser;

/**
 * POINT_STR function for querying using Point objects as parameters
 *
 * Usage: POINT_STR(:param) where param should be mapped to $point where $point is Wantlet\ORM\Point
 *        without any special typing provided (eg. so that it gets converted to string)
 */
class PointStr extends FunctionNode
{
    /**
     * @var mixed parsed value holder
     */
    private $arg;

    /**
     * {@inheritdoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        return 'GeomFromText(' . $this->arg->dispatch($sqlWalker) . ')';
    }

    /**
     * {@inheritdoc}
     */
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->arg = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

}
