<?php

use App\Livewire\Admin\Blog\EditCategory;
use App\Models\Article;
use App\Models\Category;
use App\Models\Cours;
use App\Models\Curriculum;
use App\Models\Level;
use App\Models\Message;
use App\Models\School;
use App\Models\Spack;
use App\Models\Stream;
use App\Models\Temoignage;
use App\Models\Test;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;

Route::view('/', 'front.accueil')->name('indexF');
Route::view('page-not-found/', 'front.404')->name('not_found');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
// ->middleware('auth', 'isAdmin')


//----------------------------------front----------------------------------------
Route::view('/cours', 'front.cours.index')->name('cours');
Route::view('/apprentissage', 'front.cours.apprentissage')->name('apprentissage');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::view('/', 'front.blog.index')->name('articles');
    Route::get('/{article:title}/detail', function (Article $article) {
        return view('front.blog.detail-article', ['article' => $article]);
    })->name('detail');
    Route::get('/{item:name}', function (Category $item) {
        return view('front.blog.article-article', ['article' => $item]);
    })->name('categori');
});

Route::prefix('abonnement')->name('abonnement.')->group(function () {
    Route::view('/', 'front.abonnements.list')->name('abonnement');
    Route::view('/mes-abonnement', 'front.abonnements.mes-abonnement')->name('mes-abonnement');
    Route::get('/{spack:title}', function (Spack $spack) {
        return view('front.abonnements.detail-pack', ['spack' => $spack]);
    })->name('detail');
});

Route::prefix('epreuve')->name('epreuve.')->group(function () {
    Route::view('/', 'front.epreuve.index')->name('index');
    // Route::view('/mes-abonnement', 'front.abonnements.mes-abonnement')->name('mes-abonnement');
});

Route::view('/mon-panier', 'front.panier.cart')->middleware('auth')->name('cart');

Route::view('/contactez-nous', 'front.contact')->name('contact');

Route::get('/create-symlink', function(){
    $filesystem = new Filesystem();

    $storagePath = storage_path('app/public');

    $publichtmlPath = base_path('public_html');

    try {
        $filesystem->delete($publichtmlPath, '/storage');

        $filesystem->link($storagePath, $publichtmlPath . '/storage');

        return 'Lien symbolique creer avec succes';
        //code...
    } catch (\Exception $e) {
        return 'erreur lors de la creation du lien symbolique:' .$e->getMessage();
        //throw $th;
    }


});

