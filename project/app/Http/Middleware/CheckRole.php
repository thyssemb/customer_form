<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        try {
            $user = auth()->user();

            if (!$user || $user->role !== $role) {
                \Log::warning("Tentative d'accès non autorisé à la route avec le rôle : $role");
                abort(404);
            }
        } catch (\Exception $e) {
            abort(404);
        }

        return $next($request);
    }
}
