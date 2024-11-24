<?php

use Illuminate\Support\Facades\Hash;
use InosoftUniversity\SharedModels\Role;
use InosoftUniversity\SharedModels\User;

use function Pest\Laravel\post;

beforeEach(function () {
    // Arrange: Create a user
    $role = Role::create([
        'name' => 'STUDENT',
    ]);

    // Create a student user
    User::create([
        'name' => 'Student',
        'email' => 'student@example.com',
        'password' => Hash::make('password'),
        'role_id' => $role->id,
        'math_grade' => 8.5,
        'science_grade' => 8.2,
    ]); 
});

it('logs in successfully with valid credentials', function () {
    // Act: Attempt to log in
    $response = post('/api/login', [
        'email' => 'student@example.com',
        'password' => 'password',
    ]);

    // Assert: Check if the response is successful and contains a token
    $response->assertStatus(200)
             ->assertJsonStructure(['access_token']);
});

it('fails to log in with invalid credentials', function () {
    // Act: Attempt to log in with wrong credentials
    $response = post('/api/login', [
        'email' => 'student@example.net',
        'password' => 'wrongpassword',
    ]);

    // Assert: Check if the response indicates failure
    $response->assertStatus(401)
             ->assertJson(['error' => 'Unauthorized']);
});
