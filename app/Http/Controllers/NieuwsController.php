<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Nieuwspost;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Pagination\PaginationServiceProvider;

class NieuwsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $pinned = Nieuwspost::orderBy('id','asc')->where('pinned', 1)->take(3)->paginate(3);
        $post = Nieuwspost::orderBy('id','desc')->where('pinned', 0)->paginate(6);
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
            $pinned = Nieuwspost::all()->where('pinned', 1);
            if(count($pinned)<3){
            $post = Nieuwspost::find($id);
            $post->pinned = 1;
            }else{
                return redirect('/nieuwsposts')->with('error', 'Er kunnen maximaal 3 post worden gepind');
            }
        }else{
            $post = Nieuwspost::find($id);
            $post->pinned = 0;
        }
            
        $post->save();
        

        return redirect('/nieuwsposts');



        if(!$request->pinned){
            return redirect('/nieuwsposts')->with('success', 'Post succesvol gewijzigd');
        }else{
             return redirect('/nieuwsposts')->with('success', 'Post succesvol vastgepint');
        }

    }

    public function destroy($id)
    {
        $post = Nieuwspost::find($id);
        $post->delete();
        return redirect('/nieuwsposts')->with('success', 'Post is verwijderd');
    }

    
    public function search(Request $request){
     
            $query = $request->suggestion;  
            //echo $query;
            print_r($query);
            $postquery = Nieuwspost::where('title', 'like', '%'.$query.'%')->get();
            //print_r($postquery);      
            //echo "succes";
           return new Response($postquery);
        
    }
}



