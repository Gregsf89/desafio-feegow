<?php

Route::get('/commands/db-mass-populate/funcQnt/{func}/loteQnt/{lote}/doseQnt/{dose}', function (int $func, int $lote, int $dose) {
    Artisan::call("db:mass-populate --funcQnt={$func} --loteQnt={$lote} --doseQnt={$dose}");
    return response()->json([
        'message' => 'Database populated successfully'
    ]);
})->name('commands.db-mass-populate');