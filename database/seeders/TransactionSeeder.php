<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'title' => 'Gaji Bulanan',
                'type' => 'income',
                'amount' => 6500000,
                'category' => 'Gaji',
                'description' => 'Gaji bulanan dari kantor',
                'date' => now()->subDays(20),
            ],
            [
                'title' => 'Bonus Kinerja',
                'type' => 'income',
                'amount' => 1200000,
                'category' => 'Bonus',
                'description' => 'Bonus pencapaian target bulan ini',
                'date' => now()->subDays(18),
            ],
            [
                'title' => 'Proyek Desain Logo',
                'type' => 'income',
                'amount' => 850000,
                'category' => 'Freelance',
                'description' => 'Pembayaran proyek desain logo client',
                'date' => now()->subDays(15),
            ],
            [
                'title' => 'Makan Siang',
                'type' => 'expense',
                'amount' => 35000,
                'category' => 'Makanan',
                'description' => 'Makan siang di warung dekat kantor',
                'date' => now()->subDays(14),
            ],
            [
                'title' => 'Isi Bensin',
                'type' => 'expense',
                'amount' => 100000,
                'category' => 'Transportasi',
                'description' => 'Isi bensin motor untuk seminggu',
                'date' => now()->subDays(13),
            ],
            [
                'title' => 'Belanja Bulanan',
                'type' => 'expense',
                'amount' => 450000,
                'category' => 'Belanja',
                'description' => 'Belanja kebutuhan rumah tangga bulanan',
                'date' => now()->subDays(10),
            ],
            [
                'title' => 'Bayar Listrik',
                'type' => 'expense',
                'amount' => 275000,
                'category' => 'Tagihan',
                'description' => 'Pembayaran tagihan listrik bulan ini',
                'date' => now()->subDays(8),
            ],
            [
                'title' => 'Bayar Internet',
                'type' => 'expense',
                'amount' => 300000,
                'category' => 'Tagihan',
                'description' => 'Tagihan internet rumah bulanan',
                'date' => now()->subDays(7),
            ],
            [
                'title' => 'Ojek Online',
                'type' => 'expense',
                'amount' => 25000,
                'category' => 'Transportasi',
                'description' => 'Ongkos ojek online ke kantor',
                'date' => now()->subDays(5),
            ],
            [
                'title' => 'Makan Malam Keluarga',
                'type' => 'expense',
                'amount' => 150000,
                'category' => 'Makanan',
                'description' => 'Makan malam bersama keluarga di akhir pekan',
                'date' => now()->subDays(3),
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}
