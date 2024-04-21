<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $level_id
 * @property string $date
 * @property string $time_start
 * @property string $time_end
 * @property int $is_done
 * @property int $number_word
 * @property int $number_word_completed
 * @property string $vocabulary_note
 * @property int $is_study_grammar
 * @property string $grammar_note
 * @property int $is_study_listen
 * @property int $listen_checked
 * @property int $is_study_reading
 * @property int $reading_checked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereGrammarNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereIsStudyGrammar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereIsStudyListen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereIsStudyReading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereListenChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereNumberWord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereNumberWordCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereReadingChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTimeEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTimeStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereVocabularyNote($value)
 * @mixin \Eloquent
 */
class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];
}
