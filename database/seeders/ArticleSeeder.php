<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Mengenal Konsep Zero Waste dalam Rumah Tangga',
                'slug' => 'mengenal-konsep-zero-waste-dalam-rumah-tangga',
                'content' => '<p class="nunito-regular">Zero waste bukan berarti tidak menghasilkan sampah sama sekali, tetapi lebih kepada filosofi hidup yang bertujuan mengurangi limbah seminimal mungkin dengan menerapkan prinsip 5R: Refuse, Reduce, Reuse, Recycle, dan Replant.</p>

<p class="nunito-bold">1. REFUSE (MENOLAK)</p>

<p class="nunito-regular">Menolak atau tidak menerima barang-barang yang tidak diperlukan. Contoh penerapannya adalah menolak kantong plastik saat berbelanja, bawa tas belanja sendiri, menolak sedotan plastik di restoran atau café, menolak brosur/flyer yang tidak dibutuhkan, menolak produk dengan kemasan berlebihan (over-packaging), menolak barang promosi gratis yang tidak berguna, menolak tawaran upgrade produk yang tidak diperlukan. Manfaatnya adalah mencegah sampah masuk ke rumah sejak awal.</p>

<p class="nunito-bold">2. REDUCE (MENGURANGI)</p>

<p class="nunito-regular">Mengurangi penggunaan atau konsumsi barang-barang yang berpotensi menjadi sampah. Contoh penerapannya adalah mengurangi pembelian barang yang tidak esensial, menggunakan produk yang tahan lama daripada sekali pakai, mengurangi penggunaan kertas dengan digitalisasi, membeli produk dalam kemasan besar untuk mengurangi kemasan, mengurangi konsumsi makanan berlebihan untuk mengurangi food waste, menggunakan kedua sisi kertas sebelum membuang. Manfaatnya adalah mengurangi volume sampah yang dihasilkan.</p>

<p class="nunito-bold">3. REUSE (MENGGUNAKAN KEMBALI)</p>

<p class="nunito-regular">Menggunakan kembali barang-barang yang masih bisa dipakai untuk fungsi yang sama atau berbeda. Contoh penerapannya adalah menggunakan botol bekas sebagai pot tanaman, memanfaatkan kardus bekas untuk tempat penyimpanan, menggunakan kembali kantong plastik untuk keperluan lain, mengubah pakaian lama menjadi kain lap, menggunakan kertas bekas untuk catatan, memberikan barang bekas yang masih bagus kepada orang lain.  Manfaatnya adalah memperpanjang masa pakai barang dan mengurangi pembelian baru.</p>

<p class="nunito-bold">4. RECYCLE (MENDAUR ULANG)</p>

<p class="nunito-regular">Mengolah sampah menjadi produk baru yang bermanfaat. Contoh penerapannya adalah memisahkan sampah kertas, plastik, logam untuk didaur ulang, mengumpulkan botol plastik untuk ditukar atau dijual ke pengepul, mendaur ulang kertas bekas menjadi kertas daur ulang, mengolah sampah elektronik melalui program daur ulang resmi, membuat kerajinan dari bahan bekas, menggunakan layanan daur ulang di komunitas atau pemerintah. Manfaatnya adalah mengubah sampah menjadi bahan baku produk baru.</p>

<p class="nunito-bold">5. REPLANT (MENANAM KEMBALI)</p>

<p class="nunito-regular">Memanfaatkan sampah organik untuk mendukung pertumbuhan tanaman dan mengembalikan nutrisi ke alam. Contoh penerapannya adalah membuat kompos dari sisa sayuran dan buah-buahan untuk pupuk tanaman, menanam kembali bagian sayuran yang bisa tumbuh (bawang, seledri, kangkung), menggunakan kulit telur sebagai starter pot untuk bibit tanaman, memanfaatkan air bekas cucian beras untuk menyiram tanaman, menanam tanaman dari biji-bijian sisa makanan (tomat, cabai, pepaya), membuat taman vertikal dari botol bekas untuk menanam sayuran, menggunakan daun kering sebagai mulsa untuk tanaman. Manfaatnya adalah mengembalikan nutrisi ke tanah, menghasilkan makanan/tanaman baru dan menciptakan siklus berkelanjutan.

