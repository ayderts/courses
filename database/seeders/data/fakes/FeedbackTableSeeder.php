<?php

namespace Database\Seeders\data\fakes;

use App\Constants\LanguageConstant;
use App\Models\Feedback;
use App\Models\HandbookFeedback;
use App\Models\SeoPage;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Translation;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $handbookFeedback = HandbookFeedback::firstOrNew(['name' => 'example']);

        if (!$handbookFeedback->exists) {
            $handbookFeedback->save();
        }

        Feedback::firstOrNew([
            'name' => 'example',
            'phone' => '+77779997799',
            'email' => 'example@rocketfirm.net',
            'content' => 'example',
            'handbook_feedback_id' => $handbookFeedback->id,
        ])->save();

        Feedback::firstOrNew([
            'name' => 'example_two',
            'phone' => '+77779997799',
            'email' => 'example@rocketfirm.net',
            'content' => 'example',
            'handbook_feedback_id' => $handbookFeedback->id,
        ])->save();
    }
}
