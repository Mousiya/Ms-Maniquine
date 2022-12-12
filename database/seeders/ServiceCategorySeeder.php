<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategory::create([
            'name'=>'Mehendi',
            'description'=>'Mehendi is one trend that’s picked upstream
                and romantic way of enhancing the beauty of your bridal look. 
                It’s Mehendi that completes the look Ms.Maniquine finely draws 
                little details and fills them with kinda love.',
            'image'=>'Mehendi_designs.jpg',
        ]);

        ServiceCategory::create([
            'name'=>'Aari Work',
            'description'=>'Love is what wears you, for it always there;
                even in the dark, or most in the dark, but shining out at times
                like gold stiches in piece of aari work. You can design your 
                blouses and salwars with Ms.Maniquine.',
            'image'=>'Aari_work.jpg',
        ]);

        ServiceCategory::create([
            'name'=>'Lehenga & Anarkali Suit',
            'description'=>'What you wear is how you present yourself to the world,
             especially on your’s or your loved one’s big day. We’ll dress you to 
             impress and makes dresses for others to stare. Make it worth their while
              with your choice from Ms.Maniquine.',
            'image'=>'LehengaAnarkaliSuit.jpg',
        ]);

        ServiceCategory::create([
            'name'=>'Saree Blouses',
            'description'=>'Life is do short to wear boring dress on your big day. 
                You can hold my hand to style yourself with varieties design blouses. You 
                can make your saree blouses more attractive with our aari work designs. 
                Design your wedding dresses with us!',
            'image'=>'Saree_Blouses.jpg',
        ]);

        ServiceCategory::create([
            'name'=>'Kids Dresses',
            'description'=>'Every little girl is a princess design dresses for 
                your baby girl with Ms.Maniquine.Happy children are always the 
                pretiest when you dressing up with Ms.Maniquine.Stay classy!',
            'image'=>'Kid_Dresses.jpg',
        ]);

        ServiceCategory::create([
            'name'=>'Party wears',
            'description'=>'Fashion is a language that creates itself in clothes to interrupt reality.
                You can wear a pretty dresses on party days which are perfectly fit on
                your body. We’ll design for you. Choose your unique party wear with Ms.Maniquine.',
            'image'=>'Party_wear.jpg',
        ]);

        ServiceCategory::create([
            'name'=>'All kind of ladies Dresses',
            'description'=>'Fashion says "Me too" style means "Me only". 
                You can customize your wishlist dresses with us and style your 
                own way. Make it simple but significiant. We can design and stich 
                all kind of ladies wear for you. Shop your style today at Ms.Maniquine.',
            'image'=>'All_kind_of_ladies_Dresses.jpg',
        ]);
    }
}
