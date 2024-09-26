<?php

Route::get('/commands/db-mass-populate/funcQnt/{func}/loteQnt/{lote}/doseQnt/{dose}', function (int $func, int $lote, int $dose) {
    Artisan::call("db:mass-populate --funcQnt={$func} --loteQnt={$lote} --doseQnt={$dose}");
})->name('commands.db-mass-populate');