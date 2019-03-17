<?php
/**
 * 后台管理员操作日志数据模型
 * @author yupoxiong<i@yufuping.com>
 */

namespace app\admin\model;

class AdminLogData extends Admin
{
    protected $name = 'admin_log_data';
    protected $autoWriteTimestamp = true;
    
    //关联log
    public function adminLog()
    {
        return $this->belongsTo('AdminLog','log_id','id');
    }
    
}
