<?php

namespace Gitlab\Api;

class Commits extends AbstractApi
{
    /**
     * @param int $projectId
     * @param string $commitSha
     * @return mixed
     */
    public function mergeRequests($projectId, $commitSha)
    {
        return $this->get(
            $this->getProjectPath(
                $projectId,
                'repository/commits/' . $this->encodePath($commitSha) . '/merge_requests'
            )
        );
    }
}
