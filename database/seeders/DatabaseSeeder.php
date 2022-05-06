<?php

namespace Database\Seeders;

use App\Http\Controllers\AccountController;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        $this->seedCandidates();

        $this->seedAdmins();
    }

    private function getDataFromCsv($dataName)
    {
        $data = [];
        $handle = fopen(resource_path("data/" . $dataName . ".csv"), "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $cleanedData = trim(str_replace("\"","",$line));
                array_push($data, $cleanedData);
            }

            fclose($handle);
        }
        return $data;
    }

    private function performSeed($dataFileName, $candidateLocation, $candidatePosition) 
    {
        $datas = $this->getDataFromCsv($dataFileName);

        foreach($datas as $data) {
            Candidate::create([
                'name' => $data,
                'location' => $candidateLocation,
                'position' => $candidatePosition
            ]);
        }
    }

    private function seedAdmins()
    {
        $municipalities = AccountController::validMuninicipalities();

        foreach($municipalities as $municipality) {
            User::factory()->create([
                'name' => "$municipality Admin",
                'username'=> str_replace(" ","_", strtolower($municipality)) . "_admin",
                'password' => Hash::make('123456'),
                'type' => 'Admin',
                'municipality' => $municipality
            ]);
        }
       
    }

    private function seedCandidates()
    {
        $this->performSeed('presidents', 'Nationwide', 'President');
        $this->performSeed('vice_presidents', 'Nationwide', 'Vice-President');
        $this->performSeed('senators', 'Nationwide', 'Senators');
        $this->performSeed('governor', 'Southern Leyte', 'Governor');
        $this->performSeed('vice_governor', 'Southern Leyte', 'Vice-Governor');
        $this->performSeed('sp_first', 'Southern Leyte', 'Sangguniang Panlalawigan-First District');
        $this->performSeed('sp_second', 'Southern Leyte', 'Sangguniang Panlalawigan-Second District');
        $this->performSeed('hp_first', 'Southern Leyte', 'House of Representatives-First District');
        $this->performSeed('hp_second', 'Southern Leyte', 'House of Representatives-Second District');
    }

}
