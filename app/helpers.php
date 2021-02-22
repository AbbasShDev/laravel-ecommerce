<?php

function presentPrice($price)
{
    return '$' . round($price / 100, 2);
}

function presentImage($path)
{
    return $path ? asset('storage/'.$path): asset('img/not-found-product.png');
}
