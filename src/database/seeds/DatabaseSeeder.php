<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([PermissionTableSeeder::class]);
        $this->call([RoleTableSeeder::class]);
        $this->call([AdvocateTableSeeder::class]);
        $this->call([BanklistTableSeeder::class]);
        $this->call([BorrowerTableSeeder::class]);
        $this->call([CaseleadofficerTableSeeder::class]);
        $this->call([CaseofficerTableSeeder::class]);
        $this->call([LoanTableSeeder::class]);
        $this->call([LocationMasterTableSeeder::class]);
        $this->call([RecoverybranchTableSeeder::class]);
        $this->call([ResolutionagentTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call([ValuerTableSeeder::class]);
        // $this->call([MigratingBranchTableSeeder::class]);
        factory(App\Models\User::class,50)->create();
    }
}
