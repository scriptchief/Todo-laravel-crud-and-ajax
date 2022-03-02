<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use DataTables;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
       $todos = Todo::latest()->get();
       
       if ($request->ajax()) {
         $data = Todo::latest()->get();
         return Datatables::of($data)
         ->addIndexColumn()
         ->addColumn('action', function($row){
            
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editTodo">Düzenle</a>';
            
            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">sil</a>';
            
            return $btn;
         })
         ->rawColumns(['action'])
         ->make(true);
      }
      
      return view('todo',compact('todos'));
   }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Todo::updateOrCreate(['id' => $request->todo_id],
        ['title' => $request->title, 'task' => $request->task,'cost' => $request->cost,'location' => $request->location,'status' => $request->status,'created_at' => $request->created_at]);       


       
       return response()->json(['success'=>'Kaydedildi']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $todo = Todo::find($id);
       return response()->json($todo);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Todo::find($id)->delete();
       
       return response()->json(['success'=>'Silindi']);
    }
 }


