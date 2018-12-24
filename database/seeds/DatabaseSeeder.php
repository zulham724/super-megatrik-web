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
    	$this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(ServiceCategoriesTableSeeder::class);
        $this->call(ServiceListsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(MaterialCategoriesTableSeeder::class);
        $this->call(MaterialListsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(UserHasStatesTableSeeder::class);
        $this->call(UserHasStatusesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(BiodatasTableSeeder::class);
        $this->call(TransactionStatusesTableSeeder::class);
        $this->call(TransactionReviewsTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(ContentCategoriesTableSeeder::class);
        $this->call(ContentListsTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
    }
}
