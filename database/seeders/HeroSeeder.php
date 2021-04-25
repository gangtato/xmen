<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SuperHero = new \App\Models\SuperHero;
        // // Professor X
        // $SuperHero->nama_super_hero = "Professor X";
        // $SuperHero->jenis_kelamin = "laki-laki";
        // $SuperHero->save();
        // $this->command->info("Super Hero Berhasil di Insert");

        // // Wolverine
        // $SuperHero->nama_super_hero = "Wolverine";
        // $SuperHero->jenis_kelamin = "laki-laki";
        // $SuperHero->save();
        // $this->command->info("Super Hero Berhasil di Insert");

        // // Raven
        // $SuperHero->nama_super_hero = "Raven";
        // $SuperHero->jenis_kelamin = "laki-laki";
        // $SuperHero->save();
        // $this->command->info("Super Hero Berhasil di Insert");

        // Beast
        $SuperHero->nama_super_hero = "Beast";
        $SuperHero->jenis_kelamin = "laki-laki";
        $SuperHero->save();
        $this->command->info("Super Hero Berhasil di Insert");

        // // Strom
        // $SuperHero->nama_super_hero = "Strom";
        // $SuperHero->jenis_kelamin = "Perempuan";
        // $SuperHero->save();
        // $this->command->info("Super Hero Berhasil di Insert");
    }
}
