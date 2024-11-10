<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name'=>'Cómo Ver una Cámara IP Desde Internet y la App DMSS Vimeo',
            'description'=>'"En este artículo, aprenderás paso a paso cómo acceder a tu cámara IP desde cualquier lugar utilizando una conexión a internet. Además, te explicaremos cómo configurar la app DMSS para ver las transmisiones en vivo de tu cámara IP de manera segura y sencilla desde tu dispositivo móvil. ¡Mantente conectado con lo que importa!"',
            'url'=>"https://youtu.be/weVCVh66lVE",
            'image'=>'courses/multiseg.jpg',
            'views'=>'1',
            'likes'=>'1',
        ]);

        Course::create([
            'name'=>'Cómo Ver una Cámara IP Desde Internet y la App DMSS',
            'description'=>'"En este artículo, aprenderás paso a paso cómo acceder a tu cámara IP desde cualquier lugar utilizando una conexión a internet. Además, te explicaremos cómo configurar la app DMSS para ver"',
            'url'=>'https://youtu.be/weVCVh66lVE',
            'image'=>'courses/multiseg.jpg',
            'views'=>'1',
            'likes'=>'1',
        ]);

        Course::create([
            'name'=>'Cómo Ver una Cámara IP Desde Internet y la App DMSS',
            'description'=>'"En este artículo, aprenderás paso a paso cómo acceder a tu cámara IP desde cualquier lugar utilizando una conexión a internet. Además, te explicaremos cómo configurar la app DMSS para ver las transmisiones en vivo de tu cámara IP de manera segura y sencilla desde tu dispositivo móvil. ¡Mantente conectado con lo que importa!"',
            'url'=>'https://youtu.be/weVCVh66lVE',
            'image'=>'courses/multiseg.jpg',
            'views'=>'1',
            'likes'=>'1',
        ]);
    }
}
