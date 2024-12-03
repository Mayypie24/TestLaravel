<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaksi Barang dan Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .tab-content {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <h2>Transaksi Barang dan Layanan</h2>

    <!-- Tab Pilihan Barang dan Layanan -->
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" id="barang-tab" data-bs-toggle="pill" href="#barang">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="layanan-tab" data-bs-toggle="pill" href="#layanan">Layanan</a>
      </li>
    </ul>

    <!-- Isi Tab -->
    <div class="tab-content mt-3">
      <!-- Tab Barang -->
      <div class="tab-pane fade show active" id="barang">
        <h4>Pilih Barang</h4>
        <select class="form-select" id="pilih-barang">
          <option value="">Pilih Barang</option>
          <option value="barang1">Barang 1</option>
          <option value="barang2">Barang 2</option>
          <option value="barang3">Barang 3</option>
          <option value="barang4">Barang 4</option>
        </select>
        <div id="barang-detail" class="mt-3" style="display:none;">
          <h5>Daftar Barang:</h5>
          <ul>
            <li>Barang 1 - Rp. 100.000</li>
            <li>Barang 2 - Rp. 150.000</li>
            <li>Barang 3 - Rp. 200.000</li>
          </ul>
        </div>
      </div>

      <!-- Tab Layanan -->
      <div class="tab-pane fade" id="layanan">
        <h4>Pilih Layanan</h4>
        <select class="form-select" id="pilih-layanan">
          <option value="">Pilih Layanan</option>
          <option value="layanan1">Layanan 1</option>
          <option value="layanan2">Layanan 2</option>
          <option value="layanan3">Layanan 3</option>
        </select>
        <div id="layanan-detail" class="mt-3" style="display:none;">
          <h5>Daftar Layanan:</h5>
          <ul>
            <li>Layanan 1 - Rp. 50.000</li>
            <li>Layanan 2 - Rp. 80.000</li>
            <li>Layanan 3 - Rp. 120.000</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JavaScript untuk menampilkan detail setelah memilih barang atau layanan
    document.getElementById('pilih-barang').addEventListener('change', function () {
      var selectedBarang = this.value;
      if (selectedBarang) {
        document.getElementById('barang-detail').style.display = 'block';
      } else {
        document.getElementById('barang-detail').style.display = 'none';
      }
    });

    document.getElementById('pilih-layanan').addEventListener('change', function () {
      var selectedLayanan = this.value;
      if (selectedLayanan) {
        document.getElementById('layanan-detail').style.display = 'block';
      } else {
        document.getElementById('layanan-detail').style.display = 'none';
      }
    });
  </script>
</body>
</html>
