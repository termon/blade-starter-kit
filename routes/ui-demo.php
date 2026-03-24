<?php

use Illuminate\Support\Facades\Route;

Route::view('/ui-demo', 'ui-demo.index')->name('ui-demo');
Route::post('/ui-demo/preview-action', fn () => redirect()->route('ui-demo')->with('success', 'Demo POST action submitted.'))->name('ui-demo.preview.post');
Route::patch('/ui-demo/preview-action', fn () => redirect()->route('ui-demo')->with('status', 'Demo PATCH action submitted.'))->name('ui-demo.preview.patch');
Route::delete('/ui-demo/preview-action', fn () => redirect()->route('ui-demo')->with('warning', 'Demo DELETE action submitted.'))->name('ui-demo.preview.delete');
