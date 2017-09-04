<?php
/**
 * 数据库备份
 * @author yupoxiong<i@yufuping.com>
 * @version 1.0
 */

namespace app\admin\controller;

use think\Config;
use tools\DataBackup;

class Databack extends Base
{
    protected $config = [], $back, $filename;

    public function __construct()
    {
        $this->config = Config::get("database");

        $this->config['savepath'] = ROOT_PATH . 'backup/';
        $this->config['filename'] = "database-backup-" . date("Y-m-d-H-i-s", time()) . ".sql";

        $this->back     = new DataBackup($this->config);
        $this->filename = $this->param['filename'] ? $this->param['filename'] : '';

        parent::__construct();
    }

    //列表
    public function index()
    {
        $list   = [];
        $result = $this->back->get_filelist();

        if ($result['status'] == 200) {
            $list = $result['result'];
        }

        $this->assign([
            "list"  => $list,
            'total' => sizeof($list)
        ]);

        return $this->fetch();
    }

    //添加备份
    public function add()
    {
        $result = $this->back->backup();
        if ($result['status'] == 200) {
            return $this->do_success($result['message']);
        }
        return $this->do_error($result['message']);
    }

    //下载备份
    public function download()
    {
        $this->back->downloadFile($this->filename);

    }


    //还原
    public function restore()
    {
        $result = $this->back->restore($this->filename);
        if ($result['status'] == 200) {
            return $this->do_success($result['message']);
        }
        return $this->do_error($result['message']);
    }


    //删除
    public function del()
    {
        $result = $this->back->delfilename($this->filename);
        if ($result['status'] == 200) {
            return $this->do_success($result['message']);
        }
        return $this->do_error($result['message']);
    }

}