<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Http\Header;

/**
 * @throws Exception\InvalidArgumentException
 * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.31
 */
class MaxForwards implements HeaderInterface
{
    /** @var string */
    protected $value;

    public static function fromString($headerLine)
    {
        list($name, $value) = GenericHeader::splitHeaderLine($headerLine);

        // check to ensure proper header type for this factory
        if (strtolower($name) !== 'max-forwards') {
            throw new Exception\InvalidArgumentException('Invalid header line for Max-Forwards string: "' . $name . '"');
        }

        // @todo implementation details
        $header = new static($value);

        return $header;
    }

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function getFieldName()
    {
        return 'Max-Forwards';
    }

    public function getFieldValue()
    {
        return $this->value;
    }

    public function toString()
    {
        return 'Max-Forwards: ' . $this->getFieldValue();
    }
}