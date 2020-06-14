<?php
declare(strict_types=1);

namespace App\Domain\Quiz;

use JsonSerializable;

/**
 * Class Quizz
 * @package App\Domain\Quizz
 */
class Quiz implements JsonSerializable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $picture;

    /**
     * @var string
     */
    public $video;

    /**
     * @var string
     */
    public $musique;

    /**
     * @var string
     */
    public $textDisclameTitle;

    /**
     * @var string
     */
    public $textDisclameText;

    /**
     * @var string
     */
    public $textInstructionTitle;

    /**
     * @var string
     */
    public $textInstructionText;

    /**
     * @var string
     */
    public $popup1Title;

    /**
     * @var string
     */
    public $popup1Text;

    /**
     * @var string
     */
    public $popup2Title;

    /**
     * @var string
     */
    public $popup2Text;

    /**
     * @var Quiz
     */
    public $quiz1;

    /**
     * @var string
     */
    public $answerTrueText;

    /**
     * @var string
     */
    public $answerFalseText;

    /**
     * Quizz constructor.
     * @param int $id
     * @param string $question
     * @param string $answer1Text
     * @param string $answer1State
     * @param string $answer2Text
     * @param string $answer2State
     * @param string $answer3Text
     * @param string $answer3State
     * @param string $answer4Text
     * @param string $answer4State
     * @param string $answerTrueText
     * @param string $answerFalseText
     */
    public function __construct(int $id, string $question, string $answer1Text, string $answer1State, string $answer2Text, string $answer2State, string $answer3Text, string $answer3State, string $answer4Text, string $answer4State, string $answerTrueText, string $answerFalseText)
    {
        $this->id = $id;
        $this->question = $question;
        $this->answer1Text = $answer1Text;
        $this->answer1State = $answer1State == '1';
        $this->answer2Text = $answer2Text;
        $this->answer2State = $answer2State == '1';
        $this->answer3Text = $answer3Text;
        $this->answer3State = $answer3State == '1';
        $this->answer4Text = $answer4Text;
        $this->answer4State = $answer4State == '1';
        $this->answerTrueText = $answerTrueText;
        $this->answerFalseText = $answerFalseText;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer1Text' => $this->answer1Text,
            'answer1State' => $this->answer1State,
            'answer2Text' => $this->answer2Text,
            'answer2State' => $this->answer2State,
            'answer3Text' => $this->answer3Text,
            'answer3State' => $this->answer3State,
            'answer4Text' => $this->answer4Text,
            'answer4State' => $this->answer4State,
            'quizAnswerTrueText' => $this->answerTrueText,
            'quizAnswerFalseText' => $this->answerFalseText,
        ];
    }
}
