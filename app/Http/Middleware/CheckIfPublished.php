<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfPublished
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve the product from the route parameters
        $product = $request->route('product');

        // Check if the product exists and is unpublished
        if ($product && !$product->publish) {
            // Redirect to home or show an error message if product is unpublished
            return redirect('/')->with('error', 'Unauthorized access to private products.');
        }
        return $next($request);
    }
}
