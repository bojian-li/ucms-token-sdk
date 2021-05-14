<?php
/**
 * EqualsTest.php
 *
 * @author libojian <bojian.li@foxmail.com>
 * @since 2021/5/14 17:45
 * @version 0.1
 */

final class EqualsTest extends \PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertEquals(1, 1);
    }

    public function testFailure2()
    {
        $this->assertEquals('bar', 'bar');
    }

    public function testFailure3()
    {
        $this->assertEquals("foo\nbar\nbaz\n", "foo\nbar\nbaz\n");
    }
}