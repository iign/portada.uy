<?php

class FeedTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasic()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

}
