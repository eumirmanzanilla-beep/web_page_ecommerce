<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Categories
        $utensilios = Category::create([
            'name' => 'Utensilios',
            'description' => 'Cucharones, tenedores, cuchillos, y más.',
            'slug' => 'utensilios',
        ]);

        $equipo = Category::create([
            'name' => 'Equipo de Cocina',
            'description' => 'Estufas integradas, freidoras, planchas, etc.',
            'slug' => 'equipo-cocina',
        ]);

        $trastes = Category::create([
            'name' => 'Trastes',
            'description' => 'Bowls de aluminio, charolas, platos, etc.',
            'slug' => 'trastes',
        ]);

        $maquinas = Category::create([
            'name' => 'Máquinas Pequeñas',
            'description' => 'Licuadoras, batidoras, microondas, etc.',
            'slug' => 'maquinas-pequenas',
        ]);

        $muebleria = Category::create([
            'name' => 'Mueblería',
            'description' => 'Estantes de aluminio, mesas de trabajo, tarjas, etc.',
            'slug' => 'muebleria',
        ]);

        // Create Products for Utensilios
        Product::create([
            'name' => 'Cucharón de Acero',
            'description' => 'Ideal para sopas y guisos. Material de acero inoxidable de alta calidad.',
            'price' => 45.00,
            'stock' => 50,
            'category_id' => $utensilios->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Cuchillo de Chef',
            'description' => 'Corte preciso, 8 pulgadas. Hoja de acero inoxidable profesional.',
            'price' => 120.00,
            'stock' => 30,
            'category_id' => $utensilios->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Espátula de Goma',
            'description' => 'Resistente al calor. Ideal para cocinar sin rayar ollas.',
            'price' => 25.00,
            'stock' => 75,
            'category_id' => $utensilios->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Juego de Tenedores',
            'description' => 'Acero inoxidable (12 pzs). Set completo para restaurante.',
            'price' => 180.00,
            'stock' => 40,
            'category_id' => $utensilios->id,
            'active' => true,
        ]);

        // Create Products for Equipo de Cocina
        Product::create([
            'name' => 'Estufa Industrial',
            'description' => '6 quemadores y horno. Ideal para cocinas profesionales.',
            'price' => 8500.00,
            'stock' => 5,
            'category_id' => $equipo->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Freidora de Aire',
            'description' => 'Industrial, 20L. Cocción saludable sin aceite.',
            'price' => 3200.00,
            'stock' => 8,
            'category_id' => $equipo->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Plancha de Acero',
            'description' => 'Superficie antiadherente. Perfecta para carnes y verduras.',
            'price' => 1500.00,
            'stock' => 12,
            'category_id' => $equipo->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Horno de Convección',
            'description' => 'Cocción pareja. Ideal para panadería y repostería.',
            'price' => 12000.00,
            'stock' => 3,
            'category_id' => $equipo->id,
            'active' => true,
        ]);

        // Create Products for Trastes
        Product::create([
            'name' => 'Juego de Bowls',
            'description' => 'Aluminio reforzado. Set de 5 tamaños diferentes.',
            'price' => 350.00,
            'stock' => 25,
            'category_id' => $trastes->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Charolas para Hornear',
            'description' => 'Set de 3 tamaños. Resistentes al calor.',
            'price' => 280.00,
            'stock' => 30,
            'category_id' => $trastes->id,
            'active' => true,
        ]);

        // Create Products for Máquinas Pequeñas
        Product::create([
            'name' => 'Licuadora Industrial',
            'description' => 'Alta potencia (3HP). Perfecta para uso intensivo.',
            'price' => 4500.00,
            'stock' => 6,
            'category_id' => $maquinas->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Batidora de Pedestal',
            'description' => '10L, 3 velocidades. Ideal para masas y cremas.',
            'price' => 3800.00,
            'stock' => 7,
            'category_id' => $maquinas->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Microondas Industrial',
            'description' => 'Uso rudo, acero. Capacidad 30L.',
            'price' => 2800.00,
            'stock' => 10,
            'category_id' => $maquinas->id,
            'active' => true,
        ]);

        // Create Products for Mueblería
        Product::create([
            'name' => 'Estante de Aluminio',
            'description' => '4 niveles, alta resistencia. Ideal para almacenamiento.',
            'price' => 1200.00,
            'stock' => 15,
            'category_id' => $muebleria->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Mesa de Trabajo',
            'description' => 'Acero inoxidable (1.80m). Superficie resistente.',
            'price' => 5500.00,
            'stock' => 4,
            'category_id' => $muebleria->id,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Tarja Doble',
            'description' => 'Grado alimenticio. Incluye grifos y accesorios.',
            'price' => 8500.00,
            'stock' => 3,
            'category_id' => $muebleria->id,
            'active' => true,
        ]);
    }
}
