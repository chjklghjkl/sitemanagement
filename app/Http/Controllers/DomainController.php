<?php

namespace App\Http\Controllers;
use App\Models\Domain;
use Illuminate\Http\Request;
use Session;

class DomainController extends Controller
{
	public function domains(){
		return view('adddomain');
	}
	public function domainlist(){
		$domains = Domain::orderby('created_at','desc')->get();
		return view('domainlist')->with(compact('domains'));
		
	}
   public function adddomain(Request $request){
	   
	    $data = $request->all();
		
		$domain_name =$data['domain'];
      $valids= $this->is_valid_domain($domain_name);
     $domainname=Domain::where('domain',$data['domain'])->first();
      if(isset($domainname)){
         return redirect()->back()->with('error','Domain Already Exists');
      }
      $domain = new Domain;
      $domain->domain = $domain_name;
      $domain->valid = $valids;
      $domain->save();
     return redirect('/domainlist')->with('Success','Domain Add Successfully');
   }
   
   public function is_valid_domain($domain_name){

    return (preg_match("/^([a-zd](-*[a-zd])*)(.([a-zd](-*[a-zd])*))*$/i", $domain_name) //valid characters check
    && preg_match("/^.{1,253}$/", $domain_name) //overall length check
    && preg_match("/^[^.]{1,63}(.[^.]{1,63})*$/", $domain_name) ); //length of every label
     
   }
   public function deletedomain(Request $request)
   {
       $data = $request->all();
         $domain = Domain::where('id', $data['id'])->first();
       if(isset($domain)){
           $domain->delete();
           return redirect()->back()->with('success', 'Domain Deleted Successfully');
       }else{
           return redirect()->back();
       }

   }

}
