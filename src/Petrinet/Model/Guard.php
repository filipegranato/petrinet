<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Petrinet\Model;

use Petrinet\Model\GuardInterface;
use Closure;
/**
 * Helps building markings.
 *
 * @author Filipe Granato <filipegranato.1@hotmail.com>
 */
class Guard implements GuardInterface
{
	protected $condition;
	protected $description;

	public function __construct(Closure $condition,$description = null)
	{
		$this->condition = $condition;
		$this->description = $description;
	}

	public function assert()
	{
		return call_user_func($this->condition);
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
	    return $this->description;
	}
	
	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
	    $this->description = $description;
	}
	

}