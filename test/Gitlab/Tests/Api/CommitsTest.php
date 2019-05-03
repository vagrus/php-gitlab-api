<?php

namespace Gitlab\Tests\Api;

class CommitsTest extends TestCase
{
    /**
     * @test
     */
    public function shouldGetMergeRequests()
    {
        $sha = hash('sha256', 'test');

        $expectedArray = [
            [
                'id' => 123,
                'project_id' => 1,
                'sha' => $sha,
                'target_branch' => 'master',
            ],
        ];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('projects/1/repository/commits/' . $sha . '/merge_requests')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->mergeRequests(1, $sha));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return 'Gitlab\Api\Commits';
    }
}
