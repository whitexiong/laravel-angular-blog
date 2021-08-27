<?php

namespace App;

class CodeResponse
{
    const SUCCESS = [1, '成功'];
    const FAIL = [-1, ''];
    const PARAM_ILLEGAL = [401, '参数不合法'];
    const PARAM_VALUE_ILLEGAL = [402, '参数值不对'];
}