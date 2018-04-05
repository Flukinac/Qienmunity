<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Resources\Views;
 
class GebruikerController extends Controller
{   
    public function nieuwegebruiker()
    {
        return view ('nieuwegebruiker');
    }
    
    public function opslaan()
    {
        var_dump(request('werkstatus'));
        var_dump(request('naam'));
        var_dump(request('emailadres'));
        var_dump(request('tempww'));
    }
    
}