<?php

namespace Modules\Exam\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Exam\Models\Answer;
use Modules\Exam\Models\Exam;
use Modules\Exam\Models\Question;

class ExamDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exams = [
            [
                'speciality_id' => 1,
                'teacher_id' => 5,
                'title' => 'Calculus Limits',
                'num_of_questions' => 4,
                'start_at'=>'2024-06-08 10:00:00',
                'end_at'=>'2024-06-08 11:00:00',

            ],
            [
                'speciality_id' => 2,
                'teacher_id' => 3,
                'title' => 'Static',
                'num_of_questions' => 4,
                'start_at'=>'2024-06-08 13:00:00',
                'end_at'=>'2024-06-08 15:00:00',
            ],
            [
                'speciality_id' => 3,
                'teacher_id' => 1,
                'title' => 'English',
                'num_of_questions' => 2,
                'start_at'=>'2024-06-09 08:30:00',
                'end_at'=>'2024-06-09 12:00:00',
            ],
            [
                'speciality_id' => 4,
                'teacher_id' => 2,
                'title' => 'Atoms',
                'num_of_questions' => 3,
                'start_at'=>'2024-06-10 14:00:00',
                'end_at'=>'2024-06-10 15:30:00',
            ],
            [
                'speciality_id' => 5,
                'teacher_id' => 4,
                'title' => 'C++',
                'num_of_questions' => 2,
                'start_at'=>'2024-06-11 16:00:00',
                'end_at'=>'2024-06-11 17:00:00',
            ],

        ];
        foreach ($exams as $exam) {
            Exam::create($exam);
        }


        $questions = [
            [
                'exam_id' => 1,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'Suppose H(t) = t2 + 5t + 1. Find the limit lim t→2 H(t).',
                'mark' => 3.5,
            ],
            [
                'exam_id' => 1,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'Find the limit lim t→2 (t2 − 4 / t − 2)',
                'mark' => 2.0,
            ],
            [
                'exam_id' => 1,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'Find the limit of f(x) as x tends to 2 from the left if',
                'mark' => 1.0,
            ],
            [
                'exam_id' => 1,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'Suppose the total cost, C(q), of producing a quantity q of a product equals a fixed cost of $1000 plus $3 times the quantity produced. So total cost in dollars is C(q) = 1000 + 3q.',
                'mark' => 3.5,
            ],
//            second exam question
            [
                'exam_id' => 2,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'Three masses are attached to a uniform meter stick, as shown in Figure 12.9. The mass of the meter stick is 150.0 g and the masses to the left of the fulcrum are  m1=50.0g and  m2=75.0g. Find the mass  m3 that balances the system when it is attached at the right end of the stick, and the normal reaction force at the fulcrum when the system is balanced.',
                'mark' => 2.5,
            ],
            [
                'exam_id' => 2,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'A weightlifter is holding a 50.0-lb weight (equivalent to 222.4 N) with his forearm, as shown in Figure 12.11. His forearm is positioned at  β=60° with respect to his upper arm. The forearm is supported by a contraction of the biceps muscle, which causes a torque around the elbow. Assuming that the tension in the biceps acts along the vertical direction given by gravity, what tension must the muscle exert to hold the forearm at the position shown? What is the force on the elbow joint? Assume that the forearm’s weight is negligible. Give your final answers in SI units.',
                'mark' => 2.5,
            ],
            [
                'exam_id' => 2,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'A uniform ladder is  L=5.0m long and weighs 400.0 N. The ladder rests against a slippery vertical wall, as shown in Figure 12.14. The inclination angle between the ladder and the rough floor is  β=53°. Find the reaction forces from the floor and from the wall on the ladder and the coefficient of static friction  μs at the interface of the ladder with the floor that prevents the ladder from slipping.',
                'mark' => 2.75,
            ],
            [
                'exam_id' => 2,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'A swinging door that weighs  w=400.0N is supported by hinges A and B so that the door can swing about a vertical axis passing through the hinges Figure 12.16. The door has a width of  b=1.00m, and the door slab has a uniform mass density. The hinges are placed symmetrically at the door’s edge in such a way that the door’s weight is evenly distributed between them. The hinges are separated by distance  a=2.00m. Find the forces on the hinges when the door rests half-open.',
                'mark' => 2.25,
            ],
//            third exam question
            [
                'exam_id' => 3,
                'question_title' => 'Please select a incorrect answer',
                'question_image' => null,
                'question_text' => 'Paul, There’s still a little petrol in the car, so you won’t need to get any more until you reach Benton, where you can buy it cheaply. Sally',
                'mark' =>5.0,
            ],
            [
                'exam_id' => 3,
                'question_title' => 'Please select a incorrect answer',
                'question_image' => null,
                'question_text' => 'Hello Robert, Thanks for inviting me to dinner. I’d love to come. I don’t eat meat and I can’t eat food with milk in it because it makes me sick. I hope that’s not too much trouble! Kate',
                'mark' => 5.0,
            ],

//            fourth exam question
            [
                'exam_id' => 4,
                'question_title' => 'Please select a incorrect answer',
                'question_image' => null,
                'question_text' => 'Are there nuclear reactions going on in our bodies',
                'mark' =>3.0,
            ],
            [
                'exam_id' => 4,
                'question_title' => 'Please select a incorrect answer',
                'question_image' => null,
                'question_text' => 'Are two atoms of the same element identical',
                'mark' => 5.0,
            ],
            [
                'exam_id' => 4,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'Can the decay half-life of a radioactive material be changed',
                'mark' => 2.0,
            ],

//            fifth exam question
            [
                'exam_id' => 5,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'What is the output when the following code fragment is executed? int found = 0, count = 5; if (!found || --count == 0) cout << "danger" << endl; cout << "count = " << count << endl;',
                'mark' =>5.0,
            ],
            [
                'exam_id' => 5,
                'question_title' => 'Please select a correct answer',
                'question_image' => null,
                'question_text' => 'What is used to indicate decimal numbers in C++ language',
                'mark' => 5.0,
            ],


        ];
        foreach ($questions as $question){
            Question::create($question);
        }


        $answers = [
            [
                'question_id' => 1,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 1,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 1,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 2,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 2,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 2,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 3,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 3,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 3,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 4,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 4,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 4,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],


            //second question
            [
                'question_id' => 5,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 5,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 5,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 6,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 6,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 6,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 7,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 7,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 7,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 8,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 8,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 8,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],

            //third question
            [
                'question_id' => 9,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 9,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 9,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 10,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 10,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 10,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],


            //forth question
            [
                'question_id' => 11,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 11,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 11,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 12,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 12,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 12,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 13,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 13,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 13,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],

            //five question
            [
                'question_id' => 14,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 14,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 14,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 15,
                'answer_text' => 'A',
                'is_correct_answer' => 'True',
            ],
            [
                'question_id' => 15,
                'answer_text' => 'B',
                'is_correct_answer' => 'False',
            ],
            [
                'question_id' => 15,
                'answer_text' => 'C',
                'is_correct_answer' => 'False',
            ],


        ];
        foreach ($answers as $answer){
            Answer::create($answer);
        }
    }
}
