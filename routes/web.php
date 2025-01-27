<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TemplateColorController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WebTypeController;
use App\Http\Middleware\CekRole;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/my-web', [PageController::class, 'myweb'])->name('my.web');

Route::get('/template', [PageController::class, 'template'])->name('template');

// Route::get('/buy-voucher', function () {
//     return view('guest.buy-voucher');
// })->name('buy.voucher');


Route::middleware('auth')->group(function () {
    Route::post('/buy-voucher', [VoucherController::class, 'buyvoucher'])->name('buy.voucher');
    
    Route::post('/generate-web',[WebController::class, 'webgenerate'])->name('web.generate');

    Route::resource('/admin/access', AccessController::class);

    Route::resource('/admin/voucher', VoucherController::class);

    Route::resource('/admin/template', WebTypeController::class);

    Route::post('/{slug}/logo', [WebController::class, 'logo'])->name('logo.edit');
    
    Route::resource('/{slug}/content', ContentController::class);
    Route::post('/{slug}/top-content', [ContentController::class, 'topcontent'])->name('top.content.edit');
    Route::post('/{slug}/heading', [ContentController::class, 'heading'])->name('heading.edit');
    Route::post('/{slug}/footer', [ContentController::class, 'footer'])->name('footer.edit');
    
    Route::resource('/admin/contact', ContactController::class);
    Route::post('/{slug}/contact/edit', [ContactController::class, 'contact'])->name('contact.edit');

    Route::resource('/admin/template-color', TemplateColorController::class);
    Route::post('/{slug}/tempalte-color', [TemplateColorController::class, 'templatecolor'])->name('template.color.edit');

    Route::resource('/{slug}/product', ProductController::class);
    Route::post('/{slug}/product-title', [ProductController::class, 'producttitle'])->name('product.title');
    Route::post('/{slug}/product-tlp', [ProductController::class, 'producttlp'])->name('product.tlp');
    
    Route::resource('/{slug}/banner', BannerController::class);
    
    Route::resource('/{slug}/gallery', GalleryController::class);
    Route::post('/{slug}/gallery-title', [GalleryController::class, 'gallerytitle'])->name('gallery.title');

    Route::resource('/{slug}/link', LinkController::class);

    Route::resource('/{slug}/style', TemplateController::class);
    Route::post('/{slug}/section-style-edit', [TemplateController::class, 'sectionedit'])->name('section.style.edit');
    Route::post('/{slug}/product-style-edit', [TemplateController::class, 'productedit'])->name('product.style.edit');

    Route::resource('/{slug}/tag', TagController::class);
    Route::post('{slug}/tag-position', [TagController::class, 'tagposition'])->name('tag.position');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(CekRole::class)->group(function () {
        Route::get('/admin/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

        Route::resource('/admin/user', UserController::class);
        
        Route::resource('/admin/web', WebController::class);
        Route::get('/admin/download-web/{id}', [WebController::class, 'webdownload'])->name('web.download');
    });
});

require __DIR__.'/auth.php';

Route::get('/{slug}/produk', [PageController::class, 'product'])->name('product');

Route::get('/{slug}/article', [PageController::class, 'article'])->name('article');

Route::get('/{slug}/link', [PageController::class, 'link'])->name('link');

Route::get('/test', [PageController::class, 'test'])->name('test');
Route::get('/{slug}', [PageController::class, 'website'])->name('website');
