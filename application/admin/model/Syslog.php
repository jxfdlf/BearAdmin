<?php
/**
 * 系统错误日志模型
 * @author yupoxiong<i@yufuping.com>
 */

namespace app\admin\model;

class Syslog extends Admin
{
    protected $name = 'syslog';
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;
    
    public function syslogTrace()
    {
        return $this->hasOne('SyslogTrace','log_id','id')->field('id,log_id,trace');
    }
}
