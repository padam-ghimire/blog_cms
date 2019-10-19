<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use App\Category;
use App\User;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' =>"NEWS"
        ]);
        $category2 = Category::create([
            'name' =>"MARKETING"
        ]);
        $category3 = Category::create([
            'name' =>"DESIGN"
        ]);
        $category4 = Category::create([
            'name' =>"HIRING"
        ]);
        $category5 = Category::create([
            'name' =>"PRODUCT"
        ]);
        $category6 = Category::create([
            'name' =>"MANAGEMENT"
        ]);


      $author1= User::create([
          'name' =>"Ram Prasad",
          'email' =>"ram@prasad",
          'password' => Hash::make('master123')
      ]);
      $author2= User::create([
        'name' =>"Gham Prasad",
        'email' =>"gham@prasad.com",
        'password' => Hash::make('password')
      ]);
      $author3= User::create([
        'name' =>"Shyam Prasad",
        'email' =>"shyam@prasad.com",
        'password' => Hash::make('secret')
      ]);



        $post1 = Post::create([
            'title' => "We relocated our office to a new designed garage",
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco",
            'category_id'=>$category1->id,
            'image' =>'posts/1.jpg',
            'user_id' =>$author1->id
            
        ]);

        $post2 = Post::create([
            'title' => "Top 5 brilliant content marketing strategies",
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco",
            'category_id'=>$category2->id,
            'image' =>'posts/2.jpg',
            'user_id' =>$author2->id


        ]);

        $post3 = Post::create([
            'title' => "Best practices for minimalist design with example",
            'description' =>"laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur",
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco",
            'category_id'=>$category3->id,
            'image' =>'posts/3.jpg',
            'user_id' =>$author1->id


        ]);

        $post4 = Post::create([
            'title' => "Congratulate and thank to Maryam for joining our team",
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco",
            'category_id'=>$category4->id,
            'image' =>'posts/4.jpg',
            'user_id' =>$author3->id


        ]);

        $post5 = Post::create([
            'title' => "New published books to read by a product designer",
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco",
            'category_id'=>$category5->id,
            'image' =>'posts/5.jpg',
            'user_id' =>$author1->id


        ]);

        $post6 = Post::create([
            'title' => "This is why it's time to ditch dress codes at work",
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco",
            'category_id'=>$category6->id,
            'image' =>'posts/6.jpg',
            'user_id' =>$author3->id


        ]);

          // Tags Seeder
          $tag1 = Tag::create([
            'name' =>"Job"
        ]);
        $tag2 = Tag::create([
            'name' =>"Screenshot"
        ]);
        $tag3 = Tag::create([
            'name' =>"Freebie"
        ]);
        $tag4 = Tag::create([
            'name' =>"Record"
        ]);
        $tag5 = Tag::create([
            'name' =>"Offer"
        ]);
        $tag6 = Tag::create([
            'name' =>"Customers"
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag4->id,$tag5->id]);
        $post4->tags()->attach([$tag6->id,$tag1->id]);
        $post1->tags()->attach([$tag1->id,$tag3->id]);
        $post6->tags()->attach([$tag3->id,$tag5->id]);
    
    }
}
