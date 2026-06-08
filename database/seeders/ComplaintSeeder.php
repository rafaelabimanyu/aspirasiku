<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Complaint;
use App\Models\Feedback;
use App\Models\Response;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get Users
        $ahmad = User::where('username', 'ahmad')->first();
        $siti = User::where('username', 'siti')->first();
        $petugas = User::where('username', 'petugas')->first();
        $admin = User::where('username', 'admin')->first();

        // Get Categories
        $infrastruktur = Category::where('slug', 'infrastruktur')->first();
        $kebersihan = Category::where('slug', 'kebersihan-lingkungan')->first();
        $pelayanan = Category::where('slug', 'pelayanan-publik')->first();

        // 1. Complaint: Jalan Rusak (Status: process)
        Complaint::create([
            'user_id' => $ahmad->id,
            'category_id' => $infrastruktur->id,
            'title' => 'Jalan Utama RT 03 Rusak Parah',
            'content' => 'Jalan utama di RT 03/RW 04 mengalami kerusakan parah. Banyak lubang besar yang membahayakan pengendara motor, terutama saat musim hujan karena tertutup genangan air. Mohon segera diperbaiki.',
            'attachment' => null,
            'status' => 'process',
            'is_private' => false,
            'complaint_date' => Carbon::now()->subDays(5),
        ]);

        // 2. Complaint: Penumpukan Sampah (Status: resolved)
        $complaint2 = Complaint::create([
            'user_id' => $siti->id,
            'category_id' => $kebersihan->id,
            'title' => 'Penumpukan Sampah di Dekat Pasar',
            'content' => 'Sampah menumpuk di pinggir jalan dekat pasar utama selama 3 hari terakhir dan menimbulkan bau tidak sedap. Tolong armada pengangkut sampah segera mengambil tindakan.',
            'attachment' => null,
            'status' => 'resolved',
            'is_private' => false,
            'complaint_date' => Carbon::now()->subDays(3),
        ]);

        // Response for complaint 2
        $response2 = Response::create([
            'complaint_id' => $complaint2->id,
            'user_id' => $petugas->id,
            'content' => 'Terima kasih atas laporannya. Tim kebersihan dari dinas lingkungan hidup telah dikirimkan ke lokasi pasar pagi hari ini dan sampah sudah diangkut seluruhnya ke TPA. Kami juga telah berkoordinasi dengan pihak pasar untuk penertiban pembuangan sampah ke depannya.',
            'response_date' => Carbon::now()->subDays(2),
        ]);

        // Feedback for response 2
        Feedback::create([
            'response_id' => $response2->id,
            'rating' => 5,
            'comment' => 'Sangat cepat ditanggapi dan jalanan sudah bersih kembali. Terima kasih banyak!',
        ]);

        // 3. Complaint: Pungli KTP (Status: pending, private)
        Complaint::create([
            'user_id' => $ahmad->id,
            'category_id' => $pelayanan->id,
            'title' => 'Dugaan Pungutan Liar Pengurusan KTP',
            'content' => 'Ada oknum petugas pelayanan di kantor kelurahan yang meminta biaya tambahan sebesar Rp 50.000 untuk pengurusan KTP cepat, padahal aturan resminya gratis. Mohon ditindaklanjuti secara rahasia demi kenyamanan bersama.',
            'attachment' => null,
            'status' => 'pending',
            'is_private' => true,
            'complaint_date' => Carbon::now()->subDay(),
        ]);
    }
}
