<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Web;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use ZipArchive;

class WebController extends Controller
{
    public function webdownload($id) 
    {
        $data = Web::find($id);

        // Mulai proses pembuatan SQL
        $sql = "-- Dump SQL untuk tabel Web dan semua relasinya\n\n";

        // Membuat tabel Web
        $sql = " 
            CREATE TABLE `users` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(255) DEFAULT NULL,
                `email` VARCHAR(255) DEFAULT NULL,
                `phone_number` VARCHAR(255) DEFAULT NULL,
                `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
                `password` VARCHAR(255) DEFAULT NULL,
                `remember_token` VARCHAR(100) DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL
            );

            CREATE TABLE `webs` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `title` VARCHAR(255) DEFAULT NULL,
                `url` VARCHAR(255) DEFAULT NULL,
                `logo` VARCHAR(255) DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL
            );

            -- Membuat tabel Content
            CREATE TABLE `contents` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `product_title` VARCHAR(255) DEFAULT NULL,
                `gallery_title` VARCHAR(255) DEFAULT NULL,
                `link_title` VARCHAR(255) DEFAULT NULL,
                `head_title` VARCHAR(255) DEFAULT NULL,
                `head_desc` TEXT DEFAULT NULL,
                `foot_title` VARCHAR(255) DEFAULT NULL,
                `foot_desc` TEXT DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                `top_title` VARCHAR(255) DEFAULT NULL,
                `top_no_tlp` VARCHAR(20) DEFAULT NULL,
                `tag_position` VARCHAR(255) DEFAULT NULL,
                `product_no_tlp` VARCHAR(20) DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel Banner
            CREATE TABLE `banners` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `image` VARCHAR(255) DEFAULT NULL,
                `image_alt` VARCHAR(255) DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel Product
            CREATE TABLE `products` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `image` VARCHAR(255) DEFAULT NULL,
                `name` VARCHAR(255) DEFAULT NULL,
                `price` DECIMAL(10, 2) DEFAULT NULL,
                `description` TEXT DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel Gallery
            CREATE TABLE `galleries` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `image` VARCHAR(255) DEFAULT NULL,
                `image_alt` VARCHAR(255) DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel Link
            CREATE TABLE `links` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `type` VARCHAR(50) DEFAULT NULL,
                `url` VARCHAR(255) DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel Tags (hanya untuk Minicompro)
            CREATE TABLE `tags` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `tag` VARCHAR(255) DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel Contact
            CREATE TABLE `contacts` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `no_tlp` VARCHAR(20) DEFAULT NULL,
                `no_wa` VARCHAR(20) DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel Template
            CREATE TABLE `templates` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `section` TEXT DEFAULT NULL,
                `product` TEXT DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );

            -- Membuat tabel TemplateColor
            CREATE TABLE `template_colors` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `web_id` INT,
                `bg_color` VARCHAR(7) DEFAULT NULL,
                `main_color` VARCHAR(7) DEFAULT NULL,
                `second_color` VARCHAR(7) DEFAULT NULL,
                `third_color` VARCHAR(7) DEFAULT NULL,
                `fourth_color` VARCHAR(7) DEFAULT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                FOREIGN KEY (`web_id`) REFERENCES `webs`(`id`)
            );
        ";

        // Insert untuk tabel Web
        $sql .= "INSERT INTO webs (id, title, logo, url, created_at, updated_at) VALUES (
            {$data->id}, 
            " . ($data->title ? "'{$data->title}'" : "NULL") . ", 
            " . ($data->logo ? "'{$data->logo}'" : "NULL") . ",   
            " . ($data->url ? "'{$data->url}'" : "NULL") . ", 
            " . ($data->created_at ? "'{$data->created_at}'" : "NULL") . ", 
            " . ($data->updated_at ? "'{$data->updated_at}'" : "NULL") . "
        );\n";

        // Insert untuk Link (hasMany)
        foreach ($data->access as $item) {
            $sql .= "INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (
                {$item->id}, 
                " . ($item->user->name ? "'{$item->user->name}'" : "NULL") . ",
                " . ($item->user->email ? "'{$item->user->email}'" : "NULL") . ",
                " . ($item->user->phone_number ? "'{$item->user->phone_number}'" : "NULL") . ",
                " . ($item->user->email_verified_at ? "'{$item->user->typemail_verified_at}'" : "NULL") . ",
                " . ($item->user->password ? "'{$item->user->password}'" : "NULL") . ",
                " . ($item->user->remember_token ? "'{$item->user->remember_token}'" : "NULL") . ",
                " . ($item->user->created_at ? "'{$item->user->created_at}'" : "NULL") . ",
                " . ($item->user->updated_at ? "'{$item->user->updated_at}'" : "NULL") . "
            );\n";
        }

        // Insert untuk Content (hasOne)
        if ($data->content) {
            $sql .= "INSERT INTO contents (id, web_id, product_title, gallery_title, link_title, head_title, head_desc, foot_title, foot_desc, created_at, updated_at, top_title, top_no_tlp, tag_position, product_no_tlp) VALUES (
                {$data->content->id}, 
                {$data->id}, 
                " . ($data->content->product_title ? "'{$data->content->product_title}'" : "NULL") . ",
                " . ($data->content->gallery_title ? "'{$data->content->gallery_title}'" : "NULL") . ",
                " . ($data->content->link_title ? "'{$data->content->link_title}'" : "NULL") . ",
                " . ($data->content->head_title ? "'{$data->content->head_title}'" : "NULL") . ",
                " . ($data->content->head_desc ? "'{$data->content->head_desc}'" : "NULL") . ",
                " . ($data->content->foot_title ? "'{$data->content->foot_title}'" : "NULL") . ",
                " . ($data->content->foot_desc ? "'{$data->content->foot_desc}'" : "NULL") . ",
                " . ($data->content->created_at ? "'{$data->content->created_at}'" : "NULL") . ",
                " . ($data->content->updated_at ? "'{$data->content->updated_at}'" : "NULL") . ",
                " . ($data->content->top_title ? "'{$data->content->top_title}'" : "NULL") . ",
                " . ($data->content->top_no_tlp ? "'{$data->content->top_no_tlp}'" : "NULL") . ",
                " . ($data->content->tag_position ? "'{$data->content->tag_position}'" : "NULL") . ",
                " . ($data->content->product_no_tlp ? "'{$data->content->product_no_tlp}'" : "NULL") . "
            );\n";
        }

        if ($data->webType->type === "Online Shop" || $data->webType->type === "Blog") {
            // Insert untuk Banner (hasMany)
            foreach ($data->banner as $banner) {
                $sql .= "INSERT INTO banners (id, web_id, image, image_alt) VALUES (
                    {$banner->id}, 
                    {$data->id}, 
                    " . ($banner->image ? "'{$banner->image}'" : "NULL") . ",
                    " . ($banner->image_alt ? "'{$banner->image_alt}'" : "NULL") . "
                );\n";
            }
        }

        // Insert untuk Product (hasMany)
        foreach ($data->product as $product) {
            $sql .= "INSERT INTO `products` (`id`, `web_id`, `image`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES (
                {$product->id}, 
                {$data->id}, 
                " . ($product->image ? "'{$product->image}'" : "NULL") . ",
                " . ($product->name ? "'{$product->name}'" : "NULL") . ",
                " . ($product->price ? $product->price : "NULL") . ",
                " . ($product->description ? "'{$product->description}'" : "NULL") . ",
                " . ($product->created_at ? "'{$product->created_at}'" : "NULL") . ",
                " . ($product->updated_at ? "'{$product->updated_at}'" : "NULL") . "
            );\n";
        }

        // Insert untuk Gallery (hasMany)
        foreach ($data->gallery as $gallery) {
            $sql .= "INSERT INTO `galleries` (`id`, `web_id`, `image`, `image_alt`, `created_at`, `updated_at`) VALUES (
                {$gallery->id}, 
                {$data->id}, 
                " . ($gallery->image ? "'{$gallery->image}'" : "NULL") . ",
                " . ($gallery->image_alt ? "'{$gallery->image_alt}'" : "NULL") . ",
                " . ($gallery->created_at ? "'{$gallery->created_at}'" : "NULL") . ",
                " . ($gallery->updated_at ? "'{$gallery->updated_at}'" : "NULL") . "
            );\n";
        }

        // Insert untuk Link (hasMany)
        foreach ($data->link as $link) {
            $sql .= "INSERT INTO `links` (`id`, `web_id`, `type`, `url`, `created_at`, `updated_at`) VALUES (
                {$link->id}, 
                {$data->id}, 
                " . ($link->type ? "'{$link->type}'" : "NULL") . ",
                " . ($link->url ? "'{$link->url}'" : "NULL") . ",
                " . ($link->created_at ? "'{$link->created_at}'" : "NULL") . ",
                " . ($link->updated_at ? "'{$link->updated_at}'" : "NULL") . "
            );\n";
        }

        if ($data->webType->type === "Minicompro") {
            // Insert untuk Tags (hasMany)
            foreach ($data->tags as $tag) {
                $sql .= "INSERT INTO `tags` (`id`, `web_id`, `tag`, `created_at`, `updated_at`) VALUES (
                    {$tag->id}, 
                    {$data->id}, 
                    " . ($tag->tag ? "'{$tag->tag}'" : "NULL") . ",
                    " . ($tag->created_at ? "'{$tag->created_at}'" : "NULL") . ",
                    " . ($tag->updated_at ? "'{$tag->updated_at}'" : "NULL") . "
                );\n";
            }
        }

        // Insert untuk Contact (hasOne)
        if ($data->contact) {
            $sql .= "INSERT INTO `contacts` (`id`, `web_id`, `no_tlp`, `no_wa`, `created_at`, `updated_at`) VALUES (
                {$data->contact->id}, 
                {$data->id}, 
                " . ($data->contact->no_tlp ? "'{$data->contact->no_tlp}'" : "NULL") . ",
                " . ($data->contact->no_wa ? "'{$data->contact->no_wa}'" : "NULL") . ",
                " . ($data->contact->created_at ? "'{$data->contact->created_at}'" : "NULL") . ",
                " . ($data->contact->updated_at ? "'{$data->contact->updated_at}'" : "NULL") . "
            );\n";
        }

        // Insert untuk Template (hasOne)
        if ($data->template) {
            $sql .= "INSERT INTO `templates` (`id`, `web_id`, `section`, `product`, `created_at`, `updated_at`) VALUES (
                {$data->template->id}, 
                {$data->id}, 
                " . ($data->template->section ? "'{$data->template->section}'" : "NULL") . ",
                " . ($data->template->product ? "'{$data->template->product}'" : "NULL") . ",
                " . ($data->template->created_at ? "'{$data->template->created_at}'" : "NULL") . ",
                " . ($data->template->updated_at ? "'{$data->template->updated_at}'" : "NULL") . "
            );\n";
        }

        // Insert untuk TemplateColor (hasOne)
        if ($data->templatecolor) {
            $sql .= "INSERT INTO `template_colors` (`id`, `web_id`, `bg_color`, `main_color`, `second_color`, `third_color`, `fourth_color`, `created_at`, `updated_at`) VALUES (
                {$data->templatecolor->id}, 
                {$data->id}, 
                " . ($data->templatecolor->bg_color ? "'{$data->templatecolor->bg_color}'" : "NULL") . ",
                " . ($data->templatecolor->main_color ? "'{$data->templatecolor->main_color}'" : "NULL") . ",
                " . ($data->templatecolor->second_color ? "'{$data->templatecolor->second_color}'" : "NULL") . ",
                " . ($data->templatecolor->third_color ? "'{$data->templatecolor->third_color}'" : "NULL") . ",
                " . ($data->templatecolor->fourth_color ? "'{$data->templatecolor->fourth_color}'" : "NULL") . ",
                " . ($data->templatecolor->created_at ? "'{$data->templatecolor->created_at}'" : "NULL") . ",
                " . ($data->templatecolor->updated_at ? "'{$data->templatecolor->updated_at}'" : "NULL") . "
            );\n";
        }

        // Nama file SQL dan ZIP
        $sqlFilename = "dataweb.sql";
        $zipFilename = "dataweb.zip";

        // Simpan file SQL sementara
        $sqlPath = storage_path("app/temp/{$sqlFilename}");
        $zipPath = storage_path("app/temp/{$zipFilename}");

        // Pastikan direktori sementara ada
        if (!file_exists(dirname($sqlPath))) {
            mkdir(dirname($sqlPath), 0777, true);
        }

        // Simpan file SQL ke disk
        file_put_contents($sqlPath, $sql);

        // Membuat file ZIP
        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            // Tambahkan file SQL ke ZIP
            $zip->addFile($sqlPath, $sqlFilename);

            // Misalnya menambahkan gambar ke dalam folder 'product' di ZIP
            foreach ($data->product as $productItem) {
                $imagePath = public_path('storage/images/product/' . $productItem->image); // Path gambar asli di public/storage
                $zipImagePath = 'product/' . $productItem->image; // Path gambar di dalam ZIP
                
                if (file_exists($imagePath)) {
                    // Menambahkan gambar ke folder product di ZIP
                    $zip->addFile($imagePath, $zipImagePath);
                }
            }

            // Misalnya menambahkan gambar ke dalam folder 'gallery' di ZIP
            foreach ($data->gallery as $galleryItem) {
                $imagePath = public_path('storage/images/gallery/' . $galleryItem->image); // Path gambar asli di public/storage
                $zipImagePath = 'gallery/' . $galleryItem->image; // Path gambar di dalam ZIP
                
                if (file_exists($imagePath)) {
                    // Menambahkan gambar ke folder gallery di ZIP
                    $zip->addFile($imagePath, $zipImagePath);
                }
            }

            $imagePath = public_path('storage/images/logo/' . $data->logo); // Path gambar asli di public/storage
            $zipImagePath = 'logo/' . $data->logo; // Path gambar di dalam ZIP
            
            if (file_exists($imagePath)) {
                // Menambahkan gambar ke folder gallery di ZIP
                $zip->addFile($imagePath, $zipImagePath);
            }            

            // Tutup file ZIP
            $zip->close();
        } else {
            throw new \Exception("Gagal membuat file ZIP");
        }

        // Hapus file SQL sementara
        unlink($sqlPath);

        // Kirim file ZIP ke pengguna
        return response()->download($zipPath)->deleteFileAfterSend(true);


    }


    public function webgenerate(Request $request)
    {
        $voucher = Voucher::where('kode', $request->kode)->first();
        if ($voucher) {
            if ($voucher->status === 'not used') {
                $newdata = new Web;

                $newdata->title = $request->name;
                $newdata->url = $request->url;
                $newdata->web_type_id = $voucher->web_type_id;

                $newdata->save();

                $voucher->status = 'used';

                $voucher->save();

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function logo($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        
        if ($data) {
            if ($request->hasFile('image')) {
                if ($request->image !== null) {
                    if ($data->logo) {
                        $path = public_path('storage/images/logo/' . $data->logo);
    
                        if (file_exists($path)) {
                            unlink($path);
                        }
                    }
    
                    $imageFile = $request->file('image');
                    $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                    $imagePath = public_path('storage/images/logo/');

                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($imageFile->getPathname());
                    $imageFullPath = $imagePath . $imageName . '.webp';
                    $image->save($imageFullPath);

                    $data->logo = $imageName . '.webp';
                }
            }
            $data->save();
        }
        else {
            return redirect()->back();
        }
        
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Web::all();
        $data->transform(function ($data) {
            $data->type = $data->webType->type;
            return $data;
        });
        return view('admin.web.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Web $web)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Web $web)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Web $web)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Web $web)
    {
        //
    }
}
