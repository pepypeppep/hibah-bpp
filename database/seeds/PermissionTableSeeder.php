<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Roles
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-detail',
            // User
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-detail',
            // Pengaturan Hibah
            'pengaturan_hibah-list',
            'pengaturan_hibah-create',
            'pengaturan_hibah-edit',
            'pengaturan_hibah-delete',
            'pengaturan_hibah-detail',
            // Daftar Pengajuan Hibah
            'daftar_pengajuan_hibah-list',
            'daftar_pengajuan_hibah-create',
            'daftar_pengajuan_hibah-edit',
            'daftar_pengajuan_hibah-delete',
            'daftar_pengajuan_hibah-detail',
            // Hibah
            'hibah-list',
            'hibah-create',
            'hibah-edit',
            'hibah-delete',
            'hibah-detail',
            // Riwayat Pengajuan Hibah
            'riwayat_pengajuan_hibah-list',
            'riwayat_pengajuan_hibah-create',
            'riwayat_pengajuan_hibah-edit',
            'riwayat_pengajuan_hibah-delete',
            'riwayat_pengajuan_hibah-detail',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        //Assign Staff
        $permissionStaffs = Permission::all()->pluck('id');

        $role = Role::where('name', 'staff')->first();
        $role->syncPermissions($permissionStaffs);

        //Assign Reviewer
        $permissionReviewerArrays = [
            // Hibah
            'hibah-list',
            'hibah-create',
            'hibah-edit',
            'hibah-delete',
            'hibah-detail',
        ];

        $permissionReviewers = Permission::whereIn('name', $permissionReviewerArrays)->pluck('id');

        $role = Role::where('name', 'reviewer')->first();
        $role->syncPermissions($permissionReviewers);

        //Assign Member
        $permissionMemberArrays = [
            // Hibah
            'hibah-list',
            'hibah-create',
            'hibah-edit',
            'hibah-delete',
            'hibah-detail',
            // Riwayat Pengajuan Hibah
            'riwayat_pengajuan_hibah-list',
            'riwayat_pengajuan_hibah-create',
            'riwayat_pengajuan_hibah-edit',
            'riwayat_pengajuan_hibah-delete',
            'riwayat_pengajuan_hibah-detail',
        ];

        $permissionMembers = Permission::whereIn('name', $permissionMemberArrays)->pluck('id');

        $role = Role::where('name', 'member')->first();
        $role->syncPermissions($permissionMembers);

        //Assign Mahasiswa
        $permissionMahasiswaArrays = [
            // Hibah
            'hibah-list',
            'hibah-create',
            'hibah-edit',
            'hibah-delete',
            'hibah-detail',
            // Riwayat Pengajuan Hibah
            'riwayat_pengajuan_hibah-list',
            'riwayat_pengajuan_hibah-create',
            'riwayat_pengajuan_hibah-edit',
            'riwayat_pengajuan_hibah-delete',
            'riwayat_pengajuan_hibah-detail',
        ];

        $permissionMahasiswas = Permission::whereIn('name', $permissionMahasiswaArrays)->pluck('id');

        $role = Role::where('name', 'mahasiswa')->first();
        $role->syncPermissions($permissionMahasiswas);

    }
}
