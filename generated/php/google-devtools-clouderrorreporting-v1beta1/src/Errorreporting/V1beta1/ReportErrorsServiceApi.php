<?php
/*
 * Copyright 2016 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except
 * in compliance with the License. You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under the License
 * is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express
 * or implied. See the License for the specific language governing permissions and limitations under
 * the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/devtools/clouderrorreporting/v1beta1/report_errors_service.proto
 * and updates to that file get reflected here through a refresh process.
 */

namespace Google\Cloud\Errorreporting\V1beta1;

use Google\GAX\AgentHeaderDescriptor;
use Google\GAX\ApiCallable;
use Google\GAX\CallSettings;
use Google\GAX\GrpcConstants;
use Google\GAX\GrpcCredentialsHelper;
use Google\GAX\PathTemplate;
use google\devtools\clouderrorreporting\v1beta1\ReportErrorEventRequest;
use google\devtools\clouderrorreporting\v1beta1\ReportErrorsServiceClient;
use google\devtools\clouderrorreporting\v1beta1\ReportedErrorEvent;

/**
 * Service Description: An API for reporting error events.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * try {
 *     $reportErrorsServiceApi = new ReportErrorsServiceApi();
 *     $formattedProjectName = ReportErrorsServiceApi::formatProjectName("[PROJECT]");
 *     $event = new ReportedErrorEvent();
 *     $response = $reportErrorsServiceApi->reportErrorEvent($formattedProjectName, $event);
 * } finally {
 *     if (isset($reportErrorsServiceApi)) {
 *         $reportErrorsServiceApi->close();
 *     }
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parse method to extract the individual identifiers contained within names that are
 * returned.
 */
class ReportErrorsServiceApi
{
    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'clouderrorreporting.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The default timeout for non-retrying methods.
     */
    const DEFAULT_TIMEOUT_MILLIS = 30000;

    const _GAX_VERSION = '0.1.0';
    const _CODEGEN_NAME = 'GAPIC';
    const _CODEGEN_VERSION = '0.0.0';

    private static $projectNameTemplate;

    private $grpcCredentialsHelper;
    private $reportErrorsServiceStub;
    private $scopes;
    private $defaultCallSettings;
    private $descriptors;

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project resource.
     */
    public static function formatProjectName($project)
    {
        return self::getProjectNameTemplate()->render([
            'project' => $project,
        ]);
    }

    /**
     * Parses the project from the given fully-qualified path which
     * represents a project resource.
     */
    public static function parseProjectFromProjectName($projectName)
    {
        return self::getProjectNameTemplate()->match($projectName)['project'];
    }

    private static function getProjectNameTemplate()
    {
        if (self::$projectNameTemplate == null) {
            self::$projectNameTemplate = new PathTemplate('projects/{project}');
        }

        return self::$projectNameTemplate;
    }

    private static function getPageStreamingDescriptors()
    {
        $pageStreamingDescriptors = [
        ];

        return $pageStreamingDescriptors;
    }

