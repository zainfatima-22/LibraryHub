<?php

namespace App\Services;

use App\Models\BookUser;
use App\Models\Fine;

class BorrowService
{
    public function processReturn(BookUser $borrow): void
    {
        if (!$borrow->returned_at || !$borrow->due_date) {
            return;
        }

        // Use already casted Carbon instances from BookUser
        $returned = $borrow->returned_at;
        $due = $borrow->due_date;

        if ($returned->greaterThan($due)) {
            $daysLate = $returned->diffInDays($due);
            $amount = $daysLate * 50; // Example fine calculation

            Fine::create([
                'user_id' => $borrow->user_id,
                'borrow_id' => $borrow->id,
                'amount' => $amount,
                'reason' => "Late return ({$daysLate} days)",
                'status' => 'unpaid',
            ]);

            $user = $borrow->user;

            // Increment blocked count and block user if needed
            $user->increment('blocked_count');

            if ($user->blocked_count >= 3 && $user->status !== 'blocked') {
                $user->update(['status' => 'blocked']);
            }
        }
    }
}
