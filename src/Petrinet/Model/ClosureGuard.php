<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Petrinet\Model;

use Closure;
use Petrinet\Model\GuardInterface;

/**
 * @author Filipe Granato <filipegranato.1@hotmail.com>
 */
class ClosureGuard implements GuardInterface
{
	protected $condition;
	protected $description;
	protected $arc;
	public function __construct(Closure $condition,$description = null)
	{
		$this->condition = $condition;
		$this->description = $description;
	}

	/**
	 * @return boolean	
	 */
	public function assert($marking)
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
	

	/**
	 * @return string
	 */
	public function getArc()
	{
	    return $this->arc;
	}
	
	/**
	 * @param string $arc
	 */
	public function setArc($arc)
	{
	    $this->arc = $arc;
	}

	public function removeArc()
	{
		$this->arc = null;
	}
	
}