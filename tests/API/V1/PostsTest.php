<?php

test('it gets the correct status code', function () {
    $response = $this->get(route('api:v1:posts:index'));

    $response->assertStatus(200);
});
