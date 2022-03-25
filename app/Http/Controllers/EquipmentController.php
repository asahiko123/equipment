<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentForm;
use App\Models\AuthorizerForm;
use Illuminate\Support\Facades\DB;
use App\Services\CheckFormData;
use App\Models\UserForm;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //エロクワント
        // $equipments =EquipmentForm::all();
        // dd($equipments);

        $equipments =DB::table('equipment_forms')
        ->select('equipment_forms.id','facility_user_id','facility_users.name as facility_user_name','borrowed','checkout','returned','confirmed','description','accepted','authorizer_id','authorizers.name as authorizer_name')
        ->leftjoin('authorizers','equipment_forms.authorizer_id','=','authorizers.id')
        ->leftjoin('facility_users','equipment_forms.facility_user_id','=','facility_users.id')
        ->orderBy('id','desc')
        ->paginate(10);


        $borrowarr =array();
        $confirmarr =array();

        foreach($equipments as $value){

            $borrowed =CheckFormData::CheckBorrowed($value);
            $confirmed=CheckFormData::CheckConfirmed($value);

            $borrowarr[] =$borrowed;
            $confirmarr[]=$confirmed;
        }
        // var_dump($confirmarr);
        // var_dump($borrowarr);

        return view('equipments.index',compact('equipments','borrowarr','confirmarr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserForm $userForm)
    {
        $facility_user = $userForm->getFacilityUser();

        return view('equipments.create',compact('facility_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $equipment = new EquipmentForm;

        $equipment->facility_user_id = $request->input('facility_user_id');
        $equipment->borrowed = $request->input('borrowed');
        $equipment->checkout = $request->input('checkout');
        $equipment->returned = $request->input('returned');
        $equipment->confirmed= $request->input('confirmed');
        $equipment->description=$request->input('description');


        $equipment->save();

        return redirect('equipment/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment =EquipmentForm::find($id);

        return view('equipments.edit',compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipment =EquipmentForm::find($id);

        // $equipment->name = $request->input('name');
        // $equipment->borrowed = $request->input('borrowed');
        // $equipment->checkout = $request->input('checkout');
        // $equipment->returned = $request->input('returned');
        // $equipment->description=$request->input('description');
        $equipment->confirmed= $request->input('confirmed');

        $equipment->save();

        return redirect('equipment/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment =EquipmentForm::find($id);
        $equipment->delete();

        return redirect('equipment/index');
    }

    public function accept(Request $request,$id){

            $equipment =EquipmentForm::find($id);
            $equipment->accepted =$request->accepted;

            $equipment->save();

            $authorizer =AuthorizerForm::all();

        return view('equipments.select',compact('authorizer','equipment'));
    }

    public function select(Request $request,$id){

        $equipment =EquipmentForm::find($id);
        $equipment->authorizer_id =$request->authorizer_id;


        $equipment->save();

        return redirect('equipment/index');
    }
}
