<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\{Storage, Hash};
use Illuminate\Support\Arr;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (request()->ajax()) {
            $users = User::query();

            return DataTables::of($users)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                type="button" id="action' .  $item->id . '"
                                    data-toggle="dropdown" 
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">
                                    Sunting
                                </a>
                                <form action="' . route('user.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>';
                })
                ->editColumn('image', function ($item) {
                    if ($item->image != null) {
                        return $item->image ? '<img src="' . Storage::url($item->image) . '" style="max-height: 40px;"/>' : '';
                    } else {
                        return 'N/A';
                    }
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('admin.user.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'image'                 => 'required|image|mimes:jpg,png,jpeg,bmp',
            'password'              => 'required|min:3',
            'konfirmasi_password'   => 'required|same:password|min:3',
        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/user', 'public');
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect()
            ->route('user.index')
            ->with(['status' => 'Data User Berhasil Ditambahkan']);
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
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
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
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email,' . $id,
            'image'                 => 'nullable|image|mimes:jpg,png,jpeg,bmp',
            'password'              => 'sometimes|nullable|min:3',
            'konfirmasi_password'   => 'sometimes|same:password|nullable|min:3',
        ]);

        $data = $request->all();
        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(storage_path('app/public/' . $user->image))) {
                Storage::delete('public/' . $user->image);
                $data['image'] =  $request->file('image')->store('assets/user', 'public');
            } else {
                $data['image'] =  $request->file('image')->store('assets/user', 'public');
            }
        }

        if ($request->input('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, ['password']);
        }

        $user->update($data);
        return redirect()
            ->route('user.index')
            ->with(['success' => 'Data User' . $user->name . 'Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Storage::delete('public/' . $user->image);
        $user->delete();
        return redirect()
            ->route('user.index')
            ->with(['success' => 'Data User' . $user->name . 'Berhasil Dihapus']);
    }
}
