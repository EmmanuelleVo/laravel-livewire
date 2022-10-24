<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $qp = request()->query();
    $perPage = request()->input('per-page') ?? 10; // récupérer la valeur par défaut associée au modèle
    $searchTerm = request()->input('search-term') ?? '';
    $sortField = request()->input('sort-field') ?? 'name';
    $sortOrder = request()->input('sort-order') ?? 'ASC';;

    $contacts = Contact::query()
        ->where('name', 'like', '%'.$searchTerm.'%')
        ->orWhere('email', 'like', '%'.$searchTerm.'%')
        ->orderBy($sortField, $sortOrder)
        ->paginate($perPage);



    return view('welcome', compact(
        'qp', 'perPage', 'searchTerm', 'sortField', 'contacts', 'sortOrder',
    ));
});
