<?php

Route::get('/command/db-mass-populate', function () {
    Artisan::call('db:mass-populate');
    return response()->json([
        'message' => 'Database populated successfully'
    ]);
});