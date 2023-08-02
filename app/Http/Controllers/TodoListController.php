<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index()
    {
        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    public function markComplete($id)
    {
        \Log::info($id); //Logging id from the form

        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function saveItem(Request $request)
    {
        \Log::info(json_encode($request->all())); //Logging the values from the form
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        // return view('welcome', ['listItems' => ListItem::all()]);
        return redirect('/');
    }
}
