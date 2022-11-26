<?php
/**
 * UCmsTokenTest.php
 *
 * @author libojian <bojian.li@foxmail.com>
 * @since 2021/5/14 17:04
 * @version 0.1
 */

//require_once(dirname(dirname(__FILE__)).'/src/UCmsToken.php');

use PHPUnit\Framework\TestCase;
use UCmsSDK\UCmsToken;

class UCmsTokenTest extends TestCase
{
    public function testCreateToken() {

        $result = UCmsToken::createToken(1);
        $this->assertEquals($result, 'hello world.');
    }
}
