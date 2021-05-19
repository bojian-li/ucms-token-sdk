<?php
/**
 * UCmsToken.php
 *
 * @author libojian <bojian.li@foxmail.com>
 * @since 2021/5/14 15:07
 * @version 0.1
 */

namespace UCmsSDK;

/**
 * Class UCmsToken
 * @package UCmsTokenAdk
 */
class UCmsToken
{

    /**
     * 根据用户传参-生成加密包体
     * @param int $typeId
     * @param array $params
     * @param int $aprId
     * @param int $appId
     * @return array
     */
    public static function createToken(int $typeId, int $appId = 0, int $aprId = 0, array $params = []) : array
    {
        //生成 uniqueid
        $uniqueid = self::createUniqueId($typeId, $appId, $aprId, $params);
        //生成 UCmsToken
        $xcode = self::createXcode($typeId);

        //组装返回数据
        return [
            'cms_code' => md5(sprintf('%s%s%s', $xcode, time(), $uniqueid)),
            'uniqueid' => $uniqueid,
            'vars' => $params,
            'type_id' => $typeId,
            'app_id' => $appId,
            'apr_id' => $aprId,
            'created_at' => date('Y-m-d H:i:s', time())
        ];
    }

    /**
     * 生成uniqueid
     * @param int $typeId
     * @param int $appId
     * @param int $aprId
     * @param array $params
     * @return string
     */
    private static function createUniqueId(int $typeId, int $appId, int $aprId, array $params=[]) : string
    {
        $data = [
            'type_id' => $typeId,
            'app_id' => $appId,
            'apr_id' => $aprId
        ];
        if(!empty($params)){
            $data = array_merge($data, $params);
        }
        ksort($data);
        return md5(join('|', $data));
    }

    /**
     * 生成xcode
     */
    private static function createXcode($type) {
        $dechex = str_pad(dechex($type), 4, 0, STR_PAD_LEFT);
        $rand = self::getRandStr(16);
        $microtime = self::getMillisecond();
        $mVal = substr(md5($microtime . $rand), 8, 16);
        return $dechex . $mVal;
    }

    /**
     * 随机生成字符串
     * @param int $length
     * @return string
     */
    private static function getRandStr($length = 16) :string
    {
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = $length; $i > 0; $i--) {
            $string .= $char[mt_rand(0, strlen($char) - 1)];
        }
        return $string;
    }


    /**
     * 获取时间戳到毫秒
     * @return false|string
     */
    private static function getMillisecond() :string
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float) sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectimes = substr($msectime, 0, 13);
    }

}