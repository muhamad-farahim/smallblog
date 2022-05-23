<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $ids = User::pluck('id');

        // dd($user_id);

        $user_id = $ids[array_rand($ids->all())];



        return [
            "title" => "This is a blog",
            "desc" => "Lorem Ipsum Dolor sit amet elit",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel hic ab totam suscipit, doloremque asperiores iusto quisquam, aliquid molestiae libero impedit pariatur ipsum? Reiciendis dolores delectus aperiam nisi tempora ea ex iste maiores, eum laborum fugit ab nostrum? Fugiat sint distinctio atque repudiandae saepe. Omnis quo beatae, cum quod ratione pariatur alias nesciunt vitae corporis atque ad placeat, cupiditate sunt dolor! Quibusdam, consequuntur eum sed nobis voluptates explicabo deserunt impedit natus fuga. Exercitationem ea officia doloremque vel doloribus incidunt omnis velit similique. Inventore odit aperiam minima incidunt eius maxime vitae debitis expedita similique, explicabo exercitationem. Impedit nisi blanditiis, quaerat et non accusamus natus, cupiditate minus magni rerum odit obcaecati eos quae modi saepe veritatis iure molestiae minima itaque quos nemo pariatur aperiam praesentium ad. Natus voluptas voluptate quas maiores repellendus incidunt! Quibusdam, accusantium doloremque nostrum error sapiente quod, facere ratione nihil illo iure similique obcaecati expedita consequuntur enim aliquam voluptas alias, quaerat est? Sunt earum vitae ut exercitationem ipsa dignissimos laboriosam corrupti esse, reiciendis vero ipsam minima? Ipsum, quos adipisci expedita rerum corporis quaerat ratione culpa nostrum iure unde molestiae maiores sunt soluta. Culpa vitae minus adipisci! Mollitia sed aspernatur nam beatae est, itaque voluptatem harum in ut illum quaerat cumque expedita, ducimus autem doloremque neque facere! Voluptatibus fuga culpa animi similique sequi quo dolor adipisci unde esse alias dignissimos exercitationem numquam non voluptas autem qui voluptatem, illo commodi. Modi possimus quia quos saepe provident repellendus quasi dolor blanditiis eligendi sit perferendis vitae ut eveniet, officia molestiae a ipsam corporis molestias obcaecati dicta commodi qui! Ex, dicta corporis facilis quos iste rerum dolor voluptatibus, adipisci sed quas quibusdam dolorum maxime magni magnam, vel quaerat distinctio voluptatum dolorem ut ipsum recusandae quidem saepe! Corporis cum soluta iure nobis impedit aut et magni ut modi? Repellendus, ut expedita, sit tenetur cumque corrupti obcaecati exercitationem temporibus, facilis debitis vero! Ipsa vero, quidem laboriosam corporis autem asperiores blanditiis architecto, fugiat quaerat doloribus veritatis accusantium voluptate nostrum ea dicta enim. Hic nam esse voluptate a debitis. Ipsum nesciunt est dicta dolores accusamus in. Minus nostrum delectus perspiciatis deserunt odit distinctio hic quam tenetur, voluptatem nulla harum repellendus tempore porro. Sed, aperiam, placeat sapiente fuga sunt id asperiores deleniti minus libero esse cumque autem! Officiis omnis fugiat veniam! Corrupti corporis modi odit accusamus facere nam, provident labore molestiae magnam optio ipsam assumenda, ab quaerat excepturi officiis voluptatibus fugit id quod debitis soluta hic a consequatur veniam. Quod quas minima commodi. Possimus asperiores sint officia, praesentium iure tempore similique autem vitae nihil ab? Tempora delectus maiores, vero nobis ex tempore corporis eveniet possimus nemo deserunt, minus voluptate fugit voluptates. Dolorem, et? Accusamus dolores suscipit eveniet ab beatae et, exercitationem deleniti hic eos reprehenderit odio voluptate obcaecati autem quisquam non impedit similique commodi quod nemo doloribus eum repudiandae. Cupiditate non asperiores eius, maxime cumque ducimus velit veritatis nisi cum illum ratione voluptatum corporis debitis sunt, adipisci tenetur, rerum similique atque quia totam nesciunt. Excepturi dolorem, expedita voluptatem odit quam sed ab ullam quos mollitia sunt exercitationem perspiciatis eligendi.",
            "user_id" => 3
        ];
    }
}