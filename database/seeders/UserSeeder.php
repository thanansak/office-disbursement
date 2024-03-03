<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $abilities = [
            'all',
            'view',
            'create',
            'edit',
            'delete'
        ];

        $group_permissions =  [
            ['en' => 'user', 'th' => 'ผู้ใช้งาน'],
            ['en' => 'member', 'th' => 'สมาชิก'],
            ['en' => 'prefix', 'th' => 'คำนำหน้า'],
            ['en' => 'role', 'th' => 'บทบาท'],
            ['en' => 'permission', 'th' => 'สิทธิ์การใช้งาน'],
            ['en' => 'user_history', 'th' => 'ประวัติผู้ใช้งาน'],
            ['en' => 'product_type', 'th' => 'ประเภทสินค้า'],
            ['en' => 'product', 'th' => 'สินค้า'],
            ['en' => 'disbursement', 'th' => 'เบิกอุปกรณ์'],
            ['en' => 'disbursement_admin', 'th' => 'รายการเบิกอุปกรณ์'],
            ['en' => 'disbursement_history', 'th' => 'ประวัติเบิกอุปกรณ์'],
        ];

        foreach ($group_permissions as $key => $group_perm) {
            foreach ($abilities as $akey => $ability) {
                Permission::create([
                    'name' => $ability . ' ' . $group_perm['en'],
                    'description' => ($ability == 'all' ? 'จัดการ' . $group_perm['th'] . 'ทั้งหมด' : ($ability == 'view' ? 'เข้าชม' . $group_perm['th'] : ($ability == 'create' ? 'เพิ่ม' . $group_perm['th'] : ($ability == 'edit' ? 'แก้ไข' . $group_perm['th'] : ($ability == 'delete' ? 'ลบ' . $group_perm['th'] : ''))))),
                    'group_th' => $group_perm['th'],
                    'group_en' => $group_perm['en']
                ]);
            }
        }

        Permission::create(['name' => '*', 'description' => 'Developer']);
        Permission::create(['name' => 'dashboard', 'description' => 'Dashboard']);
        Permission::create(['name' => 'disbursement_detail', 'description' => 'ดูข้อมูลการเบิก']);
        Permission::create(['name' => 'disbursement_approve', 'description' => 'อนุมัติการเบิก']);
        Permission::create(['name' => 'website_setting', 'description' => 'จัดการหน้าตั้งค่าเว็บไซต์']);

        $developer_role = Role::create(['name' => 'developer', 'description' => 'ผู้พัฒนาระบบ']);
        $developer_role->syncPermissions(['*']);

        $superadmin_role = Role::create(['name' => 'superadmin', 'description' => 'ผู้ดูแลระบบระดับสูง']);
        $superadmin_role->syncPermissions([
            'dashboard',
            'all user',
            'all role',
            'all permission',
            'all user_history',
            'all product_type',
            'all product',
            'all disbursement',
            'disbursement_detail',
            'disbursement_approve',
            'all disbursement_history',
            'website_setting',
        ]);

        $admin_role = Role::create(['name' => 'admin', 'description' => 'ผู้ดูแลระบบ']);
        $admin_role->syncPermissions([
            'dashboard',
            'all user',
            'all user_history',
            'all product_type',
            'all product',
            'all disbursement',
            'disbursement_detail',
            'disbursement_approve',
            'all disbursement_history',
        ]);

        $user_role = Role::create(['name' => 'user','description' => 'ผู้ใช้งาน']);
        $user_role->syncPermissions([
            'dashboard',
            'all disbursement',
            'all disbursement_history',
        ]);

        $user1 = \App\Models\User::factory()->create([
            'firstname' => 'ธนัญศักดิ์',
            'lastname' => 'ปิ่นทอง',
            'user_code' => 'demo-001',
            'slug' => 'demo-001',
            'username' => 'thanansak123',
            'email' => 'thanansak123@gmail.com',
            'status' => 1,
            'password' => bcrypt('thanansak123'),
        ]);

        $user2 = \App\Models\User::factory()->create([
            'firstname' => 'superadmin',
            'lastname' => 'superadmin',
            'user_code' => 'demo-002',
            'slug' => 'demo-002',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'status' => 1,
            'password' => bcrypt('password'),
        ]);

        $user3 = \App\Models\User::factory()->create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'user_code' => 'demo-003',
            'slug' => 'demo-003',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => 1,
            'password' => bcrypt('password'),
        ]);

        $user4 = \App\Models\User::factory()->create([
            'firstname' => 'user',
            'lastname' => 'user',
            'user_code' => 'USER-001',
            'slug' => 'USER-001',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'status' => 1,
            'password' => bcrypt('password'),
        ]);

        $user1->assignRole($developer_role);
        $user2->assignRole($superadmin_role);
        $user3->assignRole($admin_role);
        $user4->assignRole($user_role);
    }
}