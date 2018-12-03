<?php

use Symfony\Component\HttpKernel\Kernel as BaseKernel;
// ...

class Kernel extends BaseKernel
{
    public function getRootDir()
    {
        return __DIR__;
    }
}