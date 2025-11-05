<?php
echo "<h2 style='text-align:center; color:#5a4633;'>🧾  POLGAN MART  🧾</h2>";
echo "<hr style='width:55%; border:1px solid #8b6b4f;'>";

$nama_barang   = ["Tas Ransel", "Sepatu", "Seragam", "Hijab Segi Empat", "Dasi"];
$harga_barang  = [120000, 200000, 400000, 30000, 10000];
$kode_barang   = ["AR01", "AR02", "AR03", "AR04", "AR05"];

shuffle($nama_barang);

$jumlah_produk = rand(1, count($nama_barang));

$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;

for ($i = 0; $i < $jumlah_produk; $i++) {
    $beli[$i] = $nama_barang[$i];       // nama barang yang dibeli
    $jumlah[$i] = rand(1, 5);           // jumlah barang acak
    $index_harga = array_search($beli[$i], ["Tas Ransel", "Sepatu", "Seragam", "Hijab Segi Empat", "Dasi"]);
    $total[$i] = $harga_barang[$index_harga] * $jumlah[$i]; // total per barang
}

echo "<div style='display:flex; justify-content:center; padding:30px;'>";
echo "<div style='border:3px solid #8b6b4f; border-radius:12px; padding:30px; width:648px; background-color:#fdf6ec; box-shadow:4px 4px 10px rgba(139,107,79,0.3);'>";
echo "<pre style='font-family:Courier New; font-size:16px; text-align:left; color:#4b3a2f; margin:0;'>";

$header = "No  Kode   Nama Barang            Qty   Harga           Total";
echo $header . "\n";
echo str_repeat("-", strlen($header)) . "\n";

$no = 1;
foreach ($beli as $i => $barang) {
    $harga = $total[$i] / $jumlah[$i];
    $kode = $kode_barang[array_search($barang, ["Tas Ransel", "Sepatu", "Seragam", "Hijab Segi Empat", "Dasi"])];
    printf("%-3s %-6s %-22s %-5s Rp %-12s Rp %-12s\n",
        $no,
        $kode,
        $barang,
        $jumlah[$i],
        number_format($harga, 0, ',', '.'),
        number_format($total[$i], 0, ',', '.')
    );
    $grandtotal += $total[$i];
    $no++;
}


echo str_repeat("-", strlen($header)) . "\n";
printf("%-55s Rp %-12s\n", "Total Belanja :", number_format($grandtotal, 0, ',', '.'));
echo str_repeat("-", strlen($header)) . "\n";
echo "Terima kasih telah berbelanja di POLGAN MART 😊";

echo "</pre>";
echo "</div>";
echo "</div>";
?>
