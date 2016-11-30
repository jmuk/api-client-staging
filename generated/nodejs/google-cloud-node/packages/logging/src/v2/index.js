/*!
 * Copyright 2016 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
'use strict';

var configServiceV2Client = require('./config_service_v2_client');
var loggingServiceV2Client = require('./logging_service_v2_client');
var metricsServiceV2Client = require('./metrics_service_v2_client');
var extend = require('extend');
var gax = require('google-gax');

function v2(options) {
  options = extend({
    scopes: v2.ALL_SCOPES
  }, options);
  var gaxGrpc = gax.grpc(options);
  var result = {};
  extend(result, configServiceV2Client(gaxGrpc));
  extend(result, loggingServiceV2Client(gaxGrpc));
  extend(result, metricsServiceV2Client(gaxGrpc));
  return result;
}

v2.SERVICE_ADDRESS = loggingServiceV2Client.SERVICE_ADDRESS;
v2.ALL_SCOPES = loggingServiceV2Client.ALL_SCOPES;
module.exports = v2;
