<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('cart')) {
            // Check if the cart has 3 or more items
            if (count(session('cart')) >= 3) {
                return $next($request); // Proceed to the next middleware or controller
            } else {
                return redirect('shop'); // Redirect to the 'index' route
            }
        } else {
            return redirect('index'); // Redirect to the 'shop' route if 'cart' doesn't exist
        }
    }
}
