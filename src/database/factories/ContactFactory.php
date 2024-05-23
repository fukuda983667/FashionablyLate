<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paragraph = $this->faker->paragraph(3); // 3つの文からなるランダムな段落を生成
        $detail = substr($paragraph, 0, 120); // 最初の120文字を取得

        return [
            'category_id' => Category::inRandomOrder()->first()->id, // 既存のカテゴリからランダムに選択
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->numberBetween(1, 3), // 1:男性, 2:女性, 3:その他
            'email' => $this->faker->unique()->safeEmail,
            'tell' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'building' => $this->faker->secondaryAddress,
            'detail' => $detail,
        ];
    }
}
