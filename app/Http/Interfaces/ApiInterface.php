<?php

namespace App\Http\Interfaces;

interface ApiInterface
{
    public function url();
    public function headers();
    public function fetch($url, $headers);
}