<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //
    public function index()
    {
        return view('books.index');
    }
    public function show(){
        $books = Book::all();
        return response([
            'books'=>$books
        ]);
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'author' => 'required|max:191',
            'edition' => 'required|max:191',
            'nofpages' => 'required|max:191',
          

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $book = new Book;
            $book->title=$request->input('title');
            $book->author=$request->input('author');
            $book->edition=$request->input('edition');
            $book->no_of_pages=$request->input('nofpages');
            $book->save();
            return response()->json([
                'status'=>200,
                'message'=>'Book Added Successfully',
            ]);
      
        }
       
    }

    public function edit($book_id){
        $books = Book::find($book_id);
        if($books){
            return response()->json([
                'status'=>200,
                'books'=>$books,
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Book not Found',
            ]);
        }
    }

    public function update(Request $request, $book_id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'author' => 'required|max:191',
            'edition' => 'required|max:191',
            'nofpages' => 'required|max:191',
          

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $book = Book::find($book_id);
            if($book){
                
            $book->title=$request->input('title');
            $book->title=$request->input('title');
            $book->author=$request->input('author');
            $book->edition=$request->input('edition');
            $book->no_of_pages=$request->input('nofpages');
            $book->update();

            return response()->json([
                'status'=>200,
                'message'=>'Updated Successfully',
            ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Book not Found',
                ]);
            }

        }
       
    }
     public function destory($book_id){

        $books = Book::find($book_id);
        $books->delete();
        
            return response()->json([
                'status'=>200,
                'message'=>'Book Record Deleted Successfully',
            ]);
        
        
        
     }

    
}
