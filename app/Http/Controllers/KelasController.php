<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Student;

class KelasController extends Controller
{
    public function index(){
        return view('kelas.all',[
            "title" => "Class",
            "kelas" => Kelas::paginate(10)
            
        ]);
    }

    public function create(Kelas $kelas){
        return view('kelas.create',[
            "title" => "Create Class",
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
        ]);

        $existingStudent = Kelas::where('nama', $validateData['nama'])->first();

        if ($existingStudent) {
            return back()->with('danger', "The Class you provide already exist!");
        }

        $result = Kelas::create($validateData);

        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', "Data successfully added");
        }
    }

    public function show(Kelas $kelas)
    {
        //
    }

    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', [
            "title" => "Edit Class",
            "kelas" => $kelas
        ]);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validateData = $request->validate([
            'nama' => 'required',
        ]);

        $result = Kelas::where('id', $kelas->id)->update($validateData);

        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', "Data successfully updated");
        }
    }

    public function destroy($id)
    {

        $isUsedInOtherTable = Student::where('kelas_id', $id)->exists();
    
        if ($isUsedInOtherTable) {
            return redirect('/dashboard/kelas/all')->with('error', "Data cannot be deleted because it is used in another table");
            
        }else{
            $result = Kelas::destroy($id);
            return redirect('/dashboard/kelas/all')->with('success', "Data successfully delete");
        }
    }
}