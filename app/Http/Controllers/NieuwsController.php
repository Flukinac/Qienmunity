<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Nieuwspost;
use App\Http\Requests;
use Illuminate\Pagination\PaginationServiceProvider;

class NieuwsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinned = DB::table('nieuwsposts')->where('pinned', 1)->get();
        $post =  DB::table('nieuwsposts')->where('pinned', 0)->paginate(6);
        return view('nieuwspage/nieuws')->with('nieuws', $post)->with('pinned', $pinned);
                                        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nieuwspage.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titel' => 'required',
            'content' =>  'required',
        ]);
        $post = new Nieuwspost;
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('titel');
        $post->content = $request->input('content');
        $post->save();
        
        return redirect('/nieuwsposts');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
            $post = Nieuwspost::find($id);
            return view('nieuwspage.show')->with('post', $post);                     
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $post = Nieuwspost::find($id);
        return view('nieuwspage.edit')->with('post', $post); 
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
        if((!$request->pinned) && (!$request->unpin)){
            $this->validate($request,[
                'titel' => 'required',
                'content' =>  'required',
            ]);
            $post = Nieuwspost::find($id);
            $post->title = $request->input('titel');
            $post->content = $request->input('content');
        }elseif(!$request->unpin){
            $post = Nieuwspost::find($id);
            $post->pinned = 1;
        }else{
            $post = Nieuwspost::find($id);
            $post->pinned = 0;
        }
            
        $post->save();
        
        if(!$request->pinned){
            return redirect('/nieuwsposts')->with('success', 'Post succesvol gewijzigd');
        }else{
             return redirect('/nieuwsposts')->with('success', 'Post succesvol vastgepint');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Nieuwspost::find($id);
        $post->delete();
        return redirect('/nieuwsposts')->with('success', 'Post is verwijderd');
    }
    
}
