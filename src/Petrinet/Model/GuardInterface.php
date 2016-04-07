<?php

namespace Petrinet\Model;

interface GuardInterface
{
    /**
     * Really bad name.  But this method determines whether or not the Guard passes.
     * @return bool
     */
    public function assert();

    public function setArc();

    public function removeArc();
}