<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            width: 100%;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>Edit Montir</h1>

<div class="container">
    <form action="{{ route('montir.update', $montir->id_montir) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_montir">Nama</label>
            <input type="text" name="nama_montir" value="{{ $montir->nama_montir }}" required>
        </div>

        <div class="form-group">
            <label for="no_tlpon">No Telepon</label>
            <input type="text" name="no_tlpon" value="{{ $montir->no_tlpon }}" required>
        </div>

        <div class="form-group">
            <label for="alamat_montir">Alamat</label>
            <textarea name="alamat_montir" required>{{ $montir->alamat_montir }}</textarea>
        </div>

        <div class="form-group">
            <label for="gajih">Gaji</label>
            <input type="number" name="gajih" value="{{ $montir->gajih }}" step="0.01" required>
        </div>

        <button type="submit">Perbarui</button>
    </form>
</div>

</body>
</html>
