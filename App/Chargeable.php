<?php


namespace App;


interface Chargeable
{
    public function getPrice(): float;
}