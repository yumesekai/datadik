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

Route::get('/welcome', function () {
  return view('welcome');
});

Route::get('/clear-cache', function () {
  Artisan::call('config:clear');
  Artisan::call('cache:clear');
  Artisan::call('config:cache');
  return 'DONE';
});

Auth::routes();
Route::post('/home/login', 'HomeController@login')->name('postlogin')->middleware('kepsek');


Route::middleware(['auth'])->group(function () {
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/admin/home', 'HomeController@admin')->name('admin.home');
  Route::get('/siswa/home', 'HomeController@siswa')->name('siswa.home');
  Route::get('/guru/home', 'HomeController@guru')->name('guru.home');
  Route::get('/user/password', 'UserController@edit_password')->name('user.password');
  Route::post('/user/ubah-password', 'UserController@ubah_password')->name('user.ubah-password');

  //laporanEKSKUL
  Route::get('/LaporanEkskul', 'LaporanEkskulController@index')->name('LaporanEkskul');
  Route::get('/LaporanEkskul/cetakLaporan/{id}', 'LaporanEkskulController@cetakLaporan')->name('LaporanEkskul.cetakLaporan');
  Route::get('/LaporanEkskul/cetakRekap/{id}', 'LaporanEkskulController@cetakRekap')->name('LaporanEkskul.cetakRekap');
  Route::get('/LaporanEkskul/rekap', 'LaporanEkskulController@rekap')->name('LaporanEkskul.rekap');
  Route::get('/LaporanEkskul/generateBulan', 'LaporanEkskulController@generateBulan')->name('LaporanEkskul.generateBulan');
  Route::get('/LaporanEkskul/setRekap/{id}', 'LaporanEkskulController@setRekap')->name('LaporanEkskul.setRekap');
  Route::resource('/LaporanEkskul', 'LaporanEkskulController');

  Route::get('/DataEkstrakulikuler/pembinaEkstra', 'DataEkstrakulikulerController@pembinaEkstra')->name('DataEkstrakulikuler.pembinaEkstra');
  Route::get('/DataEkstrakulikuler/showDataEkstra{id}', 'DataEkstrakulikulerController@showDataEkstra')->name('DataEkstrakulikuler.showDataEkstra');
  Route::get('/DataEkstrakulikuler/export_AbsenEkstra{id}', 'DataEkstrakulikulerController@export_AbsenEkstra')->name('DataEkstrakulikuler.export_AbsenEkstra');

  Route::middleware(['guru'])->group(function () {
    Route::get('/pribadi/guru', 'PribadiController@guru')->name('pribadi.guru');
    Route::get('/orangtua/guru', 'OrangtuaController@guru')->name('orangtua.guru');
    Route::get('/smp/guru', 'SmpController@guru')->name('smp.guru');
    Route::get('/priodik/guru', 'PriodikController@guru')->name('priodik.guru');
    Route::get('/ekstrakulikuler/guru', 'EkstrakulikulerController@guru')->name('ekstrakulikuler.guru');
 
  });

  Route::middleware(['siswa'])->group(function () {
    Route::get('/pribadi/siswa', 'PribadiController@siswa')->name('pribadi.siswa');
    Route::get('/pribadi/editSiswa', 'PribadiController@editSiswa')->name('pribadi.editSiswa');
    Route::get('/pribadi/editTemSiswa', 'PribadiController@editTemSiswa')->name('pribadi.editTemSiswa');
    Route::post('/pribadi/storeSiswa', 'PribadiController@storeSiswa')->name('pribadi.storeSiswa');
    Route::post('/pribadi/updateSiswa', 'PribadiController@updateSiswa')->name('pribadi.updateSiswa');
    Route::post('/pribadi/verifPribadi', 'PribadiController@verifPribadi')->name('pribadi.verifPribadi');
    Route::post('/pribadi/delBerkasKK', 'PribadiController@delBerkasKK')->name('pribadi.delBerkasKK');

    Route::get('/orangtua/siswa', 'OrangtuaController@siswa')->name('orangtua.siswa');
    Route::get('/orangtua/editSiswa', 'OrangtuaController@editSiswa')->name('orangtua.editSiswa');
    Route::get('/orangtua/editTemSiswa', 'OrangtuaController@editTemSiswa')->name('orangtua.editTemSiswa');
    Route::post('/orangtua/storeSiswa', 'OrangtuaController@storeSiswa')->name('orangtua.storeSiswa');
    Route::post('/orangtua/updateSiswa', 'OrangtuaController@updateSiswa')->name('orangtua.updateSiswa');
    Route::post('/orangtua/verifOrangtua', 'OrangtuaController@verifOrangtua')->name('orangtua.verifOrangtua');

    Route::get('/smp/siswa', 'SmpController@siswa')->name('smp.siswa');
    Route::get('/smp/editSiswa', 'SmpController@editSiswa')->name('smp.editSiswa');
    Route::get('/smp/editTemSiswa', 'SmpController@editTemSiswa')->name('smp.editTemSiswa');
    Route::post('/smp/storeSiswa', 'SmpController@storeSiswa')->name('smp.storeSiswa');
    Route::post('/smp/updateSiswa', 'SmpController@updateSiswa')->name('smp.updateSiswa');
    Route::post('/smp/verifSmp', 'SmpController@verifSmp')->name('smp.verifSmp');

    Route::get('/priodik/siswa', 'PriodikController@siswa')->name('priodik.siswa');
    Route::get('/priodik/editSiswa', 'PriodikController@editSiswa')->name('priodik.editSiswa');
    Route::get('/priodik/editTemSiswa', 'PriodikController@editTemSiswa')->name('priodik.editTemSiswa');
    Route::post('/priodik/storeSiswa', 'PriodikController@storeSiswa')->name('priodik.storeSiswa');
    Route::post('/priodik/updateSiswa', 'PriodikController@updateSiswa')->name('priodik.updateSiswa');
    Route::post('/priodik/verifPriodik', 'PriodikController@verifPriodik')->name('priodik.verifPriodik');

    Route::get('/home/editPribadiDis/{id}', 'HomeController@editPribadiDis')->name('home.editPribadiDis');
    Route::get('/home/editOrangtuaDis/{id}', 'HomeController@editOrangtuaDis')->name('home.editOrangtuaDis');
    Route::get('/home/editSmpDis/{id}', 'HomeController@editSmpDis')->name('home.editSmpDis');
    Route::get('/home/editPriodikDis/{id}', 'HomeController@editPriodikDis')->name('home.editPriodikDis');

    Route::get('/ekstrakulikuler/indexSiswa', 'EkstrakulikulerController@indexSiswa')->name('ekstrakulikuler.indexSiswa');
    Route::get('/ekstrakulikuler/editSiswa', 'EkstrakulikulerController@editSiswa')->name('ekstrakulikuler.editSiswa');
    Route::post('/ekstrakulikuler/updateSiswa', 'EkstrakulikulerController@updateSiswa')->name('ekstrakulikuler.updateSiswa');
  });

  Route::middleware(['admin'])->group(function () {
    Route::get('/admin/home', 'HomeController@admin')->name('admin.home');
    Route::get('/import', 'ImportController@index')->name('import');
    Route::post('/import/import_user_guru', 'ImportController@import_user_guru')->name('import.import_user_guru');
    Route::post('/import/import_user_siswa', 'ImportController@import_user_siswa')->name('import.import_user_siswa');
    Route::post('/import/import_pribadi', 'ImportController@import_pribadi')->name('import.import_pribadi');
    Route::post('/import/import_orangtua', 'ImportController@import_orangtua')->name('import.import_orangtua');
    Route::post('/import/import_smp', 'ImportController@import_smp')->name('import.import_smp');
    Route::post('/import/import_priodik', 'ImportController@import_priodik')->name('import.import_priodik');
    Route::post('/import/import_ekstra', 'ImportController@import_ekstra')->name('import.import_ekstra');
    Route::post('/import/import_kelas', 'ImportController@import_kelas')->name('import.import_kelas');
    Route::delete('/import/deleteAll', 'ImportController@deleteAll')->name('import.deleteAll');

    //daftar esktra
    Route::get('/DataEkstrakulikuler', 'DataEkstrakulikulerController@index')->name('DataEkstrakulikuler');
    Route::get('/DataEkstrakulikuler/excelEkstra', 'DataEkstrakulikulerController@excelEkstra')->name('DataEkstrakulikuler.excelEkstra');
    Route::get('/DataEkstrakulikuler/export_dataEkstra', 'DataEkstrakulikulerController@export_dataEkstra')->name('DataEkstrakulikuler.export_dataEkstra');
    Route::resource('/DataEkstrakulikuler', 'DataEkstrakulikulerController');

    Route::get('/kelas', 'KelasController@index')->name('kelas');
    Route::get('/kelas/excelKelas', 'KelasController@excelKelas')->name('kelas.excelKelas');
    Route::resource('/kelas', 'KelasController');

    Route::get('/pribadi', 'PribadiController@index')->name('pribadi');
    Route::get('/pribadi/excelPribadi', 'PribadiController@excelPribadi')->name('pribadi.excelPribadi');
    Route::resource('/pribadi', 'PribadiController');

    Route::get('/orangtua', 'OrangtuaController@index')->name('orangtua');
    Route::get('/orangtua/excelOrangtua', 'OrangtuaController@excelOrangtua')->name('orangtua.excelOrangtua');
    Route::resource('/orangtua', 'OrangtuaController');

    Route::get('/smp', 'SmpController@index')->name('smp');
    Route::get('/smp/excelSmp', 'SmpController@excelSmp')->name('smp.excelSmp');
    Route::resource('/smp', 'SmpController');

    Route::get('/priodik', 'PriodikController@index')->name('priodik');
    Route::get('/priodik/excelPriodik', 'PriodikController@excelPriodik')->name('priodik.excelPriodik');
    Route::resource('/priodik', 'PriodikController');

    //esktrakulikuler pilihan siswa
    Route::get('/ekstrakulikuler', 'EkstrakulikulerController@index')->name('ekstrakulikuler');
    Route::post('/ekstrakulikuler/generateByUser', 'EkstrakulikulerController@generateByUser')->name('ekstrakulikuler.generateByUser');
    Route::resource('/ekstrakulikuler', 'EkstrakulikulerController');

    Route::get('/TemPribadi', 'TemPribadiController@index')->name('TemPribadi');
    Route::resource('/TemPribadi', 'TemPribadiController');

    Route::get('/TemOrangtua', 'TemOrangtuaController@index')->name('TemOrangtua');
    Route::resource('/TemOrangtua', 'TemOrangtuaController');

    Route::get('/TemSmp', 'TemSmpController@index')->name('TemSmp');
    Route::resource('/TemSmp', 'TemSmpController');

    Route::get('/TemPriodik', 'TemPriodikController@index')->name('TemPriodik');
    Route::resource('/TemPriodik', 'TemPriodikController');

    Route::get('/home/export_data', 'HomeController@export_data')->name('home.export_data');
    Route::get('/home/export_TemData', 'HomeController@export_TemData')->name('home.export_TemData');
    Route::get('/user/edit/json', 'UserController@getEdit');
    Route::get('/user/export_excel', 'UserController@export_excel')->name('user.export_excel');
    Route::get('/user/excelUser', 'UserController@excelUser')->name('user.excelUser');
    Route::get('/user/excelUserSiswa', 'UserController@excelUserSiswa')->name('user.excelUserSiswa');
    Route::resource('/user', 'UserController');
    
  });

  
});
