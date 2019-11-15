<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;


class UserTest extends TestCase
{
  use RefreshDatabase;


// //   public function test_user_can_see_login_form(){
// //     $response = $this->get('/login');
// //     $response->assertSuccessful();
// //     $response->assertViewIs('auth.login');

// //   }
  
// //   public function test_user_cannot_view_a_login_form_when_authenticated()
// //   {
// //       $user = factory(User::class)->create();
// //       $response = $this->actingAs($user)->get('/login');
// //       $response->assertRedirect('/');
// //   }

  
  public function test_user_can_login_with_correct_credentials()
  {
      $user = factory(User::class)->create([
          'password' => bcrypt($password = 'i-love-laravel'),
      ]);
      $response = $this->post('/login', [
          'email' => $user->email,
          'password' => $password,
      ]);
      $response->assertRedirect('/');
      $this->assertAuthenticatedAs($user);
  }
        
    
  public function test_user_cannot_login_with_incorrect_password()
  {
      $user = factory(User::class)->create([
          'password' => bcrypt('i-love-laravel'),
      ]);
      
      $response = $this->from('/login')->post('/login', [
          'email' => $user->email,
          'password' => 'invalid-password',
      ]);
      
      $response->assertRedirect('/login');
      $response->assertSessionHasErrors('email');
      $this->assertTrue(session()->hasOldInput('email'));
      $this->assertFalse(session()->hasOldInput('password'));
      $this->assertGuest();
  }

    public function test_login_throws_error(){
        $response= $this->post('/login',[]);
        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('password');
    }
} 
