<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reporter;
use App\Models\Actualite;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class ActualitePolicy
{

    public function before(User $user, string $ability): bool|null
    {
        if ($user->is_authenticated()) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the reporter can view the model.
     */
    public function view(Reporter $reporter, Actualite $actualite): Response
    {
        Log::info('ActualitePolicy view method called', [
            'user' => $reporter,
            'actualite' => $actualite,
        ]);

        if ($actualite->authorable instanceof Reporter )
            return $reporter->id === $actualite->authorable->id
                ? Response::allow()
                : Response::denyAsNotFound();

        return Response::denyAsNotFound();
    }

    /**
     * Determine whether the reporter can update the model.
     */
    public function update(Reporter $reporter, Actualite $actualite): Response
    {
        return $reporter->id === $actualite->authorable->id
            ? Response::allow()
            : Response::deny("Autorisation de modification refusée");
    }

    /**
     * Determine whether the reporter can delete the model.
     */
    public function delete(Reporter $reporter, Actualite $actualite): Response
    {
        return $reporter->id === $actualite->authorable->id
            ? Response::allow()
            : Response::deny("Autorisation de suppression refusée");
    }

    /**
     * Determine whether the reporter can restore the model.
     */
    public function restore(Reporter $reporter, Actualite $actualite): Response
    {
        return $reporter->id === $actualite->authorable->id
            ? Response::allow()
            : Response::deny("Autorisation de restauration refusée");
    }

    /**
     * Determine whether the reporter can permanently delete the model.
     */
    public function forceDelete(Reporter $reporter, Actualite $actualite): Response
    {
        return $reporter->id === $actualite->authorable->id
            ? Response::allow()
            : Response::deny("Autorisation de suppression refusée");
    }
}
