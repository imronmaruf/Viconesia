@extends('be.layouts.main')

@push('title')
    Edit Profil
@endpush

@push('css')
@endpush

@section('content')
    <div class="container-xl mt-3">
        <div class="card">
            <!-- Card Status Top -->
            <div class="card-status-top bg-green"></div>

            <!-- Card Header -->
            <div class="card-header">
                <h3 class="card-title">Edit Profil</h3>
            </div>

            <!-- Form -->
            <form action="{{ route('be/profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <!-- Company Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan/Brand</label>
                                <input type="text" name="company_name"
                                    class="form-control @error('company_name') is-invalid @enderror"
                                    value="{{ old('company_name', $profile->company_name) }}"
                                    placeholder="Enter Company Name">
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Maps</label>
                                <input type="text" name="maps"
                                    class="form-control @error('maps') is-invalid @enderror"
                                    value="{{ old('maps', $profile->maps) }}" placeholder="Masukkan Link GMaps">
                                @error('maps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ old('address', $profile->address) }}" placeholder="Enter Address">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nomor Telephone</label>
                                <input type="number" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number', $profile->phone_number) }}"
                                    placeholder="Enter Phone Number">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone Number -->
                        {{-- <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nomor Telephone</label>
                                <input type="file" name="portfolio_file"
                                    class="form-control @error('portfolio_file') is-invalid @enderror"
                                    value="{{ old('portfolio_file', $profile->portfolio_file) }}">

                                @if ($profile->portfolio_file)
                                    <div class="mt-3">
                                        <h5>Preview File:</h5>
                                        <!-- Jika file adalah gambar -->
                                        @if (in_array(pathinfo($profile->portfolio_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                            <img src="{{ asset('storage/' . $profile->portfolio_file) }}"
                                                alt="Preview Image" class="img-fluid" width="200">
                                            <!-- Jika file adalah PDF -->
                                        @elseif (pathinfo($profile->portfolio_file, PATHINFO_EXTENSION) == 'pdf')
                                            <embed src="{{ asset('storage/' . $profile->portfolio_file) }}"
                                                type="application/pdf" width="200" height="300">
                                        @else
                                            <a href="{{ asset('storage/' . $profile->portfolio_file) }}"
                                                target="_blank">Download File</a>
                                        @endif
                                    </div>
                                @endif

                                @error('portfolio_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nomor Telephone</label>
                                <input type="file" name="portfolio_file"
                                    class="form-control @error('portfolio_file') is-invalid @enderror"
                                    value="{{ old('portfolio_file', $profile->portfolio_file) }}">

                                @if ($profile->portfolio_file)
                                    <div class="mt-2">
                                        {{-- <h5>Preview File:</h5> --}}
                                        <!-- Link untuk melihat file PDF -->
                                        <a href="{{ asset('storage/' . $profile->portfolio_file) }}" target="_blank">Lihat
                                            File PDF</a>
                                    </div>
                                @endif

                                @error('portfolio_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <!-- Email -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $profile->email) }}" placeholder="Enter Email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <!-- Instagram -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Username Instagram</label>
                                <input type="text" name="instagram_link"
                                    class="form-control @error('instagram_link') is-invalid @enderror"
                                    value="{{ old('instagram_link', $profile->instagram_link) }}"
                                    placeholder="Masukkan username Instagram">
                                @error('instagram_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">WhatsApp</label>
                                <input type="number" name="whatsapp_link"
                                    class="form-control @error('whatsapp_link') is-invalid @enderror"
                                    value="{{ old('whatsapp_link', $profile->whatsapp_link) }}"
                                    placeholder="Masukkan No whatsapp ex.62821">
                                @error('whatsapp_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <!-- Description -->
                        <div class="col-md-8">
                            <div class="mb-2">
                                <label class="form-label">Deskripsi / Tentang</label>
                                <textarea name="description" rows="9" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Write a brief description">{{ old('description', $profile->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Logo Upload -->
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label for="logo_path" class="form-label">Logo</label>
                                <input type="file" name="logo_path" id="logo_path"
                                    class="form-control @error('logo_path') is-invalid @enderror" accept="image/*">
                                @error('logo_path')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Image Preview -->
                            <div class="mb-3">
                                <img id="logoPreview" class="img-fluid border" alt="Logo Preview"
                                    style="max-height: 120px;"
                                    src="{{ $profile->logo_path ? asset('storage/' . $profile->logo_path) : '' }}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('be/profile.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.getElementById('logo_path').addEventListener('change', function(event) {
            const input = event.target;
            const preview = document.getElementById('logoPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]); // Baca file sebagai URL data
            } else {
                // Reset preview jika tidak ada file yang dipilih
                preview.src = "{{ $profile->logo_path ? asset('storage/' . $profile->logo_path) : '' }}";
            }
        });
    </script>
@endpush
