
<?php
/**
 * Simplified implementation of the VirusTotal API for URL scanning.
 */
class VirusTotalAPI {
    const API_BASE_URL = 'https://www.virustotal.com/vtapi/v2/';
    const URL_SCAN = 'url/scan';
    const URL_REPORT = 'url/report';

    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
     * Scan a URL.
     *
     * @param string $url The URL to scan.
     * @return mixed API response.
     */
    public function scanURL($url) {
        return $this->apiCall(self::URL_SCAN, ['url' => $url]);
    }

    /**
     * Get a report for a scanned URL.
     *
     * @param string $resource The URL to get the report for.
     * @param bool $scanAutomatically Whether to scan if not found.
     * @return mixed API response.
     */
    public function getURLReport($resource, $scanAutomatically = false) {
        return $this->apiCall(self::URL_REPORT, ['resource' => $resource, 'scan' => (int)$scanAutomatically]);
    }

    /**
     * Make an API call to VirusTotal.
     *
     * @param string $endpoint The API endpoint.
     * @param array $parameters The parameters to send.
     * @return mixed Decoded JSON response.
     */
    private function apiCall($endpoint, $parameters) {
        $parameters['key'] = $this->apiKey;

        $ch = curl_init(self::API_BASE_URL . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $this->handleResponse($response, $httpCode);
    }

    /**
     * Handle the response from the API.
     *
     * @param string $response The raw response.
     * @param int $httpCode The HTTP response code.
     * @return mixed Decoded JSON or error code.
     */
    private function handleResponse($response, $httpCode) {
        if ($httpCode === 200) {
            return json_decode($response);
        } elseif ($httpCode === 429) {
            return ['response_code' => -3]; // Rate limit exceeded
        } elseif ($httpCode === 403) {
            return ['response_code' => -1]; // Forbidden
        }
        return ['response_code' => -1]; // General error
    }
}
?>
/* Example of how it can be used Would like for it to be on a website and directly linked with JS too in some time

$vtApi = new VirusTotalAPI('YOUR_API_KEY');

// Scan a URL
$response = $vtApi->scanURL('http://example.com');
print_r($response);

// Get the report for the URL
$report = $vtApi->getURLReport('http://example.com');
print_r($report);
*/ 
