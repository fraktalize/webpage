<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AuthenticationMiddleware.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Middleware;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Users\User;
use Auth;
use Closure;

class AuthenticationMiddleware {

    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function handle($request, Closure $next) {
        $user = Auth::user();

        if ($user !== null) {
            // Fetch the real user.
            $u = $this->userRepository->findById($user->getAuthIdentifier());
            if ($u !== null && $u->getUserLevel() === User::USER_LEVEL_ADMIN) {
                return $next($request);
            }
            Auth::logout();
        }

        return redirect()->action(AdminController::class . "@getIndex")
            ->withErrors(['login' => 'You are unauthorized to access the admin area.']);
    }
}