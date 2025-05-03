<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function list(){
        // if(auth()->check()){
        //     return redirect('/admin/dashboard');
        // }
        $data['getRecord'] = Role::getRecord();
        return view('view_admin/role/list', $data);
    }

    public function add(){
        // if(auth()->check()){
        //     return redirect('/admin/dashboard');
        // }
        
        return view('view_admin/role/ajouter');
    }

    public function insert(Request $request)
    {
        $save = new Role;
        $save->nom = $request->nom;
        $save->prenom = $request->prenom;
        $save->ville = $request->ville;
        $save->specialite = $request->specialite;
        $save->contact = $request->contact;
        $save->email = $request->email;
        $save->mot_de_passe = $request->mot_de_passe;
        // $save->role_entrepreneur = $request->role_entrepreneur;
        // $save->role_admin = $request->role_admin;
        // $save->service_id = $request->service_id;
        $save->save();

        return redirect('/role')->with('message', 'Ajouté avec succès');
    }
    //     $request->validate([
    //         'titre' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'montant_1' => 'required',
    //         'montant_2' => 'required',
    //     ], [
    //         'titre.required' => 'Le champ "titre" est requis.',
    //         'titre.max' => 'Le champ "titre" doit avoir maximum :max caractères.',
    //         'description.required' => 'Le champ "description" est requis.',
    //         'description.max' => 'Le champ "description" doit avoir maximum :max caractères.',
    //         'montant_1.required' => 'Le champ "montant 1" est requis.',
    //         'montant_2.required' => 'Le champ "montant 2" est requis.',
    //     ]);


    //     $data = $request->except('_token', 'photo');
    //     if ($request->hasFile('photo')) {
    //         foreach ($request->photo as $item) {
    //             $photo[] = $item->store('cause', 'public');
    //         }
    //         $data['photo'] = json_encode($photo);
    //     }
    //     Role::create($data);
    //     return back()->with('message', 'Ajouté avec succès');
    // }

    public function edit($id)
    {
        $data['getRecord'] = Role::getSingle($id);
        return view('view_admin/role/modifier', $data);

        // $request->validate([
        //     'titre' => 'required|string',
        //     'texte' => 'required',


        // ], [

        //     'titre.max' => 'Le champ "titre" doit avoir maximum :max caractères.',
        //     'text.max' => 'Le champ "text" doit avoir maximum :max caractères.',
        // ]);

        // $data = $request->except('photo');
        // if ($request->hasFile('photo')) {
        //     if(isset($domaineintervention->photo)){
        //     foreach(json_decode($domaineintervention->photo) as $item){
        //         File::delete('storage/'.$item);
        //     }
        //     }
        //     foreach($request->photo as $item){
        //     $photo[]= $item->store('photo', 'public');
        //     }
        //     $data['photo']=json_encode($photo);
        // }

        //  $domaineintervention->update($data);

        // return back()->with('message', 'modification effectuée avec succès');
    }

    public function update($id, Request $request)
{
        $save = Role::getSingle($id);
    
        if ($save === null) {
            return redirect('/role')->back()->with('Erreur', 'Utilisateur non trouvé');
        }

        $save->nom = $request->nom;
        $save->prenom = $request->prenom;
        $save->ville = $request->ville;
        $save->specialite = $request->specialite;
        $save->contact = $request->contact;
        $save->email = $request->email;
        // $save->role_entrepreneur = $request->role_entrepreneur;
        // $save->role_admin = $request->role_admin;
        // $save->service_id = $request->service_id;
    
        if (!empty($request->mot_de_passe)) {
            $save->mot_de_passe = Hash::make($request->mot_de_passe);
        }
    
        $save->save();

        return redirect('/update')->with('message', 'Mise a jour effectuer avec succès');
}

    public function active(Role $role)
    {
        $role->update(['is_active' => !$role->is_active]);
        return back()->with('message', 'publication effectuée avec succès');
    }

   /**
    * Remove the specified resource from storage.
    */
   public function delete($id)
   {
       $save = Role::getSingle($id);
       $save->delete();
       return back()->with('message', 'suppression effectuée avec succès');
   }
}
