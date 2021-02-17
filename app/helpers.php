<?php

function presentPrice($price)
{
    return '$' . round($price / 100, 2);
}
