<?php

namespace Impulse\Exception;

use Psr\Container\NotFoundExceptionInterface;

/**
 * 
 * @link https://github.com/tiboitel/Impulse
 * @copyright Copyright (c) 2018 Timothee Boitelle
 * @license https://github.com/tiboitel/Impulse/LICENSE.md (MIT license)
 */

final class NotFoundException extends \Exception implements NotFoundExceptionInterface
{
}
