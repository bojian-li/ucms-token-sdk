<?php
/**
 * StackTest.php
 *
 * @author libojian <bojian.li@foxmail.com>
 * @since 2021/5/14 18:02
 * @version 0.1
 */

final class StackTest extends \PHPUnit\Framework\TestCase
{

    public function testEmpty(): array
    {
        $stack = [];
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack): array
    {
        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $stack): void
    {
        $this->assertSame('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }

}