<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PortofolioController extends Controller
{
    // Columns to hidden
    private $hiddenCols = ['created_at', 'updated_at'];
    private $validationRules = [
        'title' => 'required',
        'images_url' => 'sometimes|image|mimes:jpg,png,jpeg,gif,webp',
        'category_id' => 'required|numeric',
        'service_id' => 'required|numeric',
        'slug' => 'required',
        'description' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Portofolio::get()->makeHidden($this->hiddenCols);
        $portofolios = [];
        foreach($data as $porto) {
            $porto['images_url'] = config('app.cdn') . $porto->images_url;
            $portofolios[] = $porto;
        }

        return response()->json([
            'status' => 'ok',
            'portofolios' => $portofolios
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
        Portofolio::create($data);
        
        return response()->json([
            'status' => 'ok',
            'message' => 'Portofolio data saved successfully'
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
        $portofolio = Portofolio::find($id);

        if(!$portofolio) {
            return response()->json([
                'status' => 'error',
                'message' => "Unknown portofolio with ID $id"
            ], Response::HTTP_NOT_FOUND);
        }

        $portofolio['images_url'] = config('app.cdn') . $portofolio->images_url;

        return response()->json([
            'status' => 'ok',
            'portofolio' => $portofolio->makeHidden($this->hiddenCols)
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
            $data['images_url'] = $image['path'];
        }

        Portofolio::whereId($id)->update($data);
        
        return response()->json([
            'status' => 'ok',
            'message' => 'Portofolio data saved successfully',
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
        Portofolio::whereId($id)->delete();

        return response()->json([
            'status' => 'ok',
            'message' => 'Portofolio data deleted successfully'
        ], Response::HTTP_OK);
    }

    /**
     * Move uploaded image
     * @param \Illumnate\Http\UploadFile $image
     * @return array $name
     */
    private function uploadImage($image)
    {
        $name = 'portofolio' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('assets/portofolio', $name, 'public');
        return [
            'name' => $name,
            'path' => $path
        ];
    }
}
