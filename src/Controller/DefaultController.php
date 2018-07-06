<?php

namespace Hmarinjr\Symfony4\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * @author Hermenegildo Marin Júnior <hmarinjr@gmail.com>
 */
class DefaultController
{
    public function index()
    {
        $number = random_int(0, 100);

        return new Response('<html><body>Random number: ' . $number . '</body></html>');
    }

}
