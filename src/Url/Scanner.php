<?php

/**
 * User: Duran CHEN
 * Email: duran.chen@gmail.com
 * Date: 8/22/16
 * Time: 9:32 PM
 */

namespace Duranchen\Url;

class Scanner
{
    /**
     * @var array An array of URLs
     */
    protected $urls;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    public function __construct(array $urls)
    {
        $this->urls = $urls;
        $this->httpClient = new \GuzzleHttp\Client();
    }


    public function getInvalidUrls()
    {
        $invalidUrls = [];

        foreach ($this->urls as $url) {
            try {
                $statusCode = $this->getStatusCodeForUrl($url);
            } catch (\Exception $e) {
                $statusCode = 500;
            }

            if ($statusCode >= 400) {
                array_push(
                    $invalidUrls,
                    [
                        'url' => $url,
                        'status' => $statusCode,
                    ]
                );
            }
        }

        return $invalidUrls;

    }

    protected function getStatusCodeForUrl($url)
    {
        $httpResponse = $this->httpClient->get($url);

        return $httpResponse->getStatusCode();

    }


}