<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MemberController extends Controller
{
    // Columns to hidden
    private $hiddenCols = ['created_at', 'updated_at'];
    // Validation Rule Lists
    private $validationRules = [
        'name' => 'required',
        'part' => 'required',
        'image' => 'sometimes|image|mimes:png,jpg,jpeg,gif',
        'description' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::get()->makeHidden($this->hiddenCols);
        $members = [];
        foreach($data as $member) {
            $member['image'] = config('app.cdn') . $member->image;
            $members[] = $member;
        }

        return response()->json([
            'status' => 'ok',
            'members' => $members
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRules);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $image = $this->uploadImage($request->file('image'));
        $data = $request->all();
        $data['image'] = $image['path'];
        Member::create($data);
        
        return response()->json([
            'status' => 'ok',
            'message' => 'Member data saved successfully'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);

        if(!$member) {
            return response()->json([
                'status' => 'error',
                'message' => "Unknown member with ID $id"
            ], Response::HTTP_NOT_FOUND);
        }

        $member['image'] = config('app.cdn') . $member->image;

        return response()->json([
            'status' => 'ok',
            'member' => $member->makeHidden($this->hiddenCols)
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(), $this->validationRules);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $data = $request->all();

        if($img = $request->file('image')) {
            $image = $this->uploadImage($img);
            $data['image'] = $image['path'];
        }

        Member::whereId($id)->update($data);
        
        return response()->json([
            'status' => 'ok',
            'message' => 'Member data saved successfully',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::whereId($id)->delete();

        return response()->json([
            'status' => 'ok',
            'message' => 'Member data deleted successfully'
        ], Response::HTTP_OK);
    }

    /**
     * Move uploaded image
     * @param \Illumnate\Http\UploadFile $image
     * @return array $name
     */
    private function uploadImage($image)
    {
        $name = 'member' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('assets/portofolio', $name, 'public');
        return [
            'name' => $name,
            'path' => $path
        ];
    }
}
