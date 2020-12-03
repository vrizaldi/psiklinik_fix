<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function serve(Request $request) {
        $CONSULTANT_TYPES = ['Psikolog Anak', 'Psikolog Pendidikan', 'Psikolog Organisasi', 'Psikolog Klinis', 'Psikolog Hubungan'];
        $consultantTypes = [];
        foreach($CONSULTANT_TYPES as $type) {
            $consultantTypes[$type] = Consultant::where('type', $type)
                ->whereRaw('UPPER(name) like \'%' . $request['query'] . '%\'')->get();
        }
        return view('home.consultants', [
            'query' => $request['query'],
            'consultantTypes' => $consultantTypes
        ]);
    }

    public function showConsultant($email) {
        $consultant = Consultant::find($email);
        if(is_null($consultant)) return abort(404);
        return view('home.consultant', ['consultant' => $consultant]);
    }
}