Lalu, bagaimana untuk memulai zero waste bagi pemula? Mulai dari satu area kecil, misalnya dapur. Ganti produk habis pakai dengan alternatif ramah lingkungan secara bertahap. Libatkan seluruh anggota keluarga dalam gerakan ini. Terakhir, Dokumentasikan progress untuk motivasi.
<br> <br>

Semoga dengan artikel ini, Anda dapat menerapkan prinsip Zero Waste dengan baik!</p>',
                'thumbnail' => 'thumbnails/Article_Zero_Waste.svg',
                'admin_id' => 1,
                'created_at' => '2025-05-21 18.31.00',
                'updated_at' => '2025-05-21 18.31.00',
            ],
            [
                'title' => 'Panduan Membekukan Makanan yang Benar untuk Mengurangi Food Waste',
                'slug' => 'panduan-membekukan-makanan-yang-benar-untuk-mengurangi-food-waste',
                'content' => '<p class="nunito-regular">Membekukan makanan adalah cara efektif untuk memperpanjang umur simpan dan mengurangi food waste. Berikut panduan praktis untuk melakukannya dengan benar:</p>

<p class="nunito-bold">1. Pilih Makanan yang Cocok untuk Dibekukan</p>

<p class="nunito-regular">Tidak semua makanan cocok dibekukan. Sayuran seperti bayam, wortel, dan brokoli, serta daging, ikan, dan buah-buahan seperti beri cocok untuk dibekukan. Namun, makanan seperti selada, mentimun, atau telur mentah kurang ideal karena teksturnya berubah setelah dicairkan. Pastikan makanan dalam kondisi segar sebelum dibekukan untuk hasil terbaik.</p>

<p class="nunito-bold">2. Persiapkan Makanan dengan Benar</p>

<p class="nunito-regular">Cuci bersih sayuran dan buah-buahan, lalu keringkan. Untuk sayuran, blanching (merebus sebentar lalu direndam di air es) membantu mempertahankan warna, tekstur, dan nutrisi. Potong makanan dalam porsi kecil agar mudah digunakan. Untuk daging, pisahkan lemak berlebih dan bungkus rapat untuk mencegah freezer burn.</p>

<p class="nunito-bold">3. Gunakan Kemasan yang Tepat</p>

<p class="nunito-regular">Gunakan wadah kedap udara, plastik khusus freezer, atau aluminium foil untuk mencegah udara masuk. Pastikan tidak ada ruang kosong di dalam kemasan untuk mengurangi risiko oksidasi. Beri label dengan nama makanan dan tanggal pembekuan agar mudah dilacak.</p>

<p class="nunito-bold">4. Atur Suhu Freezer</p>

<p class="nunito-regular">Suhu freezer ideal adalah -18°C atau lebih rendah. Pastikan freezer tidak terlalu penuh agar sirkulasi udara tetap baik. Letakkan makanan baru di bagian belakang freezer untuk pendinginan merata.</p>

<p class="nunito-bold">5. Pantau Waktu Penyimpanan</p>

<p class="nunito-regular">Kebanyakan makanan beku bertahan 3-6 bulan. Buah dan sayuran bisa hingga 8-12 bulan, sedangkan daging hingga 6 bulan. Jangan simpan terlalu lama untuk menjaga kualitas.</p>

<p class="nunito-bold">6. Cara Mencairkan yang Aman</p>

<p class="nunito-regular">Cairkan makanan di kulkas semalaman untuk mencegah pertumbuhan bakteri. Alternatifnya, gunakan microwave dengan mode defrost atau rendam kemasan dalam air dingin.
<br> <br>
Dengan mengikuti langkah-langkah ini, Anda dapat mengurangi food waste, menghemat biaya, dan menjaga kualitas makanan. Mulailah membekukan dengan bijak!</p>',
                'thumbnail' => 'thumbnails/Article_Freezing_Food.svg',
                'admin_id' => 1,
                'created_at' => '2025-05-22 18.30.00',
                'updated_at' => '2025-05-22 18.30.00',
            ],
            [
                'title' => 'Sistem Inventory Sederhana untuk Kebutuhan Rumah Tangga',
                'slug' => 'sistem-inventory-sederhana-untuk-kebutuhan-rumah-tangga',
                'content' => '<p class="nunito-regular">Mengelola stok kebutuhan rumah tangga secara efektif dapat mencegah pemborosan dan memastikan ketersediaan barang penting. Berikut panduan membuat sistem inventory sederhana:</p>

<p class="nunito-bold">1. Identifikasi Kebutuhan Rumah Tangga</p>

<p class="nunito-regular">Buat daftar kategori barang, seperti bahan makanan (beras, minyak, rempah), produk kebersihan (sabun, deterjen), dan kebutuhan pribadi (pasta gigi, tisu). Prioritaskan barang yang sering digunakan atau cepat habis.</p>

<p class="nunito-bold">2. Tentukan Media Pencatatan</p>

<p class="nunito-regular">Gunakan alat sederhana seperti buku catatan, spreadsheet (Excel/Google Sheets), atau aplikasi inventory gratis seperti "Pantry Check". Spreadsheet lebih fleksibel karena bisa diurutkan dan dihitung otomatis.</p>

<p class="nunito-bold">3. Buat Tabel Inventory</p>

<p class="nunito-regular">Di spreadsheet, buat kolom: Nama Barang, Kategori, Jumlah Stok, Satuan, Tanggal Pembelian, Tanggal Kedaluwarsa, dan Catatan. Misalnya: "Beras | Makanan | 5 | kg | 10-06-2025 | 10-12-2025 | Simpan di wadah kedap udara". Perbarui setiap kali membeli atau menggunakan barang.</p>

<p class="nunito-bold">4. Tetapkan Batas Minimum Stok</p>

<p class="nunito-regular">Tentukan jumlah minimum untuk setiap barang berdasarkan kebutuhan bulanan. Contoh: jika rumah tangga menggunakan 2 kg beras per minggu, tetapkan batas minimum 4 kg untuk cadangan. Catat barang yang mendekati batas untuk belanja ulang.</p>

<p class="nunito-bold">5. Lakukan Pemeriksaan Rutin</p>

<p class="nunito-regular">Periksa stok setiap dua minggu atau sebulan sekali. Cocokkan jumlah fisik dengan catatan dan perhatikan tanggal kedaluwarsa untuk menghindari pembusukan. Rotasi stok dengan metode FIFO (First In, First Out) agar barang lama digunakan terlebih dahulu.</p>

<p class="nunito-bold">6. Catat Pengeluaran dan Evaluasi</p>

<p class="nunito-regular">Catat pengeluaran untuk setiap pembelian barang. Evaluasi bulanan untuk mengidentifikasi pola konsumsi dan mengurangi pembelian berlebih. Misalnya, jika sabun selalu sisa, kurangi frekuensi pembelian.
<br> <br>
Dengan sistem ini, Anda dapat mengelola kebutuhan rumah tangga secara efisien, mengurangi pemborosan, dan menjaga anggaran tetap terkendali. Mulailah dengan langkah kecil dan konsisten!</p>',
                'thumbnail' => 'thumbnails/Article_Storage.svg',
                'admin_id' => 1,
                'created_at' => '2025-05-23 18.30.00',
                'updated_at' => '2025-05-23 18.30.00',
            ],
            [
                'title' => 'Tips Berbelanja Bahan Makanan Tanpa Pemborosan',
                'slug' => 'tips-berbelanja-bahan-makanan-tanpa-pemborosan',
                'content' => '<p class="nunito-regular">Berbelanja bahan makanan secara cerdas dapat mengurangi pemborosan, menghemat anggaran, dan mendukung gaya hidup berkelanjutan. Berikut adalah tips praktis untuk berbelanja tanpa membuang-buang makanan:</p>

<p class="nunito-bold">1. Rencanakan Menu Mingguan</p>
<p class="nunito-regular">Buat rencana menu untuk seminggu ke depan berdasarkan kebutuhan keluarga. Tulis daftar belanja spesifik untuk bahan yang dibutuhkan, seperti sayuran, protein, atau rempah. Ini membantu menghindari pembelian impulsif yang sering terbuang.</p>

<p class="nunito-bold">2. Periksa Stok di Rumah</p>
<p class="nunito-regular">Sebelum berbelanja, cek isi kulkas, freezer, dan dapur. Gunakan bahan yang sudah ada untuk mengurangi pembelian berlebih. Catat barang yang hampir habis atau mendekati tanggal kedaluwarsa untuk diprioritaskan dalam menu.</p>

<p class="nunito-bold">3. Belanja Sesuai Porsi</p>
<p class="nunito-regular">Beli bahan makanan dalam jumlah yang sesuai dengan kebutuhan. Misalnya, jika hanya memasak untuk dua orang, hindari membeli sayuran dalam jumlah besar yang sulit dihabiskan. Pilih opsi curah untuk membeli secukupnya.</p>

<p class="nunito-bold">4. Pilih Bahan Segar dan Tahan Lama</p>
<p class="nunito-regular">Pilih bahan segar dengan kualitas baik, seperti sayuran yang masih renyah atau buah tanpa bercak busuk. Untuk stok jangka panjang, pertimbangkan bahan tahan lama seperti beras, kacang-kacangan, atau makanan kaleng.</p>

<p class="nunito-bold">5. Manfaatkan Promo dengan Bijak</p>
<p class="nunito-regular">Ambil keuntungan dari diskon, tetapi hanya untuk barang yang benar-benar dibutuhkan dan bisa disimpan lama. Hindari membeli hanya karena harga murah, terutama untuk bahan yang cepat rusak.</p>

<p class="nunito-bold">6. Simpan dengan Benar</p>
<p class="nunito-regular">Setelah berbelanja, simpan bahan makanan dengan tepat. Sayuran hijau dibungkus kain lembap, daging di freezer, dan keringkan rempah agar tahan lama. Penyimpanan yang baik mencegah pembusukan dini.<br><br>Dengan menerapkan tips ini, Anda dapat berbelanja secara efisien, mengurangi food waste, dan menjaga anggaran rumah tangga tetap terkendali.</p>',
                'thumbnail' => 'thumbnails/Article_Purchase_No_Waste.svg',
                'admin_id' => 1,
                'created_at' => '2025-05-24 18.30.00',
                'updated_at' => '2025-05-24 18.30.00',
            ],
            [
                'title' => 'Panduan Membuat Kompos dari Sisa Makanan',
                'slug' => 'panduan-membuat-kompos-dari-sisa-makanan',
                'content' => '<p class="nunito-regular">Mengubah sisa makanan menjadi kompos adalah cara efektif untuk mengurangi sampah organik dan menciptakan pupuk alami untuk tanaman. Berikut panduan praktis untuk membuat kompos di rumah:</p>

<p class="nunito-bold">1. Kumpulkan Sisa Makanan yang Sesuai</p>
<p class="nunito-regular">Kumpulkan sisa makanan seperti kulit sayuran, ampas kopi, cangkang telur, dan sisa buah. Hindari makanan berlemak, daging, ikan, atau produk susu karena dapat menarik hama dan menghasilkan bau tidak sedap.</p>

<p class="nunito-bold">2. Siapkan Wadah Kompos</p>
<p class="nunito-regular">Gunakan ember atau tong dengan lubang ventilasi untuk sirkulasi udara. Letakkan di tempat teduh dan kering. Jika memungkinkan, gunakan komposter khusus atau buat wadah sederhana dari kayu atau plastik dengan penutup.</p>

<p class="nunito-bold">3. Campur Bahan Kompos</p>
<p class="nunito-regular">Campur sisa makanan (bahan "hijau" kaya nitrogen) dengan bahan "cokelat" seperti daun kering, serbuk gergaji, atau kertas sobek dengan rasio 1:3. Bahan cokelat membantu menjaga keseimbangan kelembapan dan mencegah bau.</p>

<p class="nunito-bold">4. Jaga Kelembapan dan Aerasi</p>
<p class="nunito-regular">Pastikan kompos tetap lembap seperti spons basah, tetapi tidak becek. Aduk campuran setiap 3-5 hari untuk meningkatkan aerasi dan mempercepat penguraian. Jika terlalu kering, tambahkan sedikit air.</p>

<p class="nunito-bold">5. Pantau Proses Pengomposan</p>
<p class="nunito-regular">Proses pengomposan biasanya memakan waktu 1-3 bulan, tergantung suhu dan bahan. Kompos jadi berwarna gelap, bertekstur remah, dan berbau tanah. Jika masih ada bau busuk, tambahkan bahan cokelat dan aduk lebih sering.</p>

<p class="nunito-bold">6. Gunakan Kompos dengan Bijak</p>
<p class="nunito-regular">Setelah jadi, gunakan kompos untuk menyuburkan tanaman di kebun atau pot. Taburkan di permukaan tanah atau campur dengan media tanam. Simpan sisa kompos di wadah kering untuk penggunaan berikutnya.<br><br>Dengan mengikuti panduan ini, Anda dapat mengurangi sisa makanan, mendukung lingkungan, dan menghasilkan pupuk alami berkualitas.</p>',
                'thumbnail' => 'thumbnails/Article_Create_Compost.svg',
                'admin_id' => 1,
                'created_at' => '2025-05-25 18.30.00',
                'updated_at' => '2025-05-25 18.30.00',
            ],
            [
                'title' => 'Cara Memilih Produk Private Label yang Berkualitas',
                'slug' => 'cara-memilih-produk-private-label-yang-berkualitas',
                'content' => '<p class="nunito-regular">Mengubah sisa makanan menjadi kompos adalah cara efektif untuk mengurangi sampah organik dan menciptakan pupuk alami untuk tanaman. Berikut panduan praktis untuk membuat kompos di rumah:</p>

<p class="nunito-bold">1. Kumpulkan Sisa Makanan yang Sesuai</p>
<p class="nunito-regular">Kumpulkan sisa makanan seperti kulit sayuran, ampas kopi, cangkang telur, dan sisa buah. Hindari makanan berlemak, daging, ikan, atau produk susu karena dapat menarik hama dan menghasilkan bau tidak sedap.</p>

<p class="nunito-bold">2. Siapkan Wadah Kompos</p>
<p class="nunito-regular">Gunakan ember atau tong dengan lubang ventilasi untuk sirkulasi udara. Letakkan di tempat teduh dan kering. Jika memungkinkan, gunakan komposter khusus atau buat wadah sederhana dari kayu atau plastik dengan penutup.</p>

<p class="nunito-bold">3. Campur Bahan Kompos</p>
<p class="nunito-regular">Campur sisa makanan (bahan "hijau" kaya nitrogen) dengan bahan "cokelat" seperti daun kering, serbuk gergaji, atau kertas sobek dengan rasio 1:3. Bahan cokelat membantu menjaga keseimbangan kelembapan dan mencegah bau.</p>

<p class="nunito-bold">4. Jaga Kelembapan dan Aerasi</p>
<p class="nunito-regular">Pastikan kompos tetap lembap seperti spons basah, tetapi tidak becek. Aduk campuran setiap 3-5 hari untuk meningkatkan aerasi dan mempercepat penguraian. Jika terlalu kering, tambahkan sedikit air.</p>

<p class="nunito-bold">5. Pantau Proses Pengomposan</p>
<p class="nunito-regular">Proses pengomposan biasanya memakan waktu 1-3 bulan, tergantung suhu dan bahan. Kompos jadi berwarna gelap, bertekstur remah, dan berbau tanah. Jika masih ada bau busuk, tambahkan bahan cokelat dan aduk lebih sering.</p>

<p class="nunito-bold">6. Gunakan Kompos dengan Bijak</p>
<p class="nunito-regular">Setelah jadi, gunakan kompos untuk menyuburkan tanaman di kebun atau pot. Taburkan di permukaan tanah atau campur dengan media tanam. Simpan sisa kompos di wadah kering untuk penggunaan berikutnya.<br><br>Dengan mengikuti panduan ini, Anda dapat mengurangi sisa makanan, mendukung lingkungan, dan menghasilkan pupuk alami berkualitas.</p>',
                'thumbnail' => 'thumbnails/Article_Choose_Quality_Label.svg',
                'admin_id' => 1,
                'created_at' => '2025-05-26 18.30.00',
                'updated_at' => '2025-05-26 18.30.00',
            ],

        ]);
    }
}
