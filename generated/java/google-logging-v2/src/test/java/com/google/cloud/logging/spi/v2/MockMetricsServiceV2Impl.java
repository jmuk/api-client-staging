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

package com.google.cloud.logging.spi.v2;

import com.google.common.collect.Lists;
import com.google.logging.v2.CreateLogMetricRequest;
import com.google.logging.v2.DeleteLogMetricRequest;
import com.google.logging.v2.GetLogMetricRequest;
import com.google.logging.v2.ListLogMetricsRequest;
import com.google.logging.v2.ListLogMetricsResponse;
import com.google.logging.v2.LogMetric;
import com.google.logging.v2.MetricsServiceV2Grpc.MetricsServiceV2;
import com.google.logging.v2.UpdateLogMetricRequest;
import com.google.protobuf.Empty;
import com.google.protobuf.GeneratedMessage;
import io.grpc.stub.StreamObserver;
import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;
import java.util.Queue;

@javax.annotation.Generated("by GAPIC")
public class MockMetricsServiceV2Impl implements MetricsServiceV2 {
  private ArrayList<GeneratedMessage> requests;
  private Queue<GeneratedMessage> responses;

  public MockMetricsServiceV2Impl() {
    requests = new ArrayList<>();
    responses = new LinkedList<>();
  }

  public List<GeneratedMessage> getRequests() {
    return requests;
  }

  public void setResponses(List<GeneratedMessage> responses) {
    this.responses = Lists.newLinkedList(responses);
  }

  public void reset() {
    requests = new ArrayList<>();
    responses = new LinkedList<>();
  }

  @Override
  public void listLogMetrics(
      ListLogMetricsRequest request, StreamObserver<ListLogMetricsResponse> responseObserver) {
    ListLogMetricsResponse response = (ListLogMetricsResponse) responses.remove();
    requests.add(request);
    responseObserver.onNext(response);
    responseObserver.onCompleted();
  }

  @Override
  public void getLogMetric(
      GetLogMetricRequest request, StreamObserver<LogMetric> responseObserver) {
    LogMetric response = (LogMetric) responses.remove();
    requests.add(request);
    responseObserver.onNext(response);
    responseObserver.onCompleted();
  }

  @Override
  public void createLogMetric(
      CreateLogMetricRequest request, StreamObserver<LogMetric> responseObserver) {
    LogMetric response = (LogMetric) responses.remove();
    requests.add(request);
    responseObserver.onNext(response);
    responseObserver.onCompleted();
  }

  @Override
  public void updateLogMetric(
      UpdateLogMetricRequest request, StreamObserver<LogMetric> responseObserver) {
    LogMetric response = (LogMetric) responses.remove();
    requests.add(request);
    responseObserver.onNext(response);
    responseObserver.onCompleted();
  }

  @Override
  public void deleteLogMetric(
      DeleteLogMetricRequest request, StreamObserver<Empty> responseObserver) {
    Empty response = (Empty) responses.remove();
    requests.add(request);
    responseObserver.onNext(response);
    responseObserver.onCompleted();
  }
}