<?php

class IndexTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(403, $response->status());
    }
}
