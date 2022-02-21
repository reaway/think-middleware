<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2021 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
declare (strict_types=1);

namespace Think\Component\Middleware\Contract;

use Throwable;
use Think\Component\Request\Request;
use Think\Component\Response\Response;

/**
 * 系统异常处理接口
 */
interface HandleExceptionInterface
{
    public function report(Throwable $exception): void;

    public function render(Request $request, Throwable $e): Response;
}