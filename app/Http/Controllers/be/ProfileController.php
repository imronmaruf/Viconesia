<?php

namespace App\Http\Controllers\be;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first(); // Pastikan ini benar-benar mengembalikan null

        // Tambahkan debugging
        Log::info('Profile in controller:', ['profile' => $profile]);
        // $profile = Profile::first(); // Ambil satu data saja
        return view('be.pages.profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = Profile::first();  // Ambil satu data pertama
        return view('be.pages.profile.edit', compact('profile'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'maps' => 'nullable|string',
            'instagram_link' => 'nullable|string',
            'whatsapp_link' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'portfolio_file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Persiapan data untuk disimpan
            $data = $request->only(['company_name', 'address', 'maps', 'instagram_link', 'whatsapp_link', 'phone_number', 'email', 'description', 'portfolio_file']);

            // Cek apakah ada file logo yang diunggah
            if ($request->hasFile('logo_path')) {
                $data['logo_path'] = $request->file('logo_path')->store('logo', 'public');
            }

            // Cek apakah ada file company profile yang diunggah
            if ($request->hasFile('portfolio_file')) {
                // Tentukan nama file custom
                $file = $request->file('portfolio_file');
                $fileName = 'company_profile_viconesia.' . $file->getClientOriginalExtension();

                // Simpan file dengan nama khusus
                $data['portfolio_file'] = $file->storeAs('portfolio', $fileName, 'public');
            }

            // Simpan data ke tabel profiles
            Profile::create($data);

            // Commit transaksi jika berhasil
            DB::commit();
            // Set pesan sukses di session
            Session::flash('success', 'Berhasil menambahkan profile!');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();
            // Set pesan error di session
            Session::flash('error', 'Gagal menambahkan profile: ' . $e->getMessage());
        }
        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'company_name' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
                'maps' => 'nullable|string',
                'instagram_link' => 'nullable|string',
                'whatsapp_link' => 'nullable|string',
                'phone_number' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'description' => 'nullable|string',
                'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'portfolio_file' => 'nullable|file|mimes:pdf',
            ]);

            DB::beginTransaction();

            $profile = Profile::first();

            $data = $request->only([
                'company_name',
                'address',
                'maps',
                'instagram_link',
                'whatsapp_link',
                'phone_number',
                'email',
                'description'
            ]);

            // Proses upload logo
            if ($request->hasFile('logo_path')) {
                // Hapus file lama jika ada
                if ($profile->logo_path) {
                    Storage::disk('public')->delete($profile->logo_path);
                }

                // Simpan file baru
                $logoPath = $request->file('logo_path')->store('logo', 'public');
                $data['logo_path'] = $logoPath;
            }

            // Proses upload company profile
            if ($request->hasFile('portfolio_file')) {
                // Hapus file lama jika ada
                if ($profile->portfolio_file) {
                    Storage::disk('public')->delete($profile->portfolio_file);
                }
                // Tentukan nama file custom
                $file = $request->file('portfolio_file');
                $fileName = 'company_profile_viconesia.' . $file->getClientOriginalExtension(); // Menentukan nama file

                // Simpan file baru dengan nama khusus
                $portfolioFilePath = $file->storeAs('portfolio', $fileName, 'public');
                $data['portfolio_file'] = $portfolioFilePath;
            }

            // Update profile
            $profile->update($data);
            DB::commit();
            Session::flash('success', 'Profile Berhasil diupdate.');
            return redirect()->route('be/profile.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Gagal mengupdate profile: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
