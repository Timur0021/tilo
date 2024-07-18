<?php

namespace App\Filament\Resources\VandorCategory\database\seeders\Service;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Worker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workers = Worker::all();
        $serviceCategories = ServiceCategory::all();

        foreach (range(1, 10) as $index)
        {
            $service = Service::create([
                'title' => "Service" . $index,
                'description' => "Description post" . $index,
                'price' => rand(100, 1000),
                'worker_id' => $workers->random()->id,
                'service_category_id' => $serviceCategories->random()->id,
            ]);

            /*
             * Upload image
             */
            $imageUrl = 'https://via.placeholder.com/1920x1080.png?text=Sample+Image+' . $index;
            $imageContents = Http::get($imageUrl)->body();
            $imagePath = storage_path('app/public/sample_image' . $index . '.jpg');
            file_put_contents($imagePath, $imageContents);

            // Додавання фото до посту
            $service->addMedia($imagePath)
                ->preservingOriginal()
                ->toMediaCollection('service_banner_image');
        }
    }
}
