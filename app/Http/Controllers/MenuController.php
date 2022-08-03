<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use App\Models\Menu;
use Auth;
use File;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FoodCategory::all();

        return view('menu.create', compact('categories'));
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
            'category' => ['required'],
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'photo' => ['image']
        ]);

        $user = Auth::user();

        $menu = new Menu;
        $menu->category_id = $request->category;
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        $user->menus()->save($menu);

        return to_route('menu.index');
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
    public function edit(Menu $menu)
    {
        $categories = FoodCategory::all();

        return view('menu.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'photo' => ['image']
        ]);

        $menu->category_id = $request->category;
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($image = $request->file('photo')) {
            $imagePath = public_path('storage/'.$menu->photo);
            // dd($imagePath);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image = request()->file('photo')->store('uploads', 'public');
            $menu->photo = $image;
        } else {
            unset($menu->photo);
        }

        $menu->save();

        return back()->with('status', 'Menu telah dikemaskini!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
