<?php

namespace App\Policies;

use App\Models\Laporan;
use App\Models\User;

class LaporanPolicy
{
    /**
     * Determine if the user can view the laporan.
     */
    public function view(User $user, Laporan $laporan): bool
    {
        return $user->id === $laporan->user_id;
    }

    /**
     * Determine if the user can update the laporan.
     */
    public function update(User $user, Laporan $laporan): bool
    {
        return $user->id === $laporan->user_id;
    }

    /**
     * Determine if the user can delete the laporan.
     */
    public function delete(User $user, Laporan $laporan): bool
    {
        return $user->id === $laporan->user_id;
    }
}