    // TODO(garrettjones): add channel (when supported in gRPC)
    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress The domain name of the API remote host.
     *                                  Default 'clouderrorreporting.googleapis.com'.
     *     @type mixed $port The port on which to connect to the remote host. Default 443.
     *     @type Grpc\ChannelCredentials $sslCreds
     *           A `ChannelCredentials` for use with an SSL-enabled channel.
     *           Default: a credentials object returned from
     *           Grpc\ChannelCredentials::createSsl()
     *     @type array $scopes A string array of scopes to use when acquiring credentials.
     *                         Default the scopes for the Stackdriver Error Reporting API.
     *     @type array $retryingOverride
     *           An associative array of string => RetryOptions, where the keys
     *           are method names (e.g. 'createFoo'), that overrides default retrying
     *           settings. A value of null indicates that the method in question should
     *           not retry.
     *     @type int $timeoutMillis The timeout in milliseconds to use for calls
     *                              that don't use retries. For calls that use retries,
     *                              set the timeout in RetryOptions.
     *                              Default: 30000 (30 seconds)
     *     @type string $appName The codename of the calling service. Default 'gax'.
     *     @type string $appVersion The version of the calling service.
     *                              Default: the current version of GAX.
     *     @type Google\Auth\CredentialsLoader $credentialsLoader
     *                              A CredentialsLoader object created using the
     *                              Google\Auth library.
     * }
     */
    public function __construct($options = [])
    {
        $defaultScopes = [
            'https://www.googleapis.com/auth/cloud-platform',
        ];
        $defaultOptions = [
            'serviceAddress' => self::SERVICE_ADDRESS,
            'port' => self::DEFAULT_SERVICE_PORT,
            'scopes' => $defaultScopes,
            'retryingOverride' => null,
            'timeoutMillis' => self::DEFAULT_TIMEOUT_MILLIS,
            'appName' => 'gax',
            'appVersion' => self::_GAX_VERSION,
            'credentialsLoader' => null,
        ];
        $options = array_merge($defaultOptions, $options);

        $headerDescriptor = new AgentHeaderDescriptor([
            'clientName' => $options['appName'],
            'clientVersion' => $options['appVersion'],
            'codeGenName' => self::_CODEGEN_NAME,
            'codeGenVersion' => self::_CODEGEN_VERSION,
            'gaxVersion' => self::_GAX_VERSION,
            'phpVersion' => phpversion(),
        ]);

        $defaultDescriptors = ['headerDescriptor' => $headerDescriptor];
        $this->descriptors = [
            'reportErrorEvent' => $defaultDescriptors,
        ];
        $pageStreamingDescriptors = self::getPageStreamingDescriptors();
        foreach ($pageStreamingDescriptors as $method => $pageStreamingDescriptor) {
            $this->descriptors[$method]['pageStreamingDescriptor'] = $pageStreamingDescriptor;
        }

        // TODO load the client config in a more package-friendly way
        // https://github.com/googleapis/toolkit/issues/332
        $clientConfigJsonString = file_get_contents(__DIR__.'/resources/report_errors_service_client_config.json');
        $clientConfig = json_decode($clientConfigJsonString, true);
        $this->defaultCallSettings =
                CallSettings::load(
                    'google.devtools.clouderrorreporting.v1beta1.ReportErrorsService',
                    $clientConfig,
                    $options['retryingOverride'],
                    GrpcConstants::getStatusCodeNames(),
                    $options['timeoutMillis']
                );

        $this->scopes = $options['scopes'];

        $createStubOptions = [];
        if (!empty($options['sslCreds'])) {
            $createStubOptions['sslCreds'] = $options['sslCreds'];
        }
        $grpcCredentialsHelperOptions = array_diff_key($options, $defaultOptions);
        $this->grpcCredentialsHelper = new GrpcCredentialsHelper($this->scopes, $grpcCredentialsHelperOptions);

        $createReportErrorsServiceStubFunction = function ($hostname, $opts) {
            return new ReportErrorsServiceClient($hostname, $opts);
        };
        $this->reportErrorsServiceStub = $this->grpcCredentialsHelper->createStub(
            $createReportErrorsServiceStubFunction,
            $options['serviceAddress'],
            $options['port'],
            $createStubOptions
        );
    }

    /**
     * Report an individual error event.
     *
     * This endpoint accepts <strong>either</strong> an OAuth token,
     * <strong>or</strong> an
     * <a href="https://support.google.com/cloud/answer/6158862">API key</a>
     * for authentication. To use an API key, append it to the URL as the value of
     * a `key` parameter. For example:
     * <pre>POST https://clouderrorreporting.googleapis.com/v1beta1/projects/example-project/events:report?key=123ABC456</pre>
     *
     * Sample code:
     * ```
     * try {
     *     $reportErrorsServiceApi = new ReportErrorsServiceApi();
     *     $formattedProjectName = ReportErrorsServiceApi::formatProjectName("[PROJECT]");
     *     $event = new ReportedErrorEvent();
     *     $response = $reportErrorsServiceApi->reportErrorEvent($formattedProjectName, $event);
     * } finally {
     *     if (isset($reportErrorsServiceApi)) {
     *         $reportErrorsServiceApi->close();
     *     }
     * }
     * ```
     *
     * @param string             $projectName  [Required] The resource name of the Google Cloud Platform project. Written
     *                                         as `projects/` plus the
     *                                         [Google Cloud Platform project ID](https://support.google.com/cloud/answer/6158840).
     *                                         Example: `projects/my-project-123`.
     * @param ReportedErrorEvent $event        [Required] The error event to be reported.
     * @param array              $optionalArgs {
     *                                         Optional.
     *
     *     @type Google\GAX\RetrySettings $retrySettings
     *          Retry settings to use for this call. If present, then
     *          $timeoutMillis is ignored.
     *     @type int $timeoutMillis
     *          Timeout to use for this call. Only used if $retrySettings
     *          is not set.
     * }
     *
     * @return google\devtools\clouderrorreporting\v1beta1\ReportErrorEventResponse
     *
     * @throws Google\GAX\ApiException if the remote call fails
     */
    public function reportErrorEvent($projectName, $event, $optionalArgs = [])
    {
        $request = new ReportErrorEventRequest();
        $request->setProjectName($projectName);
        $request->setEvent($event);

        $mergedSettings = $this->defaultCallSettings['reportErrorEvent']->merge(
            new CallSettings($optionalArgs)
        );
        $callable = ApiCallable::createApiCall(
            $this->reportErrorsServiceStub,
            'ReportErrorEvent',
            $mergedSettings,
            $this->descriptors['reportErrorEvent']
        );

        return $callable(
            $request,
            [],
            ['call_credentials_callback' => $this->createCredentialsCallback()]);
    }

    /**
     * Initiates an orderly shutdown in which preexisting calls continue but new
     * calls are immediately cancelled.
     */
    public function close()
    {
        $this->reportErrorsServiceStub->close();
    }

    private function createCredentialsCallback()
    {
        return $this->grpcCredentialsHelper->createCallCredentialsCallback();
    }
}
