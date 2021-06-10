<?php
/**
 * functions.php
 *
 * @author libojian <bojian.li@foxmail.com>
 * @since 2021/6/10 16:17
 * @version 0.1
 */

function createUCmsToken(int $typeId, int $appId = 0, int $aprId = 0, array $params = []) {
    return \UCmsSDK\UCmsToken::createToken($typeId, $appId = 0, $aprId = 0, $params = []);
}