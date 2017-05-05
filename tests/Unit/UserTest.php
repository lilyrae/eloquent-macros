<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
	use DatabaseTransactions;

    /**
     * @test
     */
    public function can_get_latest_post()
    {
        $user = factory(\App\User::class)->create();
        $firstPost = factory(\App\Post::class)->create([
            'user_id' => $user->id
        ]);

        sleep(1);

        $secondPost = factory(\App\Post::class)->create([
            'user_id' => $user->id
        ]);

        $this->assertSame($secondPost->id, $user->latestPost->id);
    }
}
