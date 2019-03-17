<?php
/**
 * 后台用户邮件记录模型
 * @author yupoxiong<i@yufuping.com>
 */

namespace app\admin\model;

class AdminMailLog extends Admin
{
    protected $name = 'admin_mail_log';
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    //关联后台用户
    public function adminUser()
    {
        return $this->belongsTo('AdminUser','user_id')->field('user_id,user_name,nickname');
    }
}
