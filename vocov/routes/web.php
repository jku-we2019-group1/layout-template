<?php

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

use App\Company;
use App\Http\Controllers\Data\DataController;

$DataController = new DataController();

Route::get('/', function () {
    return view('home',
        [
            'links' => [
                lnk('Volunteering', '/volunteer'),
                lnk('Companies', '/companies'),
                lnk('About VoCoV', '/')
            ]
        ]);
});

Route::get('/home', function () {
    return view('home',
        [
            'links' => [
                lnk('Volunteering', '/volunteer'),
                lnk('Companies', '/companies'),
                lnk('About VoCoV', '/')
            ]
        ]);
});

Route::get('/login', function () {
    return view('login',
        ['links' => [lnk('Register new profile', '/register')]]);
});

Route::view('/register', 'register');

Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logoff');


/* Users */

Route::prefix('profile')->group(function () use ($DataController) {
    Route::get('{id}', function ($id) use ($DataController) {
        $data = [
            'links' => [
                lnk('Search Offers', '/companies/' . $id . '/offers'),
                lnk('Search Companies', '/companies')
            ],
            'user'  => $DataController->getUser($id),
            'json'  => $DataController->getCompetences($id)
        ];
        return view('profile', $data);
    })->where('id', '[0-9]+');

    Route::get('{id}/competencies', function ($id) use ($DataController) {
        $data = [
            'links' => [
                lnk('Search Offers', '/companies/' . $id . '/offers'),
                lnk('Search Companies', '/companies'),
                lnk('Profile', '/profile/' . $id)
            ],
            'user'  => [
                'id'   => $id,
                'name' => 'Username' . $id
            ],
            'json'  => $DataController->getCompetences($id)
        ];

        return view('competencies', $data);
    })->where('id', '[0-9]+');
});

Route::get('/api/user/{id}', function ($id) use ($DataController) {
    return response()->json($DataController->getCompetences($id));
});

/* Companies & Organisations */

Route::prefix('companies')->group(function () {
    Route::get('/{id?}', function ($id = null) {
        $c = Company::getCompany($id);

        if (is_null($id) || !$c) {
            $data = [
                'links'     => [
                    lnk('Search Offers', "/companies/$id/offers/"),
                    lnk('Search Companies', '/companies', true)
                ],
                'companies' => Company::getAll()
            ];
            if (!is_null($id)) {
                $data['info'] = "Company with ID:$id could not be found";
            }
            return view('company-list', $data);
        }

        return view('company',
            [
                'links'   => [
                    lnk('Offers', "/companies/$id/offers/"),
                    lnk('All Companies', "/companies")
                ],
                'company' => $c
            ]);
    })->where('id', '\d+');;
});

function lnk($name, $url, $isActive = false, $sublinks = null)
{
    $link = [
        'name' => $name,
        'href' => $url,
    ];

    if ($isActive) {
        $link['active'] = true;
    }
    if (is_array($sublinks)) {
        $link['sublinks'] = $sublinks;
    }
    return $link;
}
