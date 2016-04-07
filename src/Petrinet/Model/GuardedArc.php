<?php

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Petrinet\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Implementation of OutputArcInterface.
 *
 * @author Filipe Granato <filipegranato.1@hotmail.com>
 */
class GuardedArc extends AbstractArc
{
	protected $guards;

	public function __construct()
	{
		$this->guards = new ArrayCollection();
	}

	public function assert()
	{
		$flag = true;
		
		foreach($this->guards as $guard)
		{
			$flag &= $guard->assert();
		}

		return $flag;
	}

	public function addGuard(GuardInterface $guard)
	{
		$this->guards[] = $guard;
		$guard->setArc($this);
	}

    public function removeGuard(GuardInterface $guard)
    {
    	$guard->removeArc($this);
        $this->guards->removeElement($guard);
        $this->guards = new ArrayCollection($this->guards->getValues());
    }

    public function getDescription()
    {
    	$description = '';
    	foreach ($this->guards as $guard) {
    		$description .= " ".$guard->getDescription();
    	}
    	return $description;
    }
}
