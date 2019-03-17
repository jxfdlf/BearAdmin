<?php
/**
 * 数据统计
 * @author yupoxiong<i@yufuping.com>
 */

namespace app\admin\controller;

use app\admin\model\AdminLog;
use app\admin\model\AdminMenu;
use app\admin\model\AdminUser;
use app\admin\model\Syslog;

class StatisticsController extends Base
{

    //统计概览
    public function index(){
        $admin_users = new AdminUser();
        $admin_user_count = $admin_users->count();
        $syslogs = new Syslog();
        $syslog_count = $syslogs->count();
        $admin_logs = new AdminLog();
        $admin_log_count = $admin_logs->count();
        $admin_menus = new AdminMenu();
        $admin_menu_count = $admin_menus->count();

        $this->assign([
            'adminuser_count'=>$admin_user_count,
            'syslog_count'=>$syslog_count,
            'admin_log_count'=>$admin_log_count,
            'admin_menu_count' => $admin_menu_count
        ]);
        return $this->fetch();
    }

    //展示数据
    public function showdata()
    {
        

    }

}