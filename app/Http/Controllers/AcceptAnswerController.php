<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AcceptAnswerController extends Controller
{
    #-------- SINGLE ACTION CONTROLLER -----------------
    #Definition: single action controller is a controller that only handle a single action controller
    # and because we only have a single action in the controller in wep.php we do not need to speficied a single name

    # laravel asume it be call __invoke
    public function __invoke(Answer $answer)
    {

        #------ authorize the user
        $this->authorize('accept', $answer);
        #----- made changes in the db
        $answer->question->acceptBestAnswer($answer);
        return back();
    }
}
