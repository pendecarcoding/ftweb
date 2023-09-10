<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_menu'])->only('index');
        $this->middleware(['permission:add_menu'])->only('create');
        $this->middleware(['permission:edit_menu'])->only('edit');
        $this->middleware(['permission:delete_menu'])->only('destroy');
        $this->middleware(['permission:publish_menu'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $categories = array();
        $posts = array();
        return view('backend.menu.index', compact('menus','categories','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog_system.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Assuming the JSON data is sent as 'menu' in the request
        $menu = $request->input('menu');
        $array_menu = json_decode($menu, true);

        // Truncate the menu table
        Menu::truncate();

        // Call the recursive function to update the menu
        $this->updateMenuItem($array_menu);

        return back();

    }

    private function updateMenuItem($menu, $parent_id = 0)
    {
        foreach ($menu as $value) {
            $label = $value['label'];
            $url = empty($value['url']) ? '#' : $value['url'];
            $target = explode(',',$url);

            $menuItem = new Menu([
                'label_menu' => $label,
                'url_menu' => $target[0],
                'parent_id' => $parent_id,
                'target' => !empty($target[1])?$target[1]:'_self',
            ]);

            $menuItem->save();

            if (array_key_exists('children', $value)) {
                $this->updateMenuItem($value['children'], $menuItem->id);
            }
        }
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

        $banner = Banner::find($id);
        return view('backend.blog_system.banner.edit', compact('banner'));

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
        $banner = Banner::find($id);
        $banner->image = $request->image;
        $banner->page_link = $request->link;
        $banner->name_page = $request->name_page;
        $banner->save();

        flash(translate('Banner has been updated successfully'))->success();
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if(Banner::destroy($id)){
            //unlink($slider->photo);
            flash(translate('Banner has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('banner.index');
    }
}
