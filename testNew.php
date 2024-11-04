<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://stoplight.io/mocks/calendly/api-docs/395/event_types",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Authorization: eyJraWQiOiIxY2UxZTEzNjE3ZGNmNzY2YjNjZWJjY2Y4ZGM1YmFmYThhNjVlNjg0MDIzZjdjMzJiZTgzNDliMjM4MDEzNWI0IiwidHlwIjoiUEFUIiwiYWxnIjoiRVMyNTYifQ.eyJpc3MiOiJodHRwczovL2F1dGguY2FsZW5kbHkuY29tIiwiaWF0IjoxNjgwNzY5OTI3LCJqdGkiOiJlODM4MjBiMy0zNDEzLTQ5NDQtYjUxOS1hNjlhYWFiNzU0NTAiLCJ1c2VyX3V1aWQiOiJkYWEyYzY3YS1hYmIwLTQ0ZTktODJkYy0wY2U1NmQxMjJlMzkifQ.EFu936LnKdLb17WMnC0djYGsYKRKrhlzpTZOshwR5Mh11JeXCwRKV9wJ3fdZ3Clj2BBWppMh826v-nGqx9QnBg",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}