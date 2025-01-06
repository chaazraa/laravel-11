<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Nilais - nilai.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4"> DATA NILAI</h3>
                    <h5 class="text-center"><a href="https://nilai.com">www.nilai.com</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('nilais.create') }}" class="btn btn-md btn-success mb-3">ADD DATA NILAI</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">MATEMATIKA</th>
                                    <th scope="col">FISIKA</th>
                                    <th scope="col">BIOLOGI</th>
                                    <th scope="col">KIMIA</th>
                                    <th scope="col">AKUTANSI</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($nilais as $nilai)
                                    <tr>
                                        <td>{{ $nilai->matematika }}</td>
                                        <td>{{ $nilai->fisika }}</td>
                                        <td>{{ $nilai->biologi }}</td>
                                        <td>{{ $nilai->kimia }}</td>
                                        <td>{{ $nilai->akutansi }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('nilais.destroy', $nilai->id) }}" method="POST">
                                                <a href="{{ route('nilais.show', $nilai->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('nilais.edit', $nilai->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Nilai belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $nilais->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>