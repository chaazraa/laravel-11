<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Nilais - nilai.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('nilais.update', $nilai->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">MATEMATIKA</label>
                                <input type="number" class="form-control @error('matematika') is-invalid @enderror" name="matematika" value="{{ old('matematika', $nilai->matematika) }}" placeholder="Masukkan Nilai">
                            
                                <!-- error message untuk matematika -->
                                @error('matematika')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FISIKA</label>
                                <input type="number" class="form-control @error('fisika') is-invalid @enderror" name="fisika" value="{{ old('fisika', $nilai->fisika) }}" placeholder="Masukkan Nilai">
                            
                                <!-- error message untuk fisika -->
                                @error('fisika')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">BIOLOGI</label>
                                <input type="number" class="form-control @error('biologi') is-invalid @enderror" name="biologi" value="{{ old('biologi', $nilai->biologi) }}" placeholder="Masukkan Nilai">
                            
                                <!-- error message untuk biologi -->
                                @error('biologi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">KIMIA</label>
                                <input type="number" class="form-control @error('kimia') is-invalid @enderror" name="kimia" value="{{ old('kimia', $nilai->kimia) }}" placeholder="Masukkan Nilai">
                            
                                <!-- error message untuk kimia -->
                                @error('kimia')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">AKUTANSI</label>
                                <input type="number" class="form-control @error('akutansi') is-invalid @enderror" name="akutansi" value="{{ old('akutansi', $nilai->akutansi) }}" placeholder="Masukkan Nilai">
                            
                                <!-- error message untuk akutansi -->
                                @error('akutansi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>