Route::get('/remove-symlinks', function(){

   $filesystem = new Filesystem();

   $publicStorageLink = public_path('storage');

   $storagePublicLink = storage_path('app/public');

   $filesystem->delete($publicStorageLink);
   $filesystem->delete($storagePublicLink);

   return 'Les liens symboliques ont ete surpprimer avec success.';
});
//----------------------------------admin----------------------------------------
Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
    Route::view('/subscription', 'admin.indexA')->name('index');

    //blog crud
    Route::view('/blog/categorie', 'admin.blog.category.index')->name('blog.category');
    Route::view('/blog/ajouter-une-categorie', 'admin.blog.category.create')->name('blog.category.create');
    Route::view('/blog/articles', 'admin.blog.article.index')->name('blog.article');
    Route::view('/blog/articles/ajouter-un-article', 'admin.blog.article.create')->name('blog.article.create');
    Route::get('/blog/categorie/{category}/modifier', function (Category $category) {
        return view('admin.blog.category.edit', ['category' => $category]);
    })->name('blog.categories.edit');
    Route::get('/blog/categorie/{category}/supprimer', function (Category $category) {
        return view('admin.blog.category.delete', ['category' => $category]);
    })->name('blog.categories.delete');
    Route::get('/blog/articles/{article}/supprimer', function (Article $article) {
        return view('admin.blog.article.delete', ['article' => $article]);
    })->name('blog.article.delete');


    //user
    Route::view('/utilisateurs', 'admin.users.index')->name('users.list');



    //school
    Route::view('/ecoles', 'admin.school.index')->name('school.list');
    Route::view('/ecoles/ajouter-une-ecole', 'admin.school.create')->name('school.create');
    Route::get('/ecoles/{school}/modifier', function (School $school) {
        return view('admin.school.update', ['school' => $school]);
    })->name('school.update');
    Route::get('/ecoles/{school}/supprimer', function (School $school) {
        return view('admin.school.delete', ['school' => $school]);
    })->name('school.delete');

    //cursus
    Route::view('/cursus', 'admin.school.cursus.index')->name('cursus.list');
    Route::view('/cursus/ajouter-une-cursus', 'admin.school.cursus.create')->name('cursus.create');
    Route::get('/cursus/{cursus}/modifier', function (Curriculum $cursus) {
        return view('admin.school.cursus.update', ['cursus' => $cursus]);
    })->name('cursus.update');
    Route::get('/cursus/{cursus}/supprimer', function (Curriculum $cursus) {
        return view('admin.school.cursus.delete', ['cursus' => $cursus]);
    })->name('cursus.delete');

    //level
    Route::view('/niveau', 'admin.level.index')->name('level.list');
    Route::view('/niveau/ajouter-une-niveau', 'admin.level.create')->name('level.create');
    Route::get('/niveau/{level}/modifier', function (Level $level) {
        return view('admin.level.update', ['level' => $level]);
    })->name('level.update');
    Route::get('/niveau/{level}/supprimer', function (Level $level) {
        return view('admin.level.delete', ['level' => $level]);
    })->name('level.delete');

    //stream
    Route::view('/filiere', 'admin.stream.index')->name('stream.list');
    Route::view('/filiere/ajouter-une-filiere', 'admin.stream.create')->name('stream.create');
    Route::get('/filiere/{stream}/modifier', function (Stream $stream) {
        return view('admin.stream.update', ['stream' => $stream]);
    })->name('stream.update');
    Route::get('/filiere/{stream}/supprimer', function (Stream $stream) {
        return view('admin.stream.delete', ['stream' => $stream]);
    })->name('stream.delete');

    //test
    Route::view('/epreuves', 'admin.test.index')->name('test.list');
    Route::view('/epreuves/ajouter-une-epreuve', 'admin.test.create')->name('test.create');
    Route::get('/epreuves/{test}/supprimer', function (Test $test) {
        return view('admin.test.delete', ['test' => $test]);
    })->name('test.delete');

    //pack
    Route::view('/abonnement', 'admin.spack.index')->name('spack.list');
    Route::view('/abonnement/ajouter-un-abonnement', 'admin.spack.create')->name('spack.create');
    Route::get('/abonnement/{spack}/modifier', function (Spack $spack) {
        return view('admin.spack.update', ['spack' => $spack]);
    })->name('spack.update');
    Route::get('/abonnement/{spack}/supprimer', function (Spack $spack) {
        return view('admin.spack.delete', ['spack' => $spack]);
    })->name('spack.delete');

    //temoignage
    Route::view('/temoignage', 'admin.temoignages.index')->name('temoignage.list');
    Route::view('/temoignage/ajouter-un-temoignage', 'admin.temoignages.create')->name('temoignage.create');
    Route::get('/temoignage/{temoignage}/modifier', function (Temoignage $temoignage) {
        return view('admin.temoignages.update', ['temoignage' => $temoignage]);
    })->name('temoignage.update');
    Route::get('/temoignage/{temoignage}/supprimer', function (Temoignage $temoignage) {
        return view('admin.temoignages.delete', ['temoignage' => $temoignage]);
    })->name('temoignage.delete');

    //cour
    Route::view('/cour', 'admin.cours.index')->name('cour.list');
    Route::view('/cour/ajouter-un-cour', 'admin.cours.create')->name('cour.create');
    Route::get('/cour/{cour}/modifier', function (Cours $cour) {
        return view('admin.cours.update', ['cour' => $cour]);
    })->name('cour.update');
    Route::get('/cour/{cour}/supprimer', function (Cours $cour) {
        return view('admin.cours.delete', ['cour' => $cour]);
    })->name('cour.delete');


    //message
    Route::view('/messages', 'admin.contact.index')->name('message.list');
    Route::get('/message/{message}/repondre', function (Message $message) {
        return view('admin.contact.reponse-message', ['message' => $message]);
    })->name('message.repondre');
    Route::get('/message/{message}/supprimer', function (Message $message) {
        return view('admin.contact.delete', ['message' => $message]);
    })->name('message.delete');
});

require __DIR__ . '/auth.php';
