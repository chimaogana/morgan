<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertsee('posts');
    }


    public function test_posts_visible()
    {
  $posts = factory(Post::class)->create();
  $response = $this->get('/posts');
  $response->assertSee($posts->title)->assertSee($posts->image);
  }
//   public function test_single_posts_visible()
//   {
//     $posts = factory(Post::class)->create();
//     $response = $this->get('/posts/'.$posts->id);
//     $response->assertSee($posts->title)->assertSee($posts->image);
  
//   }    
//   public function test_authenticated_users_can_create_a_new_post()
//   {
//      $user =factory(User::class)->create();
//       //And a task object
//       $posts = factory(Post::class)->create();
//       //When user submits post request to create task endpoint
//       $response = $this->actingAs($user)->post('/posts/create',$posts->toArray());
//       //It gets stored in the database
      
//        $response = $this->assertDatabaseHas('posts',$posts->toArray());
     
  
      
//   }  
//   public function test_unauthenticated_users_cannot_create()
//   {
    
//     $posts = factory(Post::class)->make();
//     $response = $this->get('/posts/create',$posts->toArray());
    
//     $response->assertRedirect('/login');
    
//     }
      
//     public function test_authenticated_users_can_edit(){
//       $user= factory(User::class)->make();
  
//     $posts = factory(Post::class)->create();
   
    
  
//     $response=$this->actingAs($user)->put('posts/'.$posts->id, $posts->toArray()); // your route to update article
//     //The article should be updated in the database.
  
//     $this->assertDatabaseHas('posts',['id'=> $posts->id , 'title' =>  $posts->title]);
//   }
  
  
  
//   public function test_unauthenticated_users_cannot_edit(){
    
  
  
//   $user = factory(User::class)->make();
//   $post = factory(Post::class)->create();
  
//   $checkResponse = $this->actingAs($user)->get('posts/'.$post->id.'/edit', $post->toArray(),[]);
//   $checkResponse->assertStatus(302);
//   $checkResponse->assertRedirect('/posts');
//   }
//   public function test_authenticted_users_can_delete(){
  
  
//   $users=factory(User::class)->create();
//   //And a task which is created by the user
//   $posts = factory(Post::class)->create();
//   //When the user hit's the endpoint
//   $response=$this->actingAs($users)->delete('posts/'.$posts->id);
//   //The task should be deleted from the database.
//   $this->assertSoftDeleted('posts',$posts->toArray());
  
//   }
  
  
//   public function test_unauthorized_user_cannot_delete_the_post(){
//     //Given we have a signed in user
//     $user = factory(User::class)->create([
//       'name'=>'',
//       'email'=>'',
//       'password'=>''
//     ]);
//     //And a task which is not created by the user
//     $posts = factory(Post::class)->create();
//     //When the user hit's the endpoint to delete the task
//   $response = $this->actingAs($user)->get('posts/'.$posts->id);
    
//     $response->assertStatus(200);
//     // $response->assertRedirect('/posts');
  
//   // }
//     }
}